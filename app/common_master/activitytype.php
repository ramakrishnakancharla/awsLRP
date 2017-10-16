<?php

namespace App\common_master;

use Illuminate\Database\Eloquent\Model;

class activitytype extends Model
{
    public $table = "common_activity_type_master";
	protected $primaryKey = 'ATM_ID';
}
