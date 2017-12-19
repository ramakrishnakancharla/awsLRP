<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class ownership extends Model
{
    public $table = "finance_ownership_master";
	protected $primaryKey = 'FOM_ID';
}
