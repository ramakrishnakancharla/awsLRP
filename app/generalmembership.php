<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generalmembership extends Model
{
    public $table = "general_membership";
	protected $primaryKey = 'GMS_ID';
	
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
	public function memTypeName()
	{
		return $this->hasOne('App\common_master\membershiptypemaster','MTM_ID','MembershipType');
	}
	public function memAllowName()
	{
		return $this->hasOne('App\common_master\membershipallowedmaster','MAM_ID','AllowedForMembers');
	}
	public function memOrgName()
	{
		return $this->hasOne('App\common_master\membershiporgcategorymaster','MOCM_ID','OrganizationCategory');
	}
}
