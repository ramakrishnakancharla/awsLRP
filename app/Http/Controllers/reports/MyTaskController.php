<?php

namespace App\Http\Controllers\reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyTaskController extends Controller
{
    public function index(){
		return view('reprots/MyTask.index');
    }
}
