<?php

namespace App\common_master;

use Illuminate\Database\Eloquent\Model;

class documentcategory extends Model
{
    public $table = "common_document_category_master";
	protected $primaryKey = 'DCM_ID';
}
