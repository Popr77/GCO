@extends('master.main')

@section('content')
    @component('components.subcategories.subcategory-form-edit', ['subcategory' => $subcategory, 'categories' => $categories])
    @endcomponent
@endsection
