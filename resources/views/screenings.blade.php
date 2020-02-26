@extends('welcome')

@section('content')
<h1>Screenings</h1>
<br>

<div class="col-sm-10" style="display: inline-block">
  <table class="table table-striped" style="background-color:white">
    <thead>
      <tr>
        <th>Id</th>
        <th>Movie</th>
        <th>Hall</th>
        <th>Price</th>
        <th>Start</th>
        <th>End</th>

        <th>Reserve</th>
      </tr>
    </thead>
    @if($screenings)
    <tbody>
      @foreach($screenings as $screening)
      <tr>
        <td>{{$screening->id}}</td>
        <td>{{$screening->movie->title}}</td>
        <td>{{$screening->hall->name}}</td>
        <td>{{$screening->price}}</td>
        <td>{{$screening->start}}</td>
        <td>{{$screening->end}}</td>
        <td><a href="{{route('reservations', $screening->id)}}">
          <div class="form-group">
            {!! Form::button('Reserve', ['class'=>'btn btn-info']) !!}
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
    @endif
  </table>
</div>
@endsection