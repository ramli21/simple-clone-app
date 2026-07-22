@extends('layouts.tailwind')

@push('metadata')
    <!-- SEO Meta Tags -->
    <title>Jasa Pembuatan Website Profesional & Terpercaya | Akhritech</title>
    <meta name="description"
        content="Layanan jasa pembuatan website profesional, responsif, dan SEO friendly dari Akhritech. Cocok untuk company profile, toko online, dan sistem kustom. Konsultasi gratis!">
    <meta name="author" content="Akhritech">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Jasa Pembuatan Website Profesional & Terpercaya | Akhritech">
    <meta property="og:description"
        content="Layanan jasa pembuatan website profesional, responsif, dan SEO friendly dari Akhritech. Cocok untuk company profile, toko online, dan sistem kustom. Konsultasi gratis!">
    <meta property="og:image" content="{{ asset('images/akhritech-banner.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Jasa Pembuatan Website Profesional & Terpercaya | Akhritech">
    <meta property="twitter:description"
        content="Layanan jasa pembuatan website profesional, responsif, dan SEO friendly dari Akhritech. Cocok untuk company profile, toko online, dan sistem kustom. Konsultasi gratis!">
    <meta property="twitter:image" content="{{ asset('images/akhritech-banner.png') }}">

    <link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 bg-slate-50 overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <!-- Text Content -->
                <div class="lg:w-1/2 text-center lg:text-left">
                    <div
                        class="inline-block px-4 py-1.5 rounded-full bg-indigo-100 text-primary font-bold text-sm mb-6 border border-indigo-200">
                        ⭐ Solusi Digital Terbaik untuk Anda
                    </div>
                    <h1 class="text-4xl lg:text-6xl font-extrabold text-slate-900 leading-tight mb-6">
                        Jasa Pembuatan <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Website Profesional</span>
                    </h1>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Kami siap membantu Anda memiliki website impian yang cepat, modern, dan dirancang khusus untuk meningkatkan penjualan atau brand awareness bisnis Anda di internet.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#pricing"
                            class="px-8 py-4 bg-primary text-white rounded-xl font-bold text-lg hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200 flex items-center justify-center gap-2">
                            Lihat Paket Harga
                        </a>
                        <a href="#contact"
                            class="px-8 py-4 bg-white text-slate-700 border border-slate-200 rounded-xl font-bold text-lg hover:bg-slate-50 transition-all flex items-center justify-center gap-2">
                            Konsultasi Gratis
                        </a>
                    </div>
                    <div class="mt-8 flex items-center justify-center lg:justify-start gap-3 text-slate-500 text-sm">
                        <i class="fa-solid fa-check-circle text-green-500"></i> Desain Responsif
                        <i class="fa-solid fa-check-circle text-green-500 ml-4"></i> SEO Friendly
                        <i class="fa-solid fa-check-circle text-green-500 ml-4"></i> Support Handal
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="lg:w-1/2 relative">
                    <div class="relative w-full max-w-md mx-auto lg:max-w-full">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                            alt="Jasa Pembuatan Website Profesional"
                            class="relative rounded-2xl shadow-2xl border border-white/50 object-cover w-full h-auto transform hover:-translate-y-2 transition duration-500">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mengapa Memilih Kami Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-primary font-bold tracking-wider uppercase text-sm">Keunggulan</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mt-2 mb-4">Mengapa Memilih Kami?</h2>
                <p class="text-lg text-slate-600">
                    Kami tidak sekadar membuat website, kami menciptakan pengalaman digital yang memudahkan pengunjung Anda memahami bisnis Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:border-primary/30 hover:shadow-lg transition-all text-center group">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-primary mx-auto mb-6 shadow-sm group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-mobile-screen-button text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Tampil Sempurna di HP</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Website Anda akan otomatis menyesuaikan layar saat dibuka dari smartphone, tablet, maupun komputer. Nyaman dibaca dimana saja.
                    </p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:border-primary/30 hover:shadow-lg transition-all text-center group">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-primary mx-auto mb-6 shadow-sm group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-magnifying-glass-chart text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Mudah Ditemukan Google</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Kami membangun struktur website yang ramah SEO (Search Engine Optimization), sehingga peluang muncul di halaman pertama pencarian semakin besar.
                    </p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:border-primary/30 hover:shadow-lg transition-all text-center group">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-primary mx-auto mb-6 shadow-sm group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-headset text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Tim Support Siap Bantu</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Anda tidak ditinggal begitu saja setelah website selesai. Kami siap membantu Anda jika mengalami kendala atau membutuhkan update di kemudian hari.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4">Pilih Paket Sesuai Kebutuhan Anda</h2>
                <p class="text-lg text-slate-600">
                    Biaya transparan, fitur lengkap, dan tanpa biaya tersembunyi.
                </p>
            </div>

            <div class="grid grid-cols-1 {{ count($packages) == 2 ? 'md:grid-cols-2 max-w-4xl mx-auto' : 'md:grid-cols-3' }} gap-8 items-start">
                @foreach ($packages as $package)
                    <div
                        class="bg-white rounded-2xl p-8 {{ $package['highlight'] ? 'border-2 border-primary shadow-xl relative transform md:-translate-y-4 z-10' : 'border border-slate-200 shadow-sm hover:shadow-lg' }} transition-all duration-300 flex flex-col h-full">
                        @if ($package['highlight'])
                            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                <span class="bg-primary text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-md uppercase tracking-wide">
                                    {{ $package['tagline'] }}
                                </span>
                            </div>
                        @endif

                        <div class="mb-6 {{ $package['highlight'] ? 'pt-2' : '' }}">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $package['name'] }}</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">{{ $package['description'] }}</p>

                            @if (isset($package['timeline']))
                                <div class="mt-3 inline-flex items-center gap-1.5 px-2.5 py-1 bg-slate-50 text-slate-600 rounded-md text-xs font-semibold border border-slate-100">
                                    <i class="fa-solid fa-clock text-slate-400"></i> Pengerjaan: {{ $package['timeline'] }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-8">
                            @if (isset($package['discounted_price']))
                                <span class="text-4xl font-extrabold {{ $package['highlight'] ? 'text-primary' : 'text-slate-900' }}">
                                    {{ $package['discounted_price'] }}
                                </span>
                                <div class="mt-2 flex items-center gap-2">
                                    <span class="text-slate-400 text-sm line-through">{{ $package['price'] }}</span>
                                    <span class="bg-red-50 text-red-600 text-xs px-2 py-0.5 rounded-full font-bold border border-red-100">
                                        Hemat {{ $package['discount'] }}
                                    </span>
                                </div>
                            @else
                                <span class="text-4xl font-extrabold {{ $package['highlight'] ? 'text-primary' : 'text-slate-900' }}">
                                    {{ $package['price'] }}
                                </span>
                            @endif
                            <span class="text-slate-400 text-xs block mt-2">Harga Sekali Bayar</span>
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
                                        <span class="text-slate-500 text-[10px] block font-bold uppercase tracking-wider mb-2">Gratis Pilih Domain:</span>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach ($package['domains'] as $domain)
                                                <span class="px-2 py-0.5 bg-cyan-50 text-accent text-[10px] font-bold rounded border border-cyan-100/50">
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
                            Pilih Paket Ini
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-primary font-bold tracking-wider uppercase text-sm">Bukti Nyata</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mt-2 mb-4">Hasil Karya Kami</h2>
                <p class="text-slate-600">Beberapa bisnis yang telah mempercayakan pembuatan website mereka kepada Akhritech.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($portfolios as $portfolio)
                    <div class="group relative overflow-hidden rounded-2xl shadow-lg border border-slate-100">
                        <img src="{{ $portfolio->image_url ?? 'https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                            alt="{{ $portfolio->name }}"
                            class="w-full h-64 object-cover transform group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent p-6 flex flex-col justify-end">
                            <span class="text-accent font-medium text-xs mb-1 uppercase tracking-wider">{{ $portfolio->category }}</span>
                            <h3 class="text-white text-lg font-bold">{{ $portfolio->name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-12 text-center">
                <a href="{{ url('/') }}#portfolio" class="inline-flex items-center gap-2 text-primary font-bold hover:text-indigo-800 transition-colors">
                    Lihat Semua Portfolio <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-slate-900 text-white">
        <div class="container mx-auto px-4 lg:px-8 max-w-5xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl lg:text-4xl font-bold mb-6">Mulai Transformasi Digital Anda Sekarang!</h2>
                    <p class="text-slate-400 mb-8 leading-relaxed">
                        Punya pertanyaan atau ingin mendiskusikan kebutuhan spesifik Anda? Tim kami siap membantu memberikan solusi terbaik yang sesuai dengan anggaran Anda.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center text-primary">
                                <i class="fa-brands fa-whatsapp text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-slate-300">WhatsApp Kami</h4>
                                <p class="text-lg font-semibold">{{ $company->phone ?? '+62 8xx xxxx xxxx' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center text-primary">
                                <i class="fa-solid fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-slate-300">Email Kami</h4>
                                <p class="text-lg font-semibold">{{ $company->email ?? 'hello@akhritech.com' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-3xl p-8 lg:p-10 text-slate-800 shadow-2xl">
                    <h3 class="text-2xl font-bold mb-6 text-slate-900">Kirim Pesan</h3>
                    <form id="contact-form" onsubmit="event.preventDefault(); submitInquiry();">
                        @csrf
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="contact-name" name="name" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all">
                            <p id="err-name" class="hidden mt-1 text-xs text-red-500"></p>
                        </div>
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-slate-700 mb-2">WhatsApp / Telepon</label>
                            <input type="tel" id="contact-whatsapp" name="whatsapp_number" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all">
                            <p id="err-whatsapp_number" class="hidden mt-1 text-xs text-red-500"></p>
                        </div>
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Pilih Layanan</label>
                            <select id="contact-subject" name="subject" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all">
                                <option value="Pertanyaan Jasa Pembuatan Website - Landing Page">Paket Landing Page</option>
                                <option value="Pertanyaan Jasa Pembuatan Website - Company Profile">Paket Company Profile</option>
                                <option value="Pertanyaan Custom Website / Lainnya">Custom / Konsultasi Lainnya</option>
                            </select>
                            <input type="hidden" name="email" value="no-email@akhritech.com" /> <!-- Fallback jika sistem lama butuh email -->
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Detail Kebutuhan Anda</label>
                            <textarea id="contact-message" name="message" rows="4" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all resize-none" placeholder="Ceritakan singkat bisnis Anda dan apa yang Anda butuhkan..."></textarea>
                            <p id="err-message" class="hidden mt-1 text-xs text-red-500"></p>
                        </div>
                        <button type="submit" id="submit-btn" class="w-full bg-primary text-white font-bold py-4 rounded-xl hover:bg-indigo-700 transition-all shadow-lg flex items-center justify-center gap-2">
                            <span id="submit-label">Kirim Permintaan</span>
                            <i id="submit-spinner" class="hidden fa-solid fa-circle-notch fa-spin"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Popup Structure (Reused logic) -->
    <div id="success-popup" class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300">
        <div id="success-backdrop" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
        <div id="success-card" class="relative bg-white rounded-2xl shadow-2xl p-10 max-w-sm w-full text-center scale-90 transition-all duration-300">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-5">
                <i class="fa-solid fa-check text-4xl text-green-500"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">Berhasil!</h3>
            <p class="text-slate-500 mb-7">Pesan Anda telah kami terima.<br>Tim kami akan segera menghubungi Anda melalui WhatsApp.</p>
            <button onclick="closeSuccessPopup()" class="w-full bg-primary hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl transition-all">
                Tutup
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
            
            // Clear errors
            document.querySelectorAll('[id^="err-"]').forEach(el => {
                el.textContent = '';
                el.classList.add('hidden');
            });

            // Loading state
            btn.disabled = true;
            label.textContent = 'Mengirim...';
            spinner.classList.remove('hidden');
            btn.classList.add('opacity-70');

            try {
                const formData = new FormData(form);
                // Add dummy email since the controller requires it but we removed it from the form for simplicity
                formData.set('email', formData.get('whatsapp_number') + '@no-email.com');

                const response = await fetch('{{ route('inquiry.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
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
                        alert('Terjadi kesalahan sistem. Silakan coba lagi atau hubungi via WhatsApp.');
                    }
                } else {
                    form.reset();
                    // Show success
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
                // Reset state
                btn.disabled = false;
                label.textContent = 'Kirim Permintaan';
                spinner.classList.add('hidden');
                btn.classList.remove('opacity-70');
            }
        }
    </script>
@endpush
