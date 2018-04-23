@extends('templates.master')

@section('content-view')

{!!Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'standard-form'])  !!}
  @include('templates.form.input', ['label' => 'Name','input' => 'name', 'attributes' => ['placeholder' => 'Name']])
  @include('templates.form.select', ['label' => 'User','select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => 'User']])
  @include('templates.form.select', ['label' => 'Institution','select' => 'institution_id', 'data' => $institution_list, 'attributes' => ['placeholder' => 'Institution']])
  @include('templates.form.submit', ['input' => 'submit'])
{!! Form::close() !!}

<table class="default-table">
  <thead>
    <tr>
      <th>#</th>
      <th>Group Name</th>
      <th>Institution Name</th>
      <th>User Name</th>
      <th>Options</th>
    </tr>
  </thead>

  <tbody>
    @foreach($groups as $group)
    <tr>
      <td>{{ $group->id }}</td>
      <td>{{ $group->name }}</td>
      <td>{{ $group->user->name }}</td>
      <td>{{ $group->institution->name }}</td>
      <td>
        {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
        {!! Form::submit('Delete') !!}
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>

@endsection
