@extends('layouts.admin')

@section('content')

<div class="col-sm-6">
  <h1>Create Hall</h1>
  @include('errors.error')
  {!! Form::open(['method'=>'POST', 'action'=>'HallController@store']) !!}

  <div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('seats_number', 'Seats Number:') !!}
    {!! Form::text('seats_number', null, ['class'=>'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::submit('Create Hall', ['class'=>'btn btn-primary']) !!}
  </div>

  {!! Form::close() !!}
</div>

@endsection