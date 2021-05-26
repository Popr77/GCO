@extends('master.dashboard.main')

@section('header')
    <dashboard-header title="Overview"></dashboard-header>
@endsection

@section('content')
    <div class="row">
        @component('components.dashboard.modules.module-form-show', ['module' => $module])
        @endcomponent
    </div>
@endsection

@section('scripts')
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
@endsection
