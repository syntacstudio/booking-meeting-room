<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class AdminController extends Controller
{
    /**
     * Index admin page
     */
    public function index()
    {
    	$rooms = Room::get()->count();

        return view('admin', compact('rooms'));
    }
}
