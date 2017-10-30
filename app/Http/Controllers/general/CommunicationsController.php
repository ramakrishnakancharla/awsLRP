<?php

namespace App\Http\Controllers\general;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\genericfamily;
use App\genericfriends;
use App\generalpersonaldata;
use App\generaladdress;
use App\generalcommunications;
use App\common_master\metadata;
use App\common_master\gendermaster;
use App\common_master\maritalstatus;
use App\common_master\childmaster;
use App\common_master\communicationmaster;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class CommunicationsController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$communicationmaster = communicationmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalcommunications::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		if(count($list) > 0){
			$NameOfCommui = generalcommunications::find($list[0]->GC_ID)->CommuiName;
		}else{
			$NameOfCommui = "";
		}
		
		
		return view('generalinfo/communications.index',compact('gendermaster','maritalstatus','childmaster','communicationmaster','metadata','relation','list','genericfamily','genericfriends','NameOfCommui'));
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
			return Redirect::to('general-communications')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalcommunicationsupdate = new generalcommunications;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$DocImage="";
			$generalcommunicationsupdate->MetaID = Input::get('options');
			$generalcommunicationsupdate->ToWhom = $towhom;
			$generalcommunicationsupdate->CommunicationType = Input::get('CommunicationType');
			$generalcommunicationsupdate->Details = Input::get('Details');
			$generalcommunicationsupdate->DocType = "1";
			$generalcommunicationsupdate->DocNo = "1";
			$generalcommunicationsupdate->DocImage = $DocImage;
			$generalcommunicationsupdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFromDate'))->format('Y-m-d');
			$generalcommunicationsupdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidToDate'))->format('Y-m-d');
			$generalcommunicationsupdate->Txnuser = Auth::user()->id;
			$generalcommunicationsupdate->Status = 1;
			$generalcommunicationsupdate->save();

			// redirect
			Session::flash('message', 'Successfully created communications!');
			return Redirect::to('general-communications');
		}
	}
	public function show($id)
	{
		$list = generalcommunications::where('Status',1)->get();
		$show = generalcommunications::where('Status',1)->find($id);
		
		$NameOfMetadata = generalcommunications::find($show->GC_ID)->metadataName;
		$NameOfFamily = generalcommunications::find($show->GC_ID)->familyName;
		$NameOfFriend = generalcommunications::find($show->GC_ID)->friendsName;
		$NameOfCommui = generalcommunications::find($show->GC_ID)->CommuiName;
		
		return view('generalinfo/communications.show',compact('list','show','NameOfMetadata','NameOfFamily','NameOfFriend','NameOfCommui'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$communicationmaster = communicationmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalcommunications::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$edit = generalcommunications::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		$NameOfCommui = generalcommunications::find($id)->CommuiName;
		
		return view('generalinfo/communications.edit',compact('gendermaster','maritalstatus','childmaster','communicationmaster','metadata','relation','list','genericfamily','edit','genericfriends','NameOfCommui'));
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
			return Redirect::to('general-communications/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalcommunicationsupdate = generalcommunications::where('Status',1)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$DocImage="";
			$generalcommunicationsupdate->MetaID = Input::get('options');
			$generalcommunicationsupdate->ToWhom = $towhom;
			$generalcommunicationsupdate->CommunicationType = Input::get('CommunicationType');
			$generalcommunicationsupdate->Details = Input::get('Details');
			$generalcommunicationsupdate->DocType = "1";
			$generalcommunicationsupdate->DocNo = "1";
			$generalcommunicationsupdate->DocImage = $DocImage;
			$generalcommunicationsupdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFromDate'))->format('Y-m-d');
			$generalcommunicationsupdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidToDate'))->format('Y-m-d');
			$generalcommunicationsupdate->Txnuser = Auth::user()->id;
			$generalcommunicationsupdate->Status = 1;
			$generalcommunicationsupdate->save();

			// redirect
			Session::flash('message', 'Successfully updated communications!');
			return Redirect::to('general-communications/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = generalcommunications::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the communications!');
        return Redirect::to('general-communications');
    }
	
}
