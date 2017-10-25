<?php

namespace App\common_master;

use Illuminate\Database\Eloquent\Model;

class documenttype extends Model
{
    public $table = "common_document_type_master";
	protected $primaryKey = 'DTM_ID';
}
