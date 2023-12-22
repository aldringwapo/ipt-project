@extends('pages.base')

@section('content')
    <h1 class="text-center mb-4">Create New Booking</h1>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="{{ url('booking/create') }}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="guest_id">Select guest</label>
                    <select name="guest_id" id="guest_id" class="form-select">
                        <option selected disabled hidden="true">Select guest</option>
                        @foreach ($guest as $guestId => $guest)
                            <option value="{{$guest->id}}">{{$guest->full_name}}</option>
                        @endforeach
                    </select>
                    @error('guest_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="room_id">Select room number</label>
                    <select name="room_id" id="room_id" class="form-select">
                        <option selected disabled hidden="true">Select room number</option>
                        @foreach ($room as $roomId => $room)
                            <option value="{{$room->id}}">{{$room->id}}</option>
                        @endforeach
                    </select>
                    </select>
                    @error('room_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="check_in">Select check-in date</label>
                    <input type="date" name="check_in" class="form-control" placeholder="Enter your check-in date">
                    @error('check_in')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="check_out">Select check-out date</label>
                    <input type="date" name="check_out" class="form-control" placeholder="Enter your check-out date">
                    @error('check_out')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group my-3 d-grid d-md-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">
                        Add Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
