<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;

class BookingController extends Controller
{
    /**
     * Index page of admin booking
     */
    public function index()
    {
        $data = Booking::orderBy('id', 'DESC')
                        ->paginate(10);

    	return view('admin.booking.list', compact('data'));
    }

    /**
     * Detail booking
     */
    public function detail($id)
    {
    	return view('admin.booking.detail');
    }
}
