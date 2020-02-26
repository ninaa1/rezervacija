@extends('layouts.admin')

@section('content')

<h1>Create seat</h1>
@include('errors.error')

{!! Form::open(['method'=>'POST', 'action'=>'SeatController@store']) !!}

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
  {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

@endsection