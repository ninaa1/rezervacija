@extends('layouts.admin')

@section('content')

<div class="col-sm-6">
  <h1>Halls</h1>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Seat num</th>
        <th>Created</th>
        <th>Updated</th>
        @if(Auth::user()->role->name == 'admin')
        <th>Delete</th>
        @endif
      </tr>
    </thead>
    @if($halls)
    <tbody>
      @foreach($halls as $hall)
      <tr>
        <td>{{$hall->id}}</td>
        <td>
          @if(Auth::user()->role->name == 'admin')
          <a href="{{route('halls.edit', $hall->id)}}">
          @endif{{$hall->name}}</a>
        </td>
        <td>{{$hall->seats_number}}</a></td>
        <td>{{$hall->created_at->diffForHumans()}}</td>
        <td>{{$hall->updated_at->diffForHumans()}}</td>
        @if(Auth::user()->role->name == 'admin')
        <td>
          {!! Form::open(['method'=>'DELETE', 'action'=>['HallController@destroy',$hall->id]]) !!}

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