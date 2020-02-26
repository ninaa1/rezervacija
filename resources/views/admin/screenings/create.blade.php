@extends('layouts.admin')

@section('content')

<h1>Create screening</h1>
@include('errors.error')

{!! Form::open(['method'=>'POST', 'action'=>'ScreeningController@store']) !!}

<div class="form-group col-sm-6">
  <label for="start">Start</label>
  <div>
    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" name="start">
  </div>
</div>


<div class="form-group col-sm-6">
  <label for="end">End</label>
  <div>
    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" name="end">
  </div>
</div>

<div class="form-group col-sm-6">
  {!! Form::label('price', 'Price:') !!}
  {!! Form::text('price', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
  {!! Form::label('movie_id', 'Movie:') !!}
  {!! Form::select('movie_id', ['' => 'Choose movie'] + $movies, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
  {!! Form::label('hall_id', 'Halls:') !!}
  {!! Form::select('hall_id', ['' => 'Choose hall'] + $halls, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

@endsection