@extends('master.dashboard.main')

@section('content')
    @component('components.dashboard.subcategories.subcategory-form-create', ['categories' => $categories])
    @endcomponent
@endsection
