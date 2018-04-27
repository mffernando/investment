@extends('templates.master')

@section('content-view')

  @if(session('success'))
    <h3>{{ session('success')['message'] }}</h3>
  @endif

{!!Form::model($institution, ['route' => ['institution.update', $institution->id], 'method' => 'put', 'class' => 'standard-form'])  !!}
@include('templates.form.input', ['label' => 'Name','input' => 'name', 'attributes' => ['placeholder' => 'Name']])
@include('templates.form.submit', ['input' => 'update'])
{!! Form::close() !!}

@endsection
