@extends('templates.master')

@section('content-view')
{!!Form::open(['route' => ['institution.product.store', $institution->id], 'method' => 'post', 'class' => 'standard-form'])  !!}
  @include('templates.form.input', ['label' => 'Product Name','input' => 'name'])
  @include('templates.form.input', ['label' => 'Product Description','input' => 'description'])
  @include('templates.form.input', ['label' => 'Product Index','input' => 'index'])
  @include('templates.form.input', ['label' => 'Interest Rate','input' => 'interest_rate'])
  @include('templates.form.submit', ['input' => 'submit'])
{!! Form::close() !!}

<table class="default-table">
  <thead>
    <th>#</th>
    <th>Name</th>
    <th>Description</th>
    <th>Index</th>
    <th>Interest Rate</th>
    <th>Options</th>
  </thead>
  <tbody>
    @forelse($institution->products as $product)
    <tr>
      <td>{{ $product->id }}</td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->description }}</td>
      <td>{{ $product->index }}</td>
      <td>{{ $product->interest_rate }}</td>
      <td>
        {!! Form::open(['route' => ['institution.product.destroy', $institution->id, $product->id], 'method' => 'DELETE']) !!}
        {!! Form::submit('Delete') !!}
        {!! Form::close() !!}
        <a href=""> Edit </a>
      </td>
    </tr>
    @empty
    <tr>
      <td>Nothing Registered, yet!</td>
    </tr>
    @endforelse
  </tbody>
</table>

@endsection
