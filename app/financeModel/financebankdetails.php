<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class financebankdetails extends Model
{
    public $table = "finance_bank_details";
	protected $primaryKey = 'FBD_ID';
	
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
	public function CountryName()
	{
		return $this->hasOne('App\common_master\countrymaster','CM_ID','Country');
	}
	public function religionName()
	{
		return $this->hasOne('App\common_master\religionmaster','RM_ID','Region');
	}
	public function docTypeName()
	{
		return $this->hasOne('App\common_master\documenttype','DTM_ID','DocType');
	}
	public function debitCardName()
	{
		return $this->hasOne('App\financeModel\debitcard','FDCM_ID','DebitCard');
	}
	public function creditCardName()
	{
		return $this->hasOne('App\financeModel\creditcard','FCCM_ID','CreditCard');
	}
	public function nomineeRelationName()
	{
		return $this->hasOne('App\financeModel\nomineerelation','FNRM_ID','NomineeRelationship');
	}
}
