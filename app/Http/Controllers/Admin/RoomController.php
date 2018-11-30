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
                    ->with('success', 'Meetimg room has been added.');   
    }

    /**
     * View edit room
     */
    public function edit($id)
    {
        $data = Room::find($id);

        return view('admin.room.edit', compact('data'));
    }

    /**
     * Update room data
     */
    public function update(Request $request, $id)
    {   
        $room = Room::find($id);

        $rules = [
            'name' => 'required|string|max:225',
            'location' => 'required|string|max:225',
            'price' => 'required|integer',
            'description' => 'required|string',
        ];

        if($request->edit_image) {
            $rules['image'] = 'required|image|max:1024';
        }

        $validate = $request->validate($rules);

        $room->name         = $request->name;
        $room->location     = $request->location;
        $room->price        = $request->price;
        $room->description  = $request->description;

        if($request->edit_image) {
            Storage::delete('/public/rooms' . $room->image);
            $image      = $request->file('image');
            $filename   = date('ymdHis').'.'.$request->image->getClientOriginalExtension();
            $image->storeAs('public/rooms', $filename);
            $room->image        = $filename;
        }

        $room->save();

        return redirect()
                    ->route('admin.rooms')
                    ->with('success', 'Meetimg room data has been updated.');
    }

    /**
     * Destroy data
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        Storage::delete('/public/rooms' . $room->image);
        $room->delete();

        return redirect()
                    ->route('admin.rooms')
                    ->with('success', 'Meetimg room has been deleted.');
    }
}
