<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Index admin page
     */
    public function index()
    {
        return view('admin');
    }
}
