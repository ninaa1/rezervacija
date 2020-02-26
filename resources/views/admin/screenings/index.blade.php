@extends('layouts.admin')

@section('content')
<h1>Screenings</h1>
<br>

<div class="col-sm-10" style="display: inline-block">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Movie</th>
        <th>Hall</th>
        <th>Start</th>
        <th>End</th>
        <th>Price</th>
        <th>Created</th>
        <th>Updated</th>
        @if(Auth::user()->role->name == 'admin')
        <th>Delete</th>
        @endif
      </tr>
    </thead>
    @if($screenings)
    <tbody>
      @foreach($screenings as $screening)
      <tr>
        <td>
          @if(Auth::user()->role->name == 'admin')
          <a href="{{route('screenings.edit', $screening->id)}}">
          @endif{{$screening->id}}</td>
        <td>{{$screening->movie->title}}</td>
        <td>{{$screening->hall->name}}</td>
        <td>{{$screening->start}}</td>
        <td>{{$screening->end}}</td>
        <td>{{$screening->price}}</td>
        <td>{{$screening->created_at->diffForHumans()}}</td>
        <td>{{$screening->updated_at->diffForHumans()}}</td>
        @if(Auth::user()->role->name == 'admin')
        <td>
          {!! Form::open(['method'=>'DELETE', 'action'=>['ScreeningController@destroy',$screening->id]]) !!}

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