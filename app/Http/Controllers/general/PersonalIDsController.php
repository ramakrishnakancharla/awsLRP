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
use App\common_master\metadata;
use App\common_master\gendermaster;
use App\common_master\maritalstatus;
use App\common_master\childmaster;
use App\common_master\personalidsmaster;
use App\common_master\countrymaster;
use App\common_master\religionmaster;
use App\common_master\documenttype;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class PersonalIDsController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$personalidsmaster = personalidsmaster::where('status',1)->get();
		$countrymaster = countrymaster::where('status',1)->get();
		$religionmaster = religionmaster::where('status',1)->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalpersonalids::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		if(count($list) > 0){
			$NameOfIDType = generalpersonalids::find($list[0]->GPI_ID)->IDTypeName;
		}else{
			$NameOfIDType = "";
		}
		
		
		return view('generalinfo/personalIds.index',compact('gendermaster','maritalstatus','childmaster','personalidsmaster','countrymaster','religionmaster','documenttype','metadata','relation','list','genericfamily','genericfriends','NameOfIDType'));
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
			return Redirect::to('general-personalIds')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalpersonalidsupdate = new generalpersonalids;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$target_dir = "general_upload/personalids/";
			if($_FILES["DocImage"]["name"] !=''){
				$file_name = rand().$_FILES["DocImage"]["name"];
				$temp_name = $_FILES["DocImage"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = "";
			}
			
			$generalpersonalidsupdate->MetaID = Input::get('options');
			$generalpersonalidsupdate->ToWhom = $towhom;
			$generalpersonalidsupdate->IDType = Input::get('IDType');
			$generalpersonalidsupdate->IDNO = Input::get('IDNO');
			$generalpersonalidsupdate->PlaceOfIssue = Input::get('PlaceOfIssue');
			$generalpersonalidsupdate->CountryOfIssue = Input::get('CountryOfIssue');
			$generalpersonalidsupdate->Country = Input::get('Country');
			$generalpersonalidsupdate->Region = Input::get('Region');
			$generalpersonalidsupdate->IssueingAuthority = Input::get('IssueingAuthority');
			$generalpersonalidsupdate->DateOfIssue = DateTime::createFromFormat('d/m/Y', Input::get('DateOfIssue'))->format('Y-m-d');
			$generalpersonalidsupdate->DocType = Input::get('DocType');
			$generalpersonalidsupdate->DocNo = Input::get('DocNo');
			$generalpersonalidsupdate->DocImage = $file_name;
			$generalpersonalidsupdate->Folder = $target_dir;
			$generalpersonalidsupdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFromDate'))->format('Y-m-d');
			$generalpersonalidsupdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidToDate'))->format('Y-m-d');
			$generalpersonalidsupdate->Txnuser = Auth::user()->id;
			$generalpersonalidsupdate->Status = 1;
			$generalpersonalidsupdate->save();

			// redirect
			Session::flash('message', 'Successfully created personalIds!');
			return Redirect::to('general-personalIds');
		}
	}
	public function show($id)
	{
		$list = generalpersonalids::where('Status',1)->get();
		$show = generalpersonalids::where('Status',1)->find($id);
		
		$NameOfMetadata = generalpersonalids::find($show->GPI_ID)->metadataName;
		$NameOfFamily = generalpersonalids::find($show->GPI_ID)->familyName;
		$NameOfFriend = generalpersonalids::find($show->GPI_ID)->friendsName;
		$NameOfIDType = generalpersonalids::find($show->GPI_ID)->IDTypeName;
		$NameOfDocType = generalpersonalids::find($show->GPI_ID)->docTypeName;
		$NameOfCountry = generalpersonalids::find($show->GPI_ID)->countryName;
		$NameOfIssueCountry = generalpersonalids::find($show->GPI_ID)->IssueCountryName;
		$NameOfReligion = generalpersonalids::find($show->GPI_ID)->religionName;
		
		return view('generalinfo/personalIds.show',compact('list','show','NameOfMetadata','NameOfFamily','NameOfFriend','NameOfIDType','NameOfDocType','NameOfCountry','NameOfIssueCountry','NameOfReligion'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$personalidsmaster = personalidsmaster::where('status',1)->get();
		$countrymaster = countrymaster::where('status',1)->get();
		$religionmaster = religionmaster::where('status',1)->get();
		$documenttype = documenttype::where('Status',1)->orderBy('Name', 'asc')->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generalpersonalids::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$edit = generalpersonalids::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		$NameOfIDType = generalpersonalids::find($id)->IDTypeName;
		
		return view('generalinfo/personalIds.edit',compact('gendermaster','maritalstatus','childmaster','personalidsmaster','countrymaster','religionmaster','documenttype','metadata','relation','list','genericfamily','edit','genericfriends','NameOfIDType'));
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
			return Redirect::to('general-personalIds/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generalpersonalidsupdate = generalpersonalids::where('Status',1)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$target_dir = "general_upload/personalids/";
			if($_FILES["DocImage"]["name"] !=''){
				$file_name = rand().$_FILES["DocImage"]["name"];
				$temp_name = $_FILES["DocImage"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = Input::get('PhotoEdit');
			}
			
			$generalpersonalidsupdate->MetaID = Input::get('options');
			$generalpersonalidsupdate->ToWhom = $towhom;
			$generalpersonalidsupdate->IDType = Input::get('IDType');
			$generalpersonalidsupdate->IDNO = Input::get('IDNO');
			$generalpersonalidsupdate->PlaceOfIssue = Input::get('PlaceOfIssue');
			$generalpersonalidsupdate->CountryOfIssue = Input::get('CountryOfIssue');
			$generalpersonalidsupdate->Country = Input::get('Country');
			$generalpersonalidsupdate->Region = Input::get('Region');
			$generalpersonalidsupdate->IssueingAuthority = Input::get('IssueingAuthority');
			$generalpersonalidsupdate->DateOfIssue = DateTime::createFromFormat('d/m/Y', Input::get('DateOfIssue'))->format('Y-m-d');
			$generalpersonalidsupdate->DocType = Input::get('DocType');
			$generalpersonalidsupdate->DocNo = Input::get('DocNo');
			$generalpersonalidsupdate->DocImage = $file_name;
			$generalpersonalidsupdate->Folder = $target_dir;
			$generalpersonalidsupdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFromDate'))->format('Y-m-d');
			$generalpersonalidsupdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidToDate'))->format('Y-m-d');
			$generalpersonalidsupdate->Txnuser = Auth::user()->id;
			$generalpersonalidsupdate->Status = 1;
			$generalpersonalidsupdate->save();

			// redirect
			Session::flash('message', 'Successfully updated personalIds!');
			return Redirect::to('general-personalIds/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = generalpersonalids::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the personalIds!');
        return Redirect::to('general-personalIds');
    }
	
}
