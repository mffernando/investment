@extends('templates.master')

@section('content-view')

<header>
  <h1>Group Name: {{ $group->name }}</h1>
  <h2>Institution Name: {{ $group->institution->name }}</h2>
  <h2>User Name: {{ $group->user->name }}</h2>
</header>

{!!Form::open(['route' => ['group.user.store', $group->id], 'method' => 'post', 'class' => 'standard-form'])  !!}
  @include('templates.form.select', ['label' => 'User','select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => 'User']])
  @include('templates.form.submit', ['input' => 'submit to: ' . $group->name ])
{!! Form::close() !!}

@endsection
