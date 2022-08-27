<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Karibu kwako - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" data-turbolinks-track="true">
    <link rel="shortcut icon" href="{{ asset('app/images/logo.png')  }}">
    <link rel="stylesheet" href="{{ asset('app/swipper.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    @yield('styles')
    <script>
        var siteUrl = "{{url('/')}}";
    </script>
</head>
<body class="text-gray-500 overflow-y-auto  overflow-hidden overflow-x-hidden w-full">
@include('frontend.partials.header')
@include('frontend.components._search')
<div>
    @yield('content')
</div>

@if(request()->getPathInfo() != '/localisation')
    @include('frontend.partials.footer')
@endif
<script
    src="{{ asset('js/app.js') }}"
    data-turbolinks-track="true"
    data-turbolinks-suppress-warning></script>

<script src="{{ asset('app/swipper.js') }}"></script>
<script src="{{ asset('app/swipper-config.js') }}"></script>

@yield("scripts")
</body>
</html>
