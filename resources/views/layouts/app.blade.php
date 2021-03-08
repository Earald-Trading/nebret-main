<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="back">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nibret') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(View::hasSection('style'))
        @yield('style')
    @endif
</head>
<body class="antialiased back">
    <script src="{{ asset('js/app.js') }}"></script>

    <div class="relative flex" id="app">
        @include('inc.navbar')

        <main>
            <form method="POST" id="locale_form" action="{{ route('locale') }}">
                @csrf
                <input type="hidden" id="locale_name" name="locale" />
            </form>
            <button class="btn btn-outline-info" onclick="changelocale('am');">Amharic</button>
            <button class="btn btn-outline-info" onclick="changelocale('en');">English</button>

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
