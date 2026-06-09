@extends('layouts.tailwind')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 hero-bg overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="flex flex-col-reverse lg:flex-row items-center gap-12">
                <!-- Text Content -->
                <div class="lg:w-1/2 text-center lg:text-left">
                    <div
                        class="inline-block px-4 py-1.5 rounded-full bg-indigo-50 text-primary font-semibold text-sm mb-6 border border-indigo-100">
                        🚀 Tingkatkan Bisnis Digital Anda
                    </div>
                    <h1 class="text-4xl lg:text-6xl font-extrabold text-slate-900 leading-tight mb-6">
                        Solusi Kreatif & <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Pengembangan
                            Web</span> Modern
                    </h1>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Kami membantu transformasi ide Anda menjadi produk digital yang menakjubkan, fungsional, dan
                        berorientasi pada hasil. Temukan juga tema web premium kami.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#themes"
                            class="px-8 py-4 bg-primary text-white rounded-xl font-bold text-lg hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-store"></i> Beli Tema Web
                        </a>
                        <a href="#portfolio"
                            class="px-8 py-4 bg-white text-slate-700 border border-slate-200 rounded-xl font-bold text-lg hover:bg-slate-50 transition-all flex items-center justify-center gap-2">
                            Lihat Karya
                        </a>
                    </div>

                    <div class="mt-10 flex items-center justify-center lg:justify-start gap-6 text-slate-400 text-sm">
                        <div class="flex -space-x-3">
                            <img class="w-10 h-10 rounded-full border-2 border-white"
                                src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                alt="Client">
                            <img class="w-10 h-10 rounded-full border-2 border-white"
                                src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                alt="Client">
                            <img class="w-10 h-10 rounded-full border-2 border-white"
                                src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                alt="Client">
                        </div>
                        <p>Dipercaya oleh <span class="font-bold text-slate-700">100+</span> Klien Puas</p>
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="lg:w-1/2 relative">
                    <div class="relative w-full aspect-square max-w-md mx-auto lg:max-w-full">
                        <!-- Decorative blobs -->
                        <div
                            class="absolute top-0 right-0 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                        </div>
                        <div
                            class="absolute -bottom-8 left-10 w-72 h-72 bg-cyan-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                        </div>
                        <div
                            class="absolute -bottom-8 right-10 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
                        </div>

                        <!-- Main Image -->
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                            alt="Web Development"
                            class="relative rounded-2xl shadow-2xl border border-white/50 transform rotate-2 hover:rotate-0 transition duration-500 object-cover w-full h-full">

                        <!-- Floating Card -->
                        <div class="absolute bottom-10 left-0 bg-white/90 backdrop-blur p-4 rounded-xl shadow-xl border border-white/50 flex items-center gap-3 animate-bounce"
                            style="animation-duration: 3s;">
                            <div
                                class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Proyek Selesai</p>
                                <p class="font-bold text-slate-800">Optimasi SEO Sukses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2 relative">
                    <div class="grid grid-cols-2 gap-4">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            alt="Team Work" class="rounded-2xl shadow-lg w-full h-64 object-cover transform translate-y-8">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            alt="Meeting" class="rounded-2xl shadow-lg w-full h-64 object-cover">
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-6">Tentang <span
                            class="text-primary">Akhritech</span></h2>
                    <p class="text-lg text-slate-600 mb-6 leading-relaxed">
                        Kami adalah tim digital agency yang berdedikasi untuk menciptakan pengalaman web yang luar
                        biasa. Dengan memadukan estetika desain dan kehandalan teknologi, kami membantu bisnis Anda
                        tumbuh di era digital.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-accent text-xl"></i>
                            <span class="text-slate-700">Pengembangan Web Responsif & Cepat</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-accent text-xl"></i>
                            <span class="text-slate-700">Desain UI/UX yang Berpusat pada Pengguna</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-accent text-xl"></i>
                            <span class="text-slate-700">Dukungan Teknis & Maintenance Berkelanjutan</span>
                        </li>
                    </ul>
                    <a href="#contact" class="text-primary font-bold hover:text-indigo-800 flex items-center gap-2 group">
                        Pelajari Selengkapnya <i
                            class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section (Layanan Pembuatan Website) -->
    <section id="services" class="py-20 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4">Layanan Pembuatan Website</h2>
                <p class="text-lg text-slate-600">
                    Kami menawarkan paket website berkualitas profesional sesuai dengan kebutuhan bisnis Anda. Pilih paket
                    yang paling tepat untuk memulai transformasi digital Anda.
                </p>
            </div>

            <!-- Pricing Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

                <!-- Paket 1: Starter -->
                <div
                    class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col h-full">
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Landing Page</h3>
                        <p class="text-slate-500 text-sm">Cocok untuk promosi produk tunggal atau personal branding.</p>
                    </div>
                    <div class="mb-8">
                        <span class="text-4xl font-extrabold text-slate-900">Rp 1.500.000</span>
                        <span class="text-slate-400 text-sm block mt-1">Sekali Bayar</span>
                    </div>

                    <ul class="space-y-4 mb-8 flex-grow">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">1 Halaman (One Page)</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Desain Responsif Mobile</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Gratis Domain .com (1 Tahun)</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Integrasi WhatsApp</span>
                        </li>
                        <li class="flex items-start gap-3 opacity-50">
                            <i class="fa-solid fa-xmark text-slate-300 mt-1"></i>
                            <span class="text-slate-400">CMS / Panel Admin</span>
                        </li>
                        <li class="flex items-start gap-3 opacity-50">
                            <i class="fa-solid fa-xmark text-slate-300 mt-1"></i>
                            <span class="text-slate-400">SEO Optimization Basic</span>
                        </li>
                    </ul>

                    <a href="#contact"
                        class="block w-full py-3 px-6 border-2 border-slate-200 text-slate-700 font-bold text-center rounded-xl hover:border-primary hover:text-primary transition-all">
                        Pilih Paket
                    </a>
                </div>

                <!-- Paket 2: Business (Highlight) -->
                <div
                    class="bg-white rounded-2xl p-8 border-2 border-primary shadow-xl relative transform md:-translate-y-4 flex flex-col h-full z-10">
                    <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <span
                            class="bg-primary text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-md uppercase tracking-wide">Paling
                            Laris</span>
                    </div>

                    <div class="mb-6 pt-2">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Company Profile</h3>
                        <p class="text-slate-500 text-sm">Ideal untuk UKM dan perusahaan yang ingin tampil profesional.</p>
                    </div>
                    <div class="mb-8">
                        <span class="text-4xl font-extrabold text-primary">Rp 3.500.000</span>
                        <span class="text-slate-400 text-sm block mt-1">Sekali Bayar</span>
                    </div>

                    <ul class="space-y-4 mb-8 flex-grow">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Hingga 5 Halaman</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Desain Premium & Modern</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Gratis Domain & Hosting (1 Tahun)</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Email Bisnis (nama@domain.com)</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">CMS Admin Panel (Mudah Edit)</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">SEO Optimization Basic</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Google Analytics Integration</span>
                        </li>
                    </ul>

                    <a href="#contact"
                        class="block w-full py-3.5 px-6 bg-primary text-white font-bold text-center rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all">
                        Pilih Paket
                    </a>
                </div>

                <!-- Paket 3: Custom/Enterprise -->
                <div
                    class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col h-full">
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">E-Commerce / Custom</h3>
                        <p class="text-slate-500 text-sm">Solusi lengkap untuk toko online atau sistem web kompleks.</p>
                    </div>
                    <div class="mb-8">
                        <span class="text-4xl font-extrabold text-slate-900">Rp 7.000.000</span>
                        <span class="text-slate-400 text-sm block mt-1">Mulai Dari</span>
                    </div>

                    <ul class="space-y-4 mb-8 flex-grow">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Halaman Tanpa Batas</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Sistem Toko Online / Payment Gateway</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Custom Dashboard & Fitur</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Kecepatan Tinggi & Aman (SSL)</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Prioritas Support</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-1"></i>
                            <span class="text-slate-600">Maintenance Bulanan (Opsional)</span>
                        </li>
                    </ul>

                    <a href="#contact"
                        class="block w-full py-3 px-6 bg-slate-900 text-white font-bold text-center rounded-xl hover:bg-slate-800 transition-all">
                        Konsultasi Gratis
                    </a>
                </div>

            </div>

            <div class="mt-12 text-center text-slate-500 text-sm">
                <p>* Harga dapat berubah tergantung pada kompleksitas fitur tambahan. <a href="#"
                        class="text-primary underline">Hubungi kami</a> untuk penawaran khusus.</p>
            </div>
        </div>
    </section>

    <!-- Themes Store Section (Highlight) -->
    <section id="themes" class="py-20 bg-slate-900 text-white relative overflow-hidden">
        <!-- Background Decoration -->
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-primary opacity-20 rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-96 h-96 bg-accent opacity-10 rounded-full blur-3xl transform -translate-x-1/2 translate-y-1/2">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div class="max-w-2xl">
                    <span class="text-accent font-bold tracking-wider uppercase text-sm">Marketplace Tema</span>
                    <h2 class="text-3xl lg:text-5xl font-bold mt-2 mb-4">Tema Web Premium</h2>
                    <p class="text-slate-300 text-lg">Luncurkan website Anda lebih cepat dengan koleksi tema
                        berkualitas tinggi kami. Dibuat dengan TailwindCSS, bersih, dan mudah dikustomisasi.</p>
                </div>
                <a href="#"
                    class="px-6 py-3 border border-slate-600 rounded-lg hover:bg-white hover:text-slate-900 transition-all font-medium">
                    Lihat Semua Tema <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Theme Card 1 -->
                <article
                    class="bg-slate-800 rounded-2xl overflow-hidden border border-slate-700 hover:border-primary transition-colors group">
                    <div class="relative overflow-hidden h-56">
                        <span
                            class="absolute top-4 left-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full z-10">Best
                            Seller</span>
                        <img src="https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Theme Preview"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">AkhriSaaS - Dashboard Admin</h3>
                        <p class="text-slate-400 text-sm mb-4">Template admin dashboard lengkap dengan fitur analitik
                            dan dark mode.</p>
                        <div class="flex justify-between items-center border-t border-slate-700 pt-4">
                            <span class="text-2xl font-bold text-accent">$49</span>
                            <button
                                class="bg-primary hover:bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center gap-2">
                                <i class="fa-solid fa-cart-shopping"></i> Beli
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Theme Card 2 -->
                <article
                    class="bg-slate-800 rounded-2xl overflow-hidden border border-slate-700 hover:border-primary transition-colors group">
                    <div class="relative overflow-hidden h-56">
                        <img src="https://images.unsplash.com/photo-1559028012-481c04fa702d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Theme Preview"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Portfolio Creative Pro</h3>
                        <p class="text-slate-400 text-sm mb-4">Tema portofolio minimalis untuk desainer dan fotografer
                            profesional.</p>
                        <div class="flex justify-between items-center border-t border-slate-700 pt-4">
                            <span class="text-2xl font-bold text-accent">$29</span>
                            <button
                                class="bg-primary hover:bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center gap-2">
                                <i class="fa-solid fa-cart-shopping"></i> Beli
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Theme Card 3 -->
                <article
                    class="bg-slate-800 rounded-2xl overflow-hidden border border-slate-700 hover:border-primary transition-colors group">
                    <div class="relative overflow-hidden h-56">
                        <span
                            class="absolute top-4 left-4 bg-purple-500 text-white text-xs font-bold px-3 py-1 rounded-full z-10">New</span>
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Theme Preview"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">E-Shopify Ultimate</h3>
                        <p class="text-slate-400 text-sm mb-4">Tema toko online modern dengan konversi tinggi dan
                            loading cepat.</p>
                        <div class="flex justify-between items-center border-t border-slate-700 pt-4">
                            <span class="text-2xl font-bold text-accent">$59</span>
                            <button
                                class="bg-primary hover:bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center gap-2">
                                <i class="fa-solid fa-cart-shopping"></i> Beli
                            </button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- SaaS Products Section -->
    <section id="products" class="py-20 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div class="max-w-2xl">
                    <span class="text-primary font-bold tracking-wider uppercase text-sm">Produk In-House</span>
                    <h2 class="text-3xl lg:text-5xl font-bold text-slate-900 mt-2 mb-4">Built by Akhritech</h2>
                    <p class="text-slate-600 text-lg">
                        Selain melayani klien, kami juga mengembangkan produk SaaS sendiri untuk membantu berbagai aspek
                        bisnis Anda menjadi lebih efisien dan modern.
                    </p>
                </div>
                <a href="#"
                    class="hidden md:inline-flex px-6 py-3 border border-slate-300 rounded-lg hover:border-primary hover:text-primary transition-all font-medium bg-white shadow-sm">
                    Lihat Semua Produk <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Product Card 1 -->
                <div
                    class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all border border-slate-100 overflow-hidden group flex flex-col h-full">
                    <div class="relative h-56 overflow-hidden">
                        <span
                            class="absolute top-4 left-4 bg-blue-50 text-blue-600 text-xs font-bold px-3 py-1 rounded-full z-10 border border-blue-100">
                            Finance Tool
                        </span>
                        <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="InvoiceGen"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-slate-900">InvoiceGen</h3>
                            <div class="flex gap-1 text-yellow-400 text-xs">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                        </div>
                        <p class="text-slate-600 text-sm mb-6 flex-grow">
                            Buat kirim invoice profesional dalam hitungan detik. Kelola pelanggan dan pantau pembayaran
                            dengan mudah.
                        </p>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fa-solid fa-check text-green-500"></i> Template Siap Pakai
                            </div>
                            <div class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fa-solid fa-check text-green-500"></i> Integrasi Payment Gateway
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                            <div>
                                <span class="block text-xs text-slate-400">Mulai dari</span>
                                <span class="block text-lg font-bold text-slate-900">Rp 50.000<span
                                        class="text-sm font-normal text-slate-500">/bln</span></span>
                            </div>
                            <a href="#"
                                class="px-5 py-2.5 bg-slate-900 text-white rounded-lg font-medium hover:bg-primary transition-colors text-sm">
                                Coba Gratis
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div
                    class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all border border-slate-100 overflow-hidden group flex flex-col h-full">
                    <div class="relative h-56 overflow-hidden">
                        <span
                            class="absolute top-4 left-4 bg-pink-50 text-pink-600 text-xs font-bold px-3 py-1 rounded-full z-10 border border-pink-100">
                            Marketing
                        </span>
                        <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="SocialBoost"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-slate-900">SocialBoost</h3>
                            <div class="flex gap-1 text-yellow-400 text-xs">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <p class="text-slate-600 text-sm mb-6 flex-grow">
                            Platform manajemen media sosial all-in-one. Jadwalkan posting, analisis performa, dan balas
                            komentar dari satu dasbor.
                        </p>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fa-solid fa-check text-green-500"></i> Multi-Account Support
                            </div>
                            <div class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fa-solid fa-check text-green-500"></i> Analitik Mendalam
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                            <div>
                                <span class="block text-xs text-slate-400">Mulai dari</span>
                                <span class="block text-lg font-bold text-slate-900">Rp 75.000<span
                                        class="text-sm font-normal text-slate-500">/bln</span></span>
                            </div>
                            <a href="#"
                                class="px-5 py-2.5 bg-slate-900 text-white rounded-lg font-medium hover:bg-primary transition-colors text-sm">
                                Coba Gratis
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div
                    class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all border border-slate-100 overflow-hidden group flex flex-col h-full">
                    <div class="relative h-56 overflow-hidden">
                        <span
                            class="absolute top-4 left-4 bg-purple-50 text-purple-600 text-xs font-bold px-3 py-1 rounded-full z-10 border border-purple-100">
                            Productivity
                        </span>
                        <img src="https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="TaskFlow"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-slate-900">TaskFlow</h3>
                            <div class="flex gap-1 text-yellow-400 text-xs">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                        </div>
                        <p class="text-slate-600 text-sm mb-6 flex-grow">
                            Aplikasi manajemen proyek agile yang sederhana namun powerful. Atur tim, tugas, dan deadline
                            tanpa kerumitan.
                        </p>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fa-solid fa-check text-green-500"></i> Kanban & Gantt View
                            </div>
                            <div class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fa-solid fa-check text-green-500"></i> Real-time Collaboration
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                            <div>
                                <span class="block text-xs text-slate-400">Mulai dari</span>
                                <span class="block text-lg font-bold text-slate-900">Rp 120.000<span
                                        class="text-sm font-normal text-slate-500">/bln</span></span>
                            </div>
                            <a href="#"
                                class="px-5 py-2.5 bg-slate-900 text-white rounded-lg font-medium hover:bg-primary transition-colors text-sm">
                                Coba Gratis
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Mobile View All Button (Hidden on Desktop) -->
            <div class="mt-10 text-center md:hidden">
                <a href="#"
                    class="px-6 py-3 bg-white border border-slate-300 rounded-lg hover:border-primary hover:text-primary transition-all font-medium shadow-sm w-full inline-block">
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-primary font-bold tracking-wider uppercase text-sm">Portofolio</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mt-2 mb-4">Karya Terbaru Kami</h2>
                <p class="text-slate-600">Beberapa proyek yang telah kami selesaikan dengan bangga untuk klien kami.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Portfolio Item -->
                <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Project 1"
                        class="w-full h-72 object-cover transform group-hover:scale-110 transition duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <span class="text-accent font-medium text-sm mb-1">Fintech App</span>
                        <h3 class="text-white text-xl font-bold">FinTrack Dashboard</h3>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Project 2"
                        class="w-full h-72 object-cover transform group-hover:scale-110 transition duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <span class="text-accent font-medium text-sm mb-1">Mobile App</span>
                        <h3 class="text-white text-xl font-bold">Health Go</h3>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Project 3"
                        class="w-full h-72 object-cover transform group-hover:scale-110 transition duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <span class="text-accent font-medium text-sm mb-1">Corporate Web</span>
                        <h3 class="text-white text-xl font-bold">Tech Corp Landing</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col lg:flex-row">
                <!-- Contact Info -->
                <div class="lg:w-2/5 bg-slate-900 text-white p-10 lg:p-16 flex flex-col justify-between">
                    <div>
                        <h3 class="text-3xl font-bold mb-6">Hubungi Kami</h3>
                        <p class="text-slate-300 mb-8">Punya ide proyek atau ingin konsultasi? Jangan ragu untuk
                            menghubungi tim kami.</p>

                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center text-primary flex-shrink-0">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold">Email</h4>
                                    <p class="text-slate-400">hello@akhritech.com</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center text-primary flex-shrink-0">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold">Telepon/WA</h4>
                                    <p class="text-slate-400">+62 812 3456 7890</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center text-primary flex-shrink-0">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold">Lokasi</h4>
                                    <p class="text-slate-400">Jakarta Selatan, Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10">
                        <p class="text-sm text-slate-400 mb-4">Ikuti Kami</p>
                        <div class="flex gap-4">
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary transition-colors"><i
                                    class="fa-brands fa-instagram"></i></a>
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary transition-colors"><i
                                    class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary transition-colors"><i
                                    class="fa-brands fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:w-3/5 p-10 lg:p-16">
                    <form action="#"
                        onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda telah kami terima (Mode Demo).');">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                                <input type="text"
                                    class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all"
                                    placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                                <input type="email"
                                    class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all"
                                    placeholder="john@example.com">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Subjek</label>
                            <input type="text"
                                class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all"
                                placeholder="Saya ingin konsultasi web">
                        </div>
                        <div class="mb-8">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Pesan</label>
                            <textarea rows="4"
                                class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all"
                                placeholder="Ceritakan detail proyek Anda..."></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-primary text-white font-bold py-4 rounded-xl hover:bg-indigo-700 transition-all shadow-lg hover:shadow-xl">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
