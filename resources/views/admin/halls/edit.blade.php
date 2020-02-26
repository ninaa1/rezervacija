@extends('layouts.admin')

@section('content')
<h1>Edit Hall</h1>
@include('errors.error')

{!! Form::model($hall, ['method'=>'PATCH', 'action'=>['HallController@update', $hall->id]]) !!}

<div class="form-group">
  {!! Form::label('name', 'Name:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('seats_number', 'Seats number:') !!}
  {!! Form::text('seats_number', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::submit('Edit Hall', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

@endsection