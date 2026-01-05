<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solusi Digital Enterprise | Fullstack Developer</title>
    <meta name="description" content="Transformasi digital untuk Pabrik dan Travel Agency.">

    <style>

    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary d-flex align-items-center gap-2" href="#">
                <div class="bg-primary text-white rounded d-flex justify-content-center align-items-center"
                    style="width: 32px; height: 32px;">E</div>
                EnterpriseDev
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center gap-3">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#solutions">Solutions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#showcase">Showcase</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
                    <li class="nav-item ms-lg-2">
                        <a href="#contact" class="btn btn-primary rounded-pill">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- A. Hero Section -->
    <section id="home" class="position-relative text-white d-flex align-items-center min-vh-100"
        style="background-color: #0f172a; padding-top: 80px;">
        <!-- Decoration Blobs -->
        <div class="blob bg-primary rounded-circle" style="width: 300px; height: 300px; top: -100px; right: -50px;">
        </div>
        <div class="blob bg-info rounded-circle"
            style="width: 250px; height: 250px; bottom: 0; left: -50px; opacity: 0.2;"></div>

        <div class="container position-relative z-1">
            <div class="row justify-content-center text-center reveal active">
                <div class="col-lg-10">
                    <span
                        class="badge bg-primary bg-opacity-50 border border-primary text-primary bg-opacity-10 text-white-50 mb-4 px-3 py-2 rounded-pill">
                        Mitra Teknologi Bisnis Anda
                    </span>
                    <h1 class="display-4 fw-bold mb-4 lh-sm">
                        Transformasi Bisnis Lokal dengan <br>
                        <span class="text-info">Website Profesional & Sistem Terintegrasi.</span>
                    </h1>
                    <p class="lead text-white-50 mb-5 mx-auto" style="max-width: 700px;">
                        Membantu Pabrik & Travel Agensi meningkatkan kredibilitas dan penjualan melalui platform digital
                        yang cepat, aman, dan mudah dikelola.
                    </p>
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                        <a href="#showcase" class="btn btn-light text-primary fw-bold btn-lg px-4">
                            <i class="bi bi-eye me-2"></i> Lihat Solusi
                        </a>
                        <a href="#contact" class="btn btn-outline-light btn-lg px-4">
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
                    <img src="https://picsum.photos/seed/office/600/400" alt="Profesional Office"
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
                    fitur kami.</p>
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
                                dirancang khusus untuk manufaktur.</p>
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item bg-transparent px-0 d-flex gap-3">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <div><strong>Digital Product Catalog:</strong> Tampilkan kualitas produksi dengan
                                        galeri foto high-res.</div>
                                </li>
                                <li class="list-group-item bg-transparent px-0 d-flex gap-3">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <div><strong>Form RFQ (Request for Quotation):</strong> Calon pembeli bisa request
                                        harga kustom berdasarkan qty.</div>
                                </li>
                                <li class="list-group-item bg-transparent px-0 d-flex gap-3">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <div><strong>Stock Tracking:</strong> Monitoring sederhana status produksi untuk
                                        update ke klien.</div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <img src="https://picsum.photos/seed/factory/800/500" alt="Industrial Web"
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
                                pelayanan, biarkan sistem yang menghitung.</p>
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item bg-transparent px-0 d-flex gap-3">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <div><strong>Real-time Seat Availability:</strong> Jamaah bisa melihat sisa kuota
                                        kursi secara langsung.</div>
                                </li>
                                <li class="list-group-item bg-transparent px-0 d-flex gap-3">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <div><strong>Automated Booking System:</strong> Formulir pendaftaran online yang
                                        terintegrasi.</div>
                                </li>
                                <li class="list-group-item bg-transparent px-0 d-flex gap-3">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <div><strong>Itinerary Builder:</strong> Tampilkan jadwal hari-per-hari yang
                                        menarik.</div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <img src="https://picsum.photos/seed/travel/800/500" alt="Travel Web"
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

                        <div class="row g-0" style="min-height: 500px;">
                            <!-- Sidebar -->
                            <div class="col-md-3 bg-white border-end d-none d-md-block p-3">
                                <h6 class="fw-bold text-uppercase text-muted mb-4 small">Admin Menu</h6>
                                <div class="nav flex-column nav-pills">
                                    <a class="nav-link active bg-primary text-white mb-2" href="#">Dashboard</a>
                                    <a class="nav-link text-secondary mb-2" href="#">Products / Paket</a>
                                    <a class="nav-link text-secondary mb-2" href="#">Orders / Booking</a>
                                    <a class="nav-link text-secondary mb-2" href="#">Settings</a>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="col-md-9 bg-light p-4 overflow-auto" style="max-height: 500px;">
                                <span class="badge bg-warning text-dark mb-3">Demo Mode</span>
                                <h4 class="fw-bold mb-4">Ringkasan Penjualan</h4>

                                <div class="row g-3 mb-4">
                                    <div class="col-6">
                                        <div class="card border-0 shadow-sm h-100">
                                            <div class="card-body">
                                                <small class="text-muted">Total Penjualan</small>
                                                <h5 class="fw-bold mb-0">Rp 125.000.000</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card border-0 shadow-sm h-100">
                                            <div class="card-body">
                                                <small class="text-muted">Pesanan Baru</small>
                                                <h5 class="fw-bold mb-0 text-primary">12 Order</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Interactive Table -->
                                <div class="card border-0 shadow-sm">
                                    <div
                                        class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                                        <h6 class="fw-bold mb-0">Daftar Produk</h6>
                                        <button class="btn btn-primary btn-sm"
                                            onclick="showToast('Fitur tambah data (Simulasi)')">+ Tambah</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0 align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Nama Paket / Produk</th>
                                                    <th>Harga</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Paket Umroh Premium</td>
                                                    <td>Rp 35.000.000</td>
                                                    <td><span
                                                            class="badge bg-success bg-opacity-10 text-success">Aktif</span>
                                                    </td>
                                                    <td><button class="btn btn-sm btn-link text-primary p-0"
                                                            onclick="editPrice(this)">Edit Harga</button></td>
                                                </tr>
                                                <tr>
                                                    <td>Kain Katun Jepang</td>
                                                    <td>Rp 85.000 /m</td>
                                                    <td><span
                                                            class="badge bg-success bg-opacity-10 text-success">Aktif</span>
                                                    </td>
                                                    <td><button class="btn btn-sm btn-link text-primary p-0"
                                                            onclick="editPrice(this)">Edit Harga</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <small class="text-muted mt-2 d-block">*Klik "Edit Harga" untuk mencoba
                                    interaksi.</small>
                            </div>
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
                                    Domain .com (1 Thn)</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Integrasi
                                    WhatsApp</li>
                                <li class="text-muted"><i class="bi bi-x-circle me-2"></i>Admin Panel</li>
                            </ul>
                            <a href="#contact" class="btn btn-outline-primary w-100 rounded-pill">Pilih Paket Ini</a>
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
                            <p class="text-secondary small mb-4">Solusi lengkap Pabrik/Travel.</p>
                            <h3 class="fw-bold mb-4">Rp 7.500.000</h3>
                            <ul class="list-unstyled mb-4 text-secondary small">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Multi
                                    Halaman</li>
                                <li class="mb-2"><i
                                        class="bi bi-check-circle-fill text-success me-2"></i><strong>Admin Panel
                                        Dashboard</strong></li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Fitur
                                    Katalog / Paket</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>RFQ /
                                    Booking System</li>
                                <li class="mb-2"><i
                                        class="bi bi-check-circle-fill text-success me-2"></i>Maintenance 3 Bulan</li>
                            </ul>
                            <a href="#contact" class="btn btn-primary w-100 rounded-pill">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-dark text-white-50 pt-5 pb-3">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-lg-4">
                    <h5 class="text-white fw-bold mb-3 d-flex align-items-center gap-2">
                        <span
                            class="bg-white text-dark rounded-circle d-flex justify-content-center align-items-center"
                            style="width: 30px; height: 30px;">E</span> EnterpriseDev
                    </h5>
                    <p class="small">Partner teknologi terpercaya untuk transformasi bisnis manufaktur dan pariwisata
                        Indonesia.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white"><i class="bi bi-linkedin fs-5"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram fs-5"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <h6 class="text-white fw-bold mb-3">Menu</h6>
                    <ul class="list-unstyled small vstack gap-2">
                        <li><a href="#home" class="text-decoration-none text-white-50 hover-white">Home</a></li>
                        <li><a href="#solutions" class="text-decoration-none text-white-50 hover-white">Solutions</a>
                        </li>
                        <li><a href="#pricing" class="text-decoration-none text-white-50 hover-white">Pricing</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3">
                    <h6 class="text-white fw-bold mb-3">Kontak</h6>
                    <ul class="list-unstyled small vstack gap-2">
                        <li><i class="bi bi-telephone me-2"></i> +62 812 3456 7890</li>
                        <li><i class="bi bi-envelope me-2"></i> hello@enterprisedev.com</li>
                        <li><i class="bi bi-geo-alt me-2"></i> Jakarta Selatan</li>
                    </ul>
                </div>
            </div>
            <hr class="border-secondary">
            <div class="text-center small">
                &copy; 2023 EnterpriseDev. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp -->
    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20jasa%20Anda" target="_blank"
        class="btn btn-success rounded-circle p-3 position-fixed bottom-0 end-0 m-4 shadow-lg z-3 d-flex align-items-center justify-content-center animate-bounce"
        style="width: 60px; height: 60px;">
        <i class="bi bi-whatsapp fs-3 text-white"></i>
    </a>

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        // 1. Navbar Background on Scroll
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-sm');
            } else {
                navbar.classList.remove('shadow-sm');
            }
        });

        // 2. Scroll Reveal Animation Logic
        const revealElements = document.querySelectorAll('.reveal');

        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15,
        });

        revealElements.forEach(el => revealObserver.observe(el));

        // 3. Dashboard Interaction Simulation
        function showToast(message) {
            const container = document.getElementById('toastContainer');
            const toastEl = document.createElement('div');
            toastEl.className = 'toast align-items-center text-white bg-primary border-0 show';
            toastEl.setAttribute('role', 'alert');
            toastEl.setAttribute('aria-live', 'assertive');
            toastEl.setAttribute('aria-atomic', 'true');

            toastEl.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="bi bi-info-circle me-2"></i> ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            `;

            container.appendChild(toastEl);

            setTimeout(() => {
                toastEl.classList.remove('show');
                setTimeout(() => toastEl.remove(), 500);
            }, 3000);
        }

        function editPrice(btn) {
            const originalText = btn.innerText;
            btn.innerText = "Loading...";
            btn.disabled = true;

            setTimeout(() => {
                showToast("Simulasi: Form edit harga muncul.");
                btn.innerText = originalText;
                btn.disabled = false;
            }, 800);
        }
    </script>
</body>

</html>
