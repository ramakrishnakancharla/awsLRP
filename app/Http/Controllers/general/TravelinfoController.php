<?php

namespace App\Http\Controllers\general;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\genericfamily;
use App\genericfriends;
use App\generalpersonaldata;
use App\generaladdress;
use App\generalcommunications;
use App\generalpersonalids;
use App\generalmembership;
use App\generalobjectsonloan;
use App\generaltravelinfo;
use App\common_master\metadata;
use App\common_master\gendermaster;
use App\common_master\maritalstatus;
use App\common_master\childmaster;
use App\common_master\religionmaster;
use App\common_master\countrymaster;
use App\common_master\modeoftransport;
use App\common_master\accommodation;
use App\common_master\documenttype;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class TravelinfoController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$religionmaster = religionmaster::where('status',1)->get();
		$countrymaster = countrymaster::where('status',1)->get();
		$modeoftransport = modeoftransport::where('status',1)->get();
		$accommodation = accommodation::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$list = generaltravelinfo::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$genericfamily = genericfamily::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$genericfriends = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		
		
		if(count($list) > 0){
			$NameOfCountry = generaltravelinfo::find($list[0]->GTI_ID)->countryName;
			$NameOfMetadata = generaltravelinfo::find($list[0]->GTI_ID)->metadataName;
			$NameOfFamily = generaltravelinfo::find($list[0]->GTI_ID)->familyName;
			$NameOfFriend = generaltravelinfo::find($list[0]->GTI_ID)->friendsName;
		}else{
			$NameOfCountry = "";
			$NameOfMetadata = "";
			$NameOfFamily = "";
			$NameOfFriend = "";
		}
		
		return view('generalinfo/travelinfo.index',compact('gendermaster','maritalstatus','childmaster','religionmaster','countrymaster','modeoftransport','accommodation','metadata','relation','documenttype','list','genericfamily','genericfriends','NameOfMetadata','NameOfFamily','NameOfFriend','NameOfCountry'));
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
			return Redirect::to('general-travelinfo')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generaltravelinfopdate = new generaltravelinfo;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$target_dir = "general_upload/travel/";
			if($_FILES["DocImage"]["name"] !=''){
				$file_name = rand().$_FILES["DocImage"]["name"];
				$temp_name = $_FILES["DocImage"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = "";
			}
			
			$generaltravelinfopdate->MetaID = Input::get('options');
			$generaltravelinfopdate->ToWhom = $towhom;
			$generaltravelinfopdate->FromTime = Input::get('FromTime');
			$generaltravelinfopdate->Country = Input::get('Country');
			$generaltravelinfopdate->Purpose = Input::get('Purpose');
			$generaltravelinfopdate->Comments = Input::get('Comments');
			$generaltravelinfopdate->AdditionalDestination = Input::get('AdditionalDestination');
			$generaltravelinfopdate->EstimatedCost = Input::get('EstimatedCost');
			$generaltravelinfopdate->TravelInsurancePolicyNo = Input::get('TravelInsurancePolicyNo');
			$generaltravelinfopdate->DocType = Input::get('DocType');
			$generaltravelinfopdate->DocNo = Input::get('DocNo');
			$generaltravelinfopdate->DocImage = $file_name;
			$generaltravelinfopdate->Folder = $target_dir;
			$generaltravelinfopdate->ToTime = Input::get('ToTime');
			$generaltravelinfopdate->Region = Input::get('Region');
			$generaltravelinfopdate->OtherPurpose = Input::get('OtherPurpose');
			$generaltravelinfopdate->ModeOfTrasnport = Input::get('ModeOfTrasnport');
			$generaltravelinfopdate->ModeOfAccommodation = Input::get('ModeOfAccommodation');
			$generaltravelinfopdate->Destination = Input::get('Destination');
			$generaltravelinfopdate->TravelInsuranceAvailable = Input::get('TravelInsuranceAvailable');
			$generaltravelinfopdate->ActualCost = Input::get('ActualCost');
			$generaltravelinfopdate->AdditonalCost = Input::get('AdditonalCost');
			$generaltravelinfopdate->FromDate = DateTime::createFromFormat('d/m/Y', Input::get('FromDate'))->format('Y-m-d');
			$generaltravelinfopdate->ToDate = DateTime::createFromFormat('d/m/Y', Input::get('ToDate'))->format('Y-m-d');
			$generaltravelinfopdate->Txnuser = Auth::user()->id;
			$generaltravelinfopdate->Status = 1;
			$generaltravelinfopdate->save();

			// redirect
			Session::flash('message', 'Successfully created travelinfo!');
			return Redirect::to('general-travelinfo');
		}
	}
	public function show($id)
	{
		$list = generaltravelinfo::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$show = generaltravelinfo::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
		
		$NameOfMetadata = generaltravelinfo::find($show->GTI_ID)->metadataName;
		$NameOfFamily = generaltravelinfo::find($show->GTI_ID)->familyName;
		$NameOfFriend = generaltravelinfo::find($show->GTI_ID)->friendsName;
		$NameOfDocType = generaltravelinfo::find($show->GTI_ID)->documentTypeName;
		$NameOfModeTran = generaltravelinfo::find($show->GTI_ID)->ModeTranName;
		$NameOfAcc = generaltravelinfo::find($show->GTI_ID)->AccoName;
		$NameOfCountry = generaltravelinfo::find($show->GTI_ID)->countryName;
		$NameOfReligion = generaltravelinfo::find($show->GTI_ID)->religionName;

		return view('generalinfo/travelinfo.show',compact('list','show','NameOfMetadata','NameOfFamily','NameOfFriend','NameOfDocType','NameOfModeTran','NameOfAcc','NameOfCountry','NameOfReligion'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$religionmaster = religionmaster::where('status',1)->get();
		$countrymaster = countrymaster::where('status',1)->get();
		$modeoftransport = modeoftransport::where('status',1)->get();
		$accommodation = accommodation::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$list = generaltravelinfo::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$genericfamily = genericfamily::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$edit = generaltravelinfo::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
		$genericfriends = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		
		$NameOfMetadata = generaltravelinfo::find($id)->metadataName;
		$NameOfFamily = generaltravelinfo::find($id)->familyName;
		$NameOfFriend = generaltravelinfo::find($id)->friendsName;
		
		if(count($list) > 0){
			$NameOfCountry = generaltravelinfo::find($list[0]->GTI_ID)->countryName;
		}else{
			$NameOfCountry = "";
		}
		
		return view('generalinfo/travelinfo.edit',compact('gendermaster','maritalstatus','childmaster','religionmaster','countrymaster','modeoftransport','accommodation','metadata','relation','documenttype','list','genericfamily','edit','genericfriends','NameOfMetadata','NameOfFamily','NameOfFriend','NameOfCountry'));
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
			return Redirect::to('general-travelinfo/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generaltravelinfopdate = generaltravelinfo::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$target_dir = "general_upload/travel/";
			if($_FILES["DocImage"]["name"] !=''){
				$file_name = rand().$_FILES["DocImage"]["name"];
				$temp_name = $_FILES["DocImage"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = "";
			}
			
			$generaltravelinfopdate->MetaID = Input::get('options');
			$generaltravelinfopdate->ToWhom = $towhom;
			$generaltravelinfopdate->FromTime = Input::get('FromTime');
			$generaltravelinfopdate->Country = Input::get('Country');
			$generaltravelinfopdate->Purpose = Input::get('Purpose');
			$generaltravelinfopdate->Comments = Input::get('Comments');
			$generaltravelinfopdate->AdditionalDestination = Input::get('AdditionalDestination');
			$generaltravelinfopdate->EstimatedCost = Input::get('EstimatedCost');
			$generaltravelinfopdate->TravelInsurancePolicyNo = Input::get('TravelInsurancePolicyNo');
			$generaltravelinfopdate->DocType = Input::get('DocType');
			$generaltravelinfopdate->DocNo = Input::get('DocNo');
			$generaltravelinfopdate->DocImage = $file_name;
			$generaltravelinfopdate->Folder = $target_dir;
			$generaltravelinfopdate->ToTime = Input::get('ToTime');
			$generaltravelinfopdate->Region = Input::get('Region');
			$generaltravelinfopdate->OtherPurpose = Input::get('OtherPurpose');
			$generaltravelinfopdate->ModeOfTrasnport = Input::get('ModeOfTrasnport');
			$generaltravelinfopdate->ModeOfAccommodation = Input::get('ModeOfAccommodation');
			$generaltravelinfopdate->Destination = Input::get('Destination');
			$generaltravelinfopdate->TravelInsuranceAvailable = Input::get('TravelInsuranceAvailable');
			$generaltravelinfopdate->ActualCost = Input::get('ActualCost');
			$generaltravelinfopdate->AdditonalCost = Input::get('AdditonalCost');
			$generaltravelinfopdate->FromDate = DateTime::createFromFormat('d/m/Y', Input::get('FromDate'))->format('Y-m-d');
			$generaltravelinfopdate->ToDate = DateTime::createFromFormat('d/m/Y', Input::get('ToDate'))->format('Y-m-d');
			$generaltravelinfopdate->Txnuser = Auth::user()->id;
			$generaltravelinfopdate->Status = 1;
			$generaltravelinfopdate->save();

			// redirect
			Session::flash('message', 'Successfully updated travelinfo!');
			return Redirect::to('general-travelinfo/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = generaltravelinfo::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the travelinfo!');
        return Redirect::to('general-travelinfo');
    }
	
}
