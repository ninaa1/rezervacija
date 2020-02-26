@extends('layouts.admin')

@section('content')

<h1>Edit screening</h1>
@include('errors.error')

{!! Form::model($screening, ['method'=>'PATCH', 'action'=>['ScreeningController@update', $screening->id]]) !!}

<div class="form-group col-sm-6">
  <label for="start">Start</label>
  <div>
    <input class="form-control" type="datetime-local" value='{{ date("Y-m-d", strtotime($screening->start)) . "T" . date("H:i:s", strtotime($screening->start))}}' name="start">
  </div>
</div>


<div class="form-group col-sm-6">
  <label for="end">End</label>
  <div>
    <input class="form-control" type="datetime-local" value='{{ date("Y-m-d", strtotime($screening->end)) . "T" . date("H:i:s", strtotime($screening->end))}}' name="end">
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
  {!! Form::submit('Edit', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

@endsection