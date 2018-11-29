<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use Storage;

class RoomController extends Controller
{
    /**
     * Page rooms
     */
    public function index()
    {
        $data = Room::paginate(10);

    	return view('admin.room.list', compact('data'));
    }

    /**
     * Detail room
     */
    public function detail($id)
    {
    	return view('admin.room.detail');
    }

    /**
     * New room
     */
    public function new()
    {
    	return view('admin.room.new');
    }

    /**
     * Store room data to database
     */
    public function store(Request $request)
    {
    	$request->validate([
            'name' => 'required|string|max:225',
            'location' => 'required|string|max:225',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required|image|max:1024',
        ]);

        $image 		= $request->file('image');
        $filename 	= date('ymdHis').'.'.$request->image->getClientOriginalExtension();
        $image->storeAs('public/rooms', $filename);

        Room::Create([
        	'name' => $request->name,
        	'location' => $request->location,
        	'price' => $request->price,
        	'description' => $request->description,
        	'image' => $filename,
        	'permalink' => Room::createPermalink($request->name)
        ]);

        return redirect()
                    ->route('admin.rooms')
                    ->with('success', 'Data has been added.');   
    }
}
