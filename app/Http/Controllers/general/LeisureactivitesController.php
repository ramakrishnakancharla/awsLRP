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
use App\common_master\metadata;
use App\common_master\gendermaster;
use App\common_master\maritalstatus;
use App\common_master\childmaster;
use App\common_master\activitytype;
use App\common_master\skills;
use App\common_master\prociency;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class LeisureactivitesController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$activitytype = activitytype::where('status',1)->get();
		$skills = skills::where('status',1)->get();
		$prociency = prociency::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalleisureactivites::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$NameOfMetadata = generalleisureactivites::find($list[0]->GLA_ID)->metadataName;
		$NameOfFamily = generalleisureactivites::find($list[0]->GLA_ID)->familyName;
		$NameOfFriend = generalleisureactivites::find($list[0]->GLA_ID)->friendsName;
		
		return view('generalinfo/leisureactivites.index',compact('gendermaster','maritalstatus','childmaster','activitytype','skills','prociency','metadata','relation','list','genericfamily','genericfriends','NameOfMetadata','NameOfFamily','NameOfFriend'));
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
			return Redirect::to('general-leisureactivites')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalleisureactivitespdate = new generalleisureactivites;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$generalleisureactivitespdate->MetaID = Input::get('options');
			$generalleisureactivitespdate->ToWhom = $towhom;
			$generalleisureactivitespdate->Activity = Input::get('Activity');
			$generalleisureactivitespdate->Prociency = Input::get('Prociency');
			$generalleisureactivitespdate->Skills = Input::get('Skills');
			$generalleisureactivitespdate->Hobby = Input::get('Hobby');
			$generalleisureactivitespdate->ActivityType = Input::get('ActivityType');
			$generalleisureactivitespdate->SkillsAcquired = Input::get('SkillsAcquired');
			$generalleisureactivitespdate->GuideMentorCouch = Input::get('GuideMentorCouch');
			$generalleisureactivitespdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFrom'))->format('Y-m-d');
			$generalleisureactivitespdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidTo'))->format('Y-m-d');
			$generalleisureactivitespdate->Txnuser = Auth::user()->id;
			$generalleisureactivitespdate->Status = 1;
			$generalleisureactivitespdate->save();

			// redirect
			Session::flash('message', 'Successfully created leisureactivites!');
			return Redirect::to('general-leisureactivites');
		}
	}
	public function show($id)
	{
		$list = generalleisureactivites::where('Status',1)->get();
		$show = generalleisureactivites::where('Status',1)->find($id);
		
		$NameOfMetadata = generalleisureactivites::find($show->GLA_ID)->metadataName;
		$NameOfFamily = generalleisureactivites::find($show->GLA_ID)->familyName;
		$NameOfFriend = generalleisureactivites::find($show->GLA_ID)->friendsName;
		$NameOfAct = generalleisureactivites::find($show->GLA_ID)->activityTypeName;
		$NameOfSkill = generalleisureactivites::find($show->GLA_ID)->skillsName;
		$NameOfProciency = generalleisureactivites::find($show->GLA_ID)->prociencyName;
		
		return view('generalinfo/leisureactivites.show',compact('list','show','NameOfMetadata','NameOfFamily','NameOfFriend','NameOfAct','NameOfSkill','NameOfProciency'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$activitytype = activitytype::where('status',1)->get();
		$skills = skills::where('status',1)->get();
		$prociency = prociency::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalleisureactivites::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$edit = generalleisureactivites::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$NameOfMetadata = generalleisureactivites::find($id)->metadataName;
		$NameOfFamily = generalleisureactivites::find($id)->familyName;
		$NameOfFriend = generalleisureactivites::find($id)->friendsName;
		
		return view('generalinfo/leisureactivites.edit',compact('gendermaster','maritalstatus','childmaster','activitytype','skills','prociency','metadata','relation','list','genericfamily','edit','genericfriends','NameOfMetadata','NameOfFamily','NameOfFriend'));
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
			return Redirect::to('general-leisureactivites/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalleisureactivitespdate = generalleisureactivites::where('Status',1)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$generalleisureactivitespdate->MetaID = Input::get('options');
			$generalleisureactivitespdate->ToWhom = $towhom;
			$generalleisureactivitespdate->Activity = Input::get('Activity');
			$generalleisureactivitespdate->Prociency = Input::get('Prociency');
			$generalleisureactivitespdate->Skills = Input::get('Skills');
			$generalleisureactivitespdate->Hobby = Input::get('Hobby');
			$generalleisureactivitespdate->ActivityType = Input::get('ActivityType');
			$generalleisureactivitespdate->SkillsAcquired = Input::get('SkillsAcquired');
			$generalleisureactivitespdate->GuideMentorCouch = Input::get('GuideMentorCouch');
			$generalleisureactivitespdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFrom'))->format('Y-m-d');
			$generalleisureactivitespdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidTo'))->format('Y-m-d');
			$generalleisureactivitespdate->Txnuser = Auth::user()->id;
			$generalleisureactivitespdate->Status = 1;
			$generalleisureactivitespdate->save();

			// redirect
			Session::flash('message', 'Successfully updated leisureactivites!');
			return Redirect::to('general-leisureactivites/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = generalleisureactivites::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the leisureactivites!');
        return Redirect::to('general-leisureactivites');
    }
	
}
