<?php

namespace App\Http\Controllers\general;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\genericfamily;
use App\genericfriends;
use App\generalpersonaldata;
use App\common_master\metadata;
use App\common_master\gendermaster;
use App\common_master\maritalstatus;
use App\common_master\childmaster;
use App\common_master\titlemaster;
use App\common_master\countrymaster;
use App\common_master\religionmaster;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class PersonalDataController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$titlemaster = titlemaster::where('status',1)->get();
		$countrymaster = countrymaster::where('status',1)->get();
		$religionmaster = religionmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalpersonaldata::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/personalData.index',compact('gendermaster','maritalstatus','childmaster','titlemaster','countrymaster','religionmaster','metadata','relation','list','genericfamily','genericfriends'));
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
			return Redirect::to('general-personal-data')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalpersonaldataupdate = new generalpersonaldata;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$generalpersonaldataupdate->MetaID = Input::get('options');
			$generalpersonaldataupdate->ToWhom = $towhom;
			$generalpersonaldataupdate->Title = Input::get('Title');
			$generalpersonaldataupdate->FirstName = Input::get('FirstName');
			$generalpersonaldataupdate->MiddleName = Input::get('MiddleName');
			$generalpersonaldataupdate->LastName = Input::get('LastName');
			$generalpersonaldataupdate->Gender = Input::get('Gender');
			$generalpersonaldataupdate->DOB = DateTime::createFromFormat('d/m/Y', Input::get('DateOfBirth'))->format('Y-m-d'); 
			$generalpersonaldataupdate->Age = Input::get('Age');
			$generalpersonaldataupdate->Nationality = Input::get('Nationality');
			$generalpersonaldataupdate->Religion = Input::get('Religion');
			$generalpersonaldataupdate->MaritalStatus = Input::get('MaritalStatus');
			$generalpersonaldataupdate->MarriedSince = DateTime::createFromFormat('d/m/Y', Input::get('MarriedSince'))->format('Y-m-d');
			$generalpersonaldataupdate->NoOfChildrens = Input::get('NoOfChildrens');
			$generalpersonaldataupdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFromDate'))->format('Y-m-d');
			$generalpersonaldataupdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidToDate'))->format('Y-m-d');
			$generalpersonaldataupdate->Txnuser = Auth::user()->id;
			$generalpersonaldataupdate->Status = 1;
			$generalpersonaldataupdate->save();

			// redirect
			Session::flash('message', 'Successfully created personal data!');
			return Redirect::to('general-personal-data');
		}
	}
	public function show($id)
	{
		$list = generalpersonaldata::where('Status',1)->get();
		$view = generalpersonaldata::where('Status',1)->find($id);
		
		$NameOfMetadata = generalpersonaldata::find($view->GPD_ID)->metadataName;
		$NameOfFamily = generalpersonaldata::find($view->GPD_ID)->familyName;
		$NameOfFriend = generalpersonaldata::find($view->GPD_ID)->friendsName;
		$NameOfTitile = generalpersonaldata::find($view->GPD_ID)->titleName;
		$NameOfGender = generalpersonaldata::find($view->GPD_ID)->genderName;
		$NameOfReligion = generalpersonaldata::find($view->GPD_ID)->religionName;
		$NameOfNationality = generalpersonaldata::find($view->GPD_ID)->nationalityName;
		$NameOfMarital = generalpersonaldata::find($view->GPD_ID)->maritalName;

		return view('generalinfo/personalData.show',compact('list','view','NameOfTitile','NameOfGender','NameOfReligion','NameOfNationality','NameOfMarital','NameOfMetadata','NameOfFamily','NameOfFriend'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$titlemaster = titlemaster::where('status',1)->get();
		$countrymaster = countrymaster::where('status',1)->get();
		$religionmaster = religionmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalpersonaldata::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$generalpersonaldataedit = generalpersonaldata::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/personalData.edit',compact('gendermaster','maritalstatus','childmaster','titlemaster','countrymaster','religionmaster','metadata','relation','list','genericfamily','generalpersonaldataedit','genericfriends'));
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
			return Redirect::to('general-personal-data/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalpersonaldataupdate = generalpersonaldata::where('Status',1)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$generalpersonaldataupdate->MetaID = Input::get('options');
			$generalpersonaldataupdate->ToWhom = $towhom;
			$generalpersonaldataupdate->Title = Input::get('Title');
			$generalpersonaldataupdate->FirstName = Input::get('FirstName');
			$generalpersonaldataupdate->MiddleName = Input::get('MiddleName');
			$generalpersonaldataupdate->LastName = Input::get('LastName');
			$generalpersonaldataupdate->Gender = Input::get('Gender');
			$generalpersonaldataupdate->DOB = DateTime::createFromFormat('d/m/Y', Input::get('DateOfBirth'))->format('Y-m-d'); 
			$generalpersonaldataupdate->Age = Input::get('Age');
			$generalpersonaldataupdate->Nationality = Input::get('Nationality');
			$generalpersonaldataupdate->Religion = Input::get('Religion');
			$generalpersonaldataupdate->MaritalStatus = Input::get('MaritalStatus');
			$generalpersonaldataupdate->MarriedSince = DateTime::createFromFormat('d/m/Y', Input::get('MarriedSince'))->format('Y-m-d');
			$generalpersonaldataupdate->NoOfChildrens = Input::get('NoOfChildrens');
			$generalpersonaldataupdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFromDate'))->format('Y-m-d');
			$generalpersonaldataupdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidToDate'))->format('Y-m-d');
			$generalpersonaldataupdate->Txnuser = Auth::user()->id;
			$generalpersonaldataupdate->Status = 1;
			$generalpersonaldataupdate->save();

			// redirect
			Session::flash('message', 'Successfully updated personal data!');
			return Redirect::to('general-personal-data/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = generalpersonaldata::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the personal data!');
        return Redirect::to('general-personal-data');
    }
	
}
