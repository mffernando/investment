@extends('templates.master')

@section('content-view')
{!!Form::open(['route' => ['institution.product.store', $institution->id], 'method' => 'post', 'class' => 'standard-form'])  !!}
  @include('templates.form.input', ['label' => 'Product Name','input' => 'name'])
  @include('templates.form.input', ['label' => 'Product Description','input' => 'description'])
  @include('templates.form.input', ['label' => 'Product Index','input' => 'index'])
  @include('templates.form.input', ['label' => 'Interest Rate','input' => 'interest_rate'])
  @include('templates.form.submit', ['input' => 'submit'])
{!! Form::close() !!}

@endsection
