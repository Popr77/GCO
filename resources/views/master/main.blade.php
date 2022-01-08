<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GCO') }}</title>

    <!-- Scripts -->
    @yield('scripts')
    <script src="/js/app.js" defer></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body class="min-vh-100">
<div id="app" class="d-flex flex-column min-vh-100">

    @component('master.header')
    @endcomponent

    <main class="main-section">
        @yield('content')
    </main>

    @component('master.footer')
    @endcomponent


</div>
<script>

    const mediaQuery = window.matchMedia("(min-width: 992px)")

    function handleLgMediaQuery(e) {
        const cart = document.getElementById('cart')

        if(e.matches) {
            cart.remove()
            document.getElementById('navbarCollapse').append(cart)
        } else {
            cart.remove()
            document.getElementById('navToggleBtnAndCart').prepend(cart)
        }
    }

    mediaQuery.addEventListener("change", handleLgMediaQuery)

    handleLgMediaQuery(mediaQuery)
</script>
</body>
</html>
