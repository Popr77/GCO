@extends('master.main')

@section('content')

@component('components.unregistered', ['search' => $search, 'categories' => $categories])
@endcomponent

@endsection
