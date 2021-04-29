@extends('master.main')

@section('content')
    @component('components.subsubcategories.subsubcategory-form-create', ['subcategories' => $subcategories])
    @endcomponent
@endsection
