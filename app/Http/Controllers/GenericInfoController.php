<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\genericfamilydata;
use App\genericfamily;
use App\genericfriends;
use App\common_master\metadata;
use Auth;
use DateTime;

class GenericInfoController extends Controller
{
    public function genericfamilydata(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();
		$relation = metadata::where('status',1)->where('name','Relationship')->get();
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfamilylist = new genericfamily();
		$list = $genericfamilylist->where('Status',1)->paginate(999);
		return view('genericinfo.genericfamilyview',compact('metadata','genericfamily','list','relation'));
    }
	public function genericfamilydata_insert(Request $request){
		if($request){
			if($request->hiddenid){ // update
				$generic = genericfamily::where('Status',1)->find($request->hiddenid);
				$imgData = "";
				$generic->Parent = $request->Family;
				$generic->Priority = $request->Priority;
				$generic->Title = $request->Title;
				$generic->FirstName = $request->FirstName;
				$generic->MiddleName = $request->MiddleName;
				$generic->LastName = $request->LastName;
				$generic->Gender = $request->Gender;
				$generic->DOB = DateTime::createFromFormat('d/m/Y', $request->DateOfBirth)->format('Y-m-d');
				$generic->MobileNo = $request->MobileNumber;
				$generic->Image = $imgData;
				$generic->Age = $request->Age;
				$generic->Relationship = $request->Relationship;
				$generic->Nationality = $request->Nationality;
				$generic->Religion = $request->Religion;
				$generic->MaritalStatus = $request->MaritalStatus;
				$generic->MarriedSince = DateTime::createFromFormat('d/m/Y', $request->MarriedSince)->format('Y-m-d');
				$generic->NoOfChildrens = $request->NoOfChildrens;
				$generic->Txnuser = Auth::user()->id;
				$generic->Status = 1;
			}else{ // insert
				//$imgData = base64_encode($request->ProfileImage);
				$generic = new genericfamily();	
				$imgData = "";
				$generic->Parent = $request->Family;
				$generic->Priority = $request->Priority;
				$generic->Title = $request->Title;
				$generic->FirstName = $request->FirstName;
				$generic->MiddleName = $request->MiddleName;
				$generic->LastName = $request->LastName;
				$generic->Gender = $request->Gender;
				$generic->DOB = DateTime::createFromFormat('d/m/Y', $request->DateOfBirth)->format('Y-m-d');
				$generic->MobileNo = $request->MobileNumber;
				$generic->Image = $imgData;
				$generic->Age = $request->Age;
				$generic->Relationship = $request->Relationship;
				$generic->Nationality = $request->Nationality;
				$generic->Religion = $request->Religion;
				$generic->MaritalStatus = $request->MaritalStatus;
				$generic->MarriedSince = DateTime::createFromFormat('d/m/Y', $request->MarriedSince)->format('Y-m-d');
				$generic->NoOfChildrens = $request->NoOfChildrens;
				$generic->Txnuser = Auth::user()->id;
				$generic->Status = 1;
			}
			$generic->save();
			if($generic){
				return redirect('genericfamilydata');
			}
        }
    }
	public function genericfriendsdata(){
		$genericfriendslist = new genericfriends();
		$list = $genericfriendslist->where('Status',1)->paginate(999);
		return view('genericinfo.genericfriendsview',compact('list'));
    }
	public function genericfriendsdata_insert(Request $request){
		if($request){
			if($request->hiddenid){ // update
				$genericfrds = genericfriends::where('Status',1)->find($request->hiddenid);	
				$imgData = "";
				$genericfrds->Title = $request->Title;
				$genericfrds->FirstName = $request->FirstName;
				$genericfrds->MiddleName = $request->MiddleName;
				$genericfrds->LastName = $request->LastName;
				$genericfrds->Gender = $request->Gender;
				$genericfrds->DOB = DateTime::createFromFormat('d/m/Y', $request->DateOfBirth)->format('Y-m-d');
				$genericfrds->MobileNo = $request->MobileNumber;
				$generic->Image = $imgData;
				$genericfrds->Age = $request->Age;
				$genericfrds->Relationship = $request->Relationship;
				$genericfrds->Nationality = $request->Nationality;
				$genericfrds->Religion = $request->Religion;
				$genericfrds->MaritalStatus = $request->MaritalStatus;
				$genericfrds->MarriedSince = DateTime::createFromFormat('d/m/Y', $request->MarriedSince)->format('Y-m-d');
				$genericfrds->NoOfChildrens = $request->NoOfChildrens;
				$genericfrds->Txnuser = Auth::user()->id;
				$genericfrds->Status = 1;
			}else{ // insert
				$genericfrds = new genericfriends();	
				$imgData = "";
				$genericfrds->Title = $request->Title;
				$genericfrds->FirstName = $request->FirstName;
				$genericfrds->MiddleName = $request->MiddleName;
				$genericfrds->LastName = $request->LastName;
				$genericfrds->Gender = $request->Gender;
				$genericfrds->DOB = DateTime::createFromFormat('d/m/Y', $request->DateOfBirth)->format('Y-m-d');
				$genericfrds->MobileNo = $request->MobileNumber;
				$generic->Image = $imgData;
				$genericfrds->Age = $request->Age;
				$genericfrds->Relationship = $request->Relationship;
				$genericfrds->Nationality = $request->Nationality;
				$genericfrds->Religion = $request->Religion;
				$genericfrds->MaritalStatus = $request->MaritalStatus;
				$genericfrds->MarriedSince = DateTime::createFromFormat('d/m/Y', $request->MarriedSince)->format('Y-m-d');
				$genericfrds->NoOfChildrens = $request->NoOfChildrens;
				$genericfrds->Txnuser = Auth::user()->id;
				$genericfrds->Status = 1;
			}
			$genericfrds->save();
			if($genericfrds){
				return redirect('genericfriendsdata');
			}
        }
    }
}
