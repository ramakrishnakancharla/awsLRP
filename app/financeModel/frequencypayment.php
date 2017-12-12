<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class frequencypayment extends Model
{
    public $table = "finance_frequency_payment_master";
	protected $primaryKey = 'FFPM_ID';
}
