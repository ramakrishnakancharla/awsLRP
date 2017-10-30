<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generalleisureactivites extends Model
{
    public $table = "general_leisureactivites";
	protected $primaryKey = 'GLA_ID';
	
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
	public function activityTypeName()
	{
		return $this->hasOne('App\common_master\activitytype','ATM_ID','ActivityType');
	}
	public function skillsName()
	{
		return $this->hasOne('App\common_master\skills','SKM_ID','SkillsAcquired');
	}
	public function prociencyName()
	{
		return $this->hasOne('App\common_master\prociency','PM_ID','Prociency');
	}
}
