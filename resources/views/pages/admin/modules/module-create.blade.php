@extends('master.dashboard.main')

@section('header')
    <dashboard-header class="ml-4 mt-2" title="Module - Lessons"></dashboard-header>
@endsection

@section('content')
    <div class="row">
        @component('components.dashboard.modules.module-form-create', ['courses' => $courses])
        @endcomponent
    </div>
@endsection
