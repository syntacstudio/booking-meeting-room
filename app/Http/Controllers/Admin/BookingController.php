<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Index page of admin booking
     */
    public function index()
    {
    	return view('admin.booking.list');
    }

    /**
     * Detail booking
     */
    public function detail($id)
    {
    	return view('admin.booking.detail');
    }
}
