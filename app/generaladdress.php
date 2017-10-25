<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generaladdress extends Model
{
    public $table = "general_address";
	protected $primaryKey = 'GA_ID';
	

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
	public function addressTypeName()
	{
		return $this->hasOne('App\common_master\addressmaster','AM_ID','AddressType');
	}
	public function documentTypeName()
	{
		return $this->hasOne('App\common_master\documenttype','DTM_ID','DocType');
	}
	public function countryName()
	{
		return $this->hasOne('App\common_master\countrymaster','CM_ID','Country');
	}
	public function stateName()
	{
		return $this->hasOne('App\common_master\statemaster','SM_ID','State');
	}
	public function cityName()
	{
		return $this->hasOne('App\common_master\citymaster','CIM_ID','City');
	}
}
