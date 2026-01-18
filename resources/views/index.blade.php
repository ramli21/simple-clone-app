@extends('layouts.app')

@push('styles')
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}" />
@endpush

@section('content')
    <div id="app">
        @include('home.components.navbar')
        <!-- A. Hero Section -->
        <section id="home" class="position-relative text-white d-flex align-items-center min-vh-100"
            style="background-color: #085c6f; padding-top: 80px;">
            <!-- Decoration Blobs -->
            {{-- <div class="blob bg-primary rounded-circle" style="width: 300px; height: 300px; top: -100px; right: -50px;">
            </div> --}}
            {{-- <div class="blob bg-info rounded-circle"
                style="width: 250px; height: 250px; bottom: 0; left: -50px; opacity: 0.2;">
            </div> --}}

            <div class="container position-relative z-1">
                <div class="row justify-content-center text-center reveal active">
                    <div class="col-lg-10">
                        <span class="fs-6 badge bg-light text-white-50 bg-opacity-10 mb-4 px-5 py-2 rounded-pill fw-normal"
                            data-aos="fade">
                            Mitra Teknologi Bisnis Anda
                        </span>
                        <h1 class="display-4 fw-bold mb-4 lh-sm" data-aos="fade" data-aos-delay="200">
                            Transformasi Bisnis Lokal dengan <br>
                            <span style="color: #1ac4d7;">Website Profesional & Sistem Terintegrasi.</span>
                        </h1>
                        <p class="lead text-white-50 mb-5 mx-auto" style="max-width: 700px;" data-aos="fade"
                            data-aos-delay="300">
                            Membantu bisnis Anda untuk meningkatkan kredibilitas dan penjualan melalui platform digital
                            yang cepat, aman, dan mudah dikelola.
                        </p>
                        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                            <a href="#showcase" class="btn btn-light text-primary fw-bold btn-lg px-5 rounded-pill"
                                data-aos="fade" data-aos-delay="500">
                                <i class="bi bi-eye me-2"></i> Lihat Solusi
                            </a>
                            <a href="#contact" class="btn btn-outline-light btn-lg px-4 rounded-pill" data-aos="fade"
                                data-aos-delay="500">
                                <i class="bi bi-chat-dots me-2"></i> Konsultasi Gratis
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pain Points Section -->
        <section class="py-5 bg-light">
            <div class="container py-5">
                <div class="row align-items-center reveal">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="{{ asset('images/undraw_performance.png') }}" alt="Profesional Office"
                            class="img-fluid rounded-4 shadow-lg">
                        <!-- Floating Card -->
                        <div class="card border-0 shadow-lg p-3 position-absolute d-none d-md-block"
                            style="bottom: -30px; left: -30px; max-width: 280px; border-left: 4px solid var(--bs-primary) !important;">
                            <p class="text-secondary small mb-1">Target Output:</p>
                            <p class="fw-bold mb-0">"Meningkatkan inquiry tertarget hingga 40% dalam 3 bulan."</p>
                        </div>
                    </div>
                    <div class="col-lg-6 ps-lg-5">
                        <h2 class="fw-bold display-6 mb-4">Kenapa Bisnis Anda Butuh Website Sekarang?</h2>
                        <div class="vstack gap-4">
                            <div class="d-flex gap-3">
                                <div class="flex-shrink-0 bg-info bg-opacity-10 text-info rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 48px; height: 48px;">
                                    <i class="bi bi-person-workspace fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Salesman 24 Jam</h5>
                                    <p class="text-secondary">Buyer luar kota atau luar negeri tidak bisa mengunjungi pabrik
                                        Anda setiap hari. Website adalah etalase yang selalu terbuka.</p>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="flex-shrink-0 bg-success bg-opacity-10 text-success rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 48px; height: 48px;">
                                    <i class="bi bi-graph-up-arrow fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Kredibilitas & Kepercayaan</h5>
                                    <p class="text-secondary">Di era digital, bisnis tanpa website dianggap tidak serius.
                                        Tingkatkan kepercayaan calon klien dengan tampilan profesional.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- B. Segmented Portfolio (Solutions) -->
        <section id="solutions" class="py-5">
            <div class="container py-5">
                <div class="text-center mb-5 reveal">
                    <h2 class="fw-bold display-6">Solusi Spesifik Industri</h2>
                    <p class="text-secondary">Kami tidak membuat website "satu untuk semua". Berikut adalah spesifikasi
                        fitur
                        kami.</p>
                </div>

                <!-- Bootstrap Nav Tabs -->
                <ul class="nav nav-pills nav-fill mb-5 justify-content-center gap-2 p-1 bg-light rounded-pill mx-auto reveal"
                    style="max-width: 500px;" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active rounded-pill px-4" id="pills-industrial-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-industrial" type="button" role="tab"
                            aria-controls="pills-industrial" aria-selected="true">
                            <i class="bi bi-building me-2"></i>Industrial (Pabrik)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-4" id="pills-travel-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-travel" type="button" role="tab" aria-controls="pills-travel"
                            aria-selected="false">
                            <i class="bi bi-airplane me-2"></i>Travel & Tourism
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content reveal" id="pills-tabContent">
                    <!-- Industrial Content -->
                    <div class="tab-pane fade show active" id="pills-industrial" role="tabpanel"
                        aria-labelledby="pills-industrial-tab">
                        <div class="row align-items-center flex-column-reverse flex-lg-row">
                            <div class="col-lg-6 mt-4 mt-lg-0">
                                <h3 class="fw-bold mb-3">Sistem Manajemen Pabrik & Katalog</h3>
                                <p class="text-secondary">Tingkatkan efisiensi penjualan B2B Anda dengan fitur yang
                                    dirancang
                                    khusus untuk manufaktur.</p>
                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item bg-transparent px-0 d-flex gap-3">
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                        <div><strong>Digital Product Catalog:</strong> Tampilkan kualitas produksi dengan
                                            galeri
                                            foto high-res.</div>
                                    </li>
                                    <li class="list-group-item bg-transparent px-0 d-flex gap-3">
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                        <div><strong>Form RFQ (Request for Quotation):</strong> Calon pembeli bisa request
                                            harga
                                            kustom berdasarkan qty.</div>
                                    </li>
                                    <li class="list-group-item bg-transparent px-0 d-flex gap-3">
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                        <div><strong>Stock Tracking:</strong> Monitoring sederhana status produksi untuk
                                            update
                                            ke klien.</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <img src="{{ asset('images/undraw_factory.png') }}" alt="Industrial Web"
                                    class="img-fluid rounded-4 shadow">
                            </div>
                        </div>
                    </div>

                    <!-- Travel Content -->
                    <div class="tab-pane fade" id="pills-travel" role="tabpanel" aria-labelledby="pills-travel-tab">
                        <div class="row align-items-center flex-column-reverse flex-lg-row">
                            <div class="col-lg-6 mt-4 mt-lg-0">
                                <h3 class="fw-bold mb-3">Platform Booking Paket Wisata & Umroh</h3>
                                <p class="text-secondary">Kelola jamaah dan paket perjalanan tanpa ribet. Fokus pada
                                    pelayanan,
                                    biarkan sistem yang menghitung.</p>
                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item bg-transparent px-0 d-flex gap-3">
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                        <div><strong>Real-time Seat Availability:</strong> Jamaah bisa melihat sisa kuota
                                            kursi
                                            secara langsung.</div>
                                    </li>
                                    <li class="list-group-item bg-transparent px-0 d-flex gap-3">
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                        <div><strong>Automated Booking System:</strong> Formulir pendaftaran online yang
                                            terintegrasi.</div>
                                    </li>
                                    <li class="list-group-item bg-transparent px-0 d-flex gap-3">
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                        <div><strong>Itinerary Builder:</strong> Tampilkan jadwal hari-per-hari yang
                                            menarik.
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <img src="{{ asset('images/undraw_travelers.png') }}" alt="Travel Web"
                                    class="img-fluid rounded-4 shadow">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Fitur Rahasia: "Live Demo Dashboard" -->
        <section id="showcase" class="py-5 bg-dark text-white position-relative overflow-hidden">
            <div class="container py-5">
                <div class="text-center mb-5 reveal">
                    <h2 class="fw-bold mb-3">Fitur Rahasia: Admin Panel yang Mudah</h2>
                    <p class="text-white-50">Anda tidak perlu skill coding. Coba dashboard simulasi di bawah ini!</p>
                </div>

                <div class="row justify-content-center reveal">
                    <div class="col-lg-10">
                        <!-- Browser Mockup -->
                        <div class="browser-mockup text-dark">
                            <div class="browser-header">
                                <div class="bg-danger rounded-circle" style="width: 10px; height: 10px;"></div>
                                <div class="bg-warning rounded-circle" style="width: 10px; height: 10px;"></div>
                                <div class="bg-success rounded-circle" style="width: 10px; height: 10px;"></div>
                                <div class="bg-white rounded border-0 ms-3 px-2 py-0 small text-secondary w-100">
                                    admin-dashboard-enterprise.com/dashboard
                                </div>
                            </div>

                            <div class="row g-0">
                                <img src="{{ asset('images/dashboard.jpg') }}" alt="dashboard-example" />
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

        <!-- Tech Stack Section -->
        <section class="py-5">
            <div class="container py-5">
                <div class="text-center mb-5 reveal">
                    <h2 class="fw-bold display-6">Teknologi Terbaik untuk Bisnis</h2>
                    <p class="text-secondary">Bukan sekadar canggih, tapi menguntungkan operasional Anda.</p>
                </div>

                <div class="row g-4 reveal">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 hover:shadow transition">
                            <div class="card-body text-center">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex justify-content-center align-items-center mb-3"
                                    style="width: 64px; height: 64px;">
                                    <i class="bi bi-lightning-charge-fill fs-2"></i>
                                </div>
                                <h5 class="fw-bold">Ultra Fast Loading</h5>
                                <p class="text-secondary small">Website dimuat dalam hitungan detik. Meningkatkan konversi
                                    penjualan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 hover:shadow transition">
                            <div class="card-body text-center">
                                <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex justify-content-center align-items-center mb-3"
                                    style="width: 64px; height: 64px;">
                                    <i class="bi bi-phone-fill fs-2"></i>
                                </div>
                                <h5 class="fw-bold">Mobile First</h5>
                                <p class="text-secondary small">Tampilan sempurna di HP. Karena 80% klien Anda membuka dari
                                    genggaman tangan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 hover:shadow transition">
                            <div class="card-body text-center">
                                <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-inline-flex justify-content-center align-items-center mb-3"
                                    style="width: 64px; height: 64px;">
                                    <i class="bi bi-shield-lock-fill fs-2"></i>
                                </div>
                                <h5 class="fw-bold">Secure Code</h5>
                                <p class="text-secondary small">Perlindungan data perusahaan dan pelanggan dari ancaman
                                    spammer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="py-5 bg-light">
            <div class="container py-5">
                <h2 class="fw-bold display-6 text-center mb-5 reveal">Kami Urus Semuanya (End-to-End)</h2>

                <div class="row justify-content-center position-relative process-line reveal">
                    <!-- Step 1 -->
                    <div class="col-md-4 text-center mb-4 mb-md-0 position-relative">
                        <div class="card border-0 bg-white shadow-sm p-4 mx-auto" style="max-width: 300px;">
                            <div class="bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center mx-auto mb-3 border border-4 border-white"
                                style="width: 48px; height: 48px; position: relative; z-index: 2;">1</div>
                            <h5 class="fw-bold">Domain & Hosting</h5>
                            <p class="text-secondary small">Setup server cepat & aman.</p>
                        </div>
                    </div>
                    <!-- Step 2 -->
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        <div class="card border-0 bg-white shadow-sm p-4 mx-auto" style="max-width: 300px;">
                            <div class="bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center mx-auto mb-3 border border-4 border-white"
                                style="width: 48px; height: 48px; position: relative; z-index: 2;">2</div>
                            <h5 class="fw-bold">Design & Coding</h5>
                            <p class="text-secondary small">Desain UI/UX modern & fungsional.</p>
                        </div>
                    </div>
                    <!-- Step 3 -->
                    <div class="col-md-4 text-center">
                        <div class="card border-0 bg-white shadow-sm p-4 mx-auto" style="max-width: 300px;">
                            <div class="bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center mx-auto mb-3 border border-4 border-white"
                                style="width: 48px; height: 48px; position: relative; z-index: 2;">3</div>
                            <h5 class="fw-bold">Maintenance</h5>
                            <p class="text-secondary small">Support teknis & update keamanan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="pricing" class="py-5">
            <div class="container py-5">
                <div class="text-center mb-5 reveal">
                    <h2 class="fw-bold display-6">Investasi untuk Pertumbuhan</h2>
                    <p class="text-secondary">Pilih paket yang sesuai dengan skala bisnis Anda.</p>
                </div>

                <div class="row justify-content-center g-4 reveal">
                    <!-- Basic -->
                    <div class="col-md-5 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="fw-bold text-primary mb-2">Landing Page Pro</h5>
                                <p class="text-secondary small mb-4">Mulai kehadiran digital.</p>
                                <h3 class="fw-bold mb-4">Rp 2.500.000</h3>
                                <ul class="list-unstyled mb-4 text-secondary small">
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Desain
                                        Responsive Mobile</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>1 Halaman
                                        Landing Page</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Free
                                        Domain
                                        .com (1 Thn)</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Integrasi
                                        WhatsApp</li>
                                    <li class="text-muted"><i class="bi bi-x-circle me-2"></i>Admin Panel</li>
                                </ul>
                                <a href="#contact" class="btn btn-outline-secondary w-100 rounded-pill">Pilih Paket
                                    Ini</a>
                            </div>
                        </div>
                    </div>

                    <!-- Enterprise -->
                    <div class="col-md-5 col-lg-4">
                        <div class="card h-100 border-primary border-2 shadow-lg position-relative"
                            style="transform: translateY(-10px);">
                            <div
                                class="position-absolute top-0 end-0 bg-primary text-white small px-3 py-1 rounded-bottom-start">
                                BEST VALUE</div>
                            <div class="card-body p-4">
                                <h5 class="fw-bold text-primary mb-2">Enterprise System</h5>
                                <p class="text-secondary small mb-4">Solusi lengkap untuk kebutuhan Bisnis Anda.</p>
                                <h3 class="fw-bold mb-4">Rp 7.500.000</h3>
                                <ul class="list-unstyled mb-4 text-secondary small">
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Multi
                                        Halaman
                                    </li>
                                    <li class="mb-2"><i
                                            class="bi bi-check-circle-fill text-success me-2"></i><strong>Admin
                                            Panel Dashboard</strong></li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Fitur
                                        Katalog
                                        / Paket</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>RFQ /
                                        Booking
                                        System / Fitur Sesuai Kebutuhan</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Guide
                                        Penggunaan
                                    </li>
                                </ul>
                                <a href="#contact" class="btn btn-primary w-100 rounded-pill">Hubungi Kami</a>
                            </div>
                        </div>
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
                        <p class="text-secondary lead">Isi formulir di bawah ini untuk konsultasi gratis. Tim kami akan
                            menghubungi Anda dalam waktu 1x24 jam kerja.</p>
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
                            <form id="contactForm" class="needs-validation" novalidate
                                action="{{ route('inquiry.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <!-- Nama Lengkap -->
                                    <div class="col-md-6">
                                        <label for="fullName" class="form-label text-secondary small fw-bold">Nama
                                            Lengkap</label>
                                        <input type="text" class="form-control bg-light border-0 py-2" id="fullName"
                                            placeholder="Budi Santoso" required>
                                        <div class="invalid-feedback">Mohon isi nama lengkap Anda.</div>
                                    </div>

                                    <!-- Nama Perusahaan (Penting untuk B2B) -->
                                    <div class="col-md-6">
                                        <label for="companyName" class="form-label text-secondary small fw-bold">Nama
                                            Perusahaan</label>
                                        <input type="text" name="name" class="form-control bg-light border-0 py-2"
                                            id="companyName" placeholder="PT. Sukses Maju">
                                        <div class="invalid-feedback">Mohon isi nama perusahaan.</div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-12">
                                        <label for="email" class="form-label text-secondary small fw-bold">Alamat
                                            Email</label>
                                        <input type="email" name="email" class="form-control bg-light border-0 py-2"
                                            id="email" placeholder="nama@perusahaan.com" required>
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
                                    <div class="col-12">
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
                                    </div>

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
                                            class="btn btn-primary w-100 py-3 fw-bold rounded-pill shadow-sm"
                                            id="submitBtn">
                                            <i class="bi bi-send me-2"></i> Kirim Pesan
                                        </button>
                                    </div>

                                    <div class="col-12 text-center mt-3">
                                        <small class="text-muted">Kami menghargai privasi data bisnis Anda.</small>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('home.components.footer')

        <!-- Floating WhatsApp -->
        @if (config('app.superadmin_wa'))
            <a href="https://wa.me/{{ config('app.superadmin_wa') }}?text=Halo%20EnterpriseDev%2C%20saya%20tertarik%20konsultasi%20pembuatan%20website%20bisnis.%20Bisa%20dibantu%20infonya%3F"
                target="_blank"
                class="btn btn-success rounded-circle p-3 position-fixed bottom-0 end-0 m-4 shadow-lg z-3 d-flex align-items-center justify-content-center animate-bounce"
                style="width: 60px; height: 60px;">
                <i class="bi bi-whatsapp fs-3 text-white"></i>
            </a>
        @endif

        <!-- Toast Container -->
        <div class="toast-container" id="toastContainer"></div>
    </div>
@endsection

@push('scripts')
    <script>
        (() => {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.from(forms).forEach((form) => {
                form.addEventListener(
                    'submit',
                    (event) => {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add('was-validated');
                    },
                    false,
                );
            });
        })();
    </script>

    @php
        $message = session()->get('success') ? session()->get('success') : null;
    @endphp
    <script>
        let alertMessage;
        alertMessage = "{{ $message }}"

        if (alertMessage !== '') {
            showToast(alertMessage)
        }
    </script>
@endpush
