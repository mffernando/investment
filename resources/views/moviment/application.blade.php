@extends('templates.master')

@section('content-view')

  {!!Form::open(['route' => 'institution.store', 'method' => 'post', 'class' => 'standard-form'])  !!}
  @include('templates.form.select', ['label' => 'Group','select' => 'group_id', 'data' => $group_list, 'attributes' => ['placeholder' => 'Group']])
  @include('templates.form.select', ['label' => 'Product','select' => 'product_id', 'data' => $product_list, 'attributes' => ['placeholder' => 'Product']])
  @include('templates.form.input', ['label' => 'Value','input' => 'name', 'attributes' => ['placeholder' => 'Value']])
  @include('templates.form.submit', ['input' => 'submit'])
  {!! Form::close() !!}

@endsection
