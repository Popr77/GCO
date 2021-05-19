@extends('master.main')

@section('content')
    @component('components.lessons.lessons-list', ['lessons' => $lessons])
    @endcomponent
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
