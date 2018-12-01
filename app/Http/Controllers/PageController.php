<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class PageController extends Controller
{
    /**
     * Welcome page 
     */
    public function welcome()
    {
    	$rooms = Room::inRandomOrder()
    				->limit(3)
    				->get();

    	return view('welcome', compact('rooms'));
    }
}
