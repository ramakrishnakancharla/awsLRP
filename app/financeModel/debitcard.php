<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class debitcard extends Model
{
    public $table = "finance_debit_card_master";
	protected $primaryKey = 'FDCM_ID';
}
