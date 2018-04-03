@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('content-view')

<!--form-->
  {!! Form::open(['method' => 'post', 'class' => 'standard-form']) !!}
    @include('templates.form.input', ['input' => 'cpf', 'attributes' => ['placeholder' => 'CPF']])
    @include('templates.form.input', ['input' => 'name', 'attributes' => ['placeholder' => 'NAME']])
    @include('templates.form.input', ['input' => 'phone', 'attributes' => ['placeholder' => 'PHONE']])
    @include('templates.form.input', ['input' => 'email', 'attributes' => ['placeholder' => 'E-MAIL']])
    @include('templates.form.password', ['input' => 'password', 'attributes' => ['placeholder' => 'PASSWORD']])
    @include('templates.form.submit', ['input' => 'Submit'])
  {!! Form::close() !!}


@endsection
