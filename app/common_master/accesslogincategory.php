<?php

namespace App\common_master;

use Illuminate\Database\Eloquent\Model;

class accesslogincategory extends Model
{
    public $table = "common_access_login_category_master";
	protected $primaryKey = 'ALCM_ID';
}
