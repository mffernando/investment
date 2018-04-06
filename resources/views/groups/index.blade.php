@extends('templates.master')

@section('content-view')

{!!Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'standard-form'])  !!}
  @include('templates.form.input', ['label' => 'Name','input' => 'name', 'attributes' => ['placeholder' => 'Name']])
  @include('templates.form.select', ['label' => 'User','select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => 'User']])
  @include('templates.form.select', ['label' => 'Institution','select' => 'institution_id', 'data' => $institution_list, 'attributes' => ['placeholder' => 'Institution']])
  @include('templates.form.submit', ['input' => 'submit'])
{!! Form::close() !!}

@endsection
