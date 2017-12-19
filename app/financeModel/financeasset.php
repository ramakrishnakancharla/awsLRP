<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class financeasset extends Model
{
    public $table = "finance_asset";
	protected $primaryKey = 'FA_ID';
	
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
	public function assettypeName()
	{
		return $this->hasOne('App\financeModel\assettype','FATM_ID','AssetType');
	}
	public function financingoptionName()
	{
		return $this->hasOne('App\financeModel\financingoption','FFOM_ID','FinancingOption');
	}
	public function ownershipName()
	{
		return $this->hasOne('App\financeModel\ownership','FOM_ID','Ownership');
	}
}
