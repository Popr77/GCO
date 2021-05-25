@extends('master.dashboard.main')

@section('header')
    <dashboard-header title="Create Module"></dashboard-header>
@endsection

@section('content')
    <div class="row">
        @component('components.dashboard.modules.module-form-create', ['courses' => $courses])
        @endcomponent
    </div>
@endsection
