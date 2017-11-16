<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genericfriends extends Model
{
    public $table = "addfriendsrelatives";
	protected $primaryKey = 'AFR_ID';
	
	public function titleName()
	{
		return $this->hasOne('App\common_master\titlemaster','TM_ID','Title');
	}
	public function genderName()
	{
		return $this->hasOne('App\common_master\gendermaster','GM_ID','Gender');
	}
	public function religionName()
	{
		return $this->hasOne('App\common_master\religionmaster','RM_ID','Religion');
	}
	public function nationalityName()
	{
		return $this->hasOne('App\common_master\countrymaster','CM_ID','Nationality');
	}
	public function maritalName()
	{
		return $this->hasOne('App\common_master\maritalstatus','MS_ID','MaritalStatus');
	}
	public function relationName()
	{
		return $this->hasOne('App\common_master\metadata','id','Relationship');
	}
}
