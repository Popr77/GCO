<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @yield('styles')

</head>
<body>
<div id="app">
    <div id="wrapper" class="d-flex">
        @component('master.dashboard.sidebar')
        @endcomponent

        <div id="page-content-wrapper">
            @component('master.dashboard.navbar')
            @endcomponent

            <div class="container-fluid py-4 px-3 px-md-5">
                @yield('header')
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible alert-box" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->

<script src="/js/app.js" defer></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

@yield('scripts')

</body>
</html>
