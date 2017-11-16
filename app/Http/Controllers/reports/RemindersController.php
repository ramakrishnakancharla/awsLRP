<?php

namespace App\Http\Controllers\reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RemindersController extends Controller
{
    public function index(){
		return view('reprots/Reminders.index');
    }
}
