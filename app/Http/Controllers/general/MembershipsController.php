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

class MembershipsController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalmembership::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/memberships.index',compact('gendermaster','maritalstatus','childmaster','metadata','relation','list','genericfamily','genericfriends'));
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
			return Redirect::to('general-memberships')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalmembershipupdate = new generalmembership;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$DocImage="";
			$generalmembershipupdate->MetaID = Input::get('options');
			$generalmembershipupdate->ToWhom = $towhom;
			$generalmembershipupdate->OrganizationName = Input::get('OrganizationName');
			$generalmembershipupdate->MembershipType = Input::get('MembershipType');
			$generalmembershipupdate->MembershipFees = Input::get('MembershipFees');
			$generalmembershipupdate->AllowedForMembers = Input::get('AllowedForMembers');
			$generalmembershipupdate->DocType = Input::get('DocType');
			$generalmembershipupdate->DocNo = Input::get('DocNo');
			$generalmembershipupdate->DocImage = $DocImage;
			$generalmembershipupdate->Folder = "";
			$generalmembershipupdate->OrganizationCategory = Input::get('OrganizationCategory');
			$generalmembershipupdate->MembershipNo = Input::get('MembershipNo');
			$generalmembershipupdate->Sponceror = Input::get('Sponceror');
			$generalmembershipupdate->OptionsFacilities = Input::get('OptionsFacilities');
			$generalmembershipupdate->Facilities = "";
			$generalmembershipupdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFromDate'))->format('Y-m-d');
			$generalmembershipupdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidToDate'))->format('Y-m-d');
			$generalmembershipupdate->Txnuser = Auth::user()->id;
			$generalmembershipupdate->Status = 1;
			$generalmembershipupdate->save();

			// redirect
			Session::flash('message', 'Successfully created memberships!');
			return Redirect::to('general-memberships');
		}
	}
	public function show($id)
	{
		$list = generalmembership::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$show = generalmembership::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/memberships.show',compact('list','genericfamily','show','genericfriends'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalmembership::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$edit = generalmembership::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/memberships.edit',compact('gendermaster','maritalstatus','childmaster','metadata','relation','list','genericfamily','edit','genericfriends'));
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
			return Redirect::to('general-memberships/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalmembershipupdate = generalmembership::where('Status',1)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$DocImage="";
			$generalmembershipupdate->MetaID = Input::get('options');
			$generalmembershipupdate->ToWhom = $towhom;
			$generalmembershipupdate->OrganizationName = Input::get('OrganizationName');
			$generalmembershipupdate->MembershipType = Input::get('MembershipType');
			$generalmembershipupdate->MembershipFees = Input::get('MembershipFees');
			$generalmembershipupdate->AllowedForMembers = Input::get('AllowedForMembers');
			$generalmembershipupdate->DocType = Input::get('DocType');
			$generalmembershipupdate->DocNo = Input::get('DocNo');
			$generalmembershipupdate->DocImage = $DocImage;
			$generalmembershipupdate->Folder = "";
			$generalmembershipupdate->OrganizationCategory = Input::get('OrganizationCategory');
			$generalmembershipupdate->MembershipNo = Input::get('MembershipNo');
			$generalmembershipupdate->Sponceror = Input::get('Sponceror');
			$generalmembershipupdate->OptionsFacilities = Input::get('OptionsFacilities');
			$generalmembershipupdate->Facilities = "";
			$generalmembershipupdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFromDate'))->format('Y-m-d');
			$generalmembershipupdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidToDate'))->format('Y-m-d');
			$generalmembershipupdate->Txnuser = Auth::user()->id;
			$generalmembershipupdate->Status = 1;
			$generalmembershipupdate->save();

			// redirect
			Session::flash('message', 'Successfully updated memberships!');
			return Redirect::to('general-memberships/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = generalmembership::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the memberships!');
        return Redirect::to('general-memberships');
    }
	
}
