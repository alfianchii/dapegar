<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/logo.svg') }}" type="image/x-icon" />

    @include('extensions.sweetalert.link')
    @vite('resources/css/app.css')
    @yield('additional_links')
</head>

<body class="h-screen overflow-x-hidden">
    {{-- Navbar --}}
    @include('pages.landing-page.layouts.navbar')

    <div class="px-8 2xl:px-[295px] flex items-center justify-center h-[80vh]">
        @yield('content')

        {{-- Footer --}}
        @include('pages.landing-page.layouts.footer')
    </div>

    @include('extensions.sweetalert.script')
    @vite(['resources/js/app.js'])
    @yield('additional_scripts')
    {{-- Sweetalert --}}
    @include('sweetalert::alert')
</body>

</html>
