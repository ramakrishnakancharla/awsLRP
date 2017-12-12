<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class institutiontype extends Model
{
    public $table = "finance_institution_type_master";
	protected $primaryKey = 'FITM_ID';
}
