<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\genericfamily;
use App\common_master\metadata;
use App\common_master\gendermaster;
use App\common_master\maritalstatus;
use App\common_master\childmaster;
use App\common_master\countrymaster;
use App\common_master\religionmaster;
use App\common_master\titlemaster;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;
class GenericInfoFamilyController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$countrymaster = countrymaster::where('status',1)->get();
		$religionmaster = religionmaster::where('status',1)->get();
		$titlemaster = titlemaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = genericfamily::where('Status',1)->get();
		
		return view('genericinfo/family.index',compact('gendermaster','maritalstatus','childmaster','countrymaster','religionmaster','titlemaster','metadata','relation','list'));
    }
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'Priority'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('genericinfofamily')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$genericfamilyupdate = new genericfamily;
			
			$target_dir = "generic_upload/family/";
			if($_FILES["Image"]["name"] !=''){
				$file_name = rand().$_FILES["Image"]["name"];
				$temp_name = $_FILES["Image"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = "";
			}
			
			$genericfamilyupdate->Parent = Input::get('Family');
			$genericfamilyupdate->Priority = Input::get('Priority');
			$genericfamilyupdate->Title = Input::get('Title');
			$genericfamilyupdate->FirstName = Input::get('FirstName');
			$genericfamilyupdate->MiddleName = Input::get('MiddleName');
			$genericfamilyupdate->LastName = Input::get('LastName');
			$genericfamilyupdate->Gender = Input::get('Gender');
			$genericfamilyupdate->DOB = DateTime::createFromFormat('d/m/Y', Input::get('DateOfBirth'))->format('Y-m-d'); 
			$genericfamilyupdate->MobileNo = Input::get('MobileNumber');
			$genericfamilyupdate->Image = $file_name;
			$genericfamilyupdate->Folder = $target_dir;
			$genericfamilyupdate->Age = Input::get('Age');
			$genericfamilyupdate->Relationship = Input::get('Relationship');
			$genericfamilyupdate->Nationality = Input::get('Nationality');
			$genericfamilyupdate->Religion = Input::get('Religion');
			$genericfamilyupdate->MaritalStatus = Input::get('MaritalStatus');
			$genericfamilyupdate->MarriedSince = DateTime::createFromFormat('d/m/Y', Input::get('MarriedSince'))->format('Y-m-d');
			$genericfamilyupdate->NoOfChildrens = Input::get('NoOfChildrens');
			$genericfamilyupdate->Txnuser = Auth::user()->id;
			$genericfamilyupdate->Status = 1;
			$genericfamilyupdate->save();

			// redirect
			Session::flash('message', 'Successfully created family details!');
			return Redirect::to('genericinfofamily');
		}
	}
	public function show($id)
	{
		$list = genericfamily::where('Status',1)->get();
		$view = genericfamily::where('Status',1)->find($id);
		
		return view('genericinfo/family.show',compact('list','view'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$countrymaster = countrymaster::where('status',1)->get();
		$religionmaster = religionmaster::where('status',1)->get();
		$titlemaster = titlemaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = genericfamily::where('Status',1)->get();
		$edit = genericfamily::where('Status',1)->find($id);
		
		return view('genericinfo/family.edit',compact('gendermaster','maritalstatus','childmaster','countrymaster','religionmaster','titlemaster','metadata','relation','list','edit'));
	}
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'Priority'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('genericinfofamily/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$genericfamilyupdate = genericfamily::where('Status',1)->find($id);
			
			$target_dir = "generic_upload/family/";
			if($_FILES["Image"]["name"] !=''){
				$file_name = rand().$_FILES["Image"]["name"];
				$temp_name = $_FILES["Image"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = Input::get('PhotoEdit');
			}
			
			$genericfamilyupdate->Parent = Input::get('Family');
			$genericfamilyupdate->Priority = Input::get('Priority');
			$genericfamilyupdate->Title = Input::get('Title');
			$genericfamilyupdate->FirstName = Input::get('FirstName');
			$genericfamilyupdate->MiddleName = Input::get('MiddleName');
			$genericfamilyupdate->LastName = Input::get('LastName');
			$genericfamilyupdate->Gender = Input::get('Gender');
			$genericfamilyupdate->DOB = DateTime::createFromFormat('d/m/Y', Input::get('DateOfBirth'))->format('Y-m-d'); 
			$genericfamilyupdate->MobileNo = Input::get('MobileNumber');
			$genericfamilyupdate->Image = $file_name;
			$genericfamilyupdate->Folder = $target_dir;
			$genericfamilyupdate->Age = Input::get('Age');
			$genericfamilyupdate->Relationship = Input::get('Relationship');
			$genericfamilyupdate->Nationality = Input::get('Nationality');
			$genericfamilyupdate->Religion = Input::get('Religion');
			$genericfamilyupdate->MaritalStatus = Input::get('MaritalStatus');
			$genericfamilyupdate->MarriedSince = DateTime::createFromFormat('d/m/Y', Input::get('MarriedSince'))->format('Y-m-d');
			$genericfamilyupdate->NoOfChildrens = Input::get('NoOfChildrens');
			$genericfamilyupdate->Txnuser = Auth::user()->id;
			$genericfamilyupdate->Status = 1;
			$genericfamilyupdate->save();

			// redirect
			Session::flash('message', 'Successfully updated family details!');
			return Redirect::to('genericinfofamily/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = genericfamily::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the family details!');
        return Redirect::to('genericinfofamily');
    }
	
}
