<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Auth;

class RoomController extends Controller
{
    /**
     * Browse meeting rooms page 
     */
    public function browse()
    {
    	$rooms = Room::paginate(12);

    	return view('browse', compact('rooms'));
    }

    /**
     * Detail meeting room
     */
    public function detail($permalink)
    {
    	$data = Room::where('permalink', $permalink)->first();

    	return view('room', compact('data'));
    }

    /**
     * Booking meeting room
     */
    public function booking($permalink)
    {
    	$data      = Room::where('permalink', $permalink)->first();
        $customer  = Auth::user();

    	return view('booking', compact('data', 'customer'));
    }
}
