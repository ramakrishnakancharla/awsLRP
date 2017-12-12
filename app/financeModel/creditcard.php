<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class creditcard extends Model
{
    public $table = "finance_credit_card_master";
	protected $primaryKey = 'FCCM_ID';
}
