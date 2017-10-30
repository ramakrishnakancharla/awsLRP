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
use App\common_master\metadata;
use App\common_master\gendermaster;
use App\common_master\maritalstatus;
use App\common_master\childmaster;
use App\common_master\objectsloanmaster;
use App\common_master\documenttype;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class ObjectsonloanController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$objectsloanmaster = objectsloanmaster::where('status',1)->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalobjectsonloan::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		if(count($list) > 0){
			$NameOfObjectCat = generalobjectsonloan::find($list[0]->GOL_ID)->objectName;
		}else{
			$NameOfObjectCat = "";
		}
		
		
		return view('generalinfo/objectsonloan.index',compact('gendermaster','maritalstatus','childmaster','objectsloanmaster','documenttype','metadata','relation','list','genericfamily','genericfriends','NameOfObjectCat'));
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
			return Redirect::to('general-objectsonloan')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalobjectsonloanpdate = new generalobjectsonloan;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$target_dir = "general_upload/loans/";
			if($_FILES["DocImage"]["name"] !=''){
				$file_name = rand().$_FILES["DocImage"]["name"];
				$temp_name = $_FILES["DocImage"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = "";
			}
			
			$generalobjectsonloanpdate->MetaID = Input::get('options');
			$generalobjectsonloanpdate->ToWhom = $towhom;
			$generalobjectsonloanpdate->ObjectName = Input::get('ObjectName');
			$generalobjectsonloanpdate->ObjectCategory = Input::get('ObjectCategory');
			$generalobjectsonloanpdate->GivenTo = Input::get('GivenTo');
			$generalobjectsonloanpdate->EmailID = Input::get('EmailID');
			$generalobjectsonloanpdate->PlaceOfIssue = Input::get('PlaceOfIssue');
			$generalobjectsonloanpdate->ValueAddition = Input::get('ValueAddition');
			$generalobjectsonloanpdate->GivenDate = DateTime::createFromFormat('d/m/Y', Input::get('GivenDate'))->format('Y-m-d');
			$generalobjectsonloanpdate->DocType = Input::get('DocType');
			$generalobjectsonloanpdate->DocNo = Input::get('DocNo');
			$generalobjectsonloanpdate->DocImage = $file_name;
			$generalobjectsonloanpdate->Folder = $target_dir;
			$generalobjectsonloanpdate->Amount = Input::get('Amount');
			$generalobjectsonloanpdate->ContactNo = Input::get('ContactNo');
			$generalobjectsonloanpdate->Address = Input::get('Address');
			$generalobjectsonloanpdate->Purpose = Input::get('Purpose');
			$generalobjectsonloanpdate->ModeOfGiving = Input::get('ModeOfGiving');
			$generalobjectsonloanpdate->ModeOfReturning = Input::get('ModeOfReturning');
			$generalobjectsonloanpdate->DateOfIssue = DateTime::createFromFormat('d/m/Y', Input::get('DateOfIssue'))->format('Y-m-d');
			$generalobjectsonloanpdate->ReturnDate = DateTime::createFromFormat('d/m/Y', Input::get('ReturnDate'))->format('Y-m-d');
			$generalobjectsonloanpdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFromDate'))->format('Y-m-d');
			$generalobjectsonloanpdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidToDate'))->format('Y-m-d');
			$generalobjectsonloanpdate->Txnuser = Auth::user()->id;
			$generalobjectsonloanpdate->Status = 1;
			$generalobjectsonloanpdate->save();

			// redirect
			Session::flash('message', 'Successfully created objectsonloan!');
			return Redirect::to('general-objectsonloan');
		}
	}
	public function show($id)
	{
		$list = generalobjectsonloan::where('Status',1)->get();
		$show = generalobjectsonloan::where('Status',1)->find($id);

		$NameOfMetadata = generalobjectsonloan::find($show->GOL_ID)->metadataName;
		$NameOfFamily = generalobjectsonloan::find($show->GOL_ID)->familyName;
		$NameOfFriend = generalobjectsonloan::find($show->GOL_ID)->friendsName;
		$NameOfDocType = generalobjectsonloan::find($show->GOL_ID)->docTypeName;
		$NameOfObjectCat = generalobjectsonloan::find($show->GOL_ID)->objectName;
		
		return view('generalinfo/objectsonloan.show',compact('list','show','genericfriends','NameOfMetadata','NameOfFamily','NameOfFriend','NameOfDocType','NameOfObjectCat'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$objectsloanmaster = objectsloanmaster::where('status',1)->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalobjectsonloan::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$edit = generalobjectsonloan::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		$NameOfObjectCat = generalobjectsonloan::find($id)->objectName;
		
		return view('generalinfo/objectsonloan.edit',compact('gendermaster','maritalstatus','childmaster','objectsloanmaster','documenttype','metadata','relation','list','genericfamily','edit','genericfriends','NameOfObjectCat'));
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
			return Redirect::to('general-objectsonloan/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalobjectsonloanpdate = generalobjectsonloan::where('Status',1)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$target_dir = "general_upload/loans/";
			if($_FILES["DocImage"]["name"] !=''){
				$file_name = rand().$_FILES["DocImage"]["name"];
				$temp_name = $_FILES["DocImage"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = Input::get('PhotoEdit');
			}
			
			$generalobjectsonloanpdate->MetaID = Input::get('options');
			$generalobjectsonloanpdate->ToWhom = $towhom;
			$generalobjectsonloanpdate->ObjectName = Input::get('ObjectName');
			$generalobjectsonloanpdate->ObjectCategory = Input::get('ObjectCategory');
			$generalobjectsonloanpdate->GivenTo = Input::get('GivenTo');
			$generalobjectsonloanpdate->EmailID = Input::get('EmailID');
			$generalobjectsonloanpdate->PlaceOfIssue = Input::get('PlaceOfIssue');
			$generalobjectsonloanpdate->ValueAddition = Input::get('ValueAddition');
			$generalobjectsonloanpdate->GivenDate = DateTime::createFromFormat('d/m/Y', Input::get('GivenDate'))->format('Y-m-d');
			$generalobjectsonloanpdate->DocType = Input::get('DocType');
			$generalobjectsonloanpdate->DocNo = Input::get('DocNo');
			$generalobjectsonloanpdate->DocImage = $file_name;
			$generalobjectsonloanpdate->Folder = $target_dir;
			$generalobjectsonloanpdate->Amount = Input::get('Amount');
			$generalobjectsonloanpdate->ContactNo = Input::get('ContactNo');
			$generalobjectsonloanpdate->Address = Input::get('Address');
			$generalobjectsonloanpdate->Purpose = Input::get('Purpose');
			$generalobjectsonloanpdate->ModeOfGiving = Input::get('ModeOfGiving');
			$generalobjectsonloanpdate->ModeOfReturning = Input::get('ModeOfReturning');
			$generalobjectsonloanpdate->DateOfIssue = DateTime::createFromFormat('d/m/Y', Input::get('DateOfIssue'))->format('Y-m-d');
			$generalobjectsonloanpdate->ReturnDate = DateTime::createFromFormat('d/m/Y', Input::get('ReturnDate'))->format('Y-m-d');
			$generalobjectsonloanpdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFromDate'))->format('Y-m-d');
			$generalobjectsonloanpdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidToDate'))->format('Y-m-d');
			$generalobjectsonloanpdate->Txnuser = Auth::user()->id;
			$generalobjectsonloanpdate->Status = 1;
			$generalobjectsonloanpdate->save();

			// redirect
			Session::flash('message', 'Successfully updated objectsonloan!');
			return Redirect::to('general-objectsonloan/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = generalobjectsonloan::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the objectsonloan!');
        return Redirect::to('general-objectsonloan');
    }
	
}
