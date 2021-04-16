@extends('master.main')

@section('content')
    <h1>{{ $course->name }}</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Library</a></li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
@endsection
