<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generalobjectsonloan extends Model
{
    public $table = "general_objectsonloan";
	protected $primaryKey = 'GOL_ID';
	
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
	public function objectName()
	{
		return $this->hasOne('App\common_master\objectsloanmaster','OLM_ID','ObjectCategory');
	}
}
