<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Welcome page 
     */
    public function welcome()
    {
    	return view('welcome');
    }
}
