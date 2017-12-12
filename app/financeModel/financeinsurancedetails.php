<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class financeinsurancedetails extends Model
{
    public $table = "finance_insurance_details";
	protected $primaryKey = 'FID_ID';
	
	public function metadataName()
	{
		return $this->hasOne('App\common_master\metadata','id','MetaID');
	}
	public function familyName()
	{
		return $this->hasOne('App\genericfamily','AFM_ID','ToWhom');
	}
	public function friendsName()
	{
		return $this->hasOne('App\genericfriends','AFR_ID','ToWhom');
	}
	public function docTypeName()
	{
		return $this->hasOne('App\common_master\documenttype','DTM_ID','DocType');
	}
	public function nomineeRelationName()
	{
		return $this->hasOne('App\financeModel\nomineerelation','FNRM_ID','NomineeRelationship');
	}
	public function frequencypaymentName()
	{
		return $this->hasOne('App\financeModel\frequencypayment','FFPM_ID','FrequencyOfPayment');
	}
	public function typeofinsuranceName()
	{
		return $this->hasOne('App\financeModel\typeofinsurance','FTIM_ID','TypeOfInsurance');
	}
}
