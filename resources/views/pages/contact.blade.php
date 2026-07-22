@extends('layouts.tailwind')

@push('metadata')
    <title>Hubungi Kami - Konsultasi Pembuatan Website & Aplikasi | Akhritech</title>
    <meta name="description"
        content="Punya pertanyaan atau ingin memulai proyek digital Anda? Hubungi Akhritech untuk konsultasi gratis mengenai pembuatan website, aplikasi web, dan sistem informasi.">
    <meta name="keywords"
        content="hubungi akhritech, kontak akhritech, konsultasi website gratis, jasa pembuatan website, kontak web developer">
    <meta name="author" content="Akhritech">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Hubungi Kami - Akhritech">
    <meta property="og:description"
        content="Punya pertanyaan atau ingin memulai proyek digital Anda? Hubungi Akhritech untuk konsultasi gratis mengenai pembuatan website, aplikasi web, dan sistem informasi.">
    <meta property="og:image" content="{{ asset('images/akhritech-banner.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Hubungi Kami - Akhritech">
    <meta property="twitter:description"
        content="Punya pertanyaan atau ingin memulai proyek digital Anda? Hubungi Akhritech untuk konsultasi gratis mengenai pembuatan website, aplikasi web, dan sistem informasi.">
    <meta property="twitter:image" content="{{ asset('images/akhritech-banner.png') }}">

    <link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
    <!-- Header Section -->
    <section class="relative pt-32 pb-16 lg:pt-40 lg:pb-24 bg-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-slate-900/90 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center max-w-3xl">
            <span class="text-accent font-bold tracking-wider uppercase text-sm mb-4 block">Hubungi Kami</span>
            <h1 class="text-4xl lg:text-5xl font-extrabold mb-6 leading-tight">Mulai Transformasi Digital Anda Hari Ini</h1>
            <p class="text-lg text-slate-300">Konsultasikan kebutuhan website, aplikasi, atau sistem informasi Anda. Tim ahli kami siap memberikan solusi terbaik yang disesuaikan dengan target bisnis Anda.</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-slate-50 relative -mt-10 z-20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col lg:flex-row border border-slate-100">
                <!-- Contact Info -->
                <div class="lg:w-2/5 bg-slate-900 text-white p-10 lg:p-12 relative overflow-hidden flex flex-col">
                    <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-primary/20 blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-64 h-64 rounded-full bg-accent/20 blur-3xl"></div>
                    
                    <h2 class="text-3xl font-bold mb-8 relative z-10">Informasi Kontak</h2>
                    
                    <div class="space-y-8 relative z-10 flex-grow">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center flex-shrink-0 text-accent">
                                <i class="fa-solid fa-location-dot text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Alamat Kantor</h4>
                                <p class="text-slate-300 leading-relaxed">{{ $company->address ?? 'Jl. Contoh Alamat No. 123, Kota, Indonesia' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center flex-shrink-0 text-accent">
                                <i class="fa-solid fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Email</h4>
                                <p class="text-slate-300">{{ $company->email ?? 'hello@akhritech.com' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center flex-shrink-0 text-accent">
                                <i class="fa-brands fa-whatsapp text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">WhatsApp</h4>
                                <p class="text-slate-300">{{ $company->phone ?? '+62 812 3456 7890' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:w-3/5 p-10 lg:p-12">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-slate-900 mb-2">Kirim Pesan</h2>
                        <p class="text-slate-500">Isi formulir di bawah ini dan kami akan merespons dalam waktu 1x24 jam.</p>
                    </div>

                    <form id="contact-form" onsubmit="event.preventDefault(); submitInquiry();" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap *</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                    placeholder="John Doe">
                                <span id="err-name" class="text-red-500 text-xs mt-1 hidden"></span>
                            </div>
                            
                            <div>
                                <label for="whatsapp_number" class="block text-sm font-semibold text-slate-700 mb-2">No. WhatsApp *</label>
                                <input type="text" id="whatsapp_number" name="whatsapp_number" required
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                    placeholder="081234567890">
                                <span id="err-whatsapp_number" class="text-red-500 text-xs mt-1 hidden"></span>
                            </div>
                            
                            <!-- Hidden email field for compatibility with backend validation if needed -->
                            <input type="hidden" name="email" value="no-email@akhritech.com" />
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-semibold text-slate-700 mb-2">Layanan yang Dibutuhkan *</label>
                            <select id="subject" name="subject" required
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors appearance-none">
                                <option value="" disabled selected>Pilih Layanan...</option>
                                <option value="Jasa Pembuatan Website Custom">Jasa Pembuatan Website Custom</option>
                                <option value="Jasa Pembuatan Aplikasi / Sistem Informasi">Jasa Pembuatan Aplikasi / Sistem Informasi</option>
                                <option value="SaaS Travel & Produk Digital">SaaS Travel & Produk Digital</option>
                                <option value="Konsultasi IT Lainnya">Konsultasi IT Lainnya</option>
                            </select>
                            <span id="err-subject" class="text-red-500 text-xs mt-1 hidden"></span>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">Jelaskan Kebutuhan Anda *</label>
                            <textarea id="message" name="message" rows="5" required
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-none"
                                placeholder="Ceritakan singkat tentang bisnis Anda dan fitur website/aplikasi yang diinginkan..."></textarea>
                            <span id="err-message" class="text-red-500 text-xs mt-1 hidden"></span>
                        </div>

                        <button type="submit" id="submit-btn"
                            class="w-full bg-primary hover:bg-indigo-700 text-white font-bold py-4 rounded-xl transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2 group">
                            <span id="submit-label">Kirim Pesan Sekarang</span>
                            <i id="submit-spinner" class="fa-solid fa-circle-notch fa-spin hidden"></i>
                            <i class="fa-solid fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                        </button>
                        <p class="text-center text-xs text-slate-400 mt-3"><i class="fa-solid fa-shield-halved mr-1"></i> Data Anda 100% aman dan dirahasiakan.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Popup -->
    <div id="success-popup" class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
        <div id="success-card" class="relative bg-white rounded-3xl shadow-2xl p-10 max-w-sm w-full text-center scale-90 transition-all duration-300">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-5">
                <i class="fa-solid fa-check text-4xl text-green-500"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">Berhasil Terkirim!</h3>
            <p class="text-slate-500 mb-8">Terima kasih. Tim konsultan Akhritech akan segera menghubungi Anda melalui WhatsApp yang didaftarkan.</p>
            <button onclick="closeSuccessPopup()" class="w-full bg-primary hover:bg-indigo-700 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg">
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
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (!response.ok) {
                    if (response.status === 422) {
                        for (const [key, messages] of Object.entries(data.errors)) {
                            const errEl = document.getElementById('err-' + key);
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
                    // Show success popup
                    const popup = document.getElementById('success-popup');
                    const card = document.getElementById('success-card');
                    popup.classList.remove('opacity-0', 'pointer-events-none');
                    card.classList.remove('scale-90');
                    card.classList.add('scale-100');
                }
            } catch (error) {
                console.error(error);
                alert('Gagal mengirim pesan. Periksa koneksi internet Anda.');
            } finally {
                btn.disabled = false;
                label.textContent = 'Kirim Pesan Sekarang';
                spinner.classList.add('hidden');
                btn.classList.remove('opacity-70');
            }
        }
    </script>
@endpush
