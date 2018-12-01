<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Auth;

class AccountController extends Controller
{
    /**
     * View index/bookings of customer account page
     */
    public function bookings()
    {
    	$customer = Auth::user();
    	$bookings = $customer->bookings()
    						->orderBy('created_at', 'DESC')
    						->paginate(10);

    	return view('account.bookings', compact('customer', 'bookings'));
    }

    /**
     * View account settings
     */
    public function settings()
    {	
    	$customer = Auth::user();

    	return view('account.settings', compact('customer'));
    }

}
