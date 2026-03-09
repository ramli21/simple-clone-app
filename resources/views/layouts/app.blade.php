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
    <link href="{{ asset('vendors/aos/aos.css') }}" rel="stylesheet">

    @stack('styles')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DGDJKW7E3Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-DGDJKW7E3Y');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W6KW4DSK');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6KW4DSK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="app">
        @include('home.components.navbar')
        {{-- Main Content --}}
        @yield('content')

        @include('home.components.footer')
    </div>

    <!-- Floating WhatsApp -->
    @if (config('app.superadmin_wa'))
        <a href="https://wa.me/{{ config('app.superadmin_wa') }}?text=Halo%20EnterpriseDev%2C%20saya%20tertarik%20konsultasi%20pembuatan%20website%20bisnis.%20Bisa%20dibantu%20infonya%3F"
            target="_blank"
            class="btn btn-success rounded-circle p-3 position-fixed bottom-0 end-0 m-4 shadow-lg z-3 d-flex align-items-center justify-content-center animate-bounce"
            style="width: 60px; height: 60px;">
            <i class="bi bi-whatsapp fs-3 text-white"></i>
        </a>
    @endif

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
