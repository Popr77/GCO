@extends('master.dashboard.main')

@section('header')
    <div class="d-flex">
        <div><a class="a-back-button" href="javascript:history.back()" >
                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="black" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
                </svg>
            </a></div>
        <dashboard-header title="Course Modules"></dashboard-header>
    </div>
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

