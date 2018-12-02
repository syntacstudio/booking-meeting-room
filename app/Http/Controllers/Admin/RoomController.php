<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use App\Booking;
use Storage;
use Calendar;
use Carbon\Carbon;

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
     * Create new meeting room
     */
    public function create()
    {
    	return view('admin.room.create');
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
            'seats' => $request->seats,
            'wifi' => $request->wifi,
            'ac' => $request->ac,
            'coffee' => $request->coffee,
            'toilet' => $request->toilet,
        	'projector' => $request->projector,
        	'image' => $filename,
        	'permalink' => Room::createPermalink($request->name)
        ]);

        return redirect()
                    ->route('admin.rooms')
                    ->with('success', 'Meeting room has been added.');   
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
        $room->seats       = $request->seats;
        $room->wifi         = $request->wifi;
        $room->ac           = $request->ac;
        $room->coffee       = $request->coffee;
        $room->toilet       = $request->toilet;
        $room->projector    = $request->projector;

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

    /**
     * Agenda meeting room
     */
    public function agenda($id)
    {
        $room   = Room::find($id);
        $bookings = [];

        foreach ($room->bookings as $key => $item) {
            $bookings[] = Calendar::event(
                $item->customer->name,
                true,
                new \DateTime($item->start_date),
                new \DateTime($item->end_date),
                $key,
                [ 'url' => route('admin.booking', $item->id) ]
            );
        }

        $calendar = Calendar::addEvents($bookings);

        return view('admin.room.agenda', compact('calendar', 'room'));
    }
}
