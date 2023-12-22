<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $room = Room::orderBy('id')->get();

        return view('room.index', ['room' => $room]);
    }

    public function create() {

        $room = Room::orderBy('id')->get();

        return view('room.create', ['room' => $room]);
    }

    public function store(Request $request) {
        
        $request->validate([
            'room_no' => 'required|numeric',
            'room_type' => 'required|string',
            'occupancy_limit' => 'required|numeric',
            'price' => 'required|numeric',
            'is_available' => 'required|string',
        ]); 

        Room::create([
            'room_no' => $request->room_no,
            'room_type' => $request->room_type,
            'occupancy_limit' => $request->occupancy_limit,
            'price' => $request->price,
            'is_available' => $request->is_available,
        ]);

        return redirect('/room')->with('message', 'A new room has been added to a deathlist');

    }

    public function edit(Room $room) {

        return view('room.edit',compact('room'));
    }

    public function update(Room $room, Request $request) {

        $request->validate([
        'room_no' => 'required|numeric',
        'room_type' => 'required|string',
        'occupancy_limit' => 'required|numeric',
        'price' => 'required|numeric',
        'is_available' => 'required|string',

        ]);

        $room->update($request->all());
        return redirect('/room')->with('message', " $room->room_no has been updated successfully");
    }

    public function delete(room $room)
    {
        $room->delete();

        return redirect('/room')->with('message', " $room->room_no has been deleted successfully");
    }


}
