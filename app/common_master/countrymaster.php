<?php

namespace App\common_master;

use Illuminate\Database\Eloquent\Model;

class countrymaster extends Model
{
    public $table = "common_country_master";
	protected $primaryKey = 'CM_ID';
}
