<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="back">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nebret') }}</title>
    <meta name="description" content="Nebret Property Management is a pioneering asset management company, coming to light young. It aims to give ease of access in the current trade of real estate business.">
    <meta name="keywords" content="nebret property management, nebret, property, management, asset, asset management, real estate, real estate, brokers, agents, real estate brokers, real estate agents, sell and buy, sell, buy, house, home, appartment, villa, town house, commerical, building, rent, local, addis ababa, addis-ababa, addisababa, ethiopia">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

    <!-- Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{config('app.url')}}favicon.png" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(View::hasSection('style'))
        @yield('style')
    @endif
</head>
<body class="antialiased bg-img">
    <script src="{{ asset('js/app.js') }}"></script>

    <div class="relative flex" id="app">
        @include('inc.navbar')

        <main>
            @include('inc.messages')

            @yield('content')

        </main>

        @include('inc.footer')
    </div>
    <script>
        jQuery(document).ready(function () {
            jQuery(".back").append(
                "<ul class='circles'><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li></ul>"
            );
        });
        function changelocale(locale) {
            document.getElementById('locale_name').value = locale;
            $('#locale_form').submit();
        }
    </script>
</body>
</html>
