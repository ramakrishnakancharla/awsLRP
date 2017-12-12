<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class nomineerelation extends Model
{
    public $table = "finance_nominee_relationship_master";
	protected $primaryKey = 'FNRM_ID';
}
