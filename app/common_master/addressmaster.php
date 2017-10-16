<?php

namespace App\common_master;

use Illuminate\Database\Eloquent\Model;

class addressmaster extends Model
{
    public $table = "common_address_master";
	protected $primaryKey = 'AM_ID';
}
