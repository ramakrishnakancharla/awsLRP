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

class TravelinfoController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generaltravelinfo::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/travelinfo.index',compact('gendermaster','maritalstatus','childmaster','metadata','relation','list','genericfamily','genericfriends'));
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
			return Redirect::to('general-travelinfo')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generaltravelinfopdate = new generaltravelinfo;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$DocImage="";
			$generaltravelinfopdate->MetaID = Input::get('options');
			$generaltravelinfopdate->ToWhom = $towhom;
			$generaltravelinfopdate->FromTime = Input::get('FromTime');
			$generaltravelinfopdate->Country = Input::get('Country');
			$generaltravelinfopdate->Purpose = Input::get('Purpose');
			$generaltravelinfopdate->Comments = Input::get('Comments');
			$generaltravelinfopdate->AdditionalDestination = Input::get('AdditionalDestination');
			$generaltravelinfopdate->EstimatedCost = Input::get('EstimatedCost');
			$generaltravelinfopdate->TravelInsurancePolicyNo = Input::get('TravelInsurancePolicyNo');
			$generaltravelinfopdate->DocType = Input::get('DocType');
			$generaltravelinfopdate->DocNo = Input::get('DocNo');
			$generaltravelinfopdate->DocImage = $DocImage;
			$generaltravelinfopdate->Folder = "";
			$generaltravelinfopdate->ToTime = Input::get('ToTime');
			$generaltravelinfopdate->Region = Input::get('Region');
			$generaltravelinfopdate->OtherPurpose = Input::get('OtherPurpose');
			$generaltravelinfopdate->ModeOfTrasnport = Input::get('ModeOfTrasnport');
			$generaltravelinfopdate->Destination = Input::get('Destination');
			$generaltravelinfopdate->TravelInsuranceAvailable = Input::get('TravelInsuranceAvailable');
			$generaltravelinfopdate->ActualCost = Input::get('ActualCost');
			$generaltravelinfopdate->AdditonalCost = Input::get('AdditonalCost');
			$generaltravelinfopdate->FromDate = DateTime::createFromFormat('d/m/Y', Input::get('FromDate'))->format('Y-m-d');
			$generaltravelinfopdate->ToDate = DateTime::createFromFormat('d/m/Y', Input::get('ToDate'))->format('Y-m-d');
			$generaltravelinfopdate->Txnuser = Auth::user()->id;
			$generaltravelinfopdate->Status = 1;
			$generaltravelinfopdate->save();

			// redirect
			Session::flash('message', 'Successfully created travelinfo!');
			return Redirect::to('general-travelinfo');
		}
	}
	public function show($id)
	{
		$list = generaltravelinfo::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$show = generaltravelinfo::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/travelinfo.show',compact('list','genericfamily','show','genericfriends'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generaltravelinfo::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$edit = generaltravelinfo::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/travelinfo.edit',compact('gendermaster','maritalstatus','childmaster','metadata','relation','list','genericfamily','edit','genericfriends'));
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
			return Redirect::to('general-travelinfo/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generaltravelinfopdate = generaltravelinfo::where('Status',1)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$DocImage="";
			$generaltravelinfopdate->MetaID = Input::get('options');
			$generaltravelinfopdate->ToWhom = $towhom;
			$generaltravelinfopdate->FromTime = Input::get('FromTime');
			$generaltravelinfopdate->Country = Input::get('Country');
			$generaltravelinfopdate->Purpose = Input::get('Purpose');
			$generaltravelinfopdate->Comments = Input::get('Comments');
			$generaltravelinfopdate->AdditionalDestination = Input::get('AdditionalDestination');
			$generaltravelinfopdate->EstimatedCost = Input::get('EstimatedCost');
			$generaltravelinfopdate->TravelInsurancePolicyNo = Input::get('TravelInsurancePolicyNo');
			$generaltravelinfopdate->DocType = Input::get('DocType');
			$generaltravelinfopdate->DocNo = Input::get('DocNo');
			$generaltravelinfopdate->DocImage = $DocImage;
			$generaltravelinfopdate->Folder = "";
			$generaltravelinfopdate->ToTime = Input::get('ToTime');
			$generaltravelinfopdate->Region = Input::get('Region');
			$generaltravelinfopdate->OtherPurpose = Input::get('OtherPurpose');
			$generaltravelinfopdate->ModeOfTrasnport = Input::get('ModeOfTrasnport');
			$generaltravelinfopdate->Destination = Input::get('Destination');
			$generaltravelinfopdate->TravelInsuranceAvailable = Input::get('TravelInsuranceAvailable');
			$generaltravelinfopdate->ActualCost = Input::get('ActualCost');
			$generaltravelinfopdate->AdditonalCost = Input::get('AdditonalCost');
			$generaltravelinfopdate->FromDate = DateTime::createFromFormat('d/m/Y', Input::get('FromDate'))->format('Y-m-d');
			$generaltravelinfopdate->ToDate = DateTime::createFromFormat('d/m/Y', Input::get('ToDate'))->format('Y-m-d');
			$generaltravelinfopdate->Txnuser = Auth::user()->id;
			$generaltravelinfopdate->Status = 1;
			$generaltravelinfopdate->save();

			// redirect
			Session::flash('message', 'Successfully updated travelinfo!');
			return Redirect::to('general-travelinfo/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = generaltravelinfo::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the travelinfo!');
        return Redirect::to('general-travelinfo');
    }
	
}
