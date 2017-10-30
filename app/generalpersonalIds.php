<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generalpersonalIds extends Model
{
    public $table = "general_personalIds";
	protected $primaryKey = 'GPI_ID';
	
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
	public function IDTypeName()
	{
		return $this->hasOne('App\common_master\personalidsmaster','PID_ID','IDType');
	}
	public function CountryName()
	{
		return $this->hasOne('App\common_master\countrymaster','CM_ID','Country');
	}
	public function religionName()
	{
		return $this->hasOne('App\common_master\religionmaster','RM_ID','Region');
	}
	public function IssueCountryName()
	{
		return $this->hasOne('App\common_master\countrymaster','CM_ID','CountryOfIssue');
	}
	public function docTypeName()
	{
		return $this->hasOne('App\common_master\documenttype','DTM_ID','DocType');
	}
}
