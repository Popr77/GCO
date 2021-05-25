@extends('master.dashboard.main')

@section('content')
    @component('components.dashboard.subsubcategories.subsubcategory-form-create', ['subcategories' => $subcategories])
    @endcomponent
@endsection
