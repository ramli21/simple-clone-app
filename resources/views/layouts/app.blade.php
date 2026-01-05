<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('metadata')

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-dist/icons/bootstrap-icons.min.css') }}" />

    @stack('styles')
</head>

<body>
    {{-- Main Content --}}
    @yield('content')

    <script src="{{ asset('vendors/bootstrap-dist/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
