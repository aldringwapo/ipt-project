
@extends('pages.base')

@section('content')

<table class="table table-bordered table-striped table-sm">
    <thead>
      <th>id</th>
        <th>trainor full_name</th>
        <th>title</th>
        <th>description</th>
        <th>created_at</th>
        <th>updated_at</th>
    </thead>
    <tbody>
        @foreach ($courses as $course)
            <tr>
              <td>{{$course->id}}</td>
              <td>{{$course->trainor->user->full_name}}</td>
              <td>{{$course->title}}</td>
              <td>{{$course->description}}</td>
              <td>{{$course->created_at}}</td>
              <td>{{$course->updated_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection