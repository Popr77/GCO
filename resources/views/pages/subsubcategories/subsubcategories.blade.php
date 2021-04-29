@extends('master.main')

@section('content')
    @component('components.subsubcategories.subsubcategories', ['subsubcategories' => $subsubcategories])
    @endcomponent
@endsection
