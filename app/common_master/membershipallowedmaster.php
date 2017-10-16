<?php

namespace App\common_master;

use Illuminate\Database\Eloquent\Model;

class membershipallowedmaster extends Model
{
    public $table = "common_membership_allowed_master";
	protected $primaryKey = 'MAM_ID';
}
