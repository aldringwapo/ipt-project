
@extends('pages.base')

@section('content')
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteUserModalLabel">Delete Booking - {{$booking->id}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('booking/delete/' .$booking->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                Are you sure you want to delete this booking?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>

<h1>Edit Booking</h1>
<div class="row">
    <div class="col-md-5">
        <form action="{{url('booking/' .$booking->id)}}" method="POST">
            @csrf
                <div class="form-group mt-2">
                    <label for="guest_id">Select guest</label>
                    <select name="guest_id" id="guest_id" class="form-select">
                        <option selected disabled hidden="true">Select guest</option>
                        @foreach ($guest as $guestId => $guests)
                            <option value="{{$guests->id}}">{{$guests->full_name}}</option>
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
                        @foreach ($room as $rooms)
                            <option value="{{$rooms->id}}">{{$rooms->id}}</option>
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
                <div class="form-group mt-2">
                    <label for="total_amount">Total Amount</label>
                    <input type="number" name="total_amount" min='1000' max="90000" class="form-control" value="1000" placeholder="Enter the total amount here.">
                    @error('total_amount')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="payment_status">Payment Status</label>
                    <input type="text" name="payment_status" class="form-control" placeholder="Pending or paid">
                    @error('payment_status')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

            <div class="form-group my-3 d-grid gap 2 d-md-flex justify-content-end">
                <button class="btn btn-primary me-md-2 mt-2" type="submit">Update Booking</button>
                <button type="button" class="btn btn-danger me-md-2 mt-2" data-bs-toggle="modal" data-bs-target="#deleteUserModal">Delete Booking</button>
            </div>
        </form>
    </div>
</div>

@endsection
