<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Charge;
use App\Room;
use App\Booking;
use Auth;

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

    /**
     * Store the booking data
     */
    public function store(Request $request)
    {	
    	$user = Auth::user();
    	$room = Room::find($request->room);

    	try {
    		Stripe::setApiKey(env('STRIPE_SECRET'));

    		Charge::create([
			    'amount' => ($room->price * 100) * $request->day,
			    'currency' => 'usd',
			    'description' => 'Booking: '.$room->name,
			    'source' => $request->stripeToken,
			    'receipt_email' => $user->email,
			]);

			$booking = Booking::create([
				'number' => 'ID'.date('ymdGis'),
				'user_id' => $user->id,
				'room_id' => $room->id,
				'start_date' => Carbon::parse($request->date),
				'end_date' => Carbon::parse($request->date)->addDays($request->day),
				'day' =>$request->day,
				'total' => $room->price * $request->day,
				'note' => $request->note
			]);

    		$response = [ 'status' => 'success', 'msg' => 'Thank you! Your payment has been successfully received.', 'data' => $booking ];
    	} catch(\Stripe\Error\Card $e) {
            $body = $e->getJsonBody();
            $errors[] = $body['error']['message'];
        } catch (\Stripe\Error\RateLimit $e) {
            $body = $e->getJsonBody();
            $errors[] = $body['error']['message'];
        } catch (\Stripe\Error\InvalidRequest $e) {
            $body = $e->getJsonBody();
            $errors[] = $body['error']['message'];
        } catch (\Stripe\Error\Authentication $e) {
            $body = $e->getJsonBody();
            $errors[] = $body['error']['message'];
        } catch (\Stripe\Error\ApiConnection $e) {
            $body = $e->getJsonBody();
            $errors[] = $body['error']['message'];
        } catch (\Stripe\Error\Base $e) {
            $body = $e->getJsonBody();
            $errors[] = $body['error']['message'];
        } catch (Exception $e) {
            $body = $e->getJsonBody();
            $errors[] = $body['error']['message'];
        } catch(Exception $e) {
            $response = ['status' => 'Failed'];
        }

    	return response()->json($response);
    }
}
