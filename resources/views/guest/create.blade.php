@extends('pages.base')

@section('content')
    <h1 class="text-center mb-4">Add new guest</h1>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="{{url('guest/create')}}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="full_name">Full Name</label>
                    <input class="form-control" type="text" name="full_name" placeholder="Enter your full name">
                    @error('full_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Enter your email">
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="phoneNumber">Phone Number</label>
                    <input class="form-control" type="tel" name="phoneNumber" pattern="[0-9]{11}" placeholder="Enter your phoneNumber">
                    @error('phoneNumber')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="check_in_date">Check-In</label>
                    <input class="form-control" type="date"  name="check_in_date" placeholder="Enter your check_in_date">
                    @error('check_in_date')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="check_out_date">Check-Out</label>
                    <input class="form-control" type="date"  name="check_out_date" placeholder="Enter your check_out_date">
                    @error('check_out_date')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="form-group mt-2">
                    <label for="room_type">Room Type</label>
                    <select name="room_type" id="room_type" class="form-select">
                        <option selected disabled hidden="true">Select room type</option>
                        @foreach ($guest as $guests)
                            <option value="{{$guests->room_type}}">{{$guests->room_type}}</option>
                        @endforeach
                    </select>
                    @error('room_type')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="total_guests">Total Guest</label>
                    <input class="form-control" type="number" min="1" max="20" name="total_guests" placeholder="Enter your total guest">
                    @error('total_guests')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group my-3 d-grid d-md-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">
                        Add Guest
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
