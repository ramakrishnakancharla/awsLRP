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
use App\generalaccesslogin;
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

class AccessloginController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalaccesslogin::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/accesslogin.index',compact('gendermaster','maritalstatus','childmaster','metadata','relation','list','genericfamily','genericfriends'));
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
			return Redirect::to('general-accesslogin')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalaccessloginpdate = new generalaccesslogin;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$generalaccessloginpdate->MetaID = Input::get('options');
			$generalaccessloginpdate->ToWhom = $towhom;
			$generalaccessloginpdate->Account = Input::get('Account');
			$generalaccessloginpdate->UserID = Input::get('UserID');
			$generalaccessloginpdate->NickName = Input::get('NickName');
			$generalaccessloginpdate->Password = Input::get('Password');
			$generalaccessloginpdate->PhoneNo = Input::get('PhoneNo');
			$generalaccessloginpdate->Category = Input::get('Category');
			$generalaccessloginpdate->URL = Input::get('URL');
			$generalaccessloginpdate->EmailID = Input::get('EmailID');
			$generalaccessloginpdate->Purpose = Input::get('Purpose');
			$generalaccessloginpdate->Notes = Input::get('Notes');
			$generalaccessloginpdate->HintQ1 = Input::get('HintQ1');
			$generalaccessloginpdate->HintQ1Ans = Input::get('HintQ1Ans');
			$generalaccessloginpdate->HintQ2 = Input::get('HintQ2');
			$generalaccessloginpdate->HintQ2Ans = Input::get('HintQ2Ans');
			$generalaccessloginpdate->HintQ3 = Input::get('HintQ3');
			$generalaccessloginpdate->HintQ3Ans = Input::get('HintQ3Ans');
			$generalaccessloginpdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFrom'))->format('Y-m-d');
			$generalaccessloginpdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidTo'))->format('Y-m-d');
			$generalaccessloginpdate->Txnuser = Auth::user()->id;
			$generalaccessloginpdate->Status = 1;
			$generalaccessloginpdate->save();

			// redirect
			Session::flash('message', 'Successfully created accesslogin!');
			return Redirect::to('general-accesslogin');
		}
	}
	public function show($id)
	{
		$list = generalaccesslogin::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$show = generalaccesslogin::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/accesslogin.show',compact('list','genericfamily','show','genericfriends'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalaccesslogin::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$edit = generalaccesslogin::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/accesslogin.edit',compact('gendermaster','maritalstatus','childmaster','metadata','relation','list','genericfamily','edit','genericfriends'));
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
			return Redirect::to('general-accesslogin/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalaccessloginpdate = generalaccesslogin::where('Status',1)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$generalaccessloginpdate->MetaID = Input::get('options');
			$generalaccessloginpdate->ToWhom = $towhom;
			$generalaccessloginpdate->Account = Input::get('Account');
			$generalaccessloginpdate->UserID = Input::get('UserID');
			$generalaccessloginpdate->NickName = Input::get('NickName');
			$generalaccessloginpdate->Password = Input::get('Password');
			$generalaccessloginpdate->PhoneNo = Input::get('PhoneNo');
			$generalaccessloginpdate->Category = Input::get('Category');
			$generalaccessloginpdate->URL = Input::get('URL');
			$generalaccessloginpdate->EmailID = Input::get('EmailID');
			$generalaccessloginpdate->Purpose = Input::get('Purpose');
			$generalaccessloginpdate->Notes = Input::get('Notes');
			$generalaccessloginpdate->HintQ1 = Input::get('HintQ1');
			$generalaccessloginpdate->HintQ1Ans = Input::get('HintQ1Ans');
			$generalaccessloginpdate->HintQ2 = Input::get('HintQ2');
			$generalaccessloginpdate->HintQ2Ans = Input::get('HintQ2Ans');
			$generalaccessloginpdate->HintQ3 = Input::get('HintQ3');
			$generalaccessloginpdate->HintQ3Ans = Input::get('HintQ3Ans');
			$generalaccessloginpdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFrom'))->format('Y-m-d');
			$generalaccessloginpdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidTo'))->format('Y-m-d');
			$generalaccessloginpdate->Txnuser = Auth::user()->id;
			$generalaccessloginpdate->Status = 1;
			$generalaccessloginpdate->save();

			// redirect
			Session::flash('message', 'Successfully updated accesslogin!');
			return Redirect::to('general-accesslogin/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = generalaccesslogin::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the accesslogin!');
        return Redirect::to('general-accesslogin');
    }
	
}
