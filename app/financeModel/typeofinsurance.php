<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class typeofinsurance extends Model
{
    public $table = "finance_type_insurance_master";
	protected $primaryKey = 'FTIM_ID';
}
