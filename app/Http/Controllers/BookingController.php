<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Guest;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
{
    $bookings = Booking::orderBy('id')->get();

    return view('booking.index', ['bookings' => $bookings]);
}


    public function create() {
        $booking = Booking::orderBy('id')->get();
        $room = Room::orderBy('id')->get();
        $guest = Guest::orderBy('id')->get();

        return view('booking.create', ['booking' => $booking, 'room' => $room, 'guest' => $guest]);

    //     $customers = Customer::orderBy('id')->get();
    // $vehicles = Vehicle::select('id')->distinct()->orderBy('id')->get();

    // return view('order.create', ['customers' => $customers, 'vehicles' => $vehicles]);
    }
    

    public function store(Request $request) {
        $request->validate([
            'guest_id' => 'required|numeric',
            'room_id' => 'required|numeric',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'total_amount' => 'required|decimal',
            'payment_status' => 'required|string',
        ]);

        Booking::create([
            'guest_id' => $request->guest_id,
            'room_id' => $request->room_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_amount' => $request->total_amount,
            'payment_status' => $request->payment_status,
        ]);

        return redirect('/booking')->with('message', 'A new Booking has been added to a deathlist');

    }

    public function edit(Booking $booking) {

        return view('booking.edit',compact('booking'));
    }

    public function update(Booking $booking, Request $request) {

        $request->validate([
            'guest_id' => 'required|numeric',
            'room_id' => 'required|numeric',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
        ]);

        $booking->update($request->all());
        return redirect('/booking')->with('message', " $booking->full_name has been updated successfully");
    }

    public function delete(Booking $booking)
    {
        $booking->delete();

        return redirect('/booking')->with('message', " $booking->full_name has been deleted successfully");
    }


}
