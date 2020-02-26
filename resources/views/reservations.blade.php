@extends('welcome')

@section('content')
<h1>Reservations</h1>
<br>

<div class="col-sm-10" style="display: inline-block">
  <table class="table table-striped" style="background-color:white">
    <thead>
      <tr>
        <th>Id</th>
        <th>User</th>
        <th>Paid</th>
        <th>Active</th>
        <th>Reserved</th>
        <th>Cancel</th>
      </tr>
    </thead>
    @if($reservations)
    <tbody>
      @foreach($reservations as $reservation)
      <tr>
        <td>{{$reservation->id}}</td>
        <td>{{$reservation->user->name}}</a></td>
        <td>{{$reservation->paid}}</td>
        <td>{{$reservation->active}}</td>
        <td>{{$reservation->reserved}}</td>
        <td>
          {!! Form::open(['method'=>'DELETE', 'action'=>['ReservationController@delete',$reservation->id]]) !!}

          <div class="form-group">
            {!! Form::submit('Cancel', ['class'=>'btn btn-info']) !!}
          </div>

          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
    @endif
  </table>
</div>
@endsection