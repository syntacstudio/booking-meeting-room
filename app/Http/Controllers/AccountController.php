<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Auth;

class AccountController extends Controller
{
    /**
     * View index of customer account page
     */
    public function index()
    {
    	$customer = Auth::user();
    	$bookings = $customer->bookings;

    	return view('account', compact('customer', 'bookings'));
    }

}
