@extends('master.main')

@section('content')

@component('components.registered', ['categories' => $categories])

@endcomponent

@endsection
