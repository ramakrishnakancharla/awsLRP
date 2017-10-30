<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generaldocuments extends Model
{
    public $table = "general_documents";
	protected $primaryKey = 'GD_ID';
	
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
	public function DocCateName()
	{
		return $this->hasOne('App\common_master\documentcategory','DCM_ID','DocCategory');
	}
}
