@extends('layouts.tailwind')

@push('metadata')
    <!-- SEO Meta Tags -->
    <title>Jasa Pembuatan Website & Aplikasi Web Custom Terbaik di Indonesia | Akhritech</title>
    <meta name="description"
        content="Akhritech adalah software house berpengalaman yang siap merubah ide bisnis Anda menjadi sistem informasi, aplikasi, dan website berkinerja tinggi. Konsultasi gratis sekarang!">
    <meta name="author" content="Akhritech">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title"
        content="Jasa Pembuatan Website & Aplikasi Web Custom Terbaik di Indonesia | Akhritech">
    <meta property="og:description"
        content="Akhritech adalah software house berpengalaman yang siap merubah ide bisnis Anda menjadi sistem informasi, aplikasi, dan website berkinerja tinggi. Konsultasi gratis sekarang!">
    <meta property="og:image" content="{{ asset('images/akhritech-banner.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title"
        content="Jasa Pembuatan Website & Aplikasi Web Custom Terbaik di Indonesia | Akhritech">
    <meta property="twitter:description"
        content="Akhritech adalah software house berpengalaman yang siap merubah ide bisnis Anda menjadi sistem informasi, aplikasi, dan website berkinerja tinggi. Konsultasi gratis sekarang!">
    <meta property="twitter:image" content="{{ asset('images/akhritech-banner.png') }}">

    <link rel="canonical" href="{{ url()->current() }}">
    <!-- Structured Data FAQPage -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "FAQPage",
      "mainEntity": [{
        "@@type": "Question",
        "name": "Berapa lama proses pembuatan website atau aplikasi di Akhritech?",
        "acceptedAnswer": {
          "@@type": "Answer",
          "text": "Waktu pengerjaan bergantung pada kompleksitas fitur. Untuk landing page sekitar 1-2 minggu, company profile 2-4 minggu, dan custom web app bisa memakan waktu 1-3 bulan."
        }
      }, {
        "@@type": "Question",
        "name": "Berapa biaya jasa pembuatan aplikasi berbasis web?",
        "acceptedAnswer": {
          "@@type": "Answer",
          "text": "Biaya bervariasi tergantung fitur dan skala sistem. Kami sangat transparan mengenai biaya dan dapat menyesuaikan dengan anggaran (budget) yang Anda miliki."
        }
      }, {
        "@@type": "Question",
        "name": "Apakah Akhritech menyediakan maintenance setelah aplikasi selesai?",
        "acceptedAnswer": {
          "@@type": "Answer",
          "text": "Ya, kami memberikan dukungan teknis (support) dan jaminan perbaikan bug (lifetime untuk bug bawaan) setelah proyek diserahterimakan."
        }
      }]
    }
    </script>
@endpush

@section('content')
    <!-- 1. Hero Section -->
    <section id="home" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 bg-slate-50 overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="flex flex-col-reverse lg:flex-row items-center gap-12">
                <div class="lg:w-1/2 text-center lg:text-left">
                    <div
                        class="inline-block px-4 py-1.5 rounded-full bg-indigo-100 text-primary font-semibold text-sm mb-6 border border-indigo-200">
                        🚀 Partner Transformasi Digital Bisnis Anda
                    </div>
                    <h1
                        class="text-4xl lg:text-5xl xl:text-6xl font-extrabold text-slate-900 leading-tight mb-6">
                        Jasa Pembuatan <br>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Website
                            & Aplikasi Web Custom</span><br>
                        Terbaik di Indonesia
                    </h1>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Akhritech adalah software house berpengalaman yang siap merubah ide bisnis Anda
                        menjadi sistem informasi, aplikasi, dan website berkinerja tinggi. Konsultasi
                        gratis sekarang!
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#contact"
                            class="px-8 py-4 bg-primary text-white rounded-xl font-bold text-lg hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200 flex items-center justify-center gap-2">
                            Konsultasi Gratis
                        </a>
                        <a href="#portfolio"
                            class="px-8 py-4 bg-white text-slate-700 border border-slate-200 rounded-xl font-bold text-lg hover:bg-slate-50 transition-all flex items-center justify-center gap-2">
                            Lihat Portfolio
                        </a>
                    </div>
                </div>
                <div class="lg:w-1/2 relative">
                    <div class="relative w-full aspect-square max-w-md mx-auto lg:max-w-full">
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                            alt="Web Development and Custom Software by Akhritech"
                            class="relative rounded-2xl shadow-2xl border border-white/50 object-cover w-full h-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Social Proof / Trust Badges -->
    <section class="py-10 bg-white border-b border-slate-100">
        <div class="container mx-auto px-4 lg:px-8">
            <h2 class="text-center text-sm font-bold text-slate-400 uppercase tracking-widest mb-6">
                Telah dipercaya oleh 50+ Perusahaan dan Organisasi</h2>
            <div
                class="flex flex-wrap justify-center items-center gap-8 lg:gap-16 opacity-50 grayscale hover:grayscale-0 transition-all duration-500 text-slate-700">
                <!-- Replace with real client logos -->
                <i class="fa-brands fa-aws text-4xl"></i>
                <i class="fa-brands fa-digital-ocean text-4xl"></i>
                <i class="fa-brands fa-google text-4xl"></i>
                <i class="fa-brands fa-microsoft text-4xl"></i>
                <i class="fa-brands fa-stripe text-4xl"></i>
            </div>
        </div>
    </section>

    <!-- 3. Value Proposition -->
    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-primary font-bold tracking-wider uppercase text-sm">Kenapa
                    Akhritech?</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mt-2 mb-4">Mengapa Memilih
                    Akhritech Sebagai Partner IT Anda?</h2>
                <p class="text-lg text-slate-600">
                    Kami memberikan solusi, bukan sekadar barisan kode. Kami berfokus pada kecepatan,
                    keamanan, dan pertumbuhan bisnis Anda.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg transition-all text-center">
                    <div
                        class="w-16 h-16 bg-indigo-50 rounded-full flex items-center justify-center text-primary mx-auto mb-6">
                        <i class="fa-solid fa-code text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Kode Bersih & Modern</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Sistem Anda dibangun dengan
                        standar industri terkini, membuatnya sangat cepat saat diakses dan mudah
                        dikembangkan di masa depan.</p>
                </div>
                <div
                    class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg transition-all text-center">
                    <div
                        class="w-16 h-16 bg-indigo-50 rounded-full flex items-center justify-center text-primary mx-auto mb-6">
                        <i class="fa-solid fa-headset text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Garansi Support Handal</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Anda tidak akan ditinggalkan
                        setelah serah terima proyek. Kami memberikan garansi perbaikan bug dan dukungan
                        teknis berkelanjutan.</p>
                </div>
                <div
                    class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg transition-all text-center">
                    <div
                        class="w-16 h-16 bg-indigo-50 rounded-full flex items-center justify-center text-primary mx-auto mb-6">
                        <i class="fa-solid fa-chart-line text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Fokus Pada Konversi</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Desain antarmuka (UI/UX) kami
                        tidak hanya indah, tetapi dirancang secara psikologis untuk mengubah pengunjung
                        menjadi pelanggan nyata.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Layanan Utama -->
    <section id="services" class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-primary font-bold tracking-wider uppercase text-sm">Layanan Utama
                    Kami</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mt-2 mb-4">Layanan Jasa
                    Pembuatan Website & Software Custom</h2>
                <p class="text-lg text-slate-600">
                    Solusi digital end-to-end yang dirancang khusus untuk memenuhi skala bisnis Anda,
                    mulai dari company profile hingga Enterprise Resource Planning (ERP).
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                @foreach ($packages as $package)
                    <div
                        class="bg-slate-50 rounded-3xl p-10 border border-slate-200 hover:border-primary transition-all duration-300 flex flex-col h-full relative group">
                        @if ($package['highlight'])
                            <div
                                class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                <span
                                    class="bg-primary text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-md uppercase tracking-wide">
                                    Paling Sering Digunakan
                                </span>
                            </div>
                        @endif

                        <div class="mb-6 {{ $package['highlight'] ? 'pt-2' : '' }}">
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">{{ $package['name'] }}
                            </h3>
                            <p class="text-slate-600 text-sm leading-relaxed">
                                {{ $package['description'] }}</p>
                        </div>

                        <ul class="space-y-4 mb-10 flex-grow">
                            @foreach (array_slice($package['features'], 0, 6) as $feature)
                                <li class="flex items-start gap-3">
                                    <i class="fa-solid fa-check text-green-500 mt-1 flex-shrink-0"></i>
                                    <span class="text-slate-600 text-sm">{{ $feature }}</span>
                                </li>
                            @endforeach
                            @if (count($package['features']) > 6)
                                <li class="text-slate-400 text-sm italic">Dan fitur eksklusif lainnya...
                                </li>
                            @endif
                        </ul>

                        <a href="{{ route('services.jasa-buat-website') }}"
                            class="block w-full py-4 px-6 font-bold text-center rounded-xl transition-all border-2 border-slate-300 text-slate-700 group-hover:bg-primary group-hover:text-white group-hover:border-primary shadow-sm hover:shadow-lg">
                            Pelajari Jasa Pembuatan Website Ini
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 text-center text-slate-500 text-sm">
                <p>Butuh <a href="#contact" class="text-primary font-bold hover:underline">jasa
                        pembuatan sistem informasi kustom</a> yang tidak ada di paket? Diskusikan dengan
                    tim kami.</p>
            </div>
        </div>
    </section>

    <!-- 5. Portfolio -->
    <section id="portfolio" class="py-20 bg-slate-900 text-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-accent font-bold tracking-wider uppercase text-sm">Karya Kami</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-white mt-2 mb-4">Bukti Nyata Karya Web
                    Developer Indonesia</h2>
                <p class="text-slate-400">Jelajahi berbagai portofolio proyek custom web application
                    dan sistem informasi yang telah kami kembangkan untuk klien-klien terbaik.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($portfolios->take(6) as $portfolio)
                    <div
                        class="group relative overflow-hidden rounded-2xl bg-slate-800 shadow-lg border border-slate-700 h-80">
                        <img src="{{ $portfolio->image ?? 'https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                            alt="{{ $portfolio->name }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 opacity-80 group-hover:opacity-30">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent p-6 flex flex-col justify-end transition-all duration-500">
                            <div class="transform group-hover:-translate-y-4 transition duration-500">
                                <span class="text-accent font-medium text-xs mb-1 uppercase tracking-wider block">{{ $portfolio->category }}</span>
                                <h3 class="text-white text-xl font-bold mb-2">{{ $portfolio->name }}</h3>
                            </div>
                            <div class="h-0 opacity-0 group-hover:h-auto group-hover:opacity-100 transition-all duration-500 overflow-hidden">
                                <p class="text-slate-300 text-sm line-clamp-3 mb-4">
                                    {{ $portfolio->story }}
                                </p>
                                @if($portfolio->link)
                                    <a href="{{ $portfolio->link }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-primary hover:text-white font-semibold text-sm transition-colors">
                                        Kunjungi Website <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 6. SaaS In-House -->
    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div class="max-w-2xl">
                    <span class="text-primary font-bold tracking-wider uppercase text-sm">Produk
                        Berstandar Enterprise</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mt-2 mb-4">Inovasi SaaS
                        Buatan Akhritech</h2>
                    <p class="text-slate-600 text-lg">
                        Kami tidak hanya melayani klien, kami juga berinovasi menciptakan produk
                        Software as a Service (SaaS) skala besar berstandar industri. Ini membuktikan
                        kapabilitas teknis kami untuk proyek Anda.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- SabilSys -->
                <div
                    class="bg-white rounded-3xl shadow-xl flex flex-col lg:flex-row overflow-hidden border border-slate-100 group hover:shadow-2xl transition-all">
                    <div class="lg:w-2/5 h-64 lg:h-auto relative bg-slate-100">
                        <img src="{{ asset('./images/akhritech_travel.jpeg') }}"
                            alt="Dashboard SabilSys ERP Travel Umroh"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="lg:w-3/5 p-8 flex flex-col justify-between">
                        <div>
                            <span
                                class="px-3 py-1 bg-indigo-50 text-primary text-xs font-bold rounded-full mb-4 inline-block">SaaS
                                ERP Travel</span>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">SabilSys - ERP Haji &
                                Umroh</h3>
                            <p class="text-slate-600 text-sm mb-4">Sistem manajemen terintegrasi untuk
                                travel agen. Menangani jama'ah, manifest, hingga laporan keuangan dalam
                                satu dasbor digital dengan ribuan baris data berkecepatan tinggi.</p>
                            <ul class="space-y-2 mb-6">
                                <li class="text-sm text-slate-500"><i
                                        class="fa-solid fa-check text-green-500 mr-2"></i>Arsitektur
                                    Skalabel</li>
                                <li class="text-sm text-slate-500"><i
                                        class="fa-solid fa-check text-green-500 mr-2"></i>Keamanan Data
                                    Enkripsi</li>
                            </ul>
                        </div>
                        <a href="{{ route('saas.sabilsys') }}"
                            class="text-primary font-bold flex items-center gap-2 group-hover:text-indigo-800 mt-4">
                            Eksplorasi SabilSys <i
                                class="fa-solid fa-arrow-right transform group-hover:translate-x-1 transition-all"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Marketplace -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div class="max-w-2xl">
                    <span class="text-primary font-bold tracking-wider uppercase text-sm">Marketplace
                        Akhritech</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mt-2 mb-4">Produk Digital
                        & Starter Kit Premium</h2>
                    <p class="text-slate-600 text-lg">
                        Bagi sesama developer atau pebisnis yang mencari solusi instan, kami menyediakan
                        Web Theme dan Boilerplate berstandar tinggi yang dikembangkan langsung oleh tim
                        engineer kami.
                    </p>
                </div>
                <a href="{{ route('products.index') }}"
                    class="hidden md:inline-flex px-6 py-3 bg-slate-900 text-white rounded-lg font-medium hover:bg-slate-800 transition-colors">
                    Jelajahi Marketplace <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($products as $product)
                    <article
                        class="bg-white rounded-2xl overflow-hidden border border-slate-200 hover:border-primary hover:shadow-xl transition-all group flex flex-col h-full">
                        <div class="relative h-56 bg-slate-100 overflow-hidden">
                            @if (!empty($product->thumbnail_image))
                                <img src="{{ str_starts_with($product->thumbnail_image, 'https://') ? $product->thumbnail_image : asset('storage/' . $product->thumbnail_image) }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div
                                    class="w-full h-full flex items-center justify-center text-slate-400">
                                    No Image</div>
                            @endif
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <span
                                class="text-xs text-primary font-bold uppercase tracking-wider block mb-2">{{ $product->category }}</span>
                            <h3
                                class="text-lg font-bold mb-2 text-slate-900 group-hover:text-primary transition-colors">
                                {{ $product->name }}</h3>
                            <p class="text-slate-500 text-sm mb-4 line-clamp-2">
                                {{ $product->short_description }}</p>

                            <div
                                class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xl font-bold text-slate-900">
                                    {{ $product->final_price > 0 ? 'Rp ' . number_format($product->final_price, 0, ',', '.') : 'Gratis' }}
                                </span>
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="text-primary font-semibold text-sm hover:underline">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="mt-10 text-center md:hidden">
                <a href="{{ route('products.index') }}"
                    class="inline-flex px-6 py-3 border border-slate-300 text-slate-700 rounded-lg font-medium hover:border-primary hover:text-primary transition-colors">
                    Lihat Semua Produk Digital
                </a>
            </div>
        </div>
    </section>

    <!-- 8. FAQ Section -->
    <section class="py-20 bg-slate-50 border-t border-slate-200">
        <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
            <div class="text-center mb-16">
                <span class="text-primary font-bold tracking-wider uppercase text-sm">FAQ</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mt-2">Pertanyaan Seputar Jasa
                    Pembuatan Website</h2>
            </div>

            <div class="space-y-4">
                <details
                    class="group bg-white rounded-xl shadow-sm border border-slate-200 open:ring-1 open:ring-primary/20 transition-all">
                    <summary
                        class="flex items-center justify-between p-6 font-bold cursor-pointer text-slate-900">
                        Berapa lama proses pembuatan website atau aplikasi di Akhritech?
                        <i
                            class="fa-solid fa-chevron-down text-slate-400 group-open:-rotate-180 transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 text-slate-600 text-sm leading-relaxed">
                        Waktu pengerjaan bergantung pada kompleksitas fitur. Untuk landing page sekitar
                        1-2 minggu, company profile 2-4 minggu, dan custom web app bisa memakan waktu
                        1-3 bulan.
                    </div>
                </details>
                <details
                    class="group bg-white rounded-xl shadow-sm border border-slate-200 open:ring-1 open:ring-primary/20 transition-all">
                    <summary
                        class="flex items-center justify-between p-6 font-bold cursor-pointer text-slate-900">
                        Berapa biaya jasa pembuatan aplikasi berbasis web?
                        <i
                            class="fa-solid fa-chevron-down text-slate-400 group-open:-rotate-180 transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 text-slate-600 text-sm leading-relaxed">
                        Biaya bervariasi tergantung fitur dan skala sistem. Kami sangat transparan
                        mengenai biaya dan dapat menyesuaikan dengan anggaran (budget) yang Anda miliki.
                        Hubungi tim kami untuk estimasi presisi.
                    </div>
                </details>
                <details
                    class="group bg-white rounded-xl shadow-sm border border-slate-200 open:ring-1 open:ring-primary/20 transition-all">
                    <summary
                        class="flex items-center justify-between p-6 font-bold cursor-pointer text-slate-900">
                        Apakah Akhritech menyediakan maintenance setelah aplikasi selesai?
                        <i
                            class="fa-solid fa-chevron-down text-slate-400 group-open:-rotate-180 transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-6 text-slate-600 text-sm leading-relaxed">
                        Ya, kami memberikan dukungan teknis (support) dan jaminan perbaikan bug
                        (lifetime untuk bug bawaan) setelah proyek diserahterimakan untuk memastikan
                        bisnis Anda berjalan lancar.
                    </div>
                </details>
            </div>
        </div>
    </section>

    <!-- 9. Final CTA & Contact Section -->
    <section id="contact" class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
        </div>
        <div class="container mx-auto px-4 lg:px-8 max-w-6xl relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl lg:text-5xl font-extrabold mb-6">Siap Mendigitalisasi Bisnis
                        Anda?</h2>
                    <p class="text-slate-400 text-lg mb-10 leading-relaxed">
                        Diskusikan kebutuhan sistem informasi atau website Anda bersama konsultan IT
                        dari Akhritech. Kami merespon dengan cepat dan memberikan solusi yang
                        berorientasi pada hasil.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-14 h-14 rounded-2xl bg-slate-800 flex items-center justify-center text-primary shadow-inner">
                                <i class="fa-brands fa-whatsapp text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-300 mb-1">WhatsApp Langsung</h4>
                                <p class="text-xl font-bold">
                                    {{ $company->phone ?? '+62 8xx xxxx xxxx' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div
                                class="w-14 h-14 rounded-2xl bg-slate-800 flex items-center justify-center text-primary shadow-inner">
                                <i class="fa-solid fa-envelope text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-300 mb-1">Kirim Email</h4>
                                <p class="text-xl font-bold">
                                    {{ $company->email ?? 'hello@akhritech.com' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-8 lg:p-10 shadow-2xl text-slate-800">
                    <h3 class="text-2xl font-bold text-slate-900 mb-6">Mulai Konsultasi Gratis</h3>
                    <form id="contact-form" onsubmit="event.preventDefault(); submitInquiry();">
                        @csrf
                        <div class="mb-5">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama
                                Lengkap</label>
                            <input type="text" id="contact-name" name="name" required
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all">
                            <p id="err-name" class="hidden mt-1 text-xs text-red-500"></p>
                        </div>
                        <div class="mb-5">
                            <label class="block text-sm font-bold text-slate-700 mb-2">WhatsApp /
                                Telepon</label>
                            <input type="tel" id="contact-whatsapp" name="whatsapp_number"
                                required
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all">
                            <p id="err-whatsapp_number" class="hidden mt-1 text-xs text-red-500"></p>
                        </div>
                        <div class="mb-5">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Layanan yang
                                Dibutuhkan</label>
                            <select id="contact-subject" name="subject" required
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all">
                                <option value="Pembuatan Website Custom">Pembuatan Website Custom
                                </option>
                                <option value="Pembuatan Aplikasi Berbasis Web">Pembuatan Aplikasi
                                    Berbasis Web / Sistem Informasi</option>
                                <option value="Produk SaaS / SabilSys">Produk SaaS (SabilSys, dsb)
                                </option>
                                <option value="Lainnya">Konsultasi Lainnya</option>
                            </select>
                            <input type="hidden" name="email" value="no-email@akhritech.com" />
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Ceritakan
                                Kebutuhan Anda</label>
                            <textarea id="contact-message" name="message" rows="4" required
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all resize-none"
                                placeholder="Tuliskan secara singkat masalah atau ide proyek Anda..."></textarea>
                            <p id="err-message" class="hidden mt-1 text-xs text-red-500"></p>
                        </div>
                        <button type="submit" id="submit-btn"
                            class="w-full bg-primary text-white font-bold py-4 rounded-xl hover:bg-indigo-700 transition-all shadow-lg flex items-center justify-center gap-2">
                            <span id="submit-label">Kirim Pesan Sekarang</span>
                            <i id="submit-spinner"
                                class="hidden fa-solid fa-circle-notch fa-spin"></i>
                        </button>
                        <p class="text-center text-xs text-slate-500 mt-4"><i
                                class="fa-solid fa-lock mr-1"></i> Data Anda 100% aman dan
                            dirahasiakan.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Popup -->
    <div id="success-popup"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
        <div id="success-card"
            class="relative bg-white rounded-3xl shadow-2xl p-10 max-w-sm w-full text-center scale-90 transition-all duration-300">
            <div
                class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-5">
                <i class="fa-solid fa-check text-4xl text-green-500"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">Berhasil Terkirim!</h3>
            <p class="text-slate-500 mb-8">Terima kasih. Tim konsultan Akhritech akan segera
                menghubungi Anda melalui WhatsApp yang didaftarkan.</p>
            <button onclick="closeSuccessPopup()"
                class="w-full bg-primary hover:bg-indigo-700 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg">
                Tutup Jendela Ini
            </button>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function closeSuccessPopup() {
            const popup = document.getElementById('success-popup');
            const card = document.getElementById('success-card');
            popup.classList.add('opacity-0', 'pointer-events-none');
            card.classList.add('scale-90');
            card.classList.remove('scale-100');
        }

        async function submitInquiry() {
            const form = document.getElementById('contact-form');
            const btn = document.getElementById('submit-btn');
            const label = document.getElementById('submit-label');
            const spinner = document.getElementById('submit-spinner');

            document.querySelectorAll('[id^="err-"]').forEach(el => {
                el.textContent = '';
                el.classList.add('hidden');
            });

            btn.disabled = true;
            label.textContent = 'Mengirim...';
            spinner.classList.remove('hidden');
            btn.classList.add('opacity-70');

            try {
                const formData = new FormData(form);
                formData.set('email', formData.get('whatsapp_number') + '@no-email.com');

                const response = await fetch('{{ route('inquiry.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]')
                            .value,
                        'Accept': 'application/json',
                    },
                    body: formData,
                });

                const data = await response.json();

                if (!response.ok) {
                    if (response.status === 422) {
                        for (const [key, messages] of Object.entries(data.errors)) {
                            const errEl = document.getElementById(`err-${key}`);
                            if (errEl) {
                                errEl.textContent = messages[0];
                                errEl.classList.remove('hidden');
                            }
                        }
                    } else {
                        alert(
                            'Terjadi kesalahan sistem. Silakan coba lagi atau hubungi via WhatsApp.'
                        );
                    }
                } else {
                    form.reset();
                    const popup = document.getElementById('success-popup');
                    const card = document.getElementById('success-card');
                    popup.classList.remove('opacity-0', 'pointer-events-none');
                    card.classList.remove('scale-90');
                    card.classList.add('scale-100');
                }
            } catch (error) {
                console.error(error);
                alert('Tidak dapat terhubung ke server. Periksa koneksi internet Anda.');
            } finally {
                btn.disabled = false;
                label.textContent = 'Kirim Pesan Sekarang';
                spinner.classList.add('hidden');
                btn.classList.remove('opacity-70');
            }
        }
    </script>
@endpush

