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
  {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'standard-form']) !!}
    @include('templates.form.input', ['label' => 'CPF','input' => 'cpf', 'attributes' => ['placeholder' => 'CPF']])
    @include('templates.form.input', ['label' => 'NAME','input' => 'name', 'attributes' => ['placeholder' => 'Name']])
    @include('templates.form.input', ['label' => 'PHONE','input' => 'phone', 'attributes' => ['placeholder' => 'Phone']])
    @include('templates.form.input', ['label' => 'E-MAIL','input' => 'email', 'attributes' => ['placeholder' => 'E-mail']])
    @include('templates.form.password', ['label' => 'PASSWORD','input' => 'password', 'attributes' => ['placeholder' => 'Password']])
    @include('templates.form.submit', ['input' => 'submit'])
  {!! Form::close() !!}

  <table class="default-table">
    <thead>
      <tr>
        <td>#</td>
        <td>CPF</td>
        <td>Name</td>
        <td>Phone</td>
        <td>Birth</td>
        <td>E-mail</td>
        <td>Status</td>
        <td>Permission</td>
        <td>Options</td>
      </tr>
    </thead>

    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->cpf }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->birth }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->status }}</td>
        <td>{{ $user->permission }}</td>
        <!--delete-->
        <td>
          {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
          {!! Form::submit('Delete') !!}
          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
