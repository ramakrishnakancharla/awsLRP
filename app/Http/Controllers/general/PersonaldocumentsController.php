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
use App\generaldocuments;
use App\common_master\metadata;
use App\common_master\gendermaster;
use App\common_master\maritalstatus;
use App\common_master\childmaster;
use App\common_master\documentcategory;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class PersonaldocumentsController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$documentcategory = documentcategory::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generaldocuments::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/personaldocuments.index',compact('gendermaster','maritalstatus','childmaster','documentcategory','metadata','relation','list','genericfamily','genericfriends'));
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
			return Redirect::to('general-personaldocuments')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generaldocumentspdate = new generaldocuments;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$target_dir = "general_upload/documents/";
			if($_FILES["DocImage"]["name"] !=''){
				$file_name = rand().$_FILES["DocImage"]["name"];
				$temp_name = $_FILES["DocImage"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = "";
			}
			
			$generaldocumentspdate->MetaID = Input::get('options');
			$generaldocumentspdate->ToWhom = $towhom;
			$generaldocumentspdate->DocCategory = Input::get('DocCategory');
			$generaldocumentspdate->LinkTo = Input::get('LinkTo');
			$generaldocumentspdate->DocType = Input::get('DocType');
			$generaldocumentspdate->DocNo = Input::get('DocNo');
			$generaldocumentspdate->DocImage = $file_name;
			$generaldocumentspdate->Folder = $target_dir;
			$generaldocumentspdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFrom'))->format('Y-m-d');
			$generaldocumentspdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidTo'))->format('Y-m-d');
			$generaldocumentspdate->Txnuser = Auth::user()->id;
			$generaldocumentspdate->Status = 1;
			$generaldocumentspdate->save();

			// redirect
			Session::flash('message', 'Successfully created personaldocuments!');
			return Redirect::to('general-personaldocuments');
		}
	}
	public function show($id)
	{
		$list = generaldocuments::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$show = generaldocuments::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/personaldocuments.show',compact('list','genericfamily','show','genericfriends'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$documentcategory = documentcategory::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generaldocuments::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$edit = generaldocuments::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/personaldocuments.edit',compact('gendermaster','maritalstatus','childmaster','metadata','documentcategory','relation','list','genericfamily','edit','genericfriends'));
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
			return Redirect::to('general-personaldocuments/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generaldocumentspdate = generaldocuments::where('Status',1)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$target_dir = "general_upload/documents/";
			if($_FILES["DocImage"]["name"] !=''){
				$file_name = rand().$_FILES["DocImage"]["name"];
				$temp_name = $_FILES["DocImage"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = Input::get('PhotoEdit');
			}
			
			$generaldocumentspdate->MetaID = Input::get('options');
			$generaldocumentspdate->ToWhom = $towhom;
			$generaldocumentspdate->DocCategory = Input::get('DocCategory');
			$generaldocumentspdate->LinkTo = Input::get('LinkTo');
			$generaldocumentspdate->DocType = Input::get('DocType');
			$generaldocumentspdate->DocNo = Input::get('DocNo');
			$generaldocumentspdate->DocImage = $file_name;
			$generaldocumentspdate->Folder = $target_dir;
			$generaldocumentspdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFrom'))->format('Y-m-d');
			$generaldocumentspdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidTo'))->format('Y-m-d');
			$generaldocumentspdate->Txnuser = Auth::user()->id;
			$generaldocumentspdate->Status = 1;
			$generaldocumentspdate->save();

			// redirect
			Session::flash('message', 'Successfully updated personaldocuments!');
			return Redirect::to('general-personaldocuments/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = generaldocuments::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the personaldocuments!');
        return Redirect::to('general-personaldocuments');
    }
	
}
