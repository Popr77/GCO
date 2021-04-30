@extends('master.main')

@section('content')
    @component('components.subcategories.subcategory-form-create', ['categories' => $categories])
    @endcomponent
@endsection
