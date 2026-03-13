@extends('layouts.app')

@push('metadata')
    <!-- SEO Meta Tags -->
    <title>Akhritech | Senior Fullstack Developer & SaaS Founder</title>
    <meta name="description"
        content="Senior Fullstack Developer & Founder of Akhritech. Building scalable SaaS solutions with Laravel & Next.js. 10+ years of engineering excellence.">
    <meta name="keywords"
        content="fullstack developer, Laravel, Next.js, SaaS founder, web developer, software architect, Indonesia, POS system, mesin absensi, attendance machine, Hajj Umrah system, travel tech, digital products, startup Indonesia, software house, web development services, custom software, business solutions, Ar-Rihlah Tech, Akhritech">
    <meta name="author" content="Akhritech">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Akhritech | Senior Fullstack Developer & SaaS Founder">
    <meta property="og:description"
        content="Senior Fullstack Developer & Founder. Building scalable SaaS solutions with Laravel & Next.js. 10+ years of engineering excellence.">
    <meta property="og:image" content="{{ asset('images/akhritech-banner.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Akhritech | Senior Fullstack Developer & SaaS Founder">
    <meta property="twitter:description"
        content="Senior Fullstack Developer & Founder. Building scalable SaaS solutions with Laravel & Next.js. 10+ years of engineering excellence.">
    <meta property="twitter:image" content="{{ asset('images/akhritech-banner.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
@endpush

@push('styles')
    <style>
        :root {
            --primary-color: #197c93;
            --secondary-color: #197c93;
            --accent-color: #0f172a;
            --text-muted: #64748b;
            --bg-light: #f8fafc;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .opacity-10 {
            opacity: 0.1;
        }

        .hero-section {
            min-height: 90vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            position: relative;
            overflow: hidden;
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

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-headline {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            color: #ffffff;
            margin-bottom: 1.5rem;
        }

        .hero-subheadline {
            font-size: 1.25rem;
            color: #94a3b8;
            line-height: 1.7;
            margin-bottom: 2rem;
            max-width: 540px;
        }

        .profile-image-container {
            position: relative;
        }

        .profile-image {
            width: 100%;
            max-width: 600px;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border: 3px solid rgba(255, 255, 255, 0.1);
        }

        .btn-primary-custom {
            background: #197c93;
            color: white;
            padding: 14px 32px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            display: inline-block;
        }

        .btn-primary-custom:hover {
            background: #156a7d;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(25, 124, 147, 0.4);
            color: white;
        }

        .btn-secondary-custom {
            background: transparent;
            color: #94a3b8;
            padding: 14px 32px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid #334155;
            display: inline-block;
            margin-left: 12px;
        }

        .btn-secondary-custom:hover {
            border-color: #197c93;
            color: #197c93;
        }

        /* Products Section */
        .products-section {
            padding: 100px 0;
            background: #ffffff;
        }

        .section-heading {
            font-size: 2.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 3rem;
            text-align: center;
        }

        .product-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 2rem;
            transition: all 0.3s ease;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.15);
            border-color: #197c93;
        }

        .product-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #197c93 0%, #156a7d 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .product-icon i {
            font-size: 1.75rem;
            color: white;
        }

        .product-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 1rem;
        }

        .product-description {
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .tech-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .tech-tag {
            background: #f1f5f9;
            color: #475569;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Expertise Section */
        .expertise-section {
            padding: 100px 0;
            background: #f8fafc;
        }

        .expertise-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }

        .expertise-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px -10px rgba(0, 0, 0, 0.1);
        }

        .expertise-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .expertise-icon i {
            font-size: 2rem;
            color: white;
        }

        .expertise-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 1rem;
        }

        .expertise-description {
            color: #64748b;
            line-height: 1.6;
        }

        /* About Section */
        .about-section {
            padding: 100px 0;
            background: #ffffff;
        }

        .about-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .about-heading {
            font-size: 2rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2rem;
        }

        .about-text {
            font-size: 1.125rem;
            color: #475569;
            line-height: 1.8;
        }

        .about-text strong {
            color: #0f172a;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .hero-headline {
                font-size: 2.5rem;
            }

            .hero-section {
                min-height: auto;
                padding: 80px 0;
            }

            .profile-image-container {
                margin-top: 3rem;
                text-align: center;
            }

            .profile-image {
                max-width: 300px;
            }
        }

        @media (max-width: 576px) {
            .hero-headline {
                font-size: 2rem;
            }

            .hero-subheadline {
                font-size: 1rem;
            }

            .btn-secondary-custom {
                margin-left: 0;
                margin-top: 12px;
                display: block;
                text-align: center;
            }

            .section-heading {
                font-size: 1.75rem;
            }
        }

        .bg-primary {
            background-color: #156a7d !important;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-headline" data-aos="fade-up">
                            Transforming Code into Business Growth.
                        </h1>
                        <p class="hero-subheadline" data-aos="fade-up" data-aos-delay="100">
                            Hi, I'm a Senior Fullstack Developer & Founder of Akhritech.
                            I specialize in crafting high-performance systems and digital products that solve real-world
                            business problems.
                        </p>
                        <div data-aos="fade-up" data-aos-delay="200">
                            <a href="#products" class="btn-primary-custom">
                                Explore My Products
                            </a>
                            {{-- <a href="https://linkedin.com" target="_blank" class="btn-secondary-custom">
                                View Engineering Profile
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="profile-image-container" data-aos="fade-left" data-aos-delay="300">
                        <img src="{{ asset('images/undraw_building.png') }}" alt="Akhritech - Developer Founder"
                            class="profile-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products-section">
        <div class="container">
            <h2 class="section-heading" data-aos="fade-up">Built by Akhritech</h2>

            <div class="row g-4">
                <!-- Product Card 1: Ar-Rihlah Tech -->
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-card">
                        <div class="product-icon">
                            <i class="bi bi-globe-americas"></i>
                        </div>
                        <h3 class="product-title mb-0">Ar-Rihlah App</h3>
                        <p class="text-muted">Aplikasi manajemen travel Hajj & Umroh Terpadu</p>
                        <p class="product-description">
                            Platform all-in-one untuk mengelola seluruh aspek bisnis travel haji dan umroh Anda. Dari
                            pendaftaran jamaah hingga pembayaran dan pelaporan—semua terintegrasi dalam satu dashboard.
                        </p>
                        <div class="tech-tags">
                            <span class="tech-tag">Laravel</span>
                            <span class="tech-tag">MySql</span>
                            <span class="tech-tag">Next.js</span>
                            <span class="tech-tag">Single-Tenant SaaS</span>
                        </div>
                        {{-- <button class="btn btn-primary-custom mt-5" data-bs-toggle="modal" data-bs-target="#arRihlahModal">
                            Pelajari Lebih Lanjut
                        </button> --}}
                        <a href="{{ route('home.products.travel') }}" class="btn btn-primary-custom btn-sm mt-5">Pelajari
                            lebih
                            lanjut</a>
                    </div>
                </div>

                <!-- Product Card 2: Upcoming Innovation -->
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="product-icon">
                            <i class="bi bi-rocket-takeoff"></i>
                        </div>
                        <h3 class="product-title">Upcoming Innovation</h3>
                        <p class="product-description">
                            Solving [Masalah X] for [Market Y]. Stay tuned for the next breakthrough solution from
                            Akhritech.
                        </p>
                        <div class="tech-tags">
                            <span class="tech-tag">Coming Soon</span>
                            <span class="tech-tag">Innovation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ar-Rihlah Tech Product Modal -->
    <div class="modal fade" id="arRihlahModal" tabindex="-1" aria-labelledby="arRihlahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="arRihlahModalLabel">
                        <i class="bi bi-globe-americas me-2"></i>Ar-Rihlah Tech
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h6 class="text-uppercase text-muted mb-2">Kelola Jamaah & Paket dengan Mudah</h6>
                            <p>Platform all-in-one untuk mengelola seluruh aspek bisnis travel haji dan umroh Anda. Dari
                                pendaftaran jamaah hingga pembayaran dan pelaporan—semua terintegrasi dalam satu dashboard.
                            </p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-uppercase text-muted mb-3">Fitur Utama</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-check-circle me-2"
                                        style="color: #197c93;"></i>Manajemen Jamaah</li>
                                <li class="mb-2"><i class="bi bi-check-circle me-2" style="color: #197c93;"></i>Jadwal
                                    & Itinerary</li>
                                <li class="mb-2"><i class="bi bi-check-circle me-2"
                                        style="color: #197c93;"></i>Manajemen Pembayaran</li>
                                <li class="mb-2"><i class="bi bi-check-circle me-2"
                                        style="color: #197c93;"></i>Analytics & Reporting</li>
                                <li class="mb-2"><i class="bi bi-check-circle me-2"
                                        style="color: #197c93;"></i>Komunikasi Terintegrasi
                                </li>
                                <li class="mb-2"><i class="bi bi-check-circle me-2"
                                        style="color: #197c93;"></i>Manifest Keberangkatan
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-uppercase text-muted mb-3">Teknologi</h6>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge" style="background-color: #197c93;">Laravel</span>
                                <span class="badge" style="background-color: #197c93;">MySQL</span>
                                <span class="badge" style="background-color: #197c93;">Next.js</span>
                                <span class="badge" style="background-color: #197c93;">Bootstrap 5</span>
                                <span class="badge" style="background-color: #197c93;">Cloud Sync</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-uppercase text-muted mb-3">Keunggulan</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded">
                                        <strong><i class="bi bi-clock me-2"></i>Manajemen Jamaah</strong>
                                        <p class="mb-0 small text-muted">Otomatisasi proses administratif yang memakan
                                            waktu</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded">
                                        <strong><i class="bi bi-shield-check me-2"></i>Aman & Terpercaya</strong>
                                        <p class="mb-0 small text-muted">Data jemaah tersimpan dengan aman di cloud</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded">
                                        <strong><i class="bi bi-graph-up me-2"></i>Skalabel</strong>
                                        <p class="mb-0 small text-muted">Bisa berkembang sesuai kebutuhan bisnis</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded">
                                        <strong><i class="bi bi-headset me-2"></i>Full Support</strong>
                                        <p class="mb-0 small text-muted">Maintenance dan dukungan teknis berkelanjutan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a href="https://travel.akhritech.com" target="_blank" class="btn btn-primary"
                        style="background-color: #197c93; border-color: #197c93;">Coba Aplikasi</a>
                    <a href="#contact" class="btn btn-primary"
                        style="background-color: #197c93; border-color: #197c93;">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Professional Expertise Section -->
    <section class="expertise-section">
        <div class="container">
            <h2 class="section-heading" data-aos="fade-up">10+ Years of Engineering Excellence</h2>

            <div class="row g-4">
                <!-- Expertise 1 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="expertise-card">
                        <div class="expertise-icon">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <h4 class="expertise-title">System Architecture</h4>
                        <p class="expertise-description">
                            Designing robust systems from inception to release, ensuring scalability and maintainability.
                        </p>
                    </div>
                </div>

                <!-- Expertise 2 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="expertise-card">
                        <div class="expertise-icon">
                            <i class="bi bi-code-slash"></i>
                        </div>
                        <h4 class="expertise-title">Fullstack Mastery</h4>
                        <p class="expertise-description">
                            Experts in Laravel & Next.js ecosystem, delivering end-to-end solutions with precision.
                        </p>
                    </div>
                </div>

                <!-- Expertise 3 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="expertise-card">
                        <div class="expertise-icon">
                            <i class="bi bi-cloud-check"></i>
                        </div>
                        <h4 class="expertise-title">SaaS Infrastructure</h4>
                        <p class="expertise-description">
                            Handling technical administration so you can focus on business growth and innovation.
                        </p>
                    </div>
                </div>

                <!-- Expertise 4 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="expertise-card">
                        <div class="expertise-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4 class="expertise-title">Security & Performance</h4>
                        <p class="expertise-description">
                            Building secure, high-performance applications that meet enterprise-grade standards.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-content" data-aos="fade-up">
                <h2 class="about-heading">Bridging Professional Engineering with Entrepreneurial Innovation</h2>
                <div class="about-text">
                    <p>
                        Selama lebih dari satu dekade, saya telah mendedikasikan karir saya di sektor swasta sebagai
                        Fullstack Developer, membangun berbagai sistem aplikasi skala besar dari nol hingga siap rilis.
                        Pengalaman profesional ini membentuk standar saya dalam membangun perangkat lunak: harus aman,
                        skalabel, dan performan.
                    </p>
                    <p class="mt-4">
                        Di Akhritech, saya menyalurkan pengalaman teknis tersebut ke dalam produk-produk SaaS mandiri. Saya
                        percaya bahwa teknologi terbaik adalah yang mampu bekerja "di balik layar"—mengotomatisasi hal-hal
                        teknis yang rumit agar pemilik bisnis bisa fokus pada apa yang mereka cintai. Melalui model full
                        maintenance, saya tidak hanya memberikan kode, tetapi juga ketenangan pikiran bagi para klien saya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold display-6 mb-3">Mulai Transformasi Bisnis Anda</h2>
                    <p class="text-secondary lead">Isi formulir di bawah ini untuk konsultasi gratis.</p>
                </div>
            </div>

            <div class="row g-5">
                <!-- Kolom Kiri: Informasi & Peta -->
                <div class="col-lg-5" data-aos="fade">
                    <div class="card bg-primary text-white border-0 h-100 shadow-lg overflow-hidden position-relative">
                        <!-- Background Image Overlay -->
                        <img src="{{ asset('images/contact-bg.jpg') }}"
                            class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover opacity-10"
                            alt="Map Background">

                        <div class="card-body position-relative z-1 p-5 d-flex flex-column justify-content-between">
                            <div>
                                <h4 class="fw-bold mb-4">Informasi Kontak</h4>

                                <div class="d-flex align-items-start mb-4">
                                    <i class="bi bi-geo-alt-fill fs-4 me-3 mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Area Layanan</h6>
                                        <p class="small text-white-50 mb-0">Berbasis di {{ $company->address }}.
                                            Melayani
                                            klien
                                            di seluruh Indonesia secara Remote.</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start mb-4">
                                    <i class="bi bi-envelope-fill fs-4 me-3 mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Email</h6>
                                        <p class="small text-white-50 mb-0">{{ $company->email }}</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start mb-4">
                                    <i class="bi bi-telephone-fill fs-4 me-3 mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">WhatsApp / Telepon</h6>
                                        <p class="small text-white-50 mb-0">
                                            {{ $company->phone }}</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start">
                                    <i class="bi bi-chat-text-fill fs-4 me-3 mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Respon Cepat</h6>
                                        <p class="small text-white-50 mb-0">Balasan dalam waktu kurang dari 2 jam
                                            selama
                                            jam kerja.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <h6 class="fw-bold mb-3">Ikuti Kami</h6>
                                <div class="d-flex gap-3">
                                    <a href="https://www.instagram.com/akhritech" target="_blank"
                                        class="btn btn-outline-light rounded-circle btn-sm"><i
                                            class="bi bi-instagram"></i></a>
                                    <button class="btn btn-outline-light rounded-circle btn-sm" title="Coming Soon"><i
                                            class="bi bi-facebook"></i></button>
                                    <button class="btn btn-outline-light rounded-circle btn-sm" title="Coming Soon"><i
                                            class="bi bi-linkedin"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Formulir -->
                <div class="col-lg-7" data-aos="fade" data-aos-delay="300">
                    <div class="card border-0 shadow-sm p-4 p-md-5">
                        <form id="contactForm" class="needs-validation" novalidate action="{{ route('inquiry.store') }}"
                            method="POST">
                            @csrf
                            <div class="row g-3">
                                <!-- Nama Lengkap -->
                                <div class="col-md-6">
                                    <label for="fullName" class="form-label text-secondary small fw-bold">Nama
                                        Lengkap</label>
                                    <input type="text" class="form-control bg-light border-0 py-2" id="fullName"
                                        placeholder="Nama lengkap" required>
                                    <div class="invalid-feedback">Mohon isi nama lengkap Anda.</div>
                                </div>

                                <!-- Nama Perusahaan (Penting untuk B2B) -->
                                <div class="col-md-6">
                                    <label for="companyName" class="form-label text-secondary small fw-bold">Nama
                                        Perusahaan</label>
                                    <input type="text" name="name" class="form-control bg-light border-0 py-2"
                                        id="companyName" placeholder="Nama perusahaan Anda" required>
                                    <div class="invalid-feedback">Mohon isi nama perusahaan.</div>
                                </div>

                                <!-- Email -->
                                <div class="col-12">
                                    <label for="email" class="form-label text-secondary small fw-bold">Alamat
                                        Email</label>
                                    <input type="email" name="email" class="form-control bg-light border-0 py-2"
                                        id="email" placeholder="Alamat email anda" required>
                                    <div class="invalid-feedback">Mohon masukkan email yang valid.</div>
                                </div>

                                <!-- No.WhatsApp -->
                                <div class="col-12">
                                    <label for="email" class="form-label text-secondary small fw-bold">WhatsApp
                                        Number</label>
                                    <input type="text" name="whatsapp_number"
                                        class="form-control bg-light border-0 py-2" id="whatsapp_number"
                                        name="whatsapp_number" required placeholder="08xx...">
                                    <div class="invalid-feedback">Mohon masukkan nomor whatsapp yang valid.</div>
                                </div>

                                <!-- Layanan yang dibutuhkan -->
                                {{-- <div class="col-12">
                                    <label for="service" class="form-label text-secondary small fw-bold">Jasa yang
                                        Dibutuhkan</label>
                                    <select name="subject" class="form-select bg-light border-0 py-2" id="service"
                                        required>
                                        <option value="" selected disabled>Pilih paket layanan...</option>
                                        <option value="landing">Landing Page Pro (Rp 2.5jt)</option>
                                        <option value="enterprise">Enterprise System (Rp 7.5jt)</option>
                                        <option value="custom">Custom Development (Konsultasi)</option>
                                    </select>
                                    <div class="invalid-feedback">Silakan pilih salah satu layanan.</div>
                                </div> --}}

                                <!-- Pesan -->
                                <div class="col-12">
                                    <label for="message" class="form-label text-secondary small fw-bold">Detail
                                        Kebutuhan</label>
                                    <textarea name="message" class="form-control bg-light border-0" id="message" rows="4"
                                        placeholder="Ceritakan sedikit tentang kebutuhan website atau sistem bisnis Anda..." required></textarea>
                                    <div class="invalid-feedback">Mohon tulis pesan Anda.</div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 mt-4">
                                    <button type="submit"
                                        class="btn btn-primary-custom w-100 py-3 fw-bold rounded-pill shadow-sm"
                                        id="submitBtn">
                                        <i class="bi bi-send me-2"></i> Kirim Pesan
                                    </button>
                                </div>

                                {{-- <div class="col-12 text-center mt-3"> --}}
                                {{-- <small class="text-muted">privasi data bisnis Anda.</small> --}}
                                {{-- </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>
@endsection

@push('scripts')
    <script>
        // Initialize AOS animations
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

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        let alertMessage;
        alertMessage = "{{ $message }}"

        if (alertMessage !== '') {
            showToast(alertMessage)
        }
    </script>
@endpush
