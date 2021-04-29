@extends('master.main')

@section('content')
    @component('components.categories.categories', ['categories' => $categories])
    @endcomponent
@endsection
