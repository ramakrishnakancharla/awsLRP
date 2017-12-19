<?php

namespace App\Http\Controllers\finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\genericfamily;
use App\genericfriends;

use App\financeModel\financeasset;
use App\financeModel\assettype;
use App\financeModel\financingoption;
use App\financeModel\ownership;

use App\common_master\metadata;
use App\common_master\documenttype;

use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class FinanceAssetController extends Controller
{
    public function index(){

		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$assettype = assettype::where('Status',1)->orderBy('Name', 'asc')->get();
		$financingoption = financingoption::where('Status',1)->orderBy('Name', 'asc')->get();
		$ownership = ownership::where('Status',1)->orderBy('Name', 'asc')->get();
		$list = financeasset::where('Status',1)->get()->where('Txnuser',Auth::user()->id);
		$genericfamily = genericfamily::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$genericfriends = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		
		return view('finance/asset.index',compact('metadata','relation','documenttype','assettype','financingoption','ownership','list','genericfamily','genericfriends'));
    }
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			//'Priority'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('finance-asset')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$save = new financeasset;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$target_dir = "finance_upload/asset/";
			if($_FILES["DocImage"]["name"] !=''){
				$file_name = rand().$_FILES["DocImage"]["name"];
				$temp_name = $_FILES["DocImage"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = "";
			}
			
			$save->MetaID = Input::get('options');
			$save->ToWhom = $towhom;
			$save->AssetName = Input::get('AssetName');
			$save->AssetIdentifier = Input::get('AssetIdentifier');
			$save->AssetNo = Input::get('AssetNo');
			$save->AssetType = Input::get('AssetType');
			$save->Ownership = Input::get('Ownership');
			$save->FinancingOption = Input::get('FinancingOption');
			$save->Insured = (Input::has('Insured')) ? "Yes" : "No";
			$save->InsurancePolicyNo = Input::get('InsurancePolicyNo');
			$save->Depreciation = Input::get('Depreciation');
			$save->VendorName = Input::get('VendorName');
			$save->VendorContactNo = Input::get('VendorContactNo');
			$save->VendorEmailID = Input::get('VendorEmailID');
			$save->VendorAddress = Input::get('VendorAddress');
			$save->DocType = Input::get('DocType');
			$save->DocNo = Input::get('DocNo');
			$save->DocImage = $file_name;
			$save->Folder = $target_dir;
			$save->FromDate = DateTime::createFromFormat('d/m/Y', Input::get('FromDate'))->format('Y-m-d');
			$save->ToDate = DateTime::createFromFormat('d/m/Y', Input::get('ToDate'))->format('Y-m-d');
			$save->Txnuser = Auth::user()->id;
			$save->Status = 1;
			$save->save();

			// redirect
			Session::flash('message', 'Successfully created asset details!');
			return Redirect::to('finance-asset');
		}
	}
	public function show($id)
	{
		$list = financeasset::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$show = financeasset::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
		
		$NameOfMetadata = financeasset::find($show->FA_ID)->metadataName;
		$NameOfFamily = financeasset::find($show->FA_ID)->familyName;
		$NameOfFriend = financeasset::find($show->FA_ID)->friendsName;
		$NameOfDocType = financeasset::find($show->FA_ID)->docTypeName;
		$NameOfAssettype = financeasset::find($show->FA_ID)->assettypeName;
		$NameOfFinancingoption = financeasset::find($show->FA_ID)->financingoptionName;
		$NameOfownership = financeasset::find($show->FA_ID)->ownershipName;
		
		return view('finance/asset.show',compact('list','show','NameOfMetadata','NameOfFamily','NameOfFriend','NameOfDocType','NameOfAssettype','NameOfFinancingoption','NameOfownership'));
	}
	public function edit($id)
	{
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$assettype = assettype::where('Status',1)->orderBy('Name', 'asc')->get();
		$financingoption = financingoption::where('Status',1)->orderBy('Name', 'asc')->get();
		$ownership = ownership::where('Status',1)->orderBy('Name', 'asc')->get();
		$list = financeasset::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$genericfamily = genericfamily::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$edit = financeasset::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
		$genericfriends = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		
		
		return view('finance/asset.edit',compact('metadata','relation','documenttype','assettype','financingoption','ownership','list','genericfamily','edit','genericfriends'));
	}
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			//'Priority'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('finance-asset/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$save = financeasset::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$target_dir = "finance_upload/asset/";
			if($_FILES["DocImage"]["name"] !=''){
				$file_name = rand().$_FILES["DocImage"]["name"];
				$temp_name = $_FILES["DocImage"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = Input::get('PhotoEdit');
			}
			
			$save->MetaID = Input::get('options');
			$save->ToWhom = $towhom;
			$save->AssetName = Input::get('AssetName');
			$save->AssetIdentifier = Input::get('AssetIdentifier');
			$save->AssetNo = Input::get('AssetNo');
			$save->AssetType = Input::get('AssetType');
			$save->Ownership = Input::get('Ownership');
			$save->FinancingOption = Input::get('FinancingOption');
			$save->Insured = (Input::has('Insured')) ? "Yes" : "No";
			$save->InsurancePolicyNo = Input::get('InsurancePolicyNo');
			$save->Depreciation = Input::get('Depreciation');
			$save->VendorName = Input::get('VendorName');
			$save->VendorContactNo = Input::get('VendorContactNo');
			$save->VendorEmailID = Input::get('VendorEmailID');
			$save->VendorAddress = Input::get('VendorAddress');
			$save->DocType = Input::get('DocType');
			$save->DocNo = Input::get('DocNo');
			$save->DocImage = $file_name;
			$save->Folder = $target_dir;
			$save->FromDate = DateTime::createFromFormat('d/m/Y', Input::get('FromDate'))->format('Y-m-d');
			$save->ToDate = DateTime::createFromFormat('d/m/Y', Input::get('ToDate'))->format('Y-m-d');
			$save->Txnuser = Auth::user()->id;
			$save->Status = 1;
			$save->save();

			// redirect
			Session::flash('message', 'Successfully updated asset details!');
			return Redirect::to('finance-asset/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = financeasset::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the asset deposits!');
        return Redirect::to('finance-asset');
    }
	
}
