<?php

namespace App\common_master;

use Illuminate\Database\Eloquent\Model;

class childmaster extends Model
{
    public $table = "common_childmaster";
	protected $primaryKey = 'CM_ID';
}
