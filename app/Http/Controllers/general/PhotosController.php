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
use App\metadata;
use App\gendermaster;
use App\maritalstatus;
use App\childmaster;
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
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalphotos::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/photos.index',compact('gendermaster','maritalstatus','childmaster','metadata','relation','list','genericfamily','genericfriends'));
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
				
			$generalphotospdate->MetaID = Input::get('options');
			$generalphotospdate->ToWhom = $towhom;
			$generalphotospdate->Photo = Input::get('Photo');
			$generalphotospdate->Dimention = Input::get('Dimention');
			$generalphotospdate->MatFinish = Input::get('MatFinish');
			$generalphotospdate->Options = Input::get('Options');
			$generalphotospdate->GlassFinish = Input::get('GlassFinish');
			$generalphotospdate->PassportSize = Input::get('PassportSize');
			$generalphotospdate->Folder = "";
			$generalphotospdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFrom'))->format('Y-m-d');
			$generalphotospdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidTo'))->format('Y-m-d');
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
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalphotos::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$edit = generalphotos::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/photos.edit',compact('gendermaster','maritalstatus','childmaster','metadata','relation','list','genericfamily','edit','genericfriends'));
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
			
			$generalphotospdate->MetaID = Input::get('options');
			$generalphotospdate->ToWhom = $towhom;
			$generalphotospdate->Photo = Input::get('Photo');
			$generalphotospdate->Dimention = Input::get('Dimention');
			$generalphotospdate->MatFinish = Input::get('MatFinish');
			$generalphotospdate->Options = Input::get('Options');
			$generalphotospdate->GlassFinish = Input::get('GlassFinish');
			$generalphotospdate->PassportSize = Input::get('PassportSize');
			$generalphotospdate->Folder = "";
			$generalphotospdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFrom'))->format('Y-m-d');
			$generalphotospdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidTo'))->format('Y-m-d');
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
