<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="that especially build for developers and programmers.">
    <link rel="shortcut icon" href="{{ asset('app/images/logo.png') }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body class="overflow-hidden overflow-y-auto min-h-screen  bg-[#F9FAFB] flex items-center justify-center md:flex-none py-10">
<div class="w-full h-full z-100 flex justify-center">
    <div class="w-full flex justify-center md:justify-start px-4 small:px-6 md:px-10 lg:px-8 z-50">
        <div class="z-100 w-full max-w-md mx-auto flex flex-col items-center gap-4">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ assert('js/app.js') }}"></script>
</body>
</html>
