@extends('layouts.admin')

@section('content')

<h1>Edit seat</h1>
@include('errors.error')

{!! Form::model($seat, ['method'=>'PATCH', 'action'=>['SeatController@update', $seat->id]]) !!}

<div class="form-group col-sm-6">
  {!! Form::label('row', 'Row:') !!}
  {!! Form::text('row', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
  {!! Form::label('number', 'Number:') !!}
  {!! Form::text('number', null, ['class'=>'form-control']) !!}
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