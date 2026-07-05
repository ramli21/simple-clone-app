<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Akhritech - Solusi Digital & Web Themes Premium</title> --}}

    @stack('metadata')

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#4f46e5', // Indigo 600
                        secondary: '#0f172a', // Slate 900
                        accent: '#06b6d4', // Cyan 500
                    }
                }
            }
        }
    </script>

    @if (config('app.env') === 'production')
        <script type="text/javascript">
            (function(c, l, a, r, i, t, y) {
                c[a] = c[a] || function() {
                    (c[a].q = c[a].q || []).push(arguments)
                };
                t = l.createElement(r);
                t.async = 1;
                t.src = "https://www.clarity.ms/tag/" + i;
                y = l.getElementsByTagName(r)[0];
                y.parentNode.insertBefore(t, y);
            })(window, document, "clarity", "script", "xggk5e7dpv");
        </script>
    @endif

    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Hero Pattern Background */
        .hero-bg {
            background-color: #ffffff;
            background-image: radial-gradient(#e0e7ff 1px, transparent 1px);
            background-size: 32px 32px;
        }
    </style>

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

<body class="text-slate-600 bg-slate-50 antialiased">

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6KW4DSK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Navbar -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 py-4 bg-white/0">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="text-2xl font-bold text-slate-900 flex items-center gap-2 group">
                    <div
                        class="w-10 h-10 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform">
                        <img src="{{ asset('./images/logo-square.png') }}" alt="Logo Akhritech" />
                    </div>
                    Akhritech
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="font-medium hover:text-primary transition-colors">Beranda</a>
                    {{-- <a href="/#about" class="font-medium hover:text-primary transition-colors">Tentang</a> --}}
                    <a href="/#services" class="font-medium hover:text-primary transition-colors">Layanan</a>
                    <a href="{{ route('products.index') }}"
                        class="font-medium hover:text-primary transition-colors text-primary">Produk</a>
                    <a href="/#portfolio" class="font-medium hover:text-primary transition-colors">Portofolio</a>
                    <a href="{{ route('blogs.index') }}"
                        class="font-medium hover:text-primary transition-colors">Blog</a>
                    <a href="/#contact"
                        class="px-5 py-2.5 bg-slate-900 text-white rounded-full font-medium hover:bg-primary transition-all shadow-md hover:shadow-lg">
                        Hubungi Kami
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-2xl text-slate-900 focus:outline-none">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div id="mobile-menu"
                class="hidden md:hidden absolute top-full left-0 w-full bg-white shadow-xl border-t border-slate-100 flex-col items-center py-4 space-y-4">
                <a href="{{ route('home') }}" class="mobile-link text-lg font-medium hover:text-primary">Beranda</a>
                <a href="/#about" class="mobile-link text-lg font-medium hover:text-primary">Tentang</a>
                <a href="/#services" class="mobile-link text-lg font-medium hover:text-primary">Layanan</a>
                <a href="{{ route('products.index') }}" class="mobile-link text-lg font-medium text-primary">Produk</a>
                <a href="/#portfolio" class="mobile-link text-lg font-medium hover:text-primary">Portofolio</a>
                <a href="/#contact" class="px-6 py-2.5 bg-slate-900 text-white rounded-full font-medium">Hubungi
                    Kami</a>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    {{-- <main class="pt-24"> --}}
    @yield('content')
    {{-- </main> --}}

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-12 border-t border-slate-800">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-md flex items-center justify-center text-white text-sm">
                        <img src="{{ asset('./images/logo-square.png') }}" alt="Logo Akhritech" />
                    </div>
                    <span class="text-xl font-bold text-white">Akhritech</span>
                </div>
                <div class="flex gap-8 text-sm">
                    <a href="{{ route('privacy-policy') }}" class="hover:text-white transition-colors">Privacy
                        Policy</a>
                    <a href="{{ route('terms-of-service') }}" class="hover:text-white transition-colors">Terms of
                        Service</a>
                    {{-- <a href="#" class="hover:text-white transition-colors">Support</a> --}}
                </div>
                <div class="text-sm">
                    &copy; 2026 Akhritech. All rights reserved.
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/{{ companyProfile()->phone }}?text=Halo%20Akhritech,%20saya%20ingin%20bertanya%20lebih%20lanjut"
        target="_blank" rel="noopener noreferrer" id="wa-float-btn"
        class="fixed bottom-20 right-6 z-50 flex items-center gap-3 group" aria-label="Chat via WhatsApp">

        {{-- Tooltip --}}
        <span
            class="hidden sm:block opacity-0 group-hover:opacity-100 translate-x-2 group-hover:translate-x-0 transition-all duration-300 bg-white text-slate-800 text-sm font-semibold px-4 py-2 rounded-xl shadow-lg whitespace-nowrap pointer-events-none border border-slate-100">
            Chat via WhatsApp
        </span>

        {{-- Button --}}
        <div
            class="relative flex items-center justify-center w-14 h-14 rounded-full bg-[#25d366] shadow-[0_8px_24px_rgba(37,211,102,0.45)] hover:shadow-[0_12px_32px_rgba(37,211,102,0.6)] hover:scale-110 transition-all duration-300">
            {{-- Pulse ring --}}
            <span class="absolute inset-0 rounded-full bg-[#25d366] animate-ping opacity-30"></span>
            <i class="fa-brands fa-whatsapp text-white text-2xl relative z-10"></i>
        </div>
    </a>

    <!-- JavaScript for Interactions -->
    <script>
        // Navbar Sticky Effect
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('fixed', 'shadow-lg', 'bg-white/90', 'backdrop-blur-md', 'py-2');
                navbar.classList.remove('py-4', 'bg-white/0');
            } else {
                navbar.classList.remove('fixed', 'shadow-lg', 'bg-white/90', 'backdrop-blur-md', 'py-2');
                navbar.classList.add('py-4', 'bg-white/0');
                // Remove fixed positioning styling at top if needed, 
                // but usually keeping it fixed ensures smooth transition back to transparent state if handled via CSS class manipulation
                // Here we keep it fixed but transparent at top via classes
            }
        });

        // Mobile Menu Toggle
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('flex');
        });

        // Close mobile menu when a link is clicked
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
            });
        });
    </script>
</body>

</html>
