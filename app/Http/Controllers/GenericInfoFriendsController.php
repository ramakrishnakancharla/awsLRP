<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\genericfriends;
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

class GenericInfoFriendsController extends Controller
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
		$list = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		
		return view('genericinfo/friends.index',compact('gendermaster','maritalstatus','childmaster','countrymaster','religionmaster','titlemaster','metadata','relation','list'));
    }
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'FirstName'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('genericinfofriends')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$genericfriendsupdate = new genericfriends;
			
			$target_dir = "generic_upload/friends/";
			if($_FILES["Image"]["name"] !=''){
				$file_name = rand().$_FILES["Image"]["name"];
				$temp_name = $_FILES["Image"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = "";
			}
			
			$genericfriendsupdate->Title = Input::get('Title');
			$genericfriendsupdate->FirstName = Input::get('FirstName');
			$genericfriendsupdate->MiddleName = Input::get('MiddleName');
			$genericfriendsupdate->LastName = Input::get('LastName');
			$genericfriendsupdate->Gender = Input::get('Gender');
			$genericfriendsupdate->DOB = DateTime::createFromFormat('d/m/Y', Input::get('DateOfBirth'))->format('Y-m-d'); 
			$genericfriendsupdate->MobileNo = Input::get('MobileNumber');
			$genericfriendsupdate->Folder = $target_dir;
			$genericfriendsupdate->Image = $file_name;
			$genericfriendsupdate->Age = Input::get('Age');
			$genericfriendsupdate->Relationship = Input::get('Relationship');
			$genericfriendsupdate->Nationality = Input::get('Nationality');
			$genericfriendsupdate->Religion = Input::get('Religion');
			$genericfriendsupdate->MaritalStatus = Input::get('MaritalStatus');
			$genericfriendsupdate->MarriedSince = DateTime::createFromFormat('d/m/Y', Input::get('MarriedSince'))->format('Y-m-d');
			$genericfriendsupdate->NoOfChildrens = Input::get('NoOfChildrens');
			$genericfriendsupdate->Txnuser = Auth::user()->id;
			$genericfriendsupdate->Status = 1;
			$genericfriendsupdate->save();

			// redirect
			Session::flash('message', 'Successfully created family details!');
			return Redirect::to('genericinfofriends');
		}
	}
	public function show($id)
	{
		$list = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$view = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
		
		return view('genericinfo/friends.show',compact('list','view'));
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
		$list = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->get();
		$edit = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
		
		return view('genericinfo/friends.edit',compact('gendermaster','maritalstatus','childmaster','countrymaster','religionmaster','titlemaster','metadata','relation','list','edit'));
	}
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'FirstName'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('genericinfofriends/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$genericfriendsupdate = genericfriends::where('Status',1)->where('Txnuser',Auth::user()->id)->find($id);
			
			$target_dir = "generic_upload/friends/";
			if($_FILES["Image"]["name"] !=''){
				$file_name = rand().$_FILES["Image"]["name"];
				$temp_name = $_FILES["Image"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = Input::get('PhotoEdit');
			}
			
			$genericfriendsupdate->Title = Input::get('Title');
			$genericfriendsupdate->FirstName = Input::get('FirstName');
			$genericfriendsupdate->MiddleName = Input::get('MiddleName');
			$genericfriendsupdate->LastName = Input::get('LastName');
			$genericfriendsupdate->Gender = Input::get('Gender');
			$genericfriendsupdate->DOB = DateTime::createFromFormat('d/m/Y', Input::get('DateOfBirth'))->format('Y-m-d'); 
			$genericfriendsupdate->MobileNo = Input::get('MobileNumber');
			$genericfriendsupdate->Folder = $target_dir;
			$genericfriendsupdate->Image = $file_name;
			$genericfriendsupdate->Age = Input::get('Age');
			$genericfriendsupdate->Relationship = Input::get('Relationship');
			$genericfriendsupdate->Nationality = Input::get('Nationality');
			$genericfriendsupdate->Religion = Input::get('Religion');
			$genericfriendsupdate->MaritalStatus = Input::get('MaritalStatus');
			$genericfriendsupdate->MarriedSince = DateTime::createFromFormat('d/m/Y', Input::get('MarriedSince'))->format('Y-m-d');
			$genericfriendsupdate->NoOfChildrens = Input::get('NoOfChildrens');
			$genericfriendsupdate->Txnuser = Auth::user()->id;
			$genericfriendsupdate->Status = 1;
			$genericfriendsupdate->save();

			// redirect
			Session::flash('message', 'Successfully updated friends details!');
			return Redirect::to('genericinfofriends/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfriendsdelete = genericfriends::find($id);
        $genericfriendsdelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the friends details!');
        return Redirect::to('genericinfofriends');
    }
	
}
