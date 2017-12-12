<?php

namespace App\Http\Controllers\finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\genericfamily;
use App\genericfriends;
use App\generalpersonaldata;

use App\financeModel\financebankdetails;
use App\financeModel\debitcard;
use App\financeModel\creditcard;
use App\financeModel\nomineerelation;

use App\common_master\metadata;
use App\common_master\countrymaster;
use App\common_master\religionmaster;
use App\common_master\documenttype;

use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class FinanceBankController extends Controller
{
    public function index(){

		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$countrymaster = countrymaster::where('status',1)->get();
		$religionmaster = religionmaster::where('status',1)->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$debitcard = debitcard::where('Status',1)->orderBy('Name', 'asc')->get();
		$creditcard = creditcard::where('Status',1)->orderBy('Name', 'asc')->get();
		$nomineerelation = nomineerelation::where('Status',1)->orderBy('Name', 'asc')->get();
		$list = financebankdetails::where('Status',1)->get()->where('Txnuser',Auth::user()->id);
		$genericfamily = genericfamily::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$genericfriends = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		
		return view('finance/bankDetails.index',compact('metadata','relation','countrymaster','religionmaster','documenttype','debitcard','creditcard','nomineerelation','list','genericfamily','genericfriends'));
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
			return Redirect::to('finance-bank-details')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$save = new financebankdetails;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$target_dir = "finance_upload/bankdetails/";
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
			$save->Country = Input::get('Country');
			$save->Region = Input::get('Region');
			$save->PayeeName = Input::get('PayeeName');
			$save->Address = Input::get('Address');
			$save->BankAccountNo = Input::get('BankAccountNo');
			$save->IBAN = Input::get('IBAN');
			$save->ChequeBook = Input::get('ChequeBook');
			$save->DebitCard = Input::get('DebitCard');
			$save->CreditCard = Input::get('CreditCard');
			$save->NomineeName = Input::get('NomineeName');
			$save->NomineeRelationship = Input::get('NomineeRelationship');
			$save->NomineeContactNumber = Input::get('NomineeContactNumber');
			$save->NomineeAddress = Input::get('NomineeAddress');
			$save->DocType = Input::get('DocType');
			$save->DocNo = Input::get('DocNo');
			$save->DocImage = $file_name;
			$save->Folder = $target_dir;
			$save->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFrom'))->format('Y-m-d');
			$save->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidTo'))->format('Y-m-d');
			$save->Txnuser = Auth::user()->id;
			$save->Status = 1;
			$save->save();

			// redirect
			Session::flash('message', 'Successfully created bank details!');
			return Redirect::to('finance-bank-details');
		}
	}
	public function show($id)
	{
		$list = financebankdetails::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$show = financebankdetails::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
		
		$NameOfMetadata = financebankdetails::find($show->FBD_ID)->metadataName;
		$NameOfFamily = financebankdetails::find($show->FBD_ID)->familyName;
		$NameOfFriend = financebankdetails::find($show->FBD_ID)->friendsName;
		$NameOfDocType = financebankdetails::find($show->FBD_ID)->docTypeName;
		$NameOfCountry = financebankdetails::find($show->FBD_ID)->countryName;
		$NameOfReligion = financebankdetails::find($show->FBD_ID)->religionName;
		$NameOfDebit = financebankdetails::find($show->FBD_ID)->debitCardName;
		$NameOfCredit = financebankdetails::find($show->FBD_ID)->creditCardName;
		$NameOfNomineeRelation = financebankdetails::find($show->FBD_ID)->nomineeRelationName;
		
		return view('finance/bankDetails.show',compact('list','show','NameOfMetadata','NameOfFamily','NameOfFriend','NameOfDocType','NameOfCountry','NameOfReligion','NameOfDebit','NameOfCredit','NameOfNomineeRelation'));
	}
	public function edit($id)
	{
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$countrymaster = countrymaster::where('status',1)->get();
		$religionmaster = religionmaster::where('status',1)->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$debitcard = debitcard::where('Status',1)->orderBy('Name', 'asc')->get();
		$creditcard = creditcard::where('Status',1)->orderBy('Name', 'asc')->get();
		$nomineerelation = nomineerelation::where('Status',1)->orderBy('Name', 'asc')->get();
		$list = financebankdetails::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$genericfamily = genericfamily::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$edit = financebankdetails::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
		$genericfriends = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		
		
		return view('finance/bankDetails.edit',compact('metadata','relation','countrymaster','religionmaster','documenttype','debitcard','creditcard','nomineerelation','list','genericfamily','edit','genericfriends'));
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
			return Redirect::to('finance-bank-details/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$save = financebankdetails::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$target_dir = "finance_upload/bankdetails/";
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
			$save->Country = Input::get('Country');
			$save->Region = Input::get('Region');
			$save->PayeeName = Input::get('PayeeName');
			$save->Address = Input::get('Address');
			$save->BankAccountNo = Input::get('BankAccountNo');
			$save->IBAN = Input::get('IBAN');
			$save->ChequeBook = Input::get('ChequeBook');
			$save->DebitCard = Input::get('DebitCard');
			$save->CreditCard = Input::get('CreditCard');
			$save->NomineeName = Input::get('NomineeName');
			$save->NomineeRelationship = Input::get('NomineeRelationship');
			$save->NomineeContactNumber = Input::get('NomineeContactNumber');
			$save->NomineeAddress = Input::get('NomineeAddress');
			$save->DocType = Input::get('DocType');
			$save->DocNo = Input::get('DocNo');
			$save->DocImage = $file_name;
			$save->Folder = $target_dir;
			$save->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFrom'))->format('Y-m-d');
			$save->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidTo'))->format('Y-m-d');
			$save->Txnuser = Auth::user()->id;
			$save->Status = 1;
			$save->save();

			// redirect
			Session::flash('message', 'Successfully updated bank details!');
			return Redirect::to('finance-bank-details/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = financebankdetails::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the communications!');
        return Redirect::to('finance-bank-details');
    }
	
}
