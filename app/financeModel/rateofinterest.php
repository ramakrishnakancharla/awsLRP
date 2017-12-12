<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class rateofinterest extends Model
{
    public $table = "finance_rate_of_interest_master";
	protected $primaryKey = 'FROIM_ID';
}
