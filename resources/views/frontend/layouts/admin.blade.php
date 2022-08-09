<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Une partie d'administration pour la gestion d'un {{ config('app.name') }}">
    <link rel="shortcut icon" href="{{ asset('app/images/logo.png') }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('admins/css/dashlite.css') }}">
    @yield('styles')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar">
    <div class="nk-app-root">
        <div class="nk-main">
            @include('backend.partials.sidebar')
            <div class="nk-wrap">
                @include('backend.partials.header')
                <div class="nk-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                @include('backend.partials.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('admins/js/bundle.js') }}"></script>
    <script src="{{ asset('admins/js/scripts.js') }}"></script>
    @include('sweetalert::alert')
    @yield('scripts')
</body>
</html>
