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
    	$rooms 		= Room::get()
                            ->count();
        $booking    = Booking::get()
                            ->count();
    	$bookings 	= Booking::orderBy('created_at', 'DESC')
                            ->limit(5)
                            ->get();
    	$customers 	= User::whereHas('roles', function($query){
					    		$query->where('name', 'customer');
					    	})->count();

        return view('admin.index', compact('rooms', 'bookings', 'booking', 'customers'));
    }
}
