<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generaltravelinfo extends Model
{
    public $table = "general_travelinfo";
	protected $primaryKey = 'GTI_ID';
	
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
	public function documentTypeName()
	{
		return $this->hasOne('App\common_master\documenttype','DTM_ID','DocType');
	}
	public function ModeTranName()
	{
		return $this->hasOne('App\common_master\modeoftransport','MOTM_ID','ModeOfTrasnport');
	}
	public function AccoName()
	{
		return $this->hasOne('App\common_master\accommodation','MOAM_ID','ModeOfAccommodation');
	}
	public function countryName()
	{
		return $this->hasOne('App\common_master\countrymaster','CM_ID','Country');
	}
	public function religionName()
	{
		return $this->hasOne('App\common_master\religionmaster','RM_ID','Region');
	}

}
