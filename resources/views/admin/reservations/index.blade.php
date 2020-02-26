@extends('layouts.admin')

@section('content')
<h1>Reservations</h1>
<br>

<div class="col-sm-10" style="display: inline-block">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>User</th>
        <th>Paid</th>
        <th>Active</th>
        <th>Reserved</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Delete</th>
        <th>Pay</th>
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
        <td>{{$reservation->created_at->diffForHumans()}}</td>
        <td>{{$reservation->updated_at->diffForHumans()}}</td>
        <td>
          {!! Form::open(['method'=>'DELETE', 'action'=>['ReservationController@destroy',$reservation->id]]) !!}

          <div class="form-group">
            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
          </div>

          {!! Form::close() !!}
        </td>
        @if($reservation->paid)
        <td>Paid</td>
        @else
        <td>
          {!! Form::open(['method'=>'POST', 'action'=>['ReservationController@pay',$reservation->id]]) !!}

          <div class="form-group">
            {!! Form::submit('Pay', ['class'=>'btn btn-info']) !!}
          </div>

          {!! Form::close() !!}
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
    @endif
  </table>
</div>
@endsection