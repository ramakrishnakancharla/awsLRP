<?php

namespace App\financeModel;

use Illuminate\Database\Eloquent\Model;

class assettype extends Model
{
    public $table = "finance_asset_type_master";
	protected $primaryKey = 'FATM_ID';
}
