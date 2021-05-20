@extends('master.main')

@section('content')

@component('components.registered', ['courses' => $courses, 'categories' => $categories])
@endcomponent

@endsection
