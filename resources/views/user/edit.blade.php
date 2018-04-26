@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('content-view')

  @if(session('success'))
    <h3>{{ session('success')['message'] }}</h3>
  @endif

<!--form-->
  {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'standard-form']) !!}
    @include('user.form-fields')
    @include('templates.form.submit', ['input' => 'update'])
  {!! Form::close() !!}

@endsection
