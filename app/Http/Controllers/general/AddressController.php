<?php

namespace App\Http\Controllers\general;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\genericfamily;
use App\genericfriends;
use App\generalpersonaldata;
use App\generaladdress;
use App\common_master\metadata;
use App\common_master\gendermaster;
use App\common_master\maritalstatus;
use App\common_master\childmaster;
use App\common_master\addressmaster;
use App\common_master\countrymaster;
use App\common_master\citymaster;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class AddressController extends Controller
{
    public function index(){
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$addressmaster = addressmaster::where('status',1)->get();
		$countrymaster = countrymaster::where('status',1)->orderBy('Name', 'asc')->get();
		$citymaster = citymaster::where('status',1)->orderBy('Name', 'asc')->paginate(300);  // need to chnage
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generaladdress::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/address.index',compact('gendermaster','maritalstatus','childmaster','addressmaster','countrymaster','citymaster','metadata','relation','list','genericfamily','genericfriends'));
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
			return Redirect::to('general-address')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generaladdressupdate = new generaladdress;
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
				
			$target_dir = "general_upload/address/";
			$file_name = rand().$_FILES["DocImage"]["name"];
			$temp_name = $_FILES["DocImage"]["tmp_name"];
			$target_file = $target_dir . basename($file_name);
			move_uploaded_file($temp_name, $target_file);
			
			$generaladdressupdate->MetaID = Input::get('options');
			$generaladdressupdate->ToWhom = $towhom;
			$generaladdressupdate->AddressType = Input::get('AddressType');
			$generaladdressupdate->Street = Input::get('Street');
			$generaladdressupdate->PostalCode = Input::get('PostalCode');
			$generaladdressupdate->GeographicalAddress = Input::get('GeographicalAddress');
			$generaladdressupdate->DocType = Input::get('DocType');
			$generaladdressupdate->DocNo = Input::get('DocNo');
			$generaladdressupdate->HouseNo = Input::get('HouseNo');
			$generaladdressupdate->AddressLine = Input::get('AddressLine');
			$generaladdressupdate->Country = Input::get('Country');
			$generaladdressupdate->City = Input::get('City');
			$generaladdressupdate->DocImage = $file_name;
			$generaladdressupdate->Folder = $target_dir;
			$generaladdressupdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFromDate'))->format('Y-m-d');
			$generaladdressupdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidToDate'))->format('Y-m-d');
			$generaladdressupdate->Txnuser = Auth::user()->id;
			$generaladdressupdate->Status = 1;
			$generaladdressupdate->save();

			// redirect
			Session::flash('message', 'Successfully created address!');
			return Redirect::to('general-address');
		}
	}
	public function show($id)
	{
		$list = generaladdress::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$show = generaladdress::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/address.show',compact('list','genericfamily','show','genericfriends'));
	}
	public function edit($id)
	{
		$gendermaster = gendermaster::where('status',1)->get();
		$maritalstatus = maritalstatus::where('status',1)->get();
		$childmaster = childmaster::where('status',1)->get();
		$addressmaster = addressmaster::where('status',1)->get();
		$countrymaster = countrymaster::where('status',1)->orderBy('Name', 'asc')->get();
		$citymaster = citymaster::where('status',1)->orderBy('Name', 'asc')->paginate(300); // need to change
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$list = generaladdress::where('Status',1)->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$edit = generaladdress::where('Status',1)->find($id);
		$genericfriends = genericfriends::where('Status',1)->get();
		
		return view('generalinfo/address.edit',compact('gendermaster','maritalstatus','childmaster','addressmaster','countrymaster','citymaster','metadata','relation','list','genericfamily','edit','genericfriends'));
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
			return Redirect::to('general-address/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$generaladdressupdate = generaladdress::where('Status',1)->find($id);
			
			if(Input::get('options') == 1)
				$towhom = Auth::user()->id;
			elseif(Input::get('options') == 2)
				$towhom = Input::get('FamilyId');
			elseif(Input::get('options') == 3)
				$towhom = Input::get('FriendsId');
			
			$target_dir = "general_upload/address/";
			if($_FILES["DocImage"]["name"] !=''){
				$file_name = rand().$_FILES["DocImage"]["name"];
				$temp_name = $_FILES["DocImage"]["tmp_name"];
				$target_file = $target_dir . basename($file_name);
				move_uploaded_file($temp_name, $target_file);
			}else{
				$file_name = Input::get('PhotoEdit');
			}
			
			
			$generaladdressupdate->MetaID = Input::get('options');
			$generaladdressupdate->ToWhom = $towhom;
			$generaladdressupdate->AddressType = Input::get('AddressType');
			$generaladdressupdate->Street = Input::get('Street');
			$generaladdressupdate->PostalCode = Input::get('PostalCode');
			$generaladdressupdate->GeographicalAddress = Input::get('GeographicalAddress');
			$generaladdressupdate->DocType = Input::get('DocType');
			$generaladdressupdate->DocNo = Input::get('DocNo');
			$generaladdressupdate->HouseNo = Input::get('HouseNo');
			$generaladdressupdate->AddressLine = Input::get('AddressLine');
			$generaladdressupdate->Country = Input::get('Country');
			$generaladdressupdate->City = Input::get('City');
			$generaladdressupdate->DocImage = $file_name;
			$generaladdressupdate->Folder = $target_dir;
			$generaladdressupdate->ValidFrom = DateTime::createFromFormat('d/m/Y', Input::get('ValidFromDate'))->format('Y-m-d');
			$generaladdressupdate->ValidTo = DateTime::createFromFormat('d/m/Y', Input::get('ValidToDate'))->format('Y-m-d');
			$generaladdressupdate->Txnuser = Auth::user()->id;
			$generaladdressupdate->Status = 1;
			$generaladdressupdate->save();

			// redirect
			Session::flash('message', 'Successfully updated address!');
			return Redirect::to('general-address/'. $id );
		}
	}
	public function destroy($id)
    {
        // delete
        $genericfamilydelete = generaladdress::find($id);
        $genericfamilydelete->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the address!');
        return Redirect::to('general-address');
    }
	
}
