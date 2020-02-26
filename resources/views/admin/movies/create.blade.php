@extends('layouts.admin')

@section('content')
<h1>Create Movie</h1>
@include('errors.error')

{!! Form::open(['method'=>'POST', 'action'=>'MovieController@store']) !!}

<div class="form-group col-sm-6">
  {!! Form::label('title', 'Title:') !!}
  {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
  {!! Form::label('director', 'Director:') !!}
  {!! Form::text('director', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
  {!! Form::label('duration', 'Duration:') !!}
  {!! Form::text('duration', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
  {!! Form::label('description', 'Description:') !!}
  {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
  {!! Form::submit('Create Movie', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

@endsection