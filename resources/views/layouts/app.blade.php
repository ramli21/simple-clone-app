<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- @stack('metadata') --}}

    @include('partials.meta-tags')

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-dist/icons/bootstrap-icons.min.css') }}" />
    <link href="{{ asset('vendors/aos/aos.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body>
    {{-- Main Content --}}
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="{{ asset('vendors/bootstrap-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>

</html>
