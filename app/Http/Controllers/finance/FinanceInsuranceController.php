<?php

namespace App\Http\Controllers\finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\genericfamily;
use App\genericfriends;
use App\generalpersonaldata;

use App\financeModel\financeinsurancedetails;
use App\financeModel\nomineerelation;
use App\financeModel\frequencypayment;
use App\financeModel\typeofinsurance;

use App\common_master\metadata;
use App\common_master\documenttype;

use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class FinanceInsuranceController extends Controller
{
    public function index(){

		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$nomineerelation = nomineerelation::where('Status',1)->orderBy('Name', 'asc')->get();
		$frequencypayment = frequencypayment::where('Status',1)->orderBy('Name', 'asc')->get();
		$typeofinsurance = typeofinsurance::where('Status',1)->orderBy('Name', 'asc')->get();
		$list = financeinsurancedetails::where('Status',1)->get()->where('Txnuser',Auth::user()->id);
		$genericfamily = genericfamily::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$genericfriends = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		
		return view('finance/insurances.index',compact('metadata','relation','documenttype','nomineerelation','list','genericfamily','genericfriends','frequencypayment','typeofinsurance'));
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
			return Redirect::to('finance-insurance-details')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$save = new financeinsurancedetails;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$target_dir = "finance_upload/insurances/";
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
			$save->TypeOfInsurance = Input::get('TypeOfInsurance');
			$save->PolicyNo = Input::get('PolicyNo');
			$save->PolicyCoverageAmount = Input::get('PolicyCoverageAmount');
			$save->PremiumAmount = Input::get('PremiumAmount');
			$save->FrequencyOfPayment = Input::get('FrequencyOfPayment');
			$save->FirstPremiumDueDate = DateTime::createFromFormat('d/m/Y', Input::get('FirstPremiumDueDate'))->format('Y-m-d');
			$save->PaymentPlan = "";
			$save->AgentName = Input::get('AgentName');
			$save->AgentPremaryContactNo = Input::get('AgentPremaryContactNo');
			$save->AgentSecondaryContactNo = Input::get('AgentSecondaryContactNo');
			$save->AgentMailID = Input::get('AgentMailID');
			$save->AgentAddress = Input::get('AgentAddress');
			$save->NomineeName = Input::get('NomineeName');
			$save->NomineeRelationship = Input::get('NomineeRelationship');
			$save->NomineeContactNo = Input::get('NomineeContactNo');
			$save->NomineeAddress = Input::get('NomineeAddress');
			$save->DocType = Input::get('DocType');
			$save->DocNo = Input::get('DocNo');
			$save->DocImage = $file_name;
			$save->Folder = $target_dir;
			$save->PolicyStartDate = DateTime::createFromFormat('d/m/Y', Input::get('PolicyStartDate'))->format('Y-m-d');
			$save->PolicyEndDate = DateTime::createFromFormat('d/m/Y', Input::get('PolicyEndDate'))->format('Y-m-d');
			$save->Txnuser = Auth::user()->id;
			$save->Status = 1;
			$save->save();

			// redirect
			Session::flash('message', 'Successfully created insurance details!');
			return Redirect::to('finance-insurance-details');
		}
	}
	public function show($id)
	{
		$list = financeinsurancedetails::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$show = financeinsurancedetails::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
		
		$NameOfMetadata = financeinsurancedetails::find($show->FID_ID)->metadataName;
		$NameOfFamily = financeinsurancedetails::find($show->FID_ID)->familyName;
		$NameOfFriend = financeinsurancedetails::find($show->FID_ID)->friendsName;
		$NameOfDocType = financeinsurancedetails::find($show->FID_ID)->docTypeName;
		$NameOfNomineeRelation = financeinsurancedetails::find($show->FID_ID)->nomineeRelationName;
		$NameOfFrequency = financeinsurancedetails::find($show->FID_ID)->frequencypaymentName;
		$NameOfInsuranceType = financeinsurancedetails::find($show->FID_ID)->typeofinsuranceName;
		
		return view('finance/insurances.show',compact('list','show','NameOfMetadata','NameOfFamily','NameOfFriend','NameOfDocType','NameOfNomineeRelation','NameOfFrequency','NameOfInsuranceType'));
	}
	public function edit($id)
	{
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$nomineerelation = nomineerelation::where('Status',1)->orderBy('Name', 'asc')->get();
		$frequencypayment = frequencypayment::where('Status',1)->orderBy('Name', 'asc')->get();
		$typeofinsurance = typeofinsurance::where('Status',1)->orderBy('Name', 'asc')->get();
		$list = financeinsurancedetails::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$genericfamily = genericfamily::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$edit = financeinsurancedetails::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
		$genericfriends = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		
		
		return view('finance/insurances.edit',compact('metadata','relation','documenttype','nomineerelation','list','genericfamily','edit','genericfriends','frequencypayment','typeofinsurance'));
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
			return Redirect::to('finance-insurance-details/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$save = financeinsurancedetails::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$target_dir = "finance_upload/insurances/";
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
			$save->TypeOfInsurance = Input::get('TypeOfInsurance');
			$save->PolicyNo = Input::get('PolicyNo');
			$save->PolicyCoverageAmount = Input::get('PolicyCoverageAmount');
			$save->PremiumAmount = Input::get('PremiumAmount');
			$save->FrequencyOfPayment = Input::get('FrequencyOfPayment');
			$save->FirstPremiumDueDate = DateTime::createFromFormat('d/m/Y', Input::get('FirstPremiumDueDate'))->format('Y-m-d');
			$save->PaymentPlan = "";
			$save->AgentName = Input::get('AgentName');
			$save->AgentPremaryContactNo = Input::get('AgentPremaryContactNo');
			$save->AgentSecondaryContactNo = Input::get('AgentSecondaryContactNo');
			$save->AgentMailID = Input::get('AgentMailID');
			$save->AgentAddress = Input::get('AgentAddress');
			$save->NomineeName = Input::get('NomineeName');
			$save->NomineeRelationship = Input::get('NomineeRelationship');
			$save->NomineeContactNo = Input::get('NomineeContactNo');
			$save->NomineeAddress = Input::get('NomineeAddress');
			$save->DocType = Input::get('DocType');
			$save->DocNo = Input::get('DocNo');
			$save->DocImage = $file_name;
			$save->Folder = $target_dir;
			$save->PolicyStartDate = DateTime::createFromFormat('d/m/Y', Input::get('PolicyStartDate'))->format('Y-m-d');
			$save->PolicyEndDate = DateTime::createFromFormat('d/m/Y', Input::get('PolicyEndDate'))->format('Y-m-d');
			$save->Txnuser = Auth::user()->id;
			$save->Status = 1;
			$save->save();

			// redirect
			Session::flash('message', 'Successfully updated insurance details!');
			return Redirect::to('finance-insurance-details/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = financeinsurancedetails::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the communications!');
        return Redirect::to('finance-insurance-details');
    }
	
}
