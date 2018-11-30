<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Booking meeting room
     */
    public function create($permalink)
    {
    	$data      = Room::where('permalink', $permalink)->first();
        $customer  = Auth::user();

    	return view('booking', compact('data', 'customer'));
    }
}
