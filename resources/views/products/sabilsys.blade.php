@extends('layouts.tailwind')

@push('metadata')
    <!-- SEO Meta Tags -->
    <title>SabilSys - Sistem Manajemen Travel Haji & Umroh | Program Mitra Perdana</title>
    <meta name="description"
        content="Rapikan operasional travel Haji & Umroh dengan SabilSys: kelola data jamaah, dokumen, manifest, cicilan, kuitansi digital, dan inquiry dalam satu sistem.">
    <meta name="keywords" content="software umroh, aplikasi haji, manajemen travel umroh, sistem informasi travel, akhritech">
    <meta name="author" content="Akhritech">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="SabilSys - Sistem Manajemen Travel Haji & Umroh">
    <meta property="og:description"
        content="Rapikan operasional travel Haji & Umroh dengan SabilSys, sistem manajemen terpadu berbasis web.">
    <meta property="og:image" content="{{ asset('images/akhritech-banner.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="SabilSys - Sistem Manajemen Travel Haji & Umroh">
    <meta property="twitter:description"
        content="Rapikan operasional travel Haji & Umroh dengan SabilSys, sistem manajemen terpadu berbasis web.">
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
                        Digitalisasi Operasional Travel Haji & Umroh, Lebih Rapi dan Terpercaya
                    </h1>
                    <p class="text-lg text-slate-400 leading-relaxed mb-8 max-w-xl mx-auto lg:mx-0" data-aos="fade-up"
                        data-aos-delay="100">
                        SabilSys membantu biro perjalanan mengelola paket, data dan dokumen jamaah, manifest, serta
                        pembayaran dalam satu sistem berbasis web—sekaligus menghadirkan layanan yang lebih profesional
                        di mata calon jamaah.
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center lg:justify-start" data-aos="fade-up"
                        data-aos-delay="200">
                        <a href="https://travel.akhritech.com" target="_blank" rel="noopener noreferrer"
                            class="inline-block bg-[#197c93] hover:bg-[#156a7d] text-white font-semibold px-8 py-3.5 rounded-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_10px_25px_-5px_rgba(25,124,147,0.4)]">
                            Lihat Demo SabilSys
                        </a>
                        <a href="#kontak"
                            class="inline-block bg-transparent text-slate-400 hover:text-[#197c93] font-semibold px-8 py-3.5 rounded-lg border-2 border-slate-700 hover:border-[#197c93] transition-all duration-300">
                            Diskusikan Kemitraan
                        </a>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="lg:w-1/2 flex justify-center lg:justify-end mt-12 lg:mt-0 floating" data-aos="fade-left"
                    data-aos-delay="300">
                    <img src="{{ asset('images/dashboard.jpg') }}" alt="Dashboard manajemen travel SabilSys"
                        class="w-full max-w-sm lg:max-w-md rounded-2xl shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] border border-white/10">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-slate-900 text-center mb-4" data-aos="fade-up">
                Operasional Travel Lebih Terkendali dengan SabilSys
            </h2>
            <p class="text-lg text-slate-500 text-center mb-12" data-aos="fade-up" data-aos-delay="100">
                Dirancang untuk membantu biro Haji & Umroh beralih dari pencatatan manual ke alur kerja yang rapi.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="group bg-white border border-slate-200 hover:border-[#197c93] rounded-2xl p-8 text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.15)]"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-[#197c93] to-[#156a7d] rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Bangun Kepercayaan Jamaah</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Tampilkan katalog paket perjalanan yang profesional. Invoice dan kuitansi digital menggunakan
                        identitas biro Anda membantu informasi pembayaran tersampaikan dengan jelas.
                    </p>
                </div>

                <!-- Feature Card 2 -->
                <div class="group bg-white border border-slate-200 hover:border-[#197c93] rounded-2xl p-8 text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.15)]"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-[#197c93] to-[#156a7d] rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                        <i class="fas fa-receipt text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Data dan Dokumen Terpusat</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Simpan profil, data ahli waris, dan berkas jamaah dalam satu tempat. Susun manifest grup tanpa
                        perlu mencari data dari banyak file.
                    </p>
                </div>

                <!-- Feature Card 3 -->
                <div class="group bg-white border border-slate-200 hover:border-[#197c93] rounded-2xl p-8 text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.15)]"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-[#197c93] to-[#156a7d] rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                        <i class="fas fa-cloud text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Pantau Keuangan dari Mana Saja</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Catat pembayaran bertahap dan pantau sisa tagihan secara teratur. Akses sistem online untuk
                        melihat pendaftaran dan arus kas, di kantor maupun saat mendampingi jamaah.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnership Packages -->
    <section id="harga" class="py-20 bg-slate-50">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
                <span class="inline-block bg-[#197c93]/10 text-[#197c93] px-4 py-2 rounded-full font-semibold text-sm mb-4">
                    Program Mitra Perdana
                </span>
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mb-4">
                    Pilih Skema Kemitraan yang Tepat
                </h2>
                <p class="text-lg text-slate-500">
                    Penawaran khusus untuk membantu biro perjalanan memulai digitalisasi dengan pendampingan langsung.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <article class="bg-white border-2 border-[#197c93] rounded-2xl p-7 sm:p-9 shadow-lg" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="text-sm font-bold text-[#197c93] uppercase tracking-wide mb-2">Opsi 1</div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-2">Paket Berlangganan</h3>
                    <p class="text-slate-500 mb-6">Untuk biaya awal yang lebih ringan, termasuk pengelolaan server.</p>

                    <div class="rounded-xl bg-slate-50 p-5 mb-6">
                        <p class="text-slate-500 line-through">Harga normal Rp350.000/bulan</p>
                        <p class="text-slate-900 font-semibold mt-3">Pilih termin pembayaran:</p>
                        <div class="mt-3 space-y-3">
                            <div class="flex justify-between gap-4">
                                <span class="text-slate-600">Per 6 bulan</span>
                                <span class="font-bold text-slate-900">Rp1.500.000 <span class="font-normal text-slate-500">(Rp250.000/bulan)</span></span>
                            </div>
                            <div class="flex justify-between gap-4">
                                <span class="text-slate-600">Per 1 tahun</span>
                                <span class="font-bold text-[#197c93]">Rp2.700.000 <span class="font-normal text-slate-500">(Rp225.000/bulan)</span></span>
                            </div>
                            <p class="text-sm font-semibold text-emerald-700">Hemat Rp1.500.000 dibanding tarif normal.</p>
                        </div>
                    </div>

                    <ul class="space-y-3 text-slate-600 mb-8">
                        <li><i class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Server, domain, dan maintenance selama masa berlangganan aktif.</li>
                        <li><i class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Biaya pemasangan Rp300.000 digratiskan untuk pembayaran 1 tahun.</li>
                        <li><i class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Panduan penggunaan dan bantuan teknis melalui WhatsApp.</li>
                    </ul>
                    <a href="https://wa.me/{{ companyProfile()->phone }}?text={{ urlencode('Halo, saya ingin berdiskusi tentang Paket Berlangganan SabilSys untuk travel Haji/Umroh saya.') }}"
                        target="_blank" rel="noopener noreferrer"
                        class="block w-full bg-[#197c93] hover:bg-[#156a7d] text-white font-semibold px-6 py-3.5 rounded-lg text-center transition-colors">
                        Diskusikan Paket Berlangganan
                    </a>
                </article>

                <article class="bg-white border border-slate-200 rounded-2xl p-7 sm:p-9 shadow-lg" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="text-sm font-bold text-[#197c93] uppercase tracking-wide mb-2">Opsi 2</div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-2">Beli Lepas (Hak Guna Pakai)</h3>
                    <p class="text-slate-500 mb-6">Untuk travel yang ingin menggunakan sistem dalam jangka panjang.</p>

                    <div class="rounded-xl bg-slate-50 p-5 mb-6">
                        <p class="text-slate-500 line-through">Harga normal Rp10.000.000</p>
                        <p class="text-slate-900 mt-2">Diskon Mitra Perdana</p>
                        <p class="text-3xl font-extrabold text-[#197c93] mt-1">Rp8.000.000</p>
                        <p class="text-slate-500 mt-2">
                            Dapat diangsur 2 kali: Rp4.000.000 saat instalasi dan Rp4.000.000 di bulan ke-2.
                        </p>
                    </div>

                    <ul class="space-y-3 text-slate-600 mb-8">
                        <li><i class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Server, domain, dan pemasangan gratis untuk tahun pertama.</li>
                        <li><i class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Mulai tahun ke-2, perpanjangan server, domain, dan maintenance Rp1.500.000/tahun.</li>
                        <li><i class="bi bi-check-circle-fill text-[#197c93] mr-2"></i>Termasuk pelatihan admin dan bantuan teknis prioritas melalui WhatsApp.</li>
                    </ul>
                    <a href="https://wa.me/{{ companyProfile()->phone }}?text={{ urlencode('Halo, saya ingin berdiskusi tentang Paket Beli Lepas SabilSys untuk travel Haji/Umroh saya.') }}"
                        target="_blank" rel="noopener noreferrer"
                        class="block w-full bg-slate-900 hover:bg-slate-700 text-white font-semibold px-6 py-3.5 rounded-lg text-center transition-colors">
                        Diskusikan Paket Beli Lepas
                    </a>
                </article>
            </div>

            <p class="text-sm text-slate-500 text-center max-w-3xl mx-auto mt-8">
                Harga Mitra Perdana tersedia terbatas agar pemasangan dan penyesuaian data setiap biro dapat didampingi secara maksimal.
            </p>
        </div>
    </section>

    <!-- System Features -->
    <section class="py-20 bg-gradient-to-br from-slate-900 to-slate-800 relative overflow-hidden">
        {{-- Radial glow --}}
        <div
            class="absolute -top-1/2 -left-1/5 w-3/5 h-[200%] bg-[radial-gradient(circle,rgba(25,124,147,0.2)_0%,transparent_70%)] pointer-events-none">
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="text-4xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Semua Kebutuhan Operasional dalam Satu Sistem
            </h2>
            <p class="text-lg text-slate-400 mb-10 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                SabilSys dirancang agar admin dapat bekerja lebih teratur tanpa harus memiliki latar belakang IT.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 text-left max-w-5xl mx-auto">
                <div class="rounded-xl border border-white/10 bg-white/5 p-6" data-aos="fade-up">
                    <i class="bi bi-globe2 text-2xl text-[#55c3d7]"></i>
                    <h3 class="text-lg font-bold text-white mt-4 mb-2">Katalog Paket Perjalanan</h3>
                    <p class="text-slate-400">
                        Bagikan halaman paket berisi jadwal, fasilitas, dan itinerary kepada calon jamaah.
                    </p>
                </div>
                <div class="rounded-xl border border-white/10 bg-white/5 p-6" data-aos="fade-up" data-aos-delay="50">
                    <i class="bi bi-person-vcard text-2xl text-[#55c3d7]"></i>
                    <h3 class="text-lg font-bold text-white mt-4 mb-2">Data dan Dokumen Jamaah</h3>
                    <p class="text-slate-400">
                        Kelola profil, ahli waris, paspor, KTP, KK, visa, dan dokumen vaksin per jamaah.
                    </p>
                </div>
                <div class="rounded-xl border border-white/10 bg-white/5 p-6" data-aos="fade-up" data-aos-delay="100">
                    <i class="bi bi-people text-2xl text-[#55c3d7]"></i>
                    <h3 class="text-lg font-bold text-white mt-4 mb-2">Manifest Keberangkatan</h3>
                    <p class="text-slate-400">
                        Kelompokkan jamaah berdasarkan jadwal atau grup keberangkatan dan siapkan manifest untuk dicetak.
                    </p>
                </div>
                <div class="rounded-xl border border-white/10 bg-white/5 p-6" data-aos="fade-up" data-aos-delay="150">
                    <i class="bi bi-receipt text-2xl text-[#55c3d7]"></i>
                    <h3 class="text-lg font-bold text-white mt-4 mb-2">Cicilan dan Kuitansi Digital</h3>
                    <p class="text-slate-400">
                        Catat setiap pembayaran, pantau sisa tagihan, serta buat invoice dan kuitansi dengan logo biro.
                    </p>
                </div>
                <div class="rounded-xl border border-white/10 bg-white/5 p-6 sm:col-span-2" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-chat-dots text-2xl text-[#55c3d7]"></i>
                    <h3 class="text-lg font-bold text-white mt-4 mb-2">Pencatatan Calon Jamaah (Inquiry)</h3>
                    <p class="text-slate-400">
                        Simpan data orang yang menanyakan paket agar tim marketing dapat menindaklanjuti dengan lebih teratur.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Preview and Demo -->
    <section id="tampilan" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-slate-900 text-center mb-4" data-aos="fade-up">Lihat SabilSys Lebih Dekat</h2>
            <p class="text-lg text-slate-500 text-center mb-12" data-aos="fade-up" data-aos-delay="100">
                Pratinjau dashboard, pengelolaan jamaah, dan halaman promosi paket perjalanan.
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
                    {{-- <a href="{{ asset('images/landingpage-travel.jpg') }}" class="block no-underline cursor-zoom-in" data-glightbox="gallery" title="Katalog Paket Perjalanan"> --}}
                    <div
                        class="relative rounded-xl overflow-hidden aspect-video bg-slate-100 cursor-pointer transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.2)]">
                        <img src="{{ asset('images/landingpage-travel.jpg') }}" alt="Katalog paket perjalanan SabilSys" loading="lazy"
                            class="w-full h-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-5">
                            <h5 class="text-white font-semibold m-0">Katalog Paket Perjalanan</h5>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>
            </div>

            <div id="demo" class="text-center bg-slate-50 rounded-2xl p-8 sm:p-12" data-aos="fade-up">
                <h3 class="text-2xl font-bold text-slate-900 mb-3">Coba Jelajahi Demo Langsung</h3>
                <p class="text-slate-500 max-w-2xl mx-auto mb-6">
                    Lihat alur dan tampilan SabilSys melalui demo online, lalu hubungi kami untuk presentasi dan diskusi
                    kebutuhan biro Anda.
                </p>
                <a href="https://travel.akhritech.com" target="_blank" rel="noopener noreferrer"
                    class="inline-block bg-[#197c93] hover:bg-[#156a7d] text-white font-semibold px-8 py-3.5 rounded-lg transition-colors">
                    Buka Demo SabilSys <i class="bi bi-box-arrow-up-right ml-2"></i>
                </a>
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
                    <h4 class="text-lg font-bold text-slate-900 mb-2">Diskusi & Pilih Paket</h4>
                    <p class="text-slate-500">
                        Diskusikan kebutuhan operasional biro dan tentukan skema kemitraan yang sesuai.
                    </p>
                </div>
                <div class="p-6 md:border-x border-slate-200">
                    <span
                        class="inline-block bg-[#197c93] text-white text-sm font-bold w-8 h-8 rounded-full flex items-center justify-center mx-auto mb-4">2</span>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">Pemasangan (2–3 Hari Kerja)</h4>
                    <p class="text-slate-500">
                        Kami siapkan domain, pasang logo biro, dan atur sistem agar siap digunakan.
                    </p>
                </div>
                <div class="p-6">
                    <span
                        class="inline-block bg-[#197c93] text-white text-sm font-bold w-8 h-8 rounded-full flex items-center justify-center mx-auto mb-4">3</span>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">Pendampingan & Mulai Beroperasi</h4>
                    <p class="text-slate-500">
                        Admin dibimbing menginput data grup pertama hingga lancar menggunakan sistem.
                    </p>
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
                        Mulai Digitalisasi Travel Anda
                    </h2>
                    <p class="text-lg text-slate-500 mb-10" data-aos="fade-up" data-aos-delay="100">
                        Jadwalkan presentasi singkat secara online atau tatap muka. Kami siap membahas kebutuhan dan
                        skema kemitraan SabilSys untuk biro Anda.
                    </p>
                    <div data-aos="fade-up" data-aos-delay="200">
                        <a href="https://wa.me/{{ companyProfile()->phone }}?text={{ urlencode('Halo, saya ingin menjadwalkan demo/presentasi SabilSys dan berdiskusi tentang kemitraan untuk biro travel Haji/Umroh saya.') }}"
                            class="inline-block bg-[#197c93] hover:bg-[#156a7d] text-white font-semibold px-8 py-3.5 rounded-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_10px_25px_-5px_rgba(25,124,147,0.4)]"
                            target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-whatsapp me-2"></i>Jadwalkan Demo Sekarang
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
