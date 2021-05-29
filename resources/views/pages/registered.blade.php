@extends('master.main')

@section('content')

@component('components.registered', ['categories' => $categories, 'search' => $search])
@endcomponent

@endsection

@section('styles')
<style>
    .user-photo {
        border: 5px solid var(--light);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        width: 150px;
        height: 150px;
    }
</style>
@endsection
