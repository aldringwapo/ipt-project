<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guest = Guest::orderBy('id')->get();

        return view('guest.index', ['guest' => $guest]);
    }

    public function create()
    {
        $guest = Guest::orderBy('id')->get();

        return view('guest.create', ['guest' => $guest]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phoneNumber' => 'required|numeric',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
            'room_type' => 'required|string',
            'total_guests' => 'required|numeric',
        ]);

        Guest::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'room_type' => $request->room_type,
            'total_guests' => $request->total_guests,
        ]);

        return redirect('/guest')->with('message', 'A new guest has been added to a deathlist');

    }

    public function edit(Guest $guest)
    {

        return view('guest.edit', compact('guest'));
    }

    public function update(Guest $guest, Request $request)
    {

        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phoneNumber' => 'required|numeric',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'room_type' => 'required|string',
            'total_guests' => 'required|numeric',

        ]);

        $guest->update($request->all());

        return redirect('/guest')->with('message', " $guest->full_name has been updated successfully");
    }

    public function delete(Guest $guest)
    {
        $guest->delete();

        return redirect('/guest')->with('message', " $guest->full_name has been deleted successfully");
    }


}
