
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta http-equiv="refresh" content="60">
    <link rel="shortcut icon" href="{{ asset('app/images/logo.png')  }}">
    <link rel="stylesheet" href="{{ asset('app/css/tailwind.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    @yield('styles')
    @livewireStyles
</head>
<body class="text-gray-500">
    @include('apps.partials.header')
    @yield('content')
    <script src="{{ asset('app/js/app.js') }}"></script>
    @yield('scripts')
    @livewireStyles
</body>
</html>
