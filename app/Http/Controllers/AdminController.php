<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Booking;

class AdminController extends Controller
{
    /**
     * Index admin page
     */
    public function index()
    {
    	$rooms 		= Room::get()->count();
    	$bookings 	= Booking::get()->count();

        return view('admin', compact('rooms', 'bookings'));
    }
}
