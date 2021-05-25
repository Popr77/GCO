@extends('master.dashboard.main')

@section('content')
    @component('components.dashboard.subcategories.subcategory-form-edit', ['subcategory' => $subcategory, 'categories' => $categories])
    @endcomponent
@endsection
