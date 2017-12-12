<?php

namespace App\Http\Controllers\finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\genericfamily;
use App\genericfriends;

use App\financeModel\financefixeddeposits;
use App\financeModel\depositoptions;
use App\financeModel\institutiontype;
use App\financeModel\rateofinterest;
use App\financeModel\nomineerelation;

use App\common_master\metadata;
use App\common_master\documenttype;

use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class FinanceFixedDepositsController extends Controller
{
    public function index(){

		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$nomineerelation = nomineerelation::where('Status',1)->orderBy('Name', 'asc')->get();
		$depositoptions = depositoptions::where('Status',1)->orderBy('Name', 'asc')->get();
		$institutiontype = institutiontype::where('Status',1)->orderBy('Name', 'asc')->get();
		$rateofinterest = rateofinterest::where('Status',1)->get();
		$list = financefixeddeposits::where('Status',1)->get()->where('Txnuser',Auth::user()->id);
		$genericfamily = genericfamily::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$genericfriends = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		
		return view('finance/fixedDeposits.index',compact('metadata','relation','documenttype','nomineerelation','depositoptions','institutiontype','rateofinterest','list','genericfamily','genericfriends'));
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
			return Redirect::to('finance-fixed-deposits')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$save = new financefixeddeposits;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$target_dir = "finance_upload/fixed-deposits/";
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
			$save->InstitutionName = Input::get('InstitutionName');
			$save->InstitutionType = Input::get('InstitutionType');
			$save->InstitutionAddress = Input::get('InstitutionAddress');
			$save->ReceiptNo = Input::get('ReceiptNo');
			$save->PrincipalAmount = Input::get('PrincipalAmount');
			$save->RateOfInterest = Input::get('RateOfInterest');
			$save->PeriodOfDeposit = Input::get('PeriodOfDeposit');
			$save->DepositOptions = Input::get('DepositOptions');
			$save->NomineeName = Input::get('NomineeName');
			$save->NomineeRelationship = Input::get('NomineeRelationship');
			$save->NomineeContactNumber = Input::get('NomineeContactNumber');
			$save->NomineeAddress = Input::get('NomineeAddress');
			$save->DocType = Input::get('DocType');
			$save->DocNo = Input::get('DocNo');
			$save->DocImage = $file_name;
			$save->Folder = $target_dir;
			$save->StartDate = DateTime::createFromFormat('d/m/Y', Input::get('StartDate'))->format('Y-m-d');
			$save->MatuirityDate = DateTime::createFromFormat('d/m/Y', Input::get('MatuirityDate'))->format('Y-m-d');
			$save->Txnuser = Auth::user()->id;
			$save->Status = 1;
			$save->save();

			// redirect
			Session::flash('message', 'Successfully created fixed deposits details!');
			return Redirect::to('finance-fixed-deposits');
		}
	}
	public function show($id)
	{
		$list = financefixeddeposits::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$show = financefixeddeposits::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
		
		$NameOfMetadata = financefixeddeposits::find($show->FFD_ID)->metadataName;
		$NameOfFamily = financefixeddeposits::find($show->FFD_ID)->familyName;
		$NameOfFriend = financefixeddeposits::find($show->FFD_ID)->friendsName;
		$NameOfDocType = financefixeddeposits::find($show->FFD_ID)->docTypeName;
		$NameOfInstitutionType = financefixeddeposits::find($show->FFD_ID)->InstitutionTypeName;
		$NameOfRateInterest = financefixeddeposits::find($show->FFD_ID)->RateInterestName;
		$NameOfDepositName = financefixeddeposits::find($show->FFD_ID)->DepositName;
		$NameOfNomineeRelation = financefixeddeposits::find($show->FFD_ID)->nomineeRelationName;
		
		return view('finance/fixedDeposits.show',compact('list','show','NameOfMetadata','NameOfFamily','NameOfFriend','NameOfDocType','NameOfInstitutionType','NameOfRateInterest','NameOfDepositName','NameOfNomineeRelation'));
	}
	public function edit($id)
	{
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$nomineerelation = nomineerelation::where('Status',1)->orderBy('Name', 'asc')->get();
		$depositoptions = depositoptions::where('Status',1)->orderBy('Name', 'asc')->get();
		$institutiontype = institutiontype::where('Status',1)->orderBy('Name', 'asc')->get();
		$rateofinterest = rateofinterest::where('Status',1)->get();
		$list = financefixeddeposits::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$genericfamily = genericfamily::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$edit = financefixeddeposits::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
		$genericfriends = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		
		
		return view('finance/fixedDeposits.edit',compact('metadata','relation','documenttype','nomineerelation','depositoptions','institutiontype','rateofinterest','list','genericfamily','edit','genericfriends'));
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
			return Redirect::to('finance-fixed-deposits/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$save = financefixeddeposits::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$target_dir = "finance_upload/fixed-deposits/";
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
			$save->InstitutionName = Input::get('InstitutionName');
			$save->InstitutionType = Input::get('InstitutionType');
			$save->InstitutionAddress = Input::get('InstitutionAddress');
			$save->ReceiptNo = Input::get('ReceiptNo');
			$save->PrincipalAmount = Input::get('PrincipalAmount');
			$save->RateOfInterest = Input::get('RateOfInterest');
			$save->PeriodOfDeposit = Input::get('PeriodOfDeposit');
			$save->DepositOptions = Input::get('DepositOptions');
			$save->NomineeName = Input::get('NomineeName');
			$save->NomineeRelationship = Input::get('NomineeRelationship');
			$save->NomineeContactNumber = Input::get('NomineeContactNumber');
			$save->NomineeAddress = Input::get('NomineeAddress');
			$save->DocType = Input::get('DocType');
			$save->DocNo = Input::get('DocNo');
			$save->DocImage = $file_name;
			$save->Folder = $target_dir;
			$save->StartDate = DateTime::createFromFormat('d/m/Y', Input::get('StartDate'))->format('Y-m-d');
			$save->MatuirityDate = DateTime::createFromFormat('d/m/Y', Input::get('MatuirityDate'))->format('Y-m-d');
			$save->Txnuser = Auth::user()->id;
			$save->Status = 1;
			$save->save();

			// redirect
			Session::flash('message', 'Successfully updated fixed deposits details!');
			return Redirect::to('finance-fixed-deposits/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = financefixeddeposits::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the fixed deposits!');
        return Redirect::to('finance-fixed-deposits');
    }
	
}
