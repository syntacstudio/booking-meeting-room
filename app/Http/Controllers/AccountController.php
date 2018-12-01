<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

    /**
     * View Invoice
     */
    public function invoice($number)
    {
    	$data = Booking::where('number', $number)->first();

    	return view('account.invoice', compact('data'));
    }

    /**
     * Update profile
     */
    public function update(Request $request)
    {
        $user   = Auth::user();
        $rules  = ['name' => 'required|string|max:225'];

        if($user->email != $request->email || empty($request->email)){
            $rules['email'] = 'required|unique:users,email';
        }

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $response = ['status' => 'error', 'errors' => $validator->errors()];            
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $saved = $user->save();

            if($saved){
                $response = ['status' => 'success', 'msg' => 'Your profile has been update.'];
            } else {
                $response = ['status' => 'failed', 'msg' => 'Failed to update your profile.'];
            }
        }

        return response()->json($response);
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:5'
        ]);

        if($validator->fails())
        {
            $response = ['status' => 'error', 'errors' => $validator->errors()];            
        } else {
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $saved = $user->save();

            if($saved){
                $response = ['status' => 'success', 'msg' => 'Your password has been update.'];
            } else {
                $response = ['status' => 'failed', 'msg' => 'Failed to update your password.'];
            }
        }

        return response()->json($response);
    }

}
