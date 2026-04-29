@extends('layouts.app')

@push('metadata')
    <!-- SEO Meta Tags -->
    <title>Sistem Manajemen Travel Umroh & Haji Terbaik - Akhritech</title>
    <meta name="description"
        content="Kelola jama'ah, manifest, keuangan, dan inventory travel Umroh & Haji Anda secara otomatis dengan sistem Akhritech. Cepat, aman, dan mudah digunakan.">
    <meta name="keywords" content="software umroh, aplikasi haji, manajemen travel umroh, sistem informasi travel, akhritech">
    <meta name="author" content="Akhritech">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Sistem Manajemen Travel Umroh & Haji Terbaik - Akhritech">
    <meta property="og:description"
        content="Kelola jama'ah, manifest, keuangan, dan inventory travel Umroh & Haji Anda secara otomatis dengan sistem Akhritech.">
    <meta property="og:image" content="{{ asset('images/akhritech-banner.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Sistem Manajemen Travel Umroh & Haji Terbaik - Akhritech">
    <meta property="twitter:description"
        content="Kelola jama'ah, manifest, keuangan, dan inventory travel Umroh & Haji Anda secara otomatis dengan sistem Akhritech.">
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

        .hero-section {
            min-height: 80vh;
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
            background: radial-gradient(circle, rgba(25, 124, 147, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-headline {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
            color: #ffffff;
            margin-bottom: 1.5rem;
        }

        .hero-subheadline {
            font-size: 1.25rem;
            color: #94a3b8;
            line-height: 1.7;
            margin-bottom: 2rem;
            max-width: 600px;
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
        }

        .btn-secondary-custom:hover {
            border-color: #197c93;
            color: #197c93;
        }

        /* Features Section */
        .features-section {
            padding: 80px 0;
            background: #ffffff;
        }

        .section-heading {
            font-size: 2.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 1rem;
            text-align: center;
        }

        .section-subheading {
            font-size: 1.125rem;
            color: #64748b;
            text-align: center;
            margin-bottom: 3rem;
        }

        .feature-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 2rem;
            transition: all 0.3s ease;
            height: 100%;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.15);
            border-color: #197c93;
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #197c93 0%, #156a7d 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 1rem;
        }

        .feature-description {
            color: #64748b;
            line-height: 1.6;
        }

        /* Pricing Section */
        .pricing-section {
            padding: 80px 0;
            background: #f8fafc;
        }

        .pricing-card {
            background: #ffffff;
            border: 2px solid #197c93;
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            max-width: 450px;
            margin: 0 auto;
            transition: all 0.3s ease;
        }

        .pricing-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(25, 124, 147, 0.25);
        }

        .pricing-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 1rem;
        }

        .pricing-price {
            font-size: 3rem;
            font-weight: 800;
            color: #197c93;
            margin-bottom: 0.5rem;
        }

        .pricing-period {
            color: #64748b;
            margin-bottom: 2rem;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin-bottom: 2rem;
            text-align: left;
        }

        .pricing-features li {
            padding: 0.75rem 0;
            border-bottom: 1px solid #e2e8f0;
            color: #475569;
        }

        .pricing-features li:last-child {
            border-bottom: none;
        }

        .pricing-features li i {
            color: #197c93;
            margin-right: 10px;
        }

        .pricing-discount-section {
            background: linear-gradient(135deg, rgba(25, 124, 147, 0.05) 0%, rgba(25, 124, 147, 0.02) 100%);
            border: 1px solid rgba(25, 124, 147, 0.2);
            border-radius: 12px;
            padding: 1.5rem;
            margin: 1.5rem 0;
        }

        .pricing-discount-badge {
            display: inline-block;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .pricing-discount-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .pricing-calculation {
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 0.5rem;
            font-family: 'Courier New', monospace;
        }

        .pricing-annual-price {
            font-size: 1.75rem;
            font-weight: 700;
            color: #10b981;
            margin-top: 0.75rem;
        }

        .pricing-annual-note {
            font-size: 0.8rem;
            color: #64748b;
            margin-top: 0.5rem;
        }

        .gallery-link {
            display: block;
            text-decoration: none;
            cursor: zoom-in;
        }

        .glightbox {
            text-decoration: none;
        }

        /* Gallery Section */
        .gallery-section {
            padding: 80px 0;
            background: #ffffff;
        }

        .gallery-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            aspect-ratio: 16/9;
            background: #f1f5f9;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-item .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70px;
            height: 70px;
            background: rgba(25, 124, 147, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .gallery-item:hover .play-button {
            background: #197c93;
            transform: translate(-50%, -50%) scale(1.1);
        }

        .gallery-item .play-button i {
            color: white;
            font-size: 1.5rem;
            margin-left: 5px;
        }

        .gallery-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            padding: 20px;
            color: white;
        }

        .gallery-caption h5 {
            margin: 0;
            font-weight: 600;
        }

        .gallery-nav {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .gallery-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #cbd5e1;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gallery-dot.active {
            background: #197c93;
            transform: scale(1.2);
        }

        /* Free Trial Section */
        .trial-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            position: relative;
            overflow: hidden;
        }

        .trial-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -20%;
            width: 60%;
            height: 200%;
            background: radial-gradient(circle, rgba(25, 124, 147, 0.2) 0%, transparent 70%);
            pointer-events: none;
        }

        .trial-badge {
            display: inline-block;
            background: rgba(25, 124, 147, 0.2);
            color: #197c93;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(25, 124, 147, 0.3);
        }

        .trial-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 1rem;
        }

        .trial-description {
            font-size: 1.125rem;
            color: #94a3b8;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .trial-features {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .trial-feature {
            display: flex;
            align-items: center;
            color: #e2e8f0;
        }

        .trial-feature i {
            color: #197c93;
            margin-right: 8px;
            font-size: 1.25rem;
        }

        .trial-cta {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-white {
            background: white;
            color: #197c93;
            padding: 14px 32px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            display: inline-block;
        }

        .btn-white:hover {
            background: #f1f5f9;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(255, 255, 255, 0.3);
            color: #197c93;
        }

        .btn-outline-white {
            background: transparent;
            color: white;
            padding: 14px 32px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.3);
            display: inline-block;
        }

        .btn-outline-white:hover {
            border-color: white;
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .trial-note {
            color: #64748b;
            font-size: 0.875rem;
            margin-top: 1.5rem;
        }

        .profile-image-container {
            position: relative;
        }

        .profile-image {
            width: 100%;
            max-width: 450px;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border: 3px solid rgba(255, 255, 255, 0.1);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .hero-headline {
                font-size: 2.25rem;
            }

            .hero-section {
                min-height: auto;
                padding: 80px 0;
                text-align: center;
            }

            .hero-subheadline {
                margin: 0 auto 2rem;
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
                font-size: 1.75rem;
            }

            .hero-subheadline {
                font-size: 1rem;
            }

            .section-heading {
                font-size: 1.75rem;
            }
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
                            Kelola Travel Umroh Lebih Profesional & Tanpa Ribet
                        </h1>
                        <p class="hero-subheadline" data-aos="fade-up" data-aos-delay="100">
                            Sistem manajemen terintegrasi untuk menangani jama'ah, manifest, hingga laporan keuangan dalam
                            satu dasbor digital. Cepat, aman, dan mudah digunakan.
                        </p>
                        <div data-aos="fade-up" data-aos-delay="200">
                            <a href="#kontak" class="btn-primary-custom">
                                Coba Demo Gratis
                            </a>
                            <a href="#fitur" class="btn-secondary-custom ms-3">
                                Pelajari Fitur
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="profile-image-container text-lg-end floating" data-aos="fade-left" data-aos-delay="300">
                        <img src="{{ asset('images/undraw_investment.png') }}" alt="Akhritech - Developer Founder"
                            class="profile-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="features-section">
        <div class="container">
            <h2 class="section-heading" data-aos="fade-up">Mengapa Agen Travel Memilih Akhritech?</h2>
            <p class="section-subheading" data-aos="fade-up" data-aos-delay="100">Solusi digital yang dirancang khusus untuk
                kebutuhan travel Umroh & Haji</p>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-people-fill text-white"></i>
                        </div>
                        <h3 class="feature-title">Manajemen Jamaah</h3>
                        <p class="feature-description">
                            Input data jama'ah, upload dokumen paspor/visa, dan kelola manifest grup hanya dalam hitungan
                            detik.
                        </p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-receipt text-white"></i>
                        </div>
                        <h3 class="feature-title">Invoicing Otomatis</h3>
                        <p class="feature-description">
                            Pantau sisa pembayaran, cicilan, dan cetak kuitansi profesional untuk jama'ah secara otomatis.
                        </p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-cloud-fill text-white"></i>
                        </div>
                        <h3 class="feature-title">Akses Kapan Saja</h3>
                        <p class="feature-description">
                            Berbasis cloud. Pantau bisnis Anda dari rumah, kantor, atau saat sedang mendampingi jama'ah di
                            Tanah Suci.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="harga" class="pricing-section">
        <div class="container">
            <h2 class="section-heading" data-aos="fade-up">Investasi Untuk Pertumbuhan Bisnis</h2>
            <p class="section-subheading" data-aos="fade-up" data-aos-delay="100">Pilih paket yang sesuai dengan skala
                travel Anda</p>

            <div class="row justify-content-center">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="pricing-card">
                        <h3 class="pricing-title">Smart Launch</h3>
                        <p class="text-muted">Untuk Agen Kecil/Menengah</p>
                        <div class="pricing-price">Rp 449.000</div>
                        <div class="pricing-period">per bulan</div>

                        <hr>
                        <p style="text-align: left !important;">
                            Biaya Setup (Sekali di Awal): <b>Rp1.500.000</b>
                        </p>

                        <!-- Discount Section for Annual Payment -->
                        <div class="pricing-discount-section">
                            <div class="pricing-discount-badge">
                                <i class="bi bi-lightning-fill me-1"></i>HEMAT 15%
                            </div>
                            <div class="pricing-discount-title">
                                <i class="bi bi-calendar-event"></i>Pembayaran Tahunan
                            </div>
                            <div class="pricing-calculation">
                                Rp 449.000 × 12 bulan = Rp 5.388.000<br>
                                <span style="color: #10b981;">- Diskon 15% = Rp 808.200</span>
                            </div>
                            <div class="pricing-annual-price">
                                Rp 4.579.800
                            </div>
                            <div class="pricing-annual-note">
                                Cicilan bulanan setara: <b>Rp 381.650</b>
                            </div>
                        </div>

                        <ul class="pricing-features">
                            <li><i class="bi bi-check-circle-fill"></i> Landing Page Promosi</li>
                            <li><i class="bi bi-check-circle-fill"></i> Sistem Dashboard Manajemen Jamaah (Fitur Inti).
                            </li>
                            <li><i class="bi bi-check-circle-fill"></i> Unlimited Data Jamaah.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Update sistem berkala secara otomatis.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Support via WhatsApp (Respon 1x24 jam).</li>
                        </ul>
                        <a href="#kontak" class="btn-primary-custom w-100">Pilih Paket Ini</a>
                    </div>
                </div>

                {{-- <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="pricing-card">
                        <h3 class="pricing-title">Professional Brand</h3>
                        <p class="text-muted">Untuk Agen Besar/Berkembang</p>
                        <div class="pricing-price">Rp 699.000</div>
                        <div class="pricing-period">per bulan</div>

                        <hr>
                        <p style="text-align: left !important;">
                            Biaya Setup (Sekali di Awal): <b>Rp2.000.000</b>
                        </p>

                        <ul class="pricing-features">
                            <li><i class="bi bi-check-circle-fill"></i> Semua fitur Paket Smart Launch
                            </li>
                            <li><i class="bi bi-check-circle-fill"></i> Landing Page Promosi</li>
                            <li><i class="bi bi-check-circle-fill"></i> Custom Domain (Menggunakan domain milik agen
                                sendiri).</li>
                            <li><i class="bi bi-check-circle-fill"></i> Unlimited Data Jamaah.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Fitur Laporan Keuangan & Invoicing Otomatis.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Support via WhatsApp (Respon 1x24 jam).</li>
                        </ul>
                        <a href="#kontak" class="btn-primary-custom w-100">Pilih Paket Ini</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Free Trial Section -->
    <section class="trial-section">
        <div class="container text-center">
            <div class="trial-badge" data-aos="fade-up">
                <i class="bi bi-gift me-2"></i>Penawaran Spesial
            </div>
            <h2 class="trial-title" data-aos="fade-up" data-aos-delay="100">
                Coba Gratis Selama 60 Hari!
            </h2>
            <p class="trial-description" data-aos="fade-up" data-aos-delay="200">
                Tidak perlu kartu kredit. Nikmati akses penuh ke semua fitur sistem manajemen travel
                kami selama 2 bulan. Tanpa komitmen, tanpa biaya tersembunyi.
            </p>

            <div class="trial-features" data-aos="fade-up" data-aos-delay="300">
                <div class="trial-feature">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Akses Penuh Semua Fitur</span>
                </div>
                <div class="trial-feature">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Tanpa Kartu Kredit</span>
                </div>
                <div class="trial-feature">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Bantuan Setup Gratis</span>
                </div>
            </div>

            <div class="trial-cta" data-aos="fade-up" data-aos-delay="400">
                <a href="#kontak" class="btn-white">
                    <i class="bi bi-rocket-takeoff me-2"></i>Mulai Trial Sekarang
                </a>
                <a href="#fitur" class="btn-outline-white">
                    Pelajari Dulu
                </a>
            </div>

            <p class="trial-note" data-aos="fade-up" data-aos-delay="500">
                *Setelah 60 hari, Anda dapat memilih untuk berlangganan atau menghentikan penggunaan.
            </p>
        </div>
    </section>

    <!-- Gallery/Screenshots Section -->
    <section id="tampilan" class="gallery-section">
        <div class="container">
            <h2 class="section-heading" data-aos="fade-up">Tampilan Aplikasi</h2>
            <p class="section-subheading" data-aos="fade-up" data-aos-delay="100">Lihat langsung interface dan fitur
                utama sistem kami</p>

            <!-- Image Gallery -->
            <div class="row g-4 mb-5">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    {{-- <a href="{{ asset('images/dashboard.jpg') }}" class="gallery-link" data-glightbox="gallery"
                        title="Dashboard Admin"> --}}
                    <div class="gallery-item">
                        <img src="{{ asset('images/dashboard.jpg') }}" alt="Dashboard Admin" loading="lazy">
                        <div class="gallery-caption">
                            <h5>Dashboard Admin</h5>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    {{-- <a href="{{ asset('images/dashboard-jamaah.jpg') }}" class="gallery-link" data-glightbox="gallery"
                        title="Manajemen Jamaah"> --}}
                    <div class="gallery-item">
                        <img src="{{ asset('images/dashboard-jamaah.jpg') }}" alt="Manajemen Jamaah" loading="lazy">
                        <div class="gallery-caption">
                            <h5>Manajemen Jamaah</h5>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    {{-- <a href="{{ asset('images/dashboard-booking.jpg') }}" class="gallery-link" data-glightbox="gallery"
                        title="Manajemen Booking"> --}}
                    <div class="gallery-item">
                        <img src="{{ asset('images/dashboard-booking.jpg') }}" alt="Manajemen Booking" loading="lazy">
                        <div class="gallery-caption">
                            <h5>Manajemen Booking</h5>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                    {{-- <a href="{{ asset('images/landingpage-travel.jpg') }}" class="gallery-link" data-glightbox="gallery"
                        title="Portal Jamaah"> --}}
                    <div class="gallery-item">
                        <img src="{{ asset('images/landingpage-travel.jpg') }}" alt="Portal Jamaah" loading="lazy">
                        <div class="gallery-caption">
                            <h5>Portal Jamaah</h5>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>
            </div>

            <!-- Video Section -->
            <h3 class="text-center mb-4" data-aos="fade-up">Video Tutorial</h3>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="gallery-item">
                        <!-- Ganti src video dengan video asli -->
                        <video controls preload="metadata" style="width: 100%; height: 100%; object-fit: cover;">
                            <source src="{{ asset('videos/demo-travel.mp4') }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                        <!-- Placeholder jika video tidak ada -->
                        <div class="text-center py-5" style="background: #f1f5f9;" id="videoPlaceholder">
                            <i class="bi bi-play-circle text-white" style="font-size: 4rem; color: #197c93;"></i>
                            <p class="mt-3 text-muted">Video Demo Aplikasi</p>
                            <small class="text-muted">Hubungi kami untuk meminta video demo</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-5">3 Langkah Mulai Digitalisasi Travel Anda</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="p-3">
                        <span class="badge rounded-pill mb-3" style="background: #197c93;">1</span>
                        <h4>Pilih Paket & Bayar</h4>
                        <p>Pilih layanan sesuai kebutuhan dan lakukan pembayaran aman.</p>
                    </div>
                </div>
                <div class="col-md-4 border-start border-end">
                    <div class="p-3">
                        <span class="badge rounded-pill mb-3" style="background: #197c93;">2</span>
                        <h4>Proses Setup (3x24 Jam)</h4>
                        <p>Tim kami menyiapkan Server, Dashboard, dan Landing Page khusus untuk agen Anda.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3">
                        <span class="badge rounded-pill mb-3" style="background: #197c93;">3</span>
                        <h4>Siap Digunakan</h4>
                        <p>Terima akses login dan mulai kelola jamaah Anda dengan lebih profesional.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="features-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="section-heading" data-aos="fade-up">Siap Mengembangkan Bisnis Travel Anda?</h2>
                    <p class="section-subheading" data-aos="fade-up" data-aos-delay="100">
                        Hubungi sekarang untuk konsultasi gratis dan demo sistem
                    </p>
                    <div data-aos="fade-up" data-aos-delay="200">
                        <a href="https://wa.me/{{ config('app.superadmin_wa') }}?text=Halo%20Akhritech,%20saya%20tertarik%20dengan%20sistem%20manajemen%20travel"
                            class="btn-primary-custom" target="_blank">
                            <i class="bi bi-whatsapp me-2"></i>Hubungi via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

            // Initialize GLightbox for gallery
            if (typeof GLightbox !== 'undefined') {
                GLightbox({
                    selector: '[data-glightbox]',
                    touchNavigation: true,
                    loop: true,
                });
            }
        });
    </script>
@endpush
