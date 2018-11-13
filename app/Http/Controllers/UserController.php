<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Index User
     */
    public function index()
    {
    	return view('user');
    }
}
