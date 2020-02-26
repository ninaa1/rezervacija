@extends('layouts.admin')

@section('content')
<h1>Movies</h1>
<br>

<div class="col-sm-10" style="display: inline-block">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Director</th>
        <th>Duration</th>
        <th>Description</th>
        <th>Created</th>
        <th>Updated</th>
        @if(Auth::user()->role->name == 'admin')
        <th>Delete</th>
        @endif
      </tr>
    </thead>
    @if($movies)
    <tbody>
      @foreach($movies as $movie)
      <tr>
        <td>{{$movie->id}}</td>
        <td>
          @if(Auth::user()->role->name == 'admin')
          <a href="{{route('movies.edit', $movie->id)}}">
          @endif{{$movie->title}}</a></td>
        <td>{{$movie->director}}</td>
        <td>{{$movie->duration}}</td>
        <td>{{$movie->description}}</td>
        <td>{{$movie->created_at->diffForHumans()}}</td>
        <td>{{$movie->updated_at->diffForHumans()}}</td>
        @if(Auth::user()->role->name == 'admin')
        <td>
          {!! Form::open(['method'=>'DELETE', 'action'=>['MovieController@destroy',$movie->id]]) !!}

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