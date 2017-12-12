<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class depositoptions extends Model
{
    public $table = "finance_deposite_options_master";
	protected $primaryKey = 'FDOM_ID';
}
