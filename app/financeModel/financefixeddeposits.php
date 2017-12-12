<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class financefixeddeposits extends Model
{
    public $table = "finance_fixed_deposits";
	protected $primaryKey = 'FFD_ID';
	
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
	public function InstitutionTypeName()
	{
		return $this->hasOne('App\financeModel\institutiontype','FITM_ID','InstitutionType');
	}
	public function RateInterestName()
	{
		return $this->hasOne('App\financeModel\rateofinterest','FROIM_ID','RateOfInterest');
	}
	public function DepositName()
	{
		return $this->hasOne('App\financeModel\depositoptions','FDOM_ID','DepositOptions');
	}
	public function docTypeName()
	{
		return $this->hasOne('App\common_master\documenttype','DTM_ID','DocType');
	}
	public function nomineeRelationName()
	{
		return $this->hasOne('App\financeModel\nomineerelation','FNRM_ID','NomineeRelationship');
	}
}
