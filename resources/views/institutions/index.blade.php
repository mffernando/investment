@extends('templates.master')

@section('content-view')

  @if(session('success'))
    <h3>{{ session('success')['message'] }}</h3>
  @endif

{!!Form::open(['route' => 'institution.store', 'method' => 'post', 'class' => 'standard-form'])  !!}
@include('templates.form.input', ['label' => 'Name','input' => 'name', 'attributes' => ['placeholder' => 'Name']])
@include('templates.form.submit', ['input' => 'submit'])
{!! Form::close() !!}

<table class="default-table">
  <thead>
    <tr>
      <th>#</th>
      <th>Institution Name</th>
      <th>Options</th>
    </tr>
  </thead>
  @foreach($institutions as $institution)
  <tbody>
    <tr>
      <td>{{ $institution->id }}</td>
      <td>{{ $institution->name }}</td>
      <td>
        {!! Form::open(['route' => ['institution.destroy', $institution->id], 'method' => 'DELETE']) !!}
        {!! Form::submit("Delete") !!}
        {!! Form::close() !!}
        <a href="{{ route('institution.show', $institution->id) }}">More</a>
        <a href="{{ route('institution.edit', $institution->id) }}">Edit</a>
        <a href="{{ route('institution.product.index', $institution->id) }}">Products</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
