@extends('layouts.app')

@push('metadata')
    <title>{{ $company->name }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/' . $company->logo) }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endpush

@push('styles')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('styles/templates/travel/simple-one.css') }}" />
@endpush

@section('content')
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <i class="fas fa-mosque"></i> Nabawi Travel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#packages">Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#facilities">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="display-4">Wujudkan Ibadah Suci Anda Bersama Kami</h1>
                        <p>Pengalaman spiritual yang tak terlupakan dengan pelayanan terbaik dan terpercaya untuk perjalanan
                            Umroh & Haji Anda.</p>
                        <div class="hero-buttons">
                            <a href="#packages" class="btn-primary-custom">Lihat Paket</a>
                            <a href="#contact" class="btn-outline-custom">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image text-center floating">
                        <img src="https://picsum.photos/seed/muslim-prayer/500/500" alt="Muslim Prayer"
                            class="img-fluid rounded-3">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-box">
                        <i class="fas fa-users"></i>
                        <div class="stat-number" data-target="15000">0</div>
                        <p>Jamaah Terlayani</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-box">
                        <i class="fas fa-calendar-check"></i>
                        <div class="stat-number" data-target="120">0</div>
                        <p>Paket Keberangkatan</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-box">
                        <i class="fas fa-award"></i>
                        <div class="stat-number" data-target="15">0</div>
                        <p>Tahun Pengalaman</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-box">
                        <i class="fas fa-star"></i>
                        <div class="stat-number" data-target="98">0</div>
                        <p>% Kepuasan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section id="packages" class="packages-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Paket Umroh & Haji</h2>
                <p>Pilih paket yang sesuai dengan kebutuhan dan budget Anda</p>
            </div>
            <div class="row">

                @foreach ($services as $item)
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="package-card">
                            <div class="package-image"
                                style="background-image: url({{ asset('storage/' . $item->thumbnail) }});">
                                <span class="package-badge">Populer</span>
                            </div>
                            <div class="package-content">
                                <h3>{{ $item->title }}</h3>
                                <div class="package-price">
                                    {{ simplePrice($item->price) }}
                                    <span>/orang</span>
                                </div>
                                <ul class="package-features">
                                    @foreach (array_values($item->metadata) as $metaItem)
                                        <li><i class="fas fa-check-circle"></i> {{ $metaItem }}</li>
                                    @endforeach
                                    {{-- <li><i class="fas fa-check-circle"></i> Hotel Bintang 3</li>
                                    <li><i class="fas fa-check-circle"></i> Visa Umroh</li>
                                    <li><i class="fas fa-check-circle"></i> Tour Leader Berpengalaman</li>
                                    <li><i class="fas fa-check-circle"></i> Makan 3x Sehari</li> --}}
                                </ul>
                                <button class="btn btn-primary w-100"
                                    onclick="showPackageDetail('{{ $item->title }}')">Detail
                                    Paket</button>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Package 2 -->
                {{-- <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="package-card">
                        <div class="package-image"
                            style="background-image: url('https://picsum.photos/seed/umroh-2/400/200');">
                            <span class="package-badge">Best Seller</span>
                        </div>
                        <div class="package-content">
                            <h3>Umroh Plus Turki</h3>
                            <div class="package-price">
                                Rp 35 Jt
                                <span>/orang</span>
                            </div>
                            <ul class="package-features">
                                <li><i class="fas fa-check-circle"></i> 12 Hari Perjalanan</li>
                                <li><i class="fas fa-check-circle"></i> Hotel Bintang 4</li>
                                <li><i class="fas fa-check-circle"></i> Visa Umroh & Turki</li>
                                <li><i class="fas fa-check-circle"></i> City Tour Istanbul</li>
                                <li><i class="fas fa-check-circle"></i> Makan & Transportasi</li>
                            </ul>
                            <button class="btn btn-primary w-100" onclick="showPackageDetail('Umroh Plus Turki')">Detail
                                Paket</button>
                        </div>
                    </div>
                </div> --}}

                <!-- Package 3 -->
                {{-- <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="package-card">
                        <div class="package-image"
                            style="background-image: url('https://picsum.photos/seed/haji-1/400/200');">
                            <span class="package-badge">Premium</span>
                        </div>
                        <div class="package-content">
                            <h3>Haji Plus</h3>
                            <div class="package-price">
                                Rp 120 Jt
                                <span>/orang</span>
                            </div>
                            <ul class="package-features">
                                <li><i class="fas fa-check-circle"></i> 40 Hari Perjalanan</li>
                                <li><i class="fas fa-check-circle"></i> Hotel Bintang 5</li>
                                <li><i class="fas fa-check-circle"></i> Visa Haji Khusus</li>
                                <li><i class="fas fa-check-circle"></i> Pendamping Muthawwif</li>
                                <li><i class="fas fa-check-circle"></i> Fasilitas VIP</li>
                            </ul>
                            <button class="btn btn-primary w-100" onclick="showPackageDetail('Haji Plus')">Detail
                                Paket</button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="facilities" class="facilities-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Fasilitas Unggulan</h2>
                <p>Kenyamanan dan kemudahan dalam setiap perjalanan ibadah Anda</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="facility-box">
                        <div class="facility-icon">
                            <i class="fas fa-hotel"></i>
                        </div>
                        <h4>Hotel Terbaik</h4>
                        <p>Akomodasi hotel berbintang dengan lokasi strategis dekat Masjidil Haram</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="facility-box">
                        <div class="facility-icon">
                            <i class="fas fa-plane"></i>
                        </div>
                        <h4>Penerbangan Nyaman</h4>
                        <p>Maskapai penerbangan terkemuka dengan jadwal penerbangan fleksibel</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="facility-box">
                        <div class="facility-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h4>Makanan Halal</h4>
                        <p>Menu makanan Indonesia yang halal dan bergizi setiap hari</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="facility-box">
                        <div class="facility-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h4>Pembimbing Profesional</h4>
                        <p>Muthawwif dan tour leader berpengalaman yang akan mendampingi Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2 style="color: white;">Testimoni Jamaah</h2>
                <p style="color: rgba(255,255,255,0.9);">Apa kata mereka tentang pengalaman bersama Nabawi Travel</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Pelayanan yang sangat memuaskan! Tour leader sangat ramah dan membantu
                            sekali. Hotel dekat dengan Masjidil Haram, sangat nyaman."</p>
                        <div class="testimonial-author">
                            <img src="https://picsum.photos/seed/person1/60/60" alt="Author" class="author-image">
                            <div class="author-info">
                                <h5>Budi Santoso</h5>
                                <p>Jakarta</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Pengalaman spiritual yang luar biasa. Semua fasilitas sesuai dengan
                            yang dijanjikan. Terima kasih Nabawi Travel!"</p>
                        <div class="testimonial-author">
                            <img src="https://picsum.photos/seed/person2/60/60" alt="Author" class="author-image">
                            <div class="author-info">
                                <h5>Siti Nurhaliza</h5>
                                <p>Surabaya</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Sangat recommended! Proses pendaftaran mudah, pembimbing profesional,
                            dan perjalanan berjalan lancar."</p>
                        <div class="testimonial-author">
                            <img src="https://picsum.photos/seed/person3/60/60" alt="Author" class="author-image">
                            <div class="author-info">
                                <h5>Ahmad Fauzi</h5>
                                <p>Bandung</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Galeri Perjalanan</h2>
                <p>Momen-momen berharga selama perjalanan ibadah</p>
            </div>
            <div class="gallery-filters" data-aos="fade-up">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="mecca">Mekkah</button>
                <button class="filter-btn" data-filter="medina">Madinah</button>
                <button class="filter-btn" data-filter="activities">Kegiatan</button>
            </div>
            <div class="row" id="galleryContainer">
                <div class="col-lg-4 col-md-6 gallery-item" data-category="mecca" data-aos="fade-up">
                    <img src="https://picsum.photos/seed/mecca1/400/300" alt="Mekkah">
                </div>
                <div class="col-lg-4 col-md-6 gallery-item" data-category="medina" data-aos="fade-up">
                    <img src="https://picsum.photos/seed/medina1/400/300" alt="Madinah">
                </div>
                <div class="col-lg-4 col-md-6 gallery-item" data-category="activities" data-aos="fade-up">
                    <img src="https://picsum.photos/seed/activity1/400/300" alt="Kegiatan">
                </div>
                <div class="col-lg-4 col-md-6 gallery-item" data-category="mecca" data-aos="fade-up">
                    <img src="https://picsum.photos/seed/mecca2/400/300" alt="Mekkah">
                </div>
                <div class="col-lg-4 col-md-6 gallery-item" data-category="medina" data-aos="fade-up">
                    <img src="https://picsum.photos/seed/medina2/400/300" alt="Madinah">
                </div>
                <div class="col-lg-4 col-md-6 gallery-item" data-category="activities" data-aos="fade-up">
                    <img src="https://picsum.photos/seed/activity2/400/300" alt="Kegiatan">
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Frequently Asked Questions</h2>
                <p>Pertanyaan yang sering diajukan oleh calon jamaah</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion" data-aos="fade-up">
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    Apa saja persyaratan untuk mendaftar Umroh?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Persyaratan utama meliputi: Paspor yang masih berlaku minimal 8 bulan, foto 4x6 berwarna
                                    latar belakang putih, kartu identitas (KTP), akta kelahiran, buku nikah (bagi yang sudah
                                    menikah), dan sertifikat vaksin meningitis.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2">
                                    Berapa lama proses pendaftaran hingga keberangkatan?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Proses pendaftaran hingga keberangkatan biasanya memakan waktu 2-3 bulan. Ini termasuk
                                    proses pengurusan visa, pembelian tiket, dan persiapan lainnya. Namun waktu bisa berubah
                                    tergantung pada ketersediaan kuota dan musim puncak.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3">
                                    Apakah biaya sudah termasuk semua fasilitas?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Biaya paket sudah termasuk tiket pesawat PP, akomodasi hotel, transportasi selama di
                                    tanah suci, makan 3x sehari, visa, dan tour leader. Namun belum termasuk biaya
                                    perlengkapan, tambahan bagasi, dan kebutuhan pribadi lainnya.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq4">
                                    Bagaimana jika jadwal keberangkatan berubah?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Jika terjadi perubahan jadwal dari pihak maskapai atau pemerintah, kami akan segera
                                    menginformasikan kepada jamaah dan memberikan opsi alternatif. Jamaah berhak membatalkan
                                    dengan pengembalian biaya sesuai ketentuan.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container" data-aos="fade-up">
            <h2>Siap Melaksanakan Ibadah?</h2>
            <p>Dapatkan penawaran terbaik dan konsultasi gratis dengan tim kami</p>
            <button class="btn-primary-custom" onclick="showRegistrationForm()">Daftar Sekarang</button>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h4><i class="fas fa-mosque"></i> Nabawi Travel</h4>
                        <p>Travel agency terpercaya untuk perjalanan ibadah Umroh dan Haji. Mewujudkan mimpi Anda beribadah
                            ke tanah suci dengan pelayanan terbaik.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="#home" style="color: rgba(255,255,255,0.8); text-decoration: none;"><i
                                        class="fas fa-chevron-right"></i> Beranda</a></li>
                            <li><a href="#packages" style="color: rgba(255,255,255,0.8); text-decoration: none;"><i
                                        class="fas fa-chevron-right"></i> Paket</a></li>
                            <li><a href="#facilities" style="color: rgba(255,255,255,0.8); text-decoration: none;"><i
                                        class="fas fa-chevron-right"></i> Fasilitas</a></li>
                            <li><a href="#gallery" style="color: rgba(255,255,255,0.8); text-decoration: none;"><i
                                        class="fas fa-chevron-right"></i> Galeri</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h4>Kontak Kami</h4>
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i> Jl. Sudirman No. 123, Jakarta</li>
                            <li><i class="fas fa-phone"></i> +62 21 1234 5678</li>
                            <li><i class="fas fa-envelope"></i> info@nabawitravel.com</li>
                            <li><i class="fas fa-clock"></i> Senin - Jumat: 09:00 - 17:00</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h4>Newsletter</h4>
                        <p>Dapatkan informasi promo dan paket terbaru dari kami</p>
                        <form class="mt-3">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Email Anda">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Nabawi Travel. All Rights Reserved. | <a href="#"
                        style="color: var(--secondary-color);">Privacy Policy</a> | <a href="#"
                        style="color: var(--secondary-color);">Terms of Service</a></p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/6281234567890" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Package Detail Modal -->
    <div class="modal fade" id="packageModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h4 id="modalPackageName"></h4>
                    <p id="modalPackageDescription"></p>
                    <h5 class="mt-4">Rincian Perjalanan:</h5>
                    <ul id="modalPackageDetails"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="showRegistrationForm()">Daftar
                        Sekarang</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Modal -->
    <div class="modal fade" id="registrationModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="registrationForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. HP</label>
                                <input type="tel" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pilih Paket</label>
                                <select class="form-select" required>
                                    <option value="">-- Pilih Paket --</option>
                                    <option>Umroh Hemat</option>
                                    <option>Umroh Plus Turki</option>
                                    <option>Haji Plus</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Pesan</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Kirim Pendaftaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JS -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for navigation links
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

        // Counter animation
        const counters = document.querySelectorAll('.stat-number');
        const speed = 200;

        const countUp = () => {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(countUp, 1);
                } else {
                    counter.innerText = target;
                    if (counter.getAttribute('data-target') === '98') {
                        counter.innerText = target + '%';
                    } else if (counter.getAttribute('data-target') === '15000') {
                        counter.innerText = target.toLocaleString('id-ID') + '+';
                    }
                }
            });
        };

        // Trigger counter animation when in viewport
        const observerOptions = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    countUp();
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }

        // Gallery filter
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');

                const filter = button.getAttribute('data-filter');

                galleryItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        }, 10);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });

        // Package detail modal
        function showPackageDetail(packageName) {
            const modal = new bootstrap.Modal(document.getElementById('packageModal'));
            const modalTitle = document.getElementById('modalPackageName');
            const modalDescription = document.getElementById('modalPackageDescription');
            const modalDetails = document.getElementById('modalPackageDetails');

            const packageData = @json($dataPackages)

            // Package details data
            // const packageData = {
            //     'Umroh Hemat': {
            //         description: 'Paket hemat untuk melaksanakan ibadah Umroh dengan fasilitas lengkap namun tetap terjangkau.',
            //         details: [
            //             'Hari 1: Berkumpul di bandara Soekarno-Hatta',
            //             'Hari 2: Tiba di Jeddah, check-in hotel Mekkah',
            //             'Hari 3-5: Ibadah Umroh dan ziarah',
            //             'Hari 6: Check-out hotel, perjalanan ke Madinah',
            //             'Hari 7-8: Ziarah di Madinah',
            //             'Hari 9: Kembali ke Indonesia'
            //         ]
            //     },
            //     'Umroh Plus Turki': {
            //         description: 'Paket Umroh dikombinasikan dengan wisata religi di Turki untuk pengalaman spiritual yang lebih berkesan.',
            //         details: [
            //             'Hari 1-3: Wisata religi di Istanbul',
            //             'Hari 4: Penerbangan ke Jeddah',
            //             'Hari 5-8: Ibadah Umroh di Mekkah',
            //             'Hari 9-11: Ziarah di Madinah',
            //             'Hari 12: Kembali ke Indonesia'
            //         ]
            //     },
            //     'Haji Plus': {
            //         description: 'Paket Haji khusus dengan fasilitas premium dan pelayanan VIP untuk kenyamanan maksimal.',
            //         details: [
            //             'Persiapan manasik di Indonesia',
            //             'Penerbangan kelas bisnis',
            //             'Akomodasi hotel dekat Masjidil Haram',
            //             'Pendampingan muthawwif profesional',
            //             'Fasilitas transportasi khusus',
            //             'Paket catering khusus'
            //         ]
            //     }
            // };

            const data = packageData[packageName];
            modalTitle.textContent = packageName;
            modalDescription.textContent = data.description;
            modalDetails.innerHTML = data.details.map(detail => `<li>${detail}</li>`).join('');

            modal.show();
        }

        // Registration modal
        function showRegistrationForm() {
            const modal = new bootstrap.Modal(document.getElementById('registrationModal'));
            modal.show();
        }

        // Form submission
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Show success message
            const form = this;
            const originalContent = form.innerHTML;
            form.innerHTML = `
                <div class="text-center py-5">
                    <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    <h4 class="mt-3">Pendaftaran Berhasil!</h4>
                    <p>Tim kami akan segera menghubungi Anda.</p>
                </div>
            `;

            // Reset form after 3 seconds
            setTimeout(() => {
                form.innerHTML = originalContent;
                bootstrap.Modal.getInstance(document.getElementById('registrationModal')).hide();
            }, 3000);
        });

        // Newsletter form
        document.querySelector('.footer-widget form').addEventListener('submit', function(e) {
            e.preventDefault();
            const input = this.querySelector('input[type="email"]');
            if (input.value) {
                const button = this.querySelector('button');
                const originalContent = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check"></i>';
                button.classList.remove('btn-warning');
                button.classList.add('btn-success');
                input.value = '';

                setTimeout(() => {
                    button.innerHTML = originalContent;
                    button.classList.remove('btn-success');
                    button.classList.add('btn-warning');
                }, 2000);
            }
        });
    </script>
@endpush
