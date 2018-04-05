@extends('templates.master')

@section('content-view')

{!!Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'standard-form'])  !!}
  @include('templates.form.input', ['label' => 'Name','input' => 'name', 'attributes' => ['placeholder' => 'Name']])
  @include('templates.form.input', ['label' => 'User','input' => 'user_id', 'attributes' => ['placeholder' => 'User']])
  @include('templates.form.input', ['label' => 'Institution','input' => 'institution_id', 'attributes' => ['placeholder' => 'Institution']])
  @include('templates.form.submit', ['input' => 'submit'])
{!! Form::close() !!}

@endsection
