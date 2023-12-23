
@extends('pages.base')

@section('content')
    <h1>Add new room</h1>
    <div class="row">
        <div class="col-md-5">
            <form action="{{url('room/create')}}" method="POST">
                @csrf 
                <div class="form-group mt-2">
                    <label for="room_no">Room Number</label>
                    <input class="form-control" type="number" name="room_no" max="1000" placeholder="Room number to 1000">
                    @error('room_no')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="room_type">Room Type</label>
                    <select name="room_type" id="room_type" class="form-select">
                        <option selected disabled hidden="true">Select room type</option>
                        @foreach ($room as $rooms)
                            <option value="{{$rooms->room_type}}">{{$rooms->room_type}}</option>
                        @endforeach
                    </select>
                    @error('room_type')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="occupancy_limit">Occupancy Limit</label>
                    <input class="form-control" type="number" min="1" max="12" name="occupancy_limit" placeholder="1 to 12 only">
                    @error('occupancy_limit')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="price">Price</label>
                    <input class="form-control" type="number" pattern="[0-9]" min="1" max="100000" name="price" placeholder="1000 to 900000">
                    @error('price')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="is_available">Availability</label>
                    <select name="is_available" id="is_available" class="form-select">
                        @foreach ($room as $rooms)
                            <option selected>{{$rooms->is_available}}</option>
                            @endforeach
                    </select>
                    @error('is_available')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group my-3 d-grid d-md-flex justify-content-end">
                    <button class="btn btn-primary me-md-2 mt-2" type="submit">
                        Add room</button>
                </div>
            </form>
        </div>
    </div>

    


@endsection