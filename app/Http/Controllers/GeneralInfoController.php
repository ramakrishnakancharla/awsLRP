<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\personelids;
use App\generalpersonaldata;
use App\generaladdress;
use App\metadata;
use App\genericfamily;
use App\genericfriends;
use App\generalcommunications;
use App\generalpersonalIds;
use App\generaltravelinfo;
use App\generalpersonaldocuments;
use Auth;
use DateTime;


class GeneralInfoController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
      // auth will be handeled in router or here based on programming style we can use
      // better use in router so that it can be apply for all common files
    }

    public function index(){
      // if any thing in general we can use this function
    }
/*
    public function personaldata(){
     $personal = new personelids();
	 $data = $personal->where('status',1)->paginate(2);
     return view('generalinfo.personaldata',compact('data'));
    }
    public function delete($id){
		
	 $personal = personelids::where('status',1)->find($id);
    $personal->delete();
	return redirect('personaldata');
	}
*/
	public function generalpersonaldata(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();

		$generalPersonal = new generalpersonaldata();
		$data = $generalPersonal->where('Status',1)->paginate(999);
		
		return view('generalinfo.generalpersonaldata',compact('data','metadata','genericfamily','genericfriends'));
    }
	public function generalpersonaldata_insert(Request $request){
		if($request){
			if($request->options == 1)
				$towhom = Auth::user()->id;
			elseif($request->options == 2)
				$towhom = $request->FamilyId;
			elseif($request->options == 3)
				$towhom = $request->FriendsId;
			if($request->hiddenid){
			// it will update the records
			// find will check the id and it will update automatically .....hidden value will be unqiue ID?
			// yes that record id will be hiddeni..okey fine i will check once if any issue i will ask you..
				$generalPersonal = generalpersonaldata::where('Status',1)->find($request->hiddenid);	
				$generalPersonal->MetaID = $request->options;
				$generalPersonal->ToWhom = $towhom;
				$generalPersonal->Title = $request->Title;
				$generalPersonal->FirstName = $request->FirstName;
				$generalPersonal->MiddleName = $request->MiddleName;
				$generalPersonal->LastName = $request->LastName;
				$generalPersonal->Gender = $request->Gender;
				$generalPersonal->DOB = DateTime::createFromFormat('d/m/Y', $request->DateOfBirth)->format('Y-m-d');
				$generalPersonal->Age = $request->Age;
				$generalPersonal->Nationality = $request->Nationality;
				$generalPersonal->Religion = $request->Religion;
				$generalPersonal->MaritalStatus = $request->MaritalStatus;
				$generalPersonal->MarriedSince = DateTime::createFromFormat('d/m/Y', $request->MarriedSince)->format('Y-m-d');
				$generalPersonal->NoOfChildrens = $request->NoOfChildrens;
				$generalPersonal->ValidFrom = DateTime::createFromFormat('d/m/Y', $request->ValidFromDate)->format('Y-m-d');
				$generalPersonal->ValidTo = DateTime::createFromFormat('d/m/Y', $request->ValidToDate)->format('Y-m-d');
				$generalPersonal->Status = 1;
				$generalPersonal->Txnuser = Auth::user()->id;
			}else{
			// it will create the record
				$generalPersonal = new generalpersonaldata();	
				$generalPersonal->MetaID = $request->options;
				$generalPersonal->ToWhom = $towhom;
				$generalPersonal->Title = $request->Title;
				$generalPersonal->FirstName = $request->FirstName;
				$generalPersonal->MiddleName = $request->MiddleName;
				$generalPersonal->LastName = $request->LastName;
				$generalPersonal->Gender = $request->Gender;
				$generalPersonal->DOB = DateTime::createFromFormat('d/m/Y', $request->DateOfBirth)->format('Y-m-d');
				$generalPersonal->Age = $request->Age;
				$generalPersonal->Nationality = $request->Nationality;
				$generalPersonal->Religion = $request->Religion;
				$generalPersonal->MaritalStatus = $request->MaritalStatus;
				$generalPersonal->MarriedSince = DateTime::createFromFormat('d/m/Y', $request->MarriedSince)->format('Y-m-d');
				$generalPersonal->NoOfChildrens = $request->NoOfChildrens;
				$generalPersonal->ValidFrom = DateTime::createFromFormat('d/m/Y', $request->ValidFromDate)->format('Y-m-d');
				$generalPersonal->ValidTo = DateTime::createFromFormat('d/m/Y', $request->ValidToDate)->format('Y-m-d');
				$generalPersonal->Status = 1;
				$generalPersonal->Txnuser = Auth::user()->id;
			}
			$generalPersonal->save();
			if($generalPersonal){
				return redirect('generalpersonaldata');
			}
        }
    }
	/*---------------Address-------------*/
	public function generaladdress(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generalAddress = new generaladdress();
		$data = $generalAddress->where('Status',1)->paginate(999);
		return view('generalinfo.generaladdress',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function generaladdress_insert(Request $request){
		if($request){
			if($request->options == 1)
				$towhom = Auth::user()->id;
			elseif($request->options == 2)
				$towhom = $request->FamilyId;
			elseif($request->options == 3)
				$towhom = $request->FriendsId;
			if($request->hiddenid){
				$generalAddress = generaladdress::where('Status',1)->find($request->hiddenid);	
				$generalAddress->MetaID = $request->options;
				$generalAddress->ToWhom = $towhom;
				$generalAddress->AddressType = $request->AddressType;
				$generalAddress->Street = $request->Street;
				$generalAddress->PostalCode = $request->PostalCode;
				$generalAddress->GeographicalAddress = $request->GeographicalAddress;
				$generalAddress->HouseNo = $request->HouseNo;
				$generalAddress->AddressLine = $request->AddressLine;
				$generalAddress->City = $request->City;
				$generalAddress->Country = $request->Country;
				$generalAddress->ValidFrom = DateTime::createFromFormat('d/m/Y', $request->ValidFromDate)->format('Y-m-d');
				$generalAddress->ValidTo = DateTime::createFromFormat('d/m/Y', $request->ValidToDate)->format('Y-m-d');
				$generalAddress->Txnuser = Auth::user()->id;
				$generalAddress->Status = 1;
			}else{
				$generalAddress = new generaladdress();	
				$generalAddress->MetaID = $request->options;
				$generalAddress->ToWhom = $towhom;
				$generalAddress->AddressType = $request->AddressType;
				$generalAddress->Street = $request->Street;
				$generalAddress->PostalCode = $request->PostalCode;
				$generalAddress->GeographicalAddress = $request->GeographicalAddress;
				$generalAddress->HouseNo = $request->HouseNo;
				$generalAddress->AddressLine = $request->AddressLine;
				$generalAddress->City = $request->City;
				$generalAddress->Country = $request->Country;
				$generalAddress->ValidFrom = DateTime::createFromFormat('d/m/Y', $request->ValidFromDate)->format('Y-m-d');
				$generalAddress->ValidTo = DateTime::createFromFormat('d/m/Y', $request->ValidToDate)->format('Y-m-d');
				$generalAddress->Txnuser = Auth::user()->id;
				$generalAddress->Status = 1;
			}
			$generalAddress->save();
			if($generalAddress){
				return redirect('generaladdress');
			}
        }
    }
	/*---------------Communication-------------*/
	public function generalcommunications(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generalcommunications = new generalcommunications();
		$data = $generalcommunications->where('Status',1)->paginate(999);
		return view('generalinfo.generalcommunications',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function generalcommunications_insert(Request $request){
		if($request){
			if($request->options == 1)
				$towhom = Auth::user()->id;
			elseif($request->options == 2)
				$towhom = $request->FamilyId;
			elseif($request->options == 3)
				$towhom = $request->FriendsId;
			if($request->hiddenid){
				$generalcommunications = generalcommunications::where('Status',1)->find($request->hiddenid);	
				$generalcommunications->MetaID = $request->options;
				$generalcommunications->ToWhom = $towhom;
				$generalcommunications->ValidFrom = DateTime::createFromFormat('d/m/Y', $request->ValidFromDate)->format('Y-m-d');
				$generalcommunications->ValidTo = DateTime::createFromFormat('d/m/Y', $request->ValidToDate)->format('Y-m-d');
				$generalcommunications->CommunicationType = $request->CommunicationType;
				$generalcommunications->Details = $request->Details;
				$generalcommunications->Txnuser = Auth::user()->id;
				$generalcommunications->Status = 1;
			}else{
				$generalcommunications = new generalcommunications();	
				$generalcommunications->MetaID = $request->options;
				$generalcommunications->ToWhom = $towhom;
				$generalcommunications->ValidFrom = DateTime::createFromFormat('d/m/Y', $request->ValidFromDate)->format('Y-m-d');
				$generalcommunications->ValidTo = DateTime::createFromFormat('d/m/Y', $request->ValidToDate)->format('Y-m-d');
				$generalcommunications->CommunicationType = $request->CommunicationType;
				$generalcommunications->Details = $request->Details;
				$generalcommunications->Txnuser = Auth::user()->id;
				$generalcommunications->Status = 1;
			}
			$generalcommunications->save();
			if($generalcommunications){
				return redirect('generalcommunications');
			}
        }
    }
	/*---------------Personal Id's-------------*/
	public function generalpersonalIds(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generalpersonalIds = new generalpersonalIds();
		$data = $generalpersonalIds->where('Status',1)->paginate(999);
		return view('generalinfo.generalpersonalIds',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function generalpersonalIds_insert(Request $request){
		if($request){
			if($request->options == 1)
				$towhom = Auth::user()->id;
			elseif($request->options == 2)
				$towhom = $request->FamilyId;
			elseif($request->options == 3)
				$towhom = $request->FriendsId;
			if($request->hiddenid){
				$generalpersonalIds = generalpersonalIds::where('Status',1)->find($request->hiddenid);	
				$generalpersonalIds->MetaID = $request->options;
				$generalpersonalIds->ToWhom = $towhom;
				$generalpersonalIds->ValidFrom = DateTime::createFromFormat('d/m/Y', $request->ValidFromDate)->format('Y-m-d');
				$generalpersonalIds->ValidTo = DateTime::createFromFormat('d/m/Y', $request->ValidToDate)->format('Y-m-d');
				$generalpersonalIds->IDType = $request->IDType;
				$generalpersonalIds->IDNO = $request->IDNO;
				$generalpersonalIds->PlaceOfIssue = $request->PlaceOfIssue;
				$generalpersonalIds->CountryOfIssue = $request->CountryOfIssue;
				$generalpersonalIds->Country = $request->Country;
				$generalpersonalIds->Region = $request->Region;
				$generalpersonalIds->IssueingAuthority = $request->IssueingAuthority;
				$generalpersonalIds->DateOfIssue = DateTime::createFromFormat('d/m/Y', $request->DateOfIssue)->format('Y-m-d');
				$generalpersonalIds->Txnuser = Auth::user()->id;
				$generalpersonalIds->Status = 1;
			}else{
				$generalpersonalIds = new generalpersonalIds();	
				$generalpersonalIds->MetaID = $request->options;
				$generalpersonalIds->ToWhom = $towhom;
				$generalpersonalIds->ValidFrom = DateTime::createFromFormat('d/m/Y', $request->ValidFromDate)->format('Y-m-d');
				$generalpersonalIds->ValidTo = DateTime::createFromFormat('d/m/Y', $request->ValidToDate)->format('Y-m-d');
				$generalpersonalIds->IDType = $request->IDType;
				$generalpersonalIds->IDNO = $request->IDNO;
				$generalpersonalIds->PlaceOfIssue = $request->PlaceOfIssue;
				$generalpersonalIds->CountryOfIssue = $request->CountryOfIssue;
				$generalpersonalIds->Country = $request->Country;
				$generalpersonalIds->Region = $request->Region;
				$generalpersonalIds->IssueingAuthority = $request->IssueingAuthority;
				$generalpersonalIds->DateOfIssue = DateTime::createFromFormat('d/m/Y', $request->DateOfIssue)->format('Y-m-d');
				$generalpersonalIds->Txnuser = Auth::user()->id;
				$generalpersonalIds->Status = 1;
			}
			$generalpersonalIds->save();
			if($generalpersonalIds){
				return redirect('generalpersonalIds');
			}
        }
    }
	/*---------------Travel Info-------------*/
	public function generaltravelinfo(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.generaltravelinfo',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function generaltravelinfo_insert(Request $request){
		if($request){
			if($request->options == 1)
				$towhom = Auth::user()->id;
			elseif($request->options == 2)
				$towhom = $request->FamilyId;
			elseif($request->options == 3)
				$towhom = $request->FriendsId;
			if($request->hiddenid){
				$generaltravelinfo = generaltravelinfo::where('Status',1)->find($request->hiddenid);	
				$generaltravelinfo->MetaID = $request->options;
				$generaltravelinfo->ToWhom = $towhom;
				$generaltravelinfo->FromDate = DateTime::createFromFormat('d/m/Y', $request->FromDate)->format('Y-m-d');
				$generaltravelinfo->FromTime = $request->FromTime;
				$generaltravelinfo->ToDate = DateTime::createFromFormat('d/m/Y', $request->ToDate)->format('Y-m-d');
				$generaltravelinfo->ToTime = $request->ToTime;
				$generaltravelinfo->Country = $request->Country;
				$generaltravelinfo->Region = $request->Region;
				$generaltravelinfo->Purpose = $request->Purpose;
				$generaltravelinfo->OtherPurpose = $request->OtherPurpose;
				$generaltravelinfo->Comments = $request->Comments;
				$generaltravelinfo->Txnuser = Auth::user()->id;
				$generaltravelinfo->Status = 1;
			}else{
				$generaltravelinfo = new generaltravelinfo();	
				$generaltravelinfo->MetaID = $request->options;
				$generaltravelinfo->ToWhom = $towhom;
				$generaltravelinfo->FromDate = DateTime::createFromFormat('d/m/Y', $request->FromDate)->format('Y-m-d');
				$generaltravelinfo->FromTime = $request->FromTime;
				$generaltravelinfo->ToDate = DateTime::createFromFormat('d/m/Y', $request->ToDate)->format('Y-m-d');
				$generaltravelinfo->ToTime = $request->ToTime;
				$generaltravelinfo->Country = $request->Country;
				$generaltravelinfo->Region = $request->Region;
				$generaltravelinfo->Purpose = $request->Purpose;
				$generaltravelinfo->OtherPurpose = $request->OtherPurpose;
				$generaltravelinfo->Comments = $request->Comments;
				$generaltravelinfo->Txnuser = Auth::user()->id;
				$generaltravelinfo->Status = 1;
			}
			$generaltravelinfo->save();
			if($generaltravelinfo){
				return redirect('generaltravelinfo');
			}
        }
    }
	/*---------------Personal Documents-------------*/
	public function generalpersonaldocuments(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generalpersonaldocuments = new generalpersonaldocuments();
		$data = $generalpersonaldocuments->where('Status',1)->paginate(999);
		return view('generalinfo.generalpersonaldocuments',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function generalpersonaldocuments_insert(Request $request){
		if($request){
			if($request->options == 1)
				$towhom = Auth::user()->id;
			elseif($request->options == 2)
				$towhom = $request->FamilyId;
			elseif($request->options == 3)
				$towhom = $request->FriendsId;
			if($request->hiddenid){
				$generalpersonaldocuments = generalpersonaldocuments::where('Status',1)->find($request->hiddenid);	
				$generalpersonaldocuments->MetaID = $request->options;
				$generalpersonaldocuments->ToWhom = $towhom;
				$generalpersonaldocuments->ValidFrom = DateTime::createFromFormat('d/m/Y', $request->ValidFrom)->format('Y-m-d');
				$generalpersonaldocuments->ValidTo = DateTime::createFromFormat('d/m/Y', $request->ValidTo)->format('Y-m-d');
				$generalpersonaldocuments->DocCategory = $request->DocCategory;
				$generalpersonaldocuments->DocName = $request->DocName;
				$generalpersonaldocuments->DocBelongs = $request->DocBelongs;
				$generalpersonaldocuments->Module = $request->Module;
				$generalpersonaldocuments->FollowUp = $request->FollowUp;
				$generalpersonaldocuments->Txnuser = Auth::user()->id;
				$generalpersonaldocuments->Status = 1;
			}else{
				$generalpersonaldocuments = new generalpersonaldocuments();
				$generalpersonaldocuments->MetaID = $request->options;
				$generalpersonaldocuments->ToWhom = $towhom;
				$generalpersonaldocuments->ValidFrom = DateTime::createFromFormat('d/m/Y', $request->ValidFrom)->format('Y-m-d');
				$generalpersonaldocuments->ValidTo = DateTime::createFromFormat('d/m/Y', $request->ValidTo)->format('Y-m-d');
				$generalpersonaldocuments->DocCategory = $request->DocCategory;
				$generalpersonaldocuments->DocName = $request->DocName;
				$generalpersonaldocuments->DocBelongs = $request->DocBelongs;
				$generalpersonaldocuments->Module = $request->Module;
				$generalpersonaldocuments->FollowUp = $request->FollowUp;
				$generalpersonaldocuments->Txnuser = Auth::user()->id;
				$generalpersonaldocuments->Status = 1;				
			}
			$generalpersonaldocuments->save();
			if($generalpersonaldocuments){
				return redirect('generalpersonaldocuments');
			}
        }
    }
	public function generalmemberships(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.generalmemberships',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function generalobjectsonloan(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.generalobjectsonloan',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function generalleisureactivites(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.generalleisureactivites',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function generalphotos(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.generalphotos',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function generalaccesslogin(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.generalaccesslogin',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function financebankdetails(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.financebankdetails',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function financensurances(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.financensurances',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function financefixeddeposites(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.financefixeddeposites',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function financeassets(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.financeassets',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function financefinancialdocuments(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.financefinancialdocuments',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function financeloans(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.financeloans',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function financerecurringdeposites(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.financerecurringdeposites',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function financechitfunds(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.financechitfunds',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function financeequity(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.financeequity',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function financemutualfund(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.financemutualfund',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function financefutures(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.financefutures',compact('metadata','genericfamily','genericfriends','data'));
    }
	public function financeoptions(){
		$metadata = metadata::where('status',1)->where('name','Whom')->get();	
		$genericfamily = genericfamily::where('Status',1)->get();
		$genericfriends = genericfriends::where('Status',1)->get();
		
		$generaltravelinfo = new generaltravelinfo();
		$data = $generaltravelinfo->where('Status',1)->paginate(999);
		return view('generalinfo.financeoptions',compact('metadata','genericfamily','genericfriends','data'));
    }
}
