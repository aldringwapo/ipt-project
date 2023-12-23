
@extends('pages.base')

@section('content')

<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteUserModalLabel">
                    Delete Room - {{$room->id}} ?
                </h1>
                <button class="btn-close" type="button"  data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('room/delete/' . $room->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                Are you sure you want to delete this room?
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button  type="submit" class="btn btn-danger">Delete Room</button>
            </div>
            </form>
        </div>
    </div>
</div>
    <h1 class="text-center mb-4">Edit Room</h1>
<div class="row">
    <div class="col-md-5">
        <form action="{{ url('room/' . $room->id) }}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="room_no">Room Number</label>
                <input class="form-control" type="text" name="room_no" placeholder="Room Number" value="{{ $room->room_no }}">
                @error('room_no')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
                <div class="form-group mt-2">
                    <label for="room_type">Room Type</label>
                    <input class="form-control" type="text" name="room_type" placeholder="Room Type 1-100" min="1" max="100" value="{{ $room->room_type }}">
                @error('room_type')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="occupancy_limit">Occupancy Limit</label>
                    <input class="form-control" type="number" min="1" max="12" name="occupancy_limit" placeholder="1 to 12 max" value="{{$room->occupancy_limit}}">
                    @error('occupancy_limit')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="price">Price</label>
                    <input class="form-control" type="number" pattern="[0-9]" min="1000" max="100000" name="price" value="{{$room->price}}">
                    @error('price')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="is_available">Availability</label>
                    <input class="form-control" type="text" name="is_available" value="{{$room->is_availabile}}">
                    @error('is_available')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group my-3 d-grid d-md-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">
                    Update Room
                </button>
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                    Delete Room
                </button>
                </div>
            </form>
        </div>
    </div>

    


@endsection