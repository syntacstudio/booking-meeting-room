<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Booking;
use App\User;

class AdminController extends Controller
{
    /**
     * Index admin page
     */
    public function index()
    {
    	$rooms 		= Room::get()->count();
    	$bookings 	= Booking::get()->count();
    	$customers 	= User::whereHas('roles', function($query){
					    		$query->where('name', 'customer');
					    	})->count();

        return view('admin', compact('rooms', 'bookings', 'customers'));
    }
}
