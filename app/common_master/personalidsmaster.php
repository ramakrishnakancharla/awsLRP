<?php

namespace App\common_master;

use Illuminate\Database\Eloquent\Model;

class personalidsmaster extends Model
{
    public $table = "common_personal_ids_master";
	protected $primaryKey = 'PID_ID';
}
