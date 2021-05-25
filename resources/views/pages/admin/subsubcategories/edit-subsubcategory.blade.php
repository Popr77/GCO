@extends('master.dashboard.main')

@section('content')
    @component('components.dashboard.subsubcategories.subsubcategory-form-edit', ['subsubcategory' => $subsubcategory, 'subcategories' => $subcategories])
    @endcomponent
@endsection
