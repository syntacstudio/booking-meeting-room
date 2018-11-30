<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    /**
     * View index of customer account page
     */
    public function index()
    {
    	return view('account');
    }

}
