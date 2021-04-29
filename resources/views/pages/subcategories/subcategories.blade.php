@extends('master.main')

@section('content')
    @component('components.subcategories.subcategories', ['subcategories' => $subcategories])
    @endcomponent
@endsection
