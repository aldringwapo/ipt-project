@extends('pages.base')

@section('content')

<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteUserModalLabel">
                    Delete Guest - {{$guest->id}} ?
                </h1>
                <button class="btn-close" type="button"  data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('guest/delete/' . $guest->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                Are you sure you want to delete this guest?
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button  type="submit" class="btn btn-danger">Delete Guest</button>
            </div>
            </form>
        </div>
    </div>
</div>

    <h1 class="text-center mb-4">Edit Guest</h1>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="{{ url('guest/'. $guest->id)}}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="full_name">Full Name</label>
                    <input class="form-control" type="text" name="full_name" value="{{ $guest->full_name }}" placeholder="Modify your full name">
                    @error('full_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ $guest->email }}" placeholder="Modify your email">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="phoneNumber">Phone Number</label>
                    <input class="form-control" type="tel" pattern="[0-9]{11}" name="phoneNumber" value="{{ $guest->phoneNumber }}" placeholder="Modify your phone number">
                    @error('phoneNumber')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="check_in_date">Check-in</label>
                    <input class="form-control" type="text" name="check_in_date" value="{{ $guest->check_in_date }}" placeholder="Moidfy your check-in date">
                    @error('check_in_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="check_out_date">Check-out</label>
                    <input class="form-control" type="text" name="check_out_date" value="{{ $guest->check_out_date }}" placeholder="Moidfy your check-out date">
                    @error('check_out_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="room_type">Room Type</label>
                    <input class="form-control" type="text" name="room_type" value="{{ $guest->room_type }}" placeholder="Modify your room type">
                    @error('room_type')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="total_guests">Total Guests</label>
                    <input class="form-control" type="number" min="1" max="12" name="total_guests" value="{{ $guest->total_guests }}" placeholder="Modify your total guests">
                    @error('total_guests')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group my-3 d-grid d-md-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">
                    Update Guest
                </button>
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                    Delete Guest
                </button>
                </div>
            </form>
        </div>
    </div>
@endsection
