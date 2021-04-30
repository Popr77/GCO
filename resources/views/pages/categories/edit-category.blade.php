@extends('master.main')

@section('content')
    @component('components.categories.category-form-edit', ['category' => $category])
    @endcomponent
@endsection
