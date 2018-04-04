@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('content-view')

<!--form-->
  {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'standard-form']) !!}
    @include('templates.form.input', ['label' => 'CPF','input' => 'cpf', 'attributes' => ['placeholder' => 'CPF']])
    @include('templates.form.input', ['label' => 'NAME','input' => 'name', 'attributes' => ['placeholder' => 'Name']])
    @include('templates.form.input', ['label' => 'PHONE','input' => 'phone', 'attributes' => ['placeholder' => 'Phone']])
    @include('templates.form.input', ['label' => 'E-MAIL','input' => 'email', 'attributes' => ['placeholder' => 'E-mail']])
    @include('templates.form.password', ['label' => 'PASSWORD','input' => 'password', 'attributes' => ['placeholder' => 'Password']])
    @include('templates.form.submit', ['input' => 'submit'])
  {!! Form::close() !!}


@endsection
