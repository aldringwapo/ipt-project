
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
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" class="form-control" value="{{$booking->full_name}}">
                @error('full_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="{{$booking->username}}">
                @error('username')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" value="{{$booking->email}}">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group my-3 d-grid gap 2 d-md-flex justify-content-end">
                <button type="button" class="btn btn-danger me-md-2 mt-2" data-bs-toggle="modal" data-bs-target="#deleteUserModal">Delete User</button>
                <button class="btn btn-primary me-md-2 mt-2" type="submit">Edit User</button>
            </div>
        </form>
    </div>
</div>

@endsection
