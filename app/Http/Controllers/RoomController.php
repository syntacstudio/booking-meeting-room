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
    public function browse(Request $request)
    {

        $search = $request->get('search');

        if($search){
            $rooms = Room::where('name', 'LIKE', '%'.$search.'%')
                            ->orWhere('location', 'LIKE', '%'.$search.'%')
                            ->paginate(12);
        } else {
            $rooms = Room::paginate(12);
        }
    	

    	return view('browse', compact('rooms', 'search'));
    }

    /**
     * Detail meeting room
     */
    public function detail($permalink)
    {
    	$data = Room::where('permalink', $permalink)->first();

    	return view('room', compact('data'));
    }
}
