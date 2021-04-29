@extends('master.main')

@section('content')
    @component('components.subsubcategories.subsubcategory-form-edit', ['subsubcategory' => $subsubcategory, 'subcategories' => $subcategories])
    @endcomponent
@endsection
