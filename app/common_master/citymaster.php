<?php

namespace App\common_master;

use Illuminate\Database\Eloquent\Model;

class citymaster extends Model
{
    public $table = "common_city_master";
	protected $primaryKey = 'CIM_ID';
}
