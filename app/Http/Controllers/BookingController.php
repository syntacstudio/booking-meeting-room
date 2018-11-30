<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Room;

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

    /**
     * Validation booking data
     */
    public function validation(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'name' => 'required|string|max:225',
    		'date' => 'required|string|max:225',
    		'day' => 'required|integer|min:1',
    	]);

        if($validator->fails())
        {
            $response = [ 'status' => 'error', 'errors' => $validator->errors() ];            
        } else {
        	$room 	= Room::where('permalink', $request->permalink)->first();
        	$email 	= Auth::user()->email;

            $response = [ 
            	'status' => 'valid', 
            	'msg' => 'Data validated.', 
            	'room' => $room, 
            	'email' => $email 
            ];
        }

    	return response()->json($response);
    }
}
