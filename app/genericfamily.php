<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genericfamily extends Model
{
    public $table = "addfamilymembers";
	protected $primaryKey = 'AFM_ID';
}
