@extends('master.dashboard.main')

@section('header')
    <dashboard-header title="Course Modules"></dashboard-header>
@endsection

@section('content')
    <div class="row">
        @component('components.dashboard.modules.modules-list', ['modules' => $modules])
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

