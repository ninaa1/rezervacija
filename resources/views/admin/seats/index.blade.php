@extends('layouts.admin')

@section('content')
<h1>Seats</h1>
<br>

<div class="col-sm-10" style="display: inline-block">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Row</th>
        <th>Number</th>
        <th>Hall</th>
        <th>Created</th>
        <th>Updated</th>
        @if(Auth::user()->role->name == 'admin')
        <th>Delete</th>
        @endif
      </tr>
    </thead>
    @if($seats)
    <tbody>
      @foreach($seats as $seat)
      <tr>
        <td>
          @if(Auth::user()->role->name == 'admin')
          <a href="{{route('seats.edit', $seat->id)}}">
          @endif{{$seat->id}}</td>
        <td>{{$seat->row}}</td>
        <td>{{$seat->number}}</td>
        <td>{{$seat->hall->name}}</td>
        <td>{{$seat->created_at->diffForHumans()}}</td>
        <td>{{$seat->updated_at->diffForHumans()}}</td>
        @if(Auth::user()->role->name == 'admin')
        <td>
          {!! Form::open(['method'=>'DELETE', 'action'=>['SeatController@destroy',$seat->id]]) !!}

          <div class="form-group">
            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
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