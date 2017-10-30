<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generalphotos extends Model
{
    public $table = "general_photos";
	protected $primaryKey = 'GPH_ID';
	
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
}
