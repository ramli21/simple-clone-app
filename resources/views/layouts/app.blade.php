<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('metadata')

    {{-- Tailwind CSS v4 (CDN) --}}
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    {{-- FontAwesome v6 (CDN) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-AvbJv+T9t5lX5b0yPqYQm7w7u3V9J4x2mJ2pE3h0w3mJrQx7qWb9qf8q6c8x0m2cYxw3kq1qKx1lQ1qGfQmQ0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('vendors/aos/aos.css') }}" rel="stylesheet">

    {{-- Reset dasar agar Bootstrap lama tidak merusak Tailwind --}}
    <style>
        /* Basic reset */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji",
                "Segoe UI Emoji";
            line-height: 1.5;
        }

        img,
        svg {
            display: block;
            max-width: 100%;
            height: auto;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        textarea,
        select {
            font: inherit;
        }

        /* Prevent Bootstrap container/padding from affecting layout if any CSS remains */
        .container {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    @stack('styles')

    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}" async defer></script>

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
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W6KW4DSK');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6KW4DSK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="app">
        @include('home.components.navbar')

        {{-- Main Content --}}
        @yield('content')

        @include('home.components.footer')
    </div>

    <!-- Floating WhatsApp -->
    @if (config('app.superadmin_wa'))
        <a href="https://wa.me/{{ config('app.superadmin_wa') }}?text=Halo%20AkhriTech%2C%20saya%20tertarik%20konsultasi%20pembuatan%20website%20bisnis.%20Bisa%20dibantu%20infonya%3F"
            target="_blank"
            class="btn btn-success rounded-circle p-3 position-fixed bottom-0 end-0 m-4 shadow-lg z-3 d-flex align-items-center justify-content-center animate-bounce"
            style="width: 60px; height: 60px;">
            <i class="bi bi-whatsapp fs-3 text-white"></i>
        </a>
    @endif

    {{-- Keep existing vendor scripts (AOS, etc.) --}}
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
