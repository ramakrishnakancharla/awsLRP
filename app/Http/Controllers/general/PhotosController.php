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
use App\generalleisureactivites;
use App\generalphotos;
use App\common_master\metadata;
use App\common_master\gendermaster;
use App\common_master\maritalstatus;
use App\common_master\childmaster;
use App\common_master\photosfinishmaster;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class PhotosController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$photosfinishmaster = photosfinishmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalphotos::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/photos.index',compact('gendermaster','maritalstatus','childmaster','photosfinishmaster','metadata','relation','list','genericfamily','genericfriends'));
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
			return Redirect::to('general-photos')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalphotospdate = new generalphotos;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$target_dir = "general_upload/photos/uploads/";
			$file_name = rand().$_FILES["Photo"]["name"];
			$temp_name = $_FILES["Photo"]["tmp_name"];
			$target_file = $target_dir . basename($file_name);
			move_uploaded_file($temp_name, $target_file);
			
			list($width, $height, $type, $attr) = getimagesize($target_dir.$file_name);
			$dimention= $width."x".$height;
			
			$generalphotospdate->MetaID = Input::get('options');
			$generalphotospdate->ToWhom = $towhom;
			$generalphotospdate->PhotoTitle = Input::get('PhotoTitle');
			$generalphotospdate->Photo = $file_name;
			$generalphotospdate->Dimention = $dimention;
			$generalphotospdate->Folder = $target_dir;
			$generalphotospdate->Txnuser = Auth::user()->id;
			$generalphotospdate->Status = 1;
			$generalphotospdate->save();

			// redirect
			Session::flash('message', 'Successfully created photos!');
			return Redirect::to('general-photos');
		}
	}
	public function show($id)
	{
		$list = generalphotos::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$show = generalphotos::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/photos.show',compact('list','genericfamily','show','genericfriends'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$photosfinishmaster = photosfinishmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalphotos::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$edit = generalphotos::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/photos.edit',compact('gendermaster','maritalstatus','childmaster','photosfinishmaster','metadata','relation','list','genericfamily','edit','genericfriends'));
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
			return Redirect::to('general-photos/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalphotospdate = generalphotos::where('Status',1)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$target_dir = "general_upload/photos/uploads/";
			if($_FILES["Photo"]["name"] !=''){
				$file_name = rand().$_FILES["Photo"]["name"];
				$temp_name = $_FILES["Photo"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = Input::get('PhotoEdit');
			}
			list($width, $height, $type, $attr) = getimagesize($target_dir.$file_name);
			$dimention= $width."x".$height;
			
			$generalphotospdate->MetaID = Input::get('options');
			$generalphotospdate->ToWhom = $towhom;
			$generalphotospdate->PhotoTitle = Input::get('PhotoTitle');
			$generalphotospdate->Photo = $file_name;
			$generalphotospdate->Dimention = $dimention;
			$generalphotospdate->Folder = $target_dir;
			$generalphotospdate->Txnuser = Auth::user()->id;
			$generalphotospdate->Status = 1;
			$generalphotospdate->save();

			// redirect
			Session::flash('message', 'Successfully updated photos!');
			return Redirect::to('general-photos/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = generalphotos::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the photos!');
        return Redirect::to('general-photos');
    }
	
}