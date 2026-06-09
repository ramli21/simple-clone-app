@extends('layouts.app')

@push('metadata')
    <!-- SEO Meta Tags -->
    <title>Akhritech | Jasa Pembuatan Aplikasi & Solusi Digital Bisnis</title>
    <meta name="description"
        content="Akhritech menyediakan solusi software SaaS & Jasa Web Development profesional untuk digitalisasi bisnis Anda. Berpengalaman 10+ tahun dalam mengembangkan sistem aplikasi berbasis website.">
    <meta name="keywords"
        content="fullstack developer, Laravel, Next.js, SaaS founder, web developer, software architect, Indonesia, POS system, mesin absensi, attendance machine, Hajj Umrah system, travel tech, digital products, startup Indonesia, software house, web development services, custom software, business solutions, SabilSys, Akhritech">
    <meta name="author" content="Akhritech">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Akhritech | Jasa Pembuatan Aplikasi & Solusi Digital Bisnis">
    <meta property="og:description"
        content="Akhritech menyediakan solusi software SaaS & Jasa Web Development profesional untuk digitalisasi bisnis Anda. Berpengalaman 10+ tahun dalam mengembangkan sistem aplikasi berbasis website.">
    <meta property="og:image" content="{{ asset('images/akhritech-banner.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Akhritech | Jasa Pembuatan Aplikasi & Solusi Digital Bisnis">
    <meta property="twitter:description"
        content="Akhritech menyediakan solusi software SaaS & Jasa Web Development profesional untuk digitalisasi bisnis Anda. Berpengalaman 10+ tahun dalam mengembangkan sistem aplikasi berbasis website.">
    <meta property="twitter:image" content="{{ asset('images/akhritech-banner.png') }}">

    <link rel="canonical" href="{{ url()->current() }}">
@endpush

@push('styles')
    <style>
        .btn-primary-custom {
            background: #197c93;
            color: white;
            padding: 14px 32px;
            border-radius: 12px;
            font-weight: 650;
            text-decoration: none;
            transition: all 0.25s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 10px 25px -5px rgba(25, 124, 147, 0.25);
        }

        .btn-primary-custom:hover {
            background: #156a7d;
            transform: translateY(-2px);
            box-shadow: 0 18px 34px -10px rgba(25, 124, 147, 0.35);
            color: white;
        }

        .hero-section {
            min-height: 92vh;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 80%;
            height: 150%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-headline {
            font-size: clamp(2rem, 4vw, 3.5rem);
            font-weight: 800;
            line-height: 1.1;
            color: #ffffff;
        }

        .hero-subheadline {
            font-size: 1.125rem;
            color: #94a3b8;
            line-height: 1.7;
            max-width: 540px;
        }

        .card-soft {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 1rem;
            box-shadow: 0 18px 40px -20px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(226, 232, 240, 1);
        }

        .rounded-2xl-border {
            border: 1px solid rgba(226, 232, 240, 1);
            border-radius: 1rem;
        }

        @media (max-width: 576px) {
            .hero-subheadline {
                font-size: 1rem;
            }
        }
    </style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="hero-section">
        <div class="mx-auto max-w-7xl px-4 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-6">
                    <div data-aos="fade-up">
                        <h1 class="hero-headline">
                            Transforming Code into Business Growth.
                        </h1>
                        <p class="hero-subheadline mt-5" data-aos="fade-up" data-aos-delay="100">
                            Hi, I'm a Senior Fullstack Developer & Founder of Akhritech.
                            I specialize in crafting high-performance systems and digital products that solve real-world
                            business problems.
                        </p>

                        <div class="mt-8" data-aos="fade-up" data-aos-delay="200">
                            <a href="#products" class="btn-primary-custom">
                                <i class="fa-solid fa-sparkles"></i>
                                Explore My Products
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="relative">
                        <img src="{{ asset('images/undraw_building.png') }}" alt="Akhritech - Developer Founder"
                            class="w-full max-w-xl mx-auto rounded-2xl border border-white/10 shadow-2xl" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Products Section --}}
    <section id="products" class="py-16 bg-white">
        <div class="mx-auto max-w-7xl px-4">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 text-center mb-12" data-aos="fade-up">
                Built by Akhritech
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Product Card 1 --}}
                <div class="" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="bg-white rounded-2xl border border-slate-100 p-8 shadow-sm hover:-translate-y-1 transition-all duration-300">
                        <div
                            class="w-16 h-16 rounded-xl bg-gradient-to-br from-[#197c93] to-[#156a7d] flex items-center justify-center mb-6">
                            <i class="fa-solid fa-earth-americas text-white text-2xl"></i>
                        </div>

                        <h3 class="text-2xl font-bold text-slate-900">SabilSys</h3>
                        <p class="text-slate-500 mt-1">Solusi Automasi Bisnis Travel Haji & Umroh</p>

                        <p class="text-slate-600 leading-relaxed mt-5">
                            Optimalkan operasional biro travel Anda dengan sistem manajemen jamaah yang cerdas. Mulai dari
                            pendaftaran online, pengelolaan manifest, hingga pelaporan keuangan real-time—semua dirancang
                            untuk memangkas waktu kerja admin Anda hingga <b>50%</b> dan meminimalisir kesalahan data.
                        </p>

                        <p class="font-bold text-slate-900 mt-5">Fitur Unggulan</p>

                        <div class="flex flex-wrap gap-2 mt-3">
                            <span
                                class="bg-slate-50 text-slate-700 border border-slate-100 px-3 py-1 rounded-lg text-sm font-medium">Automasi
                                Manifest</span>
                            <span
                                class="bg-slate-50 text-slate-700 border border-slate-100 px-3 py-1 rounded-lg text-sm font-medium">Cloud-Based
                                System</span>
                            <span
                                class="bg-slate-50 text-slate-700 border border-slate-100 px-3 py-1 rounded-lg text-sm font-medium">Landing
                                Page</span>
                            <span
                                class="bg-slate-50 text-slate-700 border border-slate-100 px-3 py-1 rounded-lg text-sm font-medium">Manajemen
                                Jamaah</span>
                        </div>

                        <div class="mt-8">
                            <a href="{{ route('home.products.sabilsys') }}"
                                class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-[#197c93] text-white font-semibold shadow-sm shadow-indigo-100 hover:bg-[#156a7d] transition-all duration-200">
                                Pelajari lebih lanjut
                                <i class="fa-solid fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Product Card 2 --}}
                <div data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="bg-white rounded-2xl border border-slate-100 p-8 shadow-sm hover:-translate-y-1 transition-all duration-300">
                        <div
                            class="w-16 h-16 rounded-xl bg-gradient-to-br from-slate-900 to-slate-800 flex items-center justify-center mb-6">
                            <i class="fa-solid fa-rocket text-white text-2xl"></i>
                        </div>

                        <h3 class="text-2xl font-bold text-slate-900">Upcoming Innovation</h3>
                        <p class="text-slate-600 leading-relaxed mt-5">
                            Solving [Masalah X] for [Market Y]. Stay tuned for the next breakthrough solution from
                            Akhritech.
                        </p>

                        <div class="flex flex-wrap gap-2 mt-5">
                            <span
                                class="bg-slate-50 text-slate-700 border border-slate-100 px-3 py-1 rounded-lg text-sm font-medium">Coming
                                Soon</span>
                            <span
                                class="bg-slate-50 text-slate-700 border border-slate-100 px-3 py-1 rounded-lg text-sm font-medium">Innovation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal + sections berikut masih menggunakan komponen Blade lama --}}
    {{-- Untuk memastikan tidak merusak behaviour bootstrap modal saat ini, struktur modal dibiarkan. Anda dapat konversi bertahap setelah ini. --}}
    @include('home.components.modal-sabilsys')

    {{-- Services/Testimonial/Portfolio tetap di-include seperti sebelumnya --}}
    @include('../components/service-section')
    @include('../components/testimonial')
    @include('../components/portfolio')

    {{-- Professional Expertise Section (Tailwind) --}}
    <section class="bg-slate-50 py-16">
        <div class="mx-auto max-w-7xl px-4">
            <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 text-center mb-10" data-aos="fade-up">
                10+ Years of Engineering Excellence
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                <div class="bg-white rounded-2xl border border-slate-100 p-8 text-center shadow-sm" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="w-20 h-20 mx-auto rounded-full bg-slate-900 flex items-center justify-center mb-5">
                        <i class="fa-solid fa-diagram-project text-white text-3xl"></i>
                    </div>
                    <h4 class="font-bold text-xl text-slate-900">System Architecture</h4>
                    <p class="text-slate-600 mt-3 leading-relaxed">
                        Designing robust systems from inception to release, ensuring scalability and maintainability.
                    </p>
                </div>

                <div class="bg-white rounded-2xl border border-slate-100 p-8 text-center shadow-sm" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="w-20 h-20 mx-auto rounded-full bg-slate-900 flex items-center justify-center mb-5">
                        <i class="fa-solid fa-code text-white text-3xl"></i>
                    </div>
                    <h4 class="font-bold text-xl text-slate-900">Fullstack Mastery</h4>
                    <p class="text-slate-600 mt-3 leading-relaxed">
                        Experts in Laravel & Next.js ecosystem, delivering end-to-end solutions with precision.
                    </p>
                </div>

                <div class="bg-white rounded-2xl border border-slate-100 p-8 text-center shadow-sm" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="w-20 h-20 mx-auto rounded-full bg-slate-900 flex items-center justify-center mb-5">
                        <i class="fa-solid fa-cloud text-white text-3xl"></i>
                    </div>
                    <h4 class="font-bold text-xl text-slate-900">SaaS Infrastructure</h4>
                    <p class="text-slate-600 mt-3 leading-relaxed">
                        Handling technical administration so you can focus on business growth and innovation.
                    </p>
                </div>

                <div class="bg-white rounded-2xl border border-slate-100 p-8 text-center shadow-sm" data-aos="fade-up"
                    data-aos-delay="400">
                    <div class="w-20 h-20 mx-auto rounded-full bg-slate-900 flex items-center justify-center mb-5">
                        <i class="fa-solid fa-shield-halved text-white text-3xl"></i>
                    </div>
                    <h4 class="font-bold text-xl text-slate-900">Security & Performance</h4>
                    <p class="text-slate-600 mt-3 leading-relaxed">
                        Building secure, high-performance applications that meet enterprise-grade standards.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Free Consultation Section --}}
    <section class="relative py-16 bg-gradient-to-r from-[#197c93] to-[#156a7d] overflow-hidden" id="consult">
        <div
            class="absolute -top-1/2 -right-1/4 w-3/4 h-[150%] bg-[radial-gradient(circle,rgba(255,255,255,0.15)_0%,transparent_70%)] pointer-events-none">
        </div>
        <div class="mx-auto max-w-7xl px-4 relative">
            <div class="text-center">
                <h2 class="text-white text-3xl md:text-4xl font-extrabold">Konsultasi Gratis</h2>
                <p class="text-white/90 mt-4 max-w-2xl mx-auto text-lg">
                    Tidak yakin paket mana yang tepat? Mari kita diskusikan kebutuhan Anda secara gratis dengan tim expert
                    kami.
                </p>

                <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-6">
                        <div class="text-4xl">⏱️</div>
                        <div class="font-semibold mt-3 text-white">30 Menit</div>
                        <div class="text-white/90 text-sm mt-2">Sesi konsultasi mendalam tentang kebutuhan website Anda
                        </div>
                    </div>
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-6">
                        <div class="text-4xl">💡</div>
                        <div class="font-semibold mt-3 text-white">Rekomendasi Solusi</div>
                        <div class="text-white/90 text-sm mt-2">Saran paket terbaik sesuai budget dan kebutuhan bisnis
                        </div>
                    </div>
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-6">
                        <div class="text-4xl">🎯</div>
                        <div class="font-semibold mt-3 text-white">Strategi Implementasi</div>
                        <div class="text-white/90 text-sm mt-2">Rencana timeline dan roadmap pembuatan website Anda</div>
                    </div>
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-6">
                        <div class="text-4xl">💰</div>
                        <div class="font-semibold mt-3 text-white">No Hidden Cost</div>
                        <div class="text-white/90 text-sm mt-2">Estimasi biaya transparan tanpa biaya tersembunyi</div>
                    </div>
                </div>

                <a href="#contact"
                    class="inline-flex items-center justify-center mt-10 px-8 py-3 bg-white text-[#197c93] font-semibold rounded-xl hover:bg-slate-50 transition shadow">
                    Hubungi Kami Sekarang
                    <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>

                <p class="text-white/70 mt-4 text-sm">
                    Gratis untuk semua klien baru • Respons dalam 2 jam kerja
                </p>
            </div>
        </div>
    </section>

    {{-- Contact section tetap dibiarkan mengikuti komponen lama agar form & validasi tidak rusak. --}}
    {{-- Anda bisa minta konversi bertahap komponen-komponen contact setelah ini. --}}
    <section id="contact" class="py-16 bg-slate-100">
        {{-- Use existing content via includes to avoid breaking current bootstrap-based markup --}}
        @include('home.components.contact')
    </section>

    <div class="toast-container" id="toastContainer"></div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    once: true,
                    offset: 100,
                    delay: 0
                });
            }
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (!href || href === '#') return;
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

    @php
        $message = session()->get('success') ? session()->get('success') : null;
    @endphp
    <script>
        let alertMessage;
        alertMessage = "{{ $message }}";

        if (alertMessage !== '') {
            showToast(alertMessage)
        }
    </script>
@endpush
