<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WEB3</title>
        <meta name="description" content="TravelMate - Travel from home">
        <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon"/>
        <!-- Fonts -->

        <!-- Styles -->
        <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/normalize.css@8.0.0/normalize.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    </head>

    <body>
        @include('includes.nav')
<div>
        @yield('content')
</div>
        @include('includes.footer')
    </body>
</html>
