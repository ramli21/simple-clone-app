@extends('layouts.tailwind')

@push('metadata')
    <!-- SEO Meta Tags -->
    <title>Sistem Manajemen Travel Umroh & Haji Terbaik - SabilSys</title>
    <meta name="description"
        content="Kelola jama'ah, manifest, keuangan, dan inventory travel Umroh & Haji Anda secara otomatis dengan sistem Akhritech. Cepat, aman, dan mudah digunakan.">
    <meta name="keywords" content="software umroh, aplikasi haji, manajemen travel umroh, sistem informasi travel, akhritech">
    <meta name="author" content="Akhritech">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Sistem Manajemen Travel Umroh & Haji Terbaik - SabilSys">
    <meta property="og:description"
        content="Kelola jama'ah, manifest, keuangan, dan inventory travel Umroh & Haji Anda secara otomatis dengan sistem Akhritech.">
    <meta property="og:image" content="{{ asset('images/akhritech-banner.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Sistem Manajemen Travel Umroh & Haji Terbaik - SabilSys">
    <meta property="twitter:description"
        content="Kelola jama'ah, manifest, keuangan, dan inventory travel Umroh & Haji Anda secara otomatis dengan sistem Akhritech.">
    <meta property="twitter:image" content="{{ asset('images/akhritech-banner.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="min-h-[80vh] flex items-center bg-gradient-to-br from-slate-900 to-slate-800 relative overflow-hidden">
        {{-- Radial glow background --}}
        <div
            class="absolute -top-1/2 -right-1/5 w-4/5 h-[150%] bg-[radial-gradient(circle,rgba(25,124,147,0.15)_0%,transparent_70%)] pointer-events-none">
        </div>

        <div class="container mx-auto px-4 py-20 lg:py-0 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <!-- Left Content -->
                <div class="lg:w-1/2 text-center lg:text-left">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight text-white mb-6"
                        data-aos="fade-up">
                        Kelola Travel Umroh Lebih Profesional & Tanpa Ribet
                    </h1>
                    <p class="text-lg text-slate-400 leading-relaxed mb-8 max-w-xl mx-auto lg:mx-0" data-aos="fade-up"
                        data-aos-delay="100">
                        Sistem manajemen terintegrasi untuk menangani jama'ah, manifest, hingga laporan keuangan dalam
                        satu dasbor digital. Cepat, aman, dan mudah digunakan.
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center lg:justify-start" data-aos="fade-up"
                        data-aos-delay="200">
                        <a href="#kontak"
                            class="inline-block bg-[#197c93] hover:bg-[#156a7d] text-white font-semibold px-8 py-3.5 rounded-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_10px_25px_-5px_rgba(25,124,147,0.4)]">
                            Coba Demo Gratis
                        </a>
                        <a href="#fitur"
                            class="inline-block bg-transparent text-slate-400 hover:text-[#197c93] font-semibold px-8 py-3.5 rounded-lg border-2 border-slate-700 hover:border-[#197c93] transition-all duration-300">
                            Pelajari Fitur
                        </a>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="lg:w-1/2 flex justify-center lg:justify-end mt-12 lg:mt-0 floating" data-aos="fade-left"
                    data-aos-delay="300">
                    <img src="{{ asset('images/undraw_investment.png') }}" alt="Akhritech - Developer Founder"
                        class="w-full max-w-sm lg:max-w-md rounded-2xl shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] border border-white/10">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-slate-900 text-center mb-4" data-aos="fade-up">
                Mengapa Agen Travel Memilih <br />SabilSys dari Akhritech?
            </h2>
            <p class="text-lg text-slate-500 text-center mb-12" data-aos="fade-up" data-aos-delay="100">
                Solusi digital yang dirancang khusus untuk kebutuhan travel Umroh & Haji
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="group bg-white border border-slate-200 hover:border-[#197c93] rounded-2xl p-8 text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.15)]"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-[#197c93] to-[#156a7d] rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Manajemen Jamaah</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Input data jama'ah, upload dokumen paspor/visa, dan kelola manifest grup hanya dalam hitungan
                        detik.
                    </p>
                </div>

                <!-- Feature Card 2 -->
                <div class="group bg-white border border-slate-200 hover:border-[#197c93] rounded-2xl p-8 text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.15)]"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-[#197c93] to-[#156a7d] rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                        <i class="fas fa-receipt text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Invoicing Otomatis</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Pantau sisa pembayaran, cicilan, dan cetak kuitansi profesional untuk jama'ah secara otomatis.
                    </p>
                </div>

                <!-- Feature Card 3 -->
                <div class="group bg-white border border-slate-200 hover:border-[#197c93] rounded-2xl p-8 text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.15)]"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-[#197c93] to-[#156a7d] rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                        <i class="fas fa-cloud text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Akses Kapan Saja</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Berbasis cloud. Pantau bisnis Anda dari rumah, kantor, atau saat sedang mendampingi jama'ah di
                        Tanah Suci.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="harga" class="py-20 bg-slate-50">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-slate-900 text-center mb-4" data-aos="fade-up">
                Investasi Untuk Pertumbuhan Bisnis
            </h2>
            <p class="text-lg text-slate-500 text-center mb-12" data-aos="fade-up" data-aos-delay="100">
                Pilih paket yang sesuai dengan skala travel Anda
            </p>

            <div class="flex justify-center">
                <div class="w-full max-w-md" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="bg-white border-2 border-[#197c93] rounded-2xl p-10 text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_25px_50px_-12px_rgba(25,124,147,0.25)]">
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Smart Launch</h3>
                        <p class="text-slate-400 mb-3">Untuk Agen Kecil/Menengah</p>
                        <div class="text-slate-400 line-through text-xl mb-1">Rp. 500.000</div>
                        <div class="text-5xl font-extrabold text-[#197c93] mb-1">Rp 359.000</div>
                        <div class="text-slate-500 mb-6">per bulan</div>

                        <hr class="border-slate-200 mb-4">
                        <p class="text-left text-slate-600 mb-4">
                            Biaya Setup (Sekali di Awal): <b>Rp1.500.000</b>
                        </p>

                        <!-- Discount Section for Annual Payment -->
                        <div
                            class="bg-[rgba(25,124,147,0.05)] border border-[rgba(25,124,147,0.2)] rounded-xl p-5 my-5 text-left">
                            <div
                                class="inline-block bg-gradient-to-r from-emerald-500 to-emerald-600 text-white text-xs font-bold px-4 py-1.5 rounded-full mb-3">
                                <i class="bi bi-lightning-fill me-1"></i>HEMAT 20%
                            </div>
                            <div class="flex items-center gap-2 text-sm font-semibold text-slate-900 mb-3">
                                <i class="bi bi-calendar-event text-[#197c93]"></i>Pembayaran Tahunan
                            </div>
                            <div class="text-xs text-slate-500 font-mono mb-1">
                                Rp 349.000 × 12 bulan = Rp 4.188.000<br>
                                <span class="text-emerald-500">- Diskon 20% = Rp 837.600</span>
                            </div>
                            <div class="text-3xl font-bold text-emerald-500 mt-3">
                                Rp 3.350.000
                            </div>
                            <div class="text-xs text-slate-500 mt-1">
                                Cicilan bulanan setara: <b>Rp 279.167</b>
                            </div>
                        </div>

                        <ul class="list-none p-0 mb-8 text-left space-y-0">
                            <li class="py-3 border-b border-slate-200 text-slate-600"><i
                                    class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Landing Page Promosi</li>
                            <li class="py-3 border-b border-slate-200 text-slate-600"><i
                                    class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Manajemen Paket Perjalanan.
                            </li>
                            <li class="py-3 border-b border-slate-200 text-slate-600"><i
                                    class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Manajemen Itinerary.</li>
                            <li class="py-3 border-b border-slate-200 text-slate-600"><i
                                    class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Manajemen Inquiry.</li>
                            <li class="py-3 border-b border-slate-200 text-slate-600"><i
                                    class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Sistem Dashboard Manajemen
                                Jamaah (Fitur Inti).</li>
                            <li class="py-3 border-b border-slate-200 text-slate-600"><i
                                    class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Manifest Jamaah.</li>
                            <li class="py-3 border-b border-slate-200 text-slate-600"><i
                                    class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Unlimited Data Jamaah.</li>
                            <li class="py-3 border-b border-slate-200 text-slate-600"><i
                                    class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Manajemen Booking.</li>
                            <li class="py-3 border-b border-slate-200 text-slate-600"><i
                                    class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Manajemen Pembayaran Sederhana.
                            </li>
                            <li class="py-3 border-b border-slate-200 text-slate-600"><i
                                    class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Update sistem berkala secara
                                otomatis.</li>
                            <li class="py-3 text-slate-600"><i
                                    class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Support via WhatsApp (Respon
                                1x24 jam).</li>
                        </ul>
                        <a href="#kontak"
                            class="block w-full bg-[#197c93] hover:bg-[#156a7d] text-white font-semibold px-8 py-3.5 rounded-lg text-center transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_10px_25px_-5px_rgba(25,124,147,0.4)]">
                            Pilih Paket Ini
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Free Trial Section -->
    <section class="py-20 bg-gradient-to-br from-slate-900 to-slate-800 relative overflow-hidden">
        {{-- Radial glow --}}
        <div
            class="absolute -top-1/2 -left-1/5 w-3/5 h-[200%] bg-[radial-gradient(circle,rgba(25,124,147,0.2)_0%,transparent_70%)] pointer-events-none">
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="inline-block bg-[rgba(25,124,147,0.2)] text-[#197c93] border border-[rgba(25,124,147,0.3)] px-5 py-2 rounded-full font-semibold text-sm mb-6"
                data-aos="fade-up">
                <i class="bi bi-gift me-2"></i>Penawaran Spesial
            </div>
            <h2 class="text-4xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Coba Gratis Selama 60 Hari!
            </h2>
            <p class="text-lg text-slate-400 mb-8 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Tidak perlu kartu kredit. Nikmati akses penuh ke semua fitur sistem manajemen travel
                kami selama 2 bulan. Tanpa komitmen, tanpa biaya tersembunyi.
            </p>

            <div class="flex flex-wrap justify-center gap-8 mb-8" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center gap-2 text-slate-200">
                    <i class="bi bi-check-circle-fill text-[#197c93] text-xl"></i>
                    <span>Akses Penuh Semua Fitur</span>
                </div>
                <div class="flex items-center gap-2 text-slate-200">
                    <i class="bi bi-check-circle-fill text-[#197c93] text-xl"></i>
                    <span>Tanpa Kartu Kredit</span>
                </div>
                <div class="flex items-center gap-2 text-slate-200">
                    <i class="bi bi-check-circle-fill text-[#197c93] text-xl"></i>
                    <span>Bantuan Setup Gratis</span>
                </div>
            </div>

            <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="400">
                <a href="#kontak"
                    class="inline-block bg-white hover:bg-slate-100 text-[#197c93] font-semibold px-8 py-3.5 rounded-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_10px_25px_-5px_rgba(255,255,255,0.3)]">
                    <i class="bi bi-rocket-takeoff me-2"></i>Mulai Trial Sekarang
                </a>
                <a href="#fitur"
                    class="inline-block bg-transparent text-white font-semibold px-8 py-3.5 rounded-lg border-2 border-white/30 hover:border-white hover:bg-white/10 transition-all duration-300">
                    Pelajari Dulu
                </a>
            </div>

            <p class="text-slate-500 text-sm mt-6" data-aos="fade-up" data-aos-delay="500">
                *Setelah 60 hari, Anda dapat memilih untuk berlangganan atau menghentikan penggunaan.
            </p>
        </div>
    </section>

    <!-- Gallery/Screenshots Section -->
    <section id="tampilan" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-slate-900 text-center mb-4" data-aos="fade-up">Tampilan Aplikasi</h2>
            <p class="text-lg text-slate-500 text-center mb-12" data-aos="fade-up" data-aos-delay="100">
                Lihat langsung interface dan fitur utama sistem kami
            </p>

            <!-- Image Gallery -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <div data-aos="fade-up" data-aos-delay="100">
                    {{-- <a href="{{ asset('images/dashboard.jpg') }}" class="block no-underline cursor-zoom-in" data-glightbox="gallery" title="Dashboard Admin"> --}}
                    <div
                        class="relative rounded-xl overflow-hidden aspect-video bg-slate-100 cursor-pointer transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.2)]">
                        <img src="{{ asset('images/dashboard.jpg') }}" alt="Dashboard Admin" loading="lazy"
                            class="w-full h-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-5">
                            <h5 class="text-white font-semibold m-0">Dashboard Admin</h5>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    {{-- <a href="{{ asset('images/dashboard-jamaah.jpg') }}" class="block no-underline cursor-zoom-in" data-glightbox="gallery" title="Manajemen Jamaah"> --}}
                    <div
                        class="relative rounded-xl overflow-hidden aspect-video bg-slate-100 cursor-pointer transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.2)]">
                        <img src="{{ asset('images/dashboard-jamaah.jpg') }}" alt="Manajemen Jamaah" loading="lazy"
                            class="w-full h-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-5">
                            <h5 class="text-white font-semibold m-0">Manajemen Jamaah</h5>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    {{-- <a href="{{ asset('images/dashboard-booking.jpg') }}" class="block no-underline cursor-zoom-in" data-glightbox="gallery" title="Manajemen Booking"> --}}
                    <div
                        class="relative rounded-xl overflow-hidden aspect-video bg-slate-100 cursor-pointer transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.2)]">
                        <img src="{{ asset('images/dashboard-booking.jpg') }}" alt="Manajemen Booking" loading="lazy"
                            class="w-full h-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-5">
                            <h5 class="text-white font-semibold m-0">Manajemen Booking</h5>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>

                <div data-aos="fade-up" data-aos-delay="400">
                    {{-- <a href="{{ asset('images/landingpage-travel.jpg') }}" class="block no-underline cursor-zoom-in" data-glightbox="gallery" title="Portal Jamaah"> --}}
                    <div
                        class="relative rounded-xl overflow-hidden aspect-video bg-slate-100 cursor-pointer transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.2)]">
                        <img src="{{ asset('images/landingpage-travel.jpg') }}" alt="Portal Jamaah" loading="lazy"
                            class="w-full h-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-5">
                            <h5 class="text-white font-semibold m-0">Portal Jamaah</h5>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>
            </div>

            <!-- Video Section -->
            <h3 class="text-2xl font-bold text-slate-900 text-center mb-8" data-aos="fade-up">Video Tutorial</h3>
            <div class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-full max-w-3xl">
                    <div class="relative rounded-xl overflow-hidden aspect-video bg-slate-100">
                        <!-- Ganti src video dengan video asli -->
                        <video controls preload="metadata" class="w-full h-full object-cover">
                            <source src="{{ asset('videos/demo-travel.mp4') }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                        <!-- Placeholder jika video tidak ada -->
                        <div class="text-center py-16 bg-slate-100" id="videoPlaceholder">
                            <i class="bi bi-play-circle text-[#197c93]" style="font-size: 4rem;"></i>
                            <p class="mt-3 text-slate-500">Video Demo Aplikasi</p>
                            <small class="text-slate-400">Hubungi kami untuk meminta video demo</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Steps Section -->
    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-slate-900 mb-12">3 Langkah Mulai Digitalisasi Travel Anda</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
                <div class="p-6">
                    <span
                        class="inline-block bg-[#197c93] text-white text-sm font-bold w-8 h-8 rounded-full flex items-center justify-center mx-auto mb-4">1</span>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">Pilih Paket & Bayar</h4>
                    <p class="text-slate-500">Pilih layanan sesuai kebutuhan dan lakukan pembayaran aman.</p>
                </div>
                <div class="p-6 md:border-x border-slate-200">
                    <span
                        class="inline-block bg-[#197c93] text-white text-sm font-bold w-8 h-8 rounded-full flex items-center justify-center mx-auto mb-4">2</span>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">Proses Setup (3x24 Jam)</h4>
                    <p class="text-slate-500">Tim kami menyiapkan Server, Dashboard, dan Landing Page khusus untuk agen
                        Anda.</p>
                </div>
                <div class="p-6">
                    <span
                        class="inline-block bg-[#197c93] text-white text-sm font-bold w-8 h-8 rounded-full flex items-center justify-center mx-auto mb-4">3</span>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">Siap Digunakan</h4>
                    <p class="text-slate-500">Terima akses login dan mulai kelola jamaah Anda dengan lebih profesional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-center">
                <div class="w-full max-w-2xl text-center">
                    <h2 class="text-4xl font-bold text-slate-900 mb-4" data-aos="fade-up">
                        Siap Mengembangkan Bisnis Travel Anda?
                    </h2>
                    <p class="text-lg text-slate-500 mb-10" data-aos="fade-up" data-aos-delay="100">
                        Hubungi sekarang untuk konsultasi gratis dan demo sistem
                    </p>
                    <div data-aos="fade-up" data-aos-delay="200">
                        <a href="https://wa.me/{{ companyProfile()->phone }}?text=Halo%20Akhri,%20saya%20tertarik%20dengan%20sistem%20manajemen%20travel"
                            class="inline-block bg-[#197c93] hover:bg-[#156a7d] text-white font-semibold px-8 py-3.5 rounded-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_10px_25px_-5px_rgba(25,124,147,0.4)]"
                            target="_blank">
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
