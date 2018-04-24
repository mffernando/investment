@extends('templates.master')

@section('content-view')

<header>
  <h1>{{ $institution->name }}</h1>
</header>

@include('groups.list', ['group_list' => $institution->groups])

@endsection
