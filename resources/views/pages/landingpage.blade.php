@extends('layouts.tailwind')

@push('metadata')
    <!-- SEO Meta Tags -->
    <title>Akhritech | Jasa Pembuatan Aplikasi & Solusi Digital Bisnis</title>
    <meta name="description"
        content="Akhritech menyediakan solusi software SaaS & Jasa Web Development profesional untuk digitalisasi bisnis Anda. Berpengalaman 10+ tahun dalam mengembangkan sistem aplikasi berbasis website.">
    <meta name="keywords"
        content="web developer, software architect, Indonesia, Hajj Umrah system, travel tech, digital products, Web Themes, software house, web development services, custom software, business solutions, SabilSys, Akhritech, Starter Kit, Boilerplate">
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
                        berorientasi pada hasil. Temukan juga produk premium kami.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#themes"
                            class="px-8 py-4 bg-primary text-white rounded-xl font-bold text-lg hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-store"></i> Beli Produk
                        </a>
                        <a href="#portfolio"
                            class="px-8 py-4 bg-white text-slate-700 border border-slate-200 rounded-xl font-bold text-lg hover:bg-slate-50 transition-all flex items-center justify-center gap-2">
                            Lihat Karya
                        </a>
                    </div>

                    <div class="mt-10 flex items-center justify-center lg:justify-start gap-6 text-slate-400 text-sm">
                        {{-- <div class="flex -space-x-3">
                            <img class="w-10 h-10 rounded-full border-2 border-white"
                                src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                alt="Client">
                            <img class="w-10 h-10 rounded-full border-2 border-white"
                                src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                alt="Client">
                            <img class="w-10 h-10 rounded-full border-2 border-white"
                                src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                alt="Client">
                        </div> --}}
                        {{-- <p>Dipercaya oleh <span class="font-bold text-slate-700">100+</span> Klien Puas</p> --}}
                        <p><span class="font-bold text-slate-700">Kualitas Premium</span> untuk Klien Berstandar Tinggi.</p>
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
    {{-- <section id="about" class="py-20 bg-white">
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
    </section> --}}

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
            <div
                class="grid grid-cols-1 {{ count($packages) == 2 ? 'md:grid-cols-2 max-w-4xl mx-auto' : 'md:grid-cols-3' }} gap-8 items-start">
                @foreach ($packages as $package)
                    <div
                        class="bg-white rounded-2xl p-8 {{ $package['highlight'] ? 'border-2 border-primary shadow-xl relative transform md:-translate-y-4 z-10' : 'border border-slate-200 shadow-sm hover:shadow-lg' }} transition-all duration-300 flex flex-col h-full">
                        @if ($package['highlight'])
                            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                <span
                                    class="bg-primary text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-md uppercase tracking-wide">
                                    {{ $package['tagline'] }}
                                </span>
                            </div>
                        @endif

                        <div class="mb-6 {{ $package['highlight'] ? 'pt-2' : '' }}">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $package['name'] }}</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">{{ $package['description'] }}</p>

                            @if (isset($package['timeline']))
                                <div
                                    class="mt-3 inline-flex items-center gap-1.5 px-2.5 py-1 bg-slate-50 text-slate-600 rounded-md text-xs font-semibold border border-slate-100">
                                    <i class="fa-solid fa-clock text-slate-400"></i> Durasi: {{ $package['timeline'] }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-8">
                            @if (isset($package['discounted_price']))
                                <span
                                    class="text-4xl font-extrabold {{ $package['highlight'] ? 'text-primary' : 'text-slate-900' }}">
                                    {{ $package['discounted_price'] }}
                                </span>
                                <div class="mt-2 flex items-center gap-2">
                                    <span class="text-slate-400 text-sm line-through">{{ $package['price'] }}</span>
                                    <span
                                        class="bg-red-50 text-red-600 text-xs px-2 py-0.5 rounded-full font-bold border border-red-100">
                                        Hemat {{ $package['discount'] }}
                                    </span>
                                </div>
                            @else
                                <span
                                    class="text-4xl font-extrabold {{ $package['highlight'] ? 'text-primary' : 'text-slate-900' }}">
                                    {{ $package['price'] }}
                                </span>
                            @endif
                            <span class="text-slate-400 text-xs block mt-2">Sekali Bayar</span>
                        </div>

                        <ul class="space-y-4 mb-8 flex-grow">
                            @foreach ($package['features'] as $feature)
                                <li class="flex items-start gap-3">
                                    <i class="fa-solid fa-check text-green-500 mt-1 flex-shrink-0"></i>
                                    <span class="text-slate-600 text-sm">{{ $feature }}</span>
                                </li>
                            @endforeach

                            @if (isset($package['domains']) && count($package['domains']) > 0)
                                <li class="flex items-start gap-3 pt-4 border-t border-slate-100 mt-4">
                                    <i class="fa-solid fa-globe text-accent mt-1 flex-shrink-0"></i>
                                    <div>
                                        <span
                                            class="text-slate-500 text-[10px] block font-bold uppercase tracking-wider mb-2">Pilihan
                                            Domain Gratis:</span>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach ($package['domains'] as $domain)
                                                <span
                                                    class="px-2 py-0.5 bg-cyan-50 text-accent text-[10px] font-bold rounded border border-cyan-100/50">
                                                    {{ $domain }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>

                        <a href="#contact"
                            class="block w-full py-3.5 px-6 font-bold text-center rounded-xl transition-all {{ $package['highlight'] ? 'bg-primary text-white hover:bg-indigo-700 shadow-lg shadow-indigo-200' : 'border-2 border-slate-200 text-slate-700 hover:border-primary hover:text-primary' }}">
                            Pilih Paket
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 text-center text-slate-500 text-sm">
                <p>* Harga dapat berubah tergantung pada kompleksitas fitur tambahan. <a href="#"
                        class="text-primary underline">Hubungi kami</a> untuk penawaran khusus.</p>
            </div>
        </div>
    </section>

    <!-- Themes Store Section (Highlight) -->
    <section id="products" class="py-20 bg-slate-900 text-white relative overflow-hidden">
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
                    <span class="text-accent font-bold tracking-wider uppercase text-sm">Marketplace</span>
                    <h2 class="text-3xl lg:text-5xl font-bold mt-2 mb-4">Produk</h2>
                    <p class="text-slate-300 text-lg">Luncurkan website Anda lebih cepat dengan koleksi produk
                        berkualitas tinggi kami. Dibuat dengan profesional, bersih, dan mudah dikustomisasi.</p>
                </div>
                <a href="{{ route('products.index') }}"
                    class="px-6 py-3 border border-slate-600 rounded-lg hover:bg-white hover:text-slate-900 transition-all font-medium">
                    Lihat Semua Produk <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($products as $product)
                    @php
                        $thumbnailUrl = '';
                        if (!empty($product->thumbnail_image)) {
                            $thumbnailUrl = str_starts_with($product->thumbnail_image, 'https://')
                                ? $product->thumbnail_image
                                : asset('storage/' . $product->thumbnail_image);
                        }

                        $price = (int) ($product->price ?? 0);
                        $finalPrice = (int) ($product->final_price ?? ($product->price ?? 0));
                        $hasDiscount = !empty($product->discount_percentage) && (int) $product->discount_percentage > 0;

                        $formattedPrice = 'Rp ' . number_format($price, 0, ',', '.');
                        if ($finalPrice > 0) {
                            $formattedFinalPrice = 'Rp ' . number_format($finalPrice, 0, ',', '.');
                        } else {
                            $formattedFinalPrice = 'Gratis';
                        }
                        // $formattedFinalPrice = 'Rp ' . number_format($finalPrice, 0, ',', '.');
                    @endphp
                    <article
                        class="bg-slate-800 rounded-2xl overflow-hidden border border-slate-700 hover:border-primary transition-colors group flex flex-col justify-between h-full">
                        <div>
                            <div class="relative overflow-hidden h-56 bg-slate-950">
                                @if ($hasDiscount)
                                    <span
                                        class="absolute top-4 left-4 bg-emerald-500 text-white text-xs font-bold px-3 py-1 rounded-full z-10">
                                        Diskon {{ (int) $product->discount_percentage }}%
                                    </span>
                                @endif
                                @if (!empty($thumbnailUrl))
                                    <img src="{{ $thumbnailUrl }}" alt="{{ $product->name }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500"
                                        loading="lazy">
                                @else
                                    <div
                                        class="w-full h-full bg-slate-800 flex items-center justify-center text-slate-500">
                                        No Image
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <span
                                    class="text-xs text-accent font-bold uppercase tracking-wider block mb-1">{{ $product->category }}</span>
                                <h3 class="text-xl font-bold mb-2 text-white group-hover:text-primary transition-colors">
                                    {{ $product->name }}</h3>
                                <p class="text-slate-400 text-sm mb-4 line-clamp-2 leading-relaxed">
                                    {{ $product->short_description }}</p>
                            </div>
                        </div>
                        <div class="p-6 pt-0 mt-auto">
                            <div class="flex justify-between items-center border-t border-slate-700 pt-4">
                                <div>
                                    @if ($hasDiscount)
                                        <div class="text-xs text-slate-500 line-through mb-0.5">{{ $formattedPrice }}
                                        </div>
                                    @endif
                                    <span class="text-2xl font-extrabold text-white">{{ $formattedFinalPrice }}</span>
                                </div>
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="bg-primary hover:bg-indigo-600 text-white px-5 py-2.5 rounded-lg font-medium transition-colors flex items-center gap-2 text-sm shadow-md hover:shadow-lg">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    {{ $formattedFinalPrice !== 'Gratis' ? 'Beli' : 'Dapatkan' }}
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <!-- Fallback Theme Card 1 -->
                    <article
                        class="bg-slate-800 rounded-2xl overflow-hidden border border-slate-700 hover:border-primary transition-colors group flex flex-col justify-between h-full">
                        <div>
                            <div class="relative overflow-hidden h-56">
                                <span
                                    class="absolute top-4 left-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full z-10">Best
                                    Seller</span>
                                <img src="https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                    alt="Theme Preview"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                            </div>
                            <div class="p-6">
                                <span
                                    class="text-xs text-accent font-bold uppercase tracking-wider block mb-1">Dashboard</span>
                                <h3 class="text-xl font-bold mb-2 text-white">AkhriSaaS - Dashboard Admin</h3>
                                <p class="text-slate-400 text-sm mb-4 line-clamp-2">Produk admin dashboard lengkap dengan
                                    fitur analitik dan dark mode.</p>
                            </div>
                        </div>
                        <div class="p-6 pt-0 mt-auto">
                            <div class="flex justify-between items-center border-t border-slate-700 pt-4">
                                <span class="text-2xl font-bold text-accent">Rp 490.000</span>
                                <a href="{{ route('products.index') }}"
                                    class="bg-primary hover:bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center gap-2">
                                    <i class="fa-solid fa-cart-shopping"></i> Beli
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Fallback Theme Card 2 -->
                    <article
                        class="bg-slate-800 rounded-2xl overflow-hidden border border-slate-700 hover:border-primary transition-colors group flex flex-col justify-between h-full">
                        <div>
                            <div class="relative overflow-hidden h-56">
                                <img src="https://images.unsplash.com/photo-1559028012-481c04fa702d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                    alt="Theme Preview"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                            </div>
                            <div class="p-6">
                                <span
                                    class="text-xs text-accent font-bold uppercase tracking-wider block mb-1">Portfolio</span>
                                <h3 class="text-xl font-bold mb-2 text-white">Portfolio Creative Pro</h3>
                                <p class="text-slate-400 text-sm mb-4 line-clamp-2">Tema portofolio minimalis untuk
                                    desainer dan fotografer profesional.</p>
                            </div>
                        </div>
                        <div class="p-6 pt-0 mt-auto">
                            <div class="flex justify-between items-center border-t border-slate-700 pt-4">
                                <span class="text-2xl font-bold text-accent">Rp 290.000</span>
                                <a href="{{ route('products.index') }}"
                                    class="bg-primary hover:bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center gap-2">
                                    <i class="fa-solid fa-cart-shopping"></i> Beli
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Fallback Theme Card 3 -->
                    <article
                        class="bg-slate-800 rounded-2xl overflow-hidden border border-slate-700 hover:border-primary transition-colors group flex flex-col justify-between h-full">
                        <div>
                            <div class="relative overflow-hidden h-56">
                                <span
                                    class="absolute top-4 left-4 bg-purple-50 text-white text-xs font-bold px-3 py-1 rounded-full z-10">New</span>
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                    alt="Theme Preview"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                            </div>
                            <div class="p-6">
                                <span
                                    class="text-xs text-accent font-bold uppercase tracking-wider block mb-1">E-Commerce</span>
                                <h3 class="text-xl font-bold mb-2 text-white">E-Shopify Ultimate</h3>
                                <p class="text-slate-400 text-sm mb-4 line-clamp-2">Tema toko online modern dengan konversi
                                    tinggi dan loading cepat.</p>
                            </div>
                        </div>
                        <div class="p-6 pt-0 mt-auto">
                            <div class="flex justify-between items-center border-t border-slate-700 pt-4">
                                <span class="text-2xl font-bold text-accent">Rp 590.000</span>
                                <a href="{{ route('products.index') }}"
                                    class="bg-primary hover:bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center gap-2">
                                    <i class="fa-solid fa-cart-shopping"></i> Beli
                                </a>
                            </div>
                        </div>
                    </article>
                @endforelse
            </div>
        </div>
    </section>

    <!-- SaaS Products Section -->
    <section id="SaaS" class="py-20 bg-slate-50">
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">

                <!-- Product Card 1 -->
                <div
                    class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all border border-slate-100 overflow-hidden group flex flex-col h-full">
                    <div class="relative h-56 overflow-hidden">
                        <span
                            class="absolute top-4 left-4 bg-blue-50 text-blue-600 text-xs font-bold px-3 py-1 rounded-full z-10 border border-blue-100">
                            Travel Agency
                        </span>
                        <img src="{{ asset('./images/akhritech_travel.jpeg') }}" alt="Dashboard Jamaah"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-slate-900">SabilSys | Travel Haji & Umroh</h3>
                            <div class="flex gap-1 text-yellow-400 text-xs">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                        </div>
                        <p class="text-slate-600 text-sm mb-6 flex-grow">
                            Sistem manajemen terintegrasi untuk menangani jama'ah, manifest, hingga laporan keuangan dalam
                            satu dasbor digital. Cepat, aman, dan mudah digunakan.
                        </p>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fa-solid fa-check text-green-500"></i> Produk Siap Pakai
                            </div>
                            {{-- <div class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fa-solid fa-check text-green-500"></i> Integrasi Payment Gateway
                            </div> --}}
                            <div class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fa-solid fa-check text-green-500"></i> Manifest Keberangkatan
                            </div>
                            <div class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fa-solid fa-check text-green-500"></i> Dashboard Jamaah
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                            <div>
                                <span class="block text-xs text-slate-400">Mulai dari</span>
                                <span class="block text-lg font-bold text-slate-900">Rp 359.000<span
                                        class="text-sm font-normal text-slate-500">/bln</span></span>
                            </div>
                            <a href="{{ route('saas.sabilsys') }}"
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
                            coming soon
                        </span>
                        <img src="{{ asset('images/undraw_taking-notes_oyqz.png') }}" alt="SocialBoost"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-slate-900">Upcoming Innovation</h3>
                            <div class="flex gap-1 text-yellow-400 text-xs">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <p class="text-slate-600 text-sm mb-6 flex-grow">
                            Solving [Masalah X] for [Market Y]. Stay tuned for the next breakthrough solution from
                            Akhritech.
                        </p>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fa-solid fa-check text-green-500"></i> Coming Soon
                            </div>
                            <div class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fa-solid fa-check text-green-500"></i> Innovation
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                            <div>
                                <span class="block text-xs text-slate-400">Mulai dari</span>
                                <span class="block text-lg font-bold text-slate-900">-</span>
                                {{-- <span
                                        class="text-sm font-normal text-slate-500">/bln</span></span> --}}
                            </div>
                            {{-- <a href="#"
                                class="px-5 py-2.5 bg-slate-900 text-white rounded-lg font-medium hover:bg-primary transition-colors text-sm">
                                Coba Gratis
                            </a> --}}
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
                @foreach ($portfolios as $portfolio)
                    <!-- Dynamic Portfolio Item -->
                    <div class="portfolio-card group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer"
                        data-project-title="{{ $portfolio->name }}" data-project-category="{{ $portfolio->category }}"
                        data-project-image="{{ $portfolio->image_url ?? 'https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                        data-project-description="{{ $portfolio->story }}" data-project-client="Mitra Akhritech"
                        data-project-date="{{ $portfolio->created_at->format('F Y') }}"
                        data-project-tags="{{ is_array($portfolio->highlights) ? implode(',', $portfolio->highlights) : '' }}"
                        data-project-link="{{ $portfolio->link ?? '#' }}">
                        <img src="{{ $portfolio->image_url ?? 'https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                            alt="{{ $portfolio->name }}"
                            class="w-full h-72 object-cover transform group-hover:scale-110 transition duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent opacity-1 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                            <span class="text-accent font-medium text-sm mb-1">{{ $portfolio->category }}</span>
                            <h3 class="text-white text-xl font-bold">{{ $portfolio->name }}</h3>
                        </div>
                    </div>
                @endforeach
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
                                    <p class="text-slate-400">{{ $company->email }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center text-primary flex-shrink-0">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold">Telepon/WA</h4>
                                    <p class="text-slate-400">{{ $company->phone }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center text-primary flex-shrink-0">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold">Lokasi</h4>
                                    <p class="text-slate-400">{{ $company->address }}</p>
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
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:w-3/5 p-10 lg:p-16">
                    <form id="contact-form" novalidate>
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="contact-name" class="block text-sm font-medium text-slate-700 mb-2">Nama
                                    Lengkap</label>
                                <input type="text" id="contact-name" name="name"
                                    class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all"
                                    placeholder="John Doe" maxlength="20">
                                <p id="err-name" class="hidden mt-1.5 text-xs text-red-500"></p>
                            </div>
                            <div>
                                <label for="contact-email"
                                    class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                                <input type="email" id="contact-email" name="email"
                                    class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all"
                                    placeholder="john@example.com" maxlength="30">
                                <p id="err-email" class="hidden mt-1.5 text-xs text-red-500"></p>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="contact-whatsapp" class="block text-sm font-medium text-slate-700 mb-2">Nomor
                                WhatsApp</label>
                            <input type="tel" id="contact-whatsapp" name="whatsapp_number"
                                class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all"
                                placeholder="08123456789" maxlength="16">
                            <p id="err-whatsapp_number" class="hidden mt-1.5 text-xs text-red-500"></p>
                        </div>
                        <div class="mb-6">
                            <label for="contact-subject"
                                class="block text-sm font-medium text-slate-700 mb-2">Subjek</label>
                            <input type="text" id="contact-subject" name="subject"
                                class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all"
                                placeholder="Saya ingin konsultasi web" maxlength="100">
                            <p id="err-subject" class="hidden mt-1.5 text-xs text-red-500"></p>
                        </div>
                        <div class="mb-8">
                            <label for="contact-message"
                                class="block text-sm font-medium text-slate-700 mb-2">Pesan</label>
                            <textarea rows="4" id="contact-message" name="message"
                                class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all"
                                placeholder="Ceritakan detail proyek Anda..." maxlength="1000"></textarea>
                            <p id="err-message" class="hidden mt-1.5 text-xs text-red-500"></p>
                        </div>
                        <button type="submit" id="contact-submit"
                            class="w-full bg-primary text-white font-bold py-4 rounded-xl hover:bg-indigo-700 transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2 disabled:opacity-60 disabled:cursor-not-allowed">
                            <span id="submit-label">Kirim Pesan</span>
                            <svg id="submit-spinner" class="hidden w-5 h-5 animate-spin"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                            </svg>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- Portfolio Detail Modal -->
    <div id="portfolio-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 opacity-0 pointer-events-none transition-all duration-300">
        <!-- Backdrop -->
        <div id="modal-backdrop"
            class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity duration-300"></div>

        <!-- Modal Content Window -->
        <div id="modal-content"
            class="relative bg-white rounded-3xl overflow-hidden shadow-2xl max-w-xl w-full max-h-[90vh] flex flex-col transform scale-95 translate-y-4 transition-all duration-300 z-10 border border-slate-100">
            <!-- Close Button -->
            <button id="close-modal-btn"
                class="absolute top-4 right-4 z-20 w-10 h-10 rounded-full bg-white/90 hover:bg-white text-slate-700 shadow-md flex items-center justify-center hover:scale-105 transition-all outline-none border border-slate-200">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>

            <!-- Scrollable Content -->
            <div class="overflow-y-auto flex-grow">
                <div class="flex flex-col min-h-[500px]">
                    <!-- Left: Project Image -->
                    <div class="w-full relative bg-slate-950 flex items-center h-64 md:h-[420px] overflow-hidden">
                        <img id="modal-img" src="" alt="Showcase"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/20 to-transparent"></div>
                    </div>

                    <!-- Right: Info Panel -->
                    <div class="w-full p-6 sm:p-8 flex flex-col justify-between">
                        <div>
                            <!-- Category Badge -->
                            <span id="modal-category"
                                class="inline-block text-xs font-bold tracking-wider text-accent uppercase bg-cyan-50 px-2.5 py-1 rounded-md mb-3 border border-cyan-100">Category</span>

                            <!-- Title -->
                            <h3 id="modal-title"
                                class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-4 leading-snug">Project Title
                            </h3>

                            <!-- Description -->
                            <p id="modal-description" class="text-slate-600 text-sm leading-relaxed mb-6">Description...
                            </p>

                            <!-- Metadata Info -->
                            <div class="grid grid-cols-2 gap-4 mb-6 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                                <div>
                                    <span
                                        class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Klien</span>
                                    <span id="modal-client" class="text-sm font-semibold text-slate-800">Client</span>
                                </div>
                                <div>
                                    <span
                                        class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Tanggal</span>
                                    <span id="modal-date" class="text-sm font-semibold text-slate-800">Date</span>
                                </div>
                            </div>

                            <!-- Tech Badges -->
                            <div class="mb-8">
                                <span
                                    class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider mb-2">Teknologi</span>
                                <div id="modal-tags" class="flex flex-wrap gap-2"></div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="border-t border-slate-100 pt-6 mt-auto">
                            <a id="modal-link" href="#" target="_blank"
                                class="w-full px-6 py-3.5 bg-primary hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 transition-all flex items-center justify-center gap-2">
                                Kunjungi Website <i class="fa-solid fa-arrow-up-right-from-square text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Interactive Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('portfolio-modal');
            const modalBackdrop = document.getElementById('modal-backdrop');
            const modalContent = document.getElementById('modal-content');
            const closeBtn = document.getElementById('close-modal-btn');
            const cards = document.querySelectorAll('.portfolio-card');

            const modalImg = document.getElementById('modal-img');
            const modalCategory = document.getElementById('modal-category');
            const modalTitle = document.getElementById('modal-title');
            const modalDescription = document.getElementById('modal-description');
            const modalClient = document.getElementById('modal-client');
            const modalDate = document.getElementById('modal-date');
            const modalTags = document.getElementById('modal-tags');
            const modalLink = document.getElementById('modal-link');

            function openModal(card) {
                const title = card.getAttribute('data-project-title');
                const category = card.getAttribute('data-project-category');
                const img = card.getAttribute('data-project-image');
                const desc = card.getAttribute('data-project-description');
                const client = card.getAttribute('data-project-client');
                const date = card.getAttribute('data-project-date');
                const tags = card.getAttribute('data-project-tags').split(',');
                const link = card.getAttribute('data-project-link');

                modalImg.src = img;
                modalImg.alt = title;
                modalCategory.textContent = category;
                modalTitle.textContent = title;
                modalDescription.innerHTML = desc;
                modalClient.textContent = client;
                modalDate.textContent = date;
                modalLink.href = link;

                // Build tags
                modalTags.innerHTML = '';
                tags.forEach(tag => {
                    const cleanTag = tag.trim();
                    if (cleanTag) {
                        const badge = document.createElement('span');
                        badge.className =
                            'px-3 py-1 bg-slate-100 text-slate-700 text-xs font-semibold rounded-md border border-slate-200/60';
                        badge.textContent = cleanTag;
                        modalTags.appendChild(badge);
                    }
                });

                // Display
                modal.classList.remove('pointer-events-none', 'opacity-0');
                modal.classList.add('opacity-100');

                modalContent.classList.remove('scale-95', 'translate-y-4');
                modalContent.classList.add('scale-100', 'translate-y-0');

                document.body.classList.add('overflow-hidden');
            }

            function closeModal() {
                modal.classList.add('pointer-events-none');
                modal.classList.remove('opacity-100');
                modal.classList.add('opacity-0');

                modalContent.classList.remove('scale-100', 'translate-y-0');
                modalContent.classList.add('scale-95', 'translate-y-4');

                document.body.classList.remove('overflow-hidden');
            }

            cards.forEach(card => {
                card.addEventListener('click', () => openModal(card));
            });

            closeBtn.addEventListener('click', closeModal);
            modalBackdrop.addEventListener('click', closeModal);

            window.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !modal.classList.contains('pointer-events-none')) {
                    closeModal();
                }
            });
        });
    </script>

    {{-- ===== Success Popup ===== --}}
    <div id="success-popup"
        class="fixed inset-0 z-[100] flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300">
        {{-- Backdrop --}}
        <div id="success-backdrop" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

        {{-- Card --}}
        <div id="success-card"
            class="relative bg-white rounded-2xl shadow-2xl p-10 max-w-sm w-full text-center scale-90 transition-all duration-300">
            {{-- Icon --}}
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-5">
                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" stroke-width="2.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">Terima Kasih! 🎉</h3>
            <p class="text-slate-500 mb-7">Pesan Anda telah kami terima.<br>Kami akan segera menghubungi Anda.</p>
            <button id="success-close"
                class="w-full bg-primary hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl transition-all">
                Tutup
            </button>
        </div>
    </div>

    {{-- ===== Contact Form AJAX Script ===== --}}
    <script>
        (function() {
            const form = document.getElementById('contact-form');
            const submitBtn = document.getElementById('contact-submit');
            const submitLabel = document.getElementById('submit-label');
            const spinner = document.getElementById('submit-spinner');

            // Popup elements
            const popup = document.getElementById('success-popup');
            const card = document.getElementById('success-card');
            const backdrop = document.getElementById('success-backdrop');
            const closeBtn = document.getElementById('success-close');

            const errorFields = ['name', 'email', 'whatsapp_number', 'subject', 'message'];

            function showError(field, message) {
                const el = document.getElementById('err-' + field);
                const input = form.querySelector('[name="' + field + '"]');
                if (!el) return;
                el.textContent = message;
                el.classList.remove('hidden');
                if (input) input.classList.add('border-red-400', 'focus:border-red-400');
            }

            function clearErrors() {
                errorFields.forEach(f => {
                    const el = document.getElementById('err-' + f);
                    const input = form.querySelector('[name="' + f + '"]');
                    if (el) {
                        el.textContent = '';
                        el.classList.add('hidden');
                    }
                    if (input) input.classList.remove('border-red-400', 'focus:border-red-400');
                });
            }

            function setLoading(state) {
                submitBtn.disabled = state;
                submitLabel.textContent = state ? 'Mengirim...' : 'Kirim Pesan';
                spinner.classList.toggle('hidden', !state);
            }

            function openSuccessPopup() {
                popup.classList.remove('opacity-0', 'pointer-events-none');
                popup.classList.add('opacity-100');
                card.classList.remove('scale-90');
                card.classList.add('scale-100');
                document.body.classList.add('overflow-hidden');
            }

            function closeSuccessPopup() {
                popup.classList.add('opacity-0', 'pointer-events-none');
                popup.classList.remove('opacity-100');
                card.classList.add('scale-90');
                card.classList.remove('scale-100');
                document.body.classList.remove('overflow-hidden');
            }

            closeBtn.addEventListener('click', closeSuccessPopup);
            backdrop.addEventListener('click', closeSuccessPopup);
            window.addEventListener('keydown', e => {
                if (e.key === 'Escape' && !popup.classList.contains('pointer-events-none')) closeSuccessPopup();
            });

            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                clearErrors();
                setLoading(true);

                const formData = new FormData(form);

                try {
                    const response = await fetch('{{ route('inquiry.store') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json',
                        },
                        body: formData,
                    });

                    const data = await response.json();

                    if (response.ok && data.success) {
                        form.reset();
                        openSuccessPopup();
                    } else if (response.status === 422 && data.errors) {
                        // Display per-field validation errors
                        Object.entries(data.errors).forEach(([field, messages]) => {
                            showError(field, messages[0]);
                        });
                    } else {
                        alert(data.message ?? 'Terjadi kesalahan. Silakan coba lagi.');
                    }
                } catch (err) {
                    alert('Gagal mengirim pesan. Periksa koneksi internet Anda.');
                } finally {
                    setLoading(false);
                }
            });
        })();
    </script>
@endsection
