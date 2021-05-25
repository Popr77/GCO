@extends('master.dashboard.main')

@section('content')
    @component('components.dashboard.categories.category-form-edit', ['category' => $category])
    @endcomponent
@endsection
