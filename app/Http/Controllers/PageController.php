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
    				->paginate(6);

    	return view('welcome', compact('rooms'));
    }
}
