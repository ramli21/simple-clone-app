@extends('layouts.tailwind')

@push('metadata')
    <title>AkhriShop | Platform Ecommerce Modern untuk Toko Online Anda</title>
    <meta name="description"
        content="AkhriShop adalah platform ecommerce modern dengan katalog produk, multi-gudang, RajaOngkir, GoQRIS, cashless return, dan single tenant database eksklusif. Harga mulai Rp 3.500.000 termasuk domain .com/.id.">
    <meta name="keywords"
        content="akhrishop, ecommerce, toko online, platform toko, multi-gudang, RajaOngkir, GoQRIS, single tenant, toko online Indonesia">
    <meta name="author" content="Akhritech">
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="AkhriShop | Platform Ecommerce Modern untuk Toko Online Anda">
    <meta property="og:description"
        content="AkhriShop membantu bisnis Anda menjual online lebih cepat dengan katalog, pengiriman, pembayaran, dan sistem retur cashless yang siap scale.">
    <meta property="og:image" content="{{ asset('images/akhritech-banner.png') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="AkhriShop | Platform Ecommerce Modern untuk Toko Online Anda">
    <meta name="twitter:description"
        content="Platform ecommerce dengan fitur lengkap: katalog varian, multi-gudang, RajaOngkir, QRIS, dan single tenant database eksklusif.">
    <meta name="twitter:image" content="{{ asset('images/akhritech-banner.png') }}">

    <link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
    <section
        class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 pt-28 pb-20 text-white">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(99,102,241,0.22),transparent_28%),radial-gradient(circle_at_bottom_right,rgba(45,212,191,0.18),transparent_32%)]">
        </div>
        <div class="container relative z-10 mx-auto px-4 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div>
                    <div
                        class="mb-6 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/5 px-4 py-2 text-sm font-medium text-indigo-100 backdrop-blur-sm">
                        <span class="inline-flex h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
                        Platform Ecommerce untuk Bisnis Modern
                    </div>

                    <h1 class="text-4xl font-black leading-tight text-white sm:text-5xl lg:text-6xl">
                        AkhriShop, solusi toko online yang siap<br class="hidden lg:block">
                        <span class="text-indigo-300">naikkan penjualan</span> tanpa ribet.
                    </h1>

                    <p class="mt-6 max-w-xl text-base leading-8 text-slate-300 sm:text-lg">
                        Digitalisasikan bisnis toko online Anda agar penjualan naik, operasional lebih rapi,
                        dan customer experience semakin maksimal dari katalog hingga pengiriman.
                    </p>

                    <div
                        class="mt-4 rounded-2xl border border-emerald-400/20 bg-emerald-500/10 px-4 py-3 text-sm font-medium text-emerald-100">
                        “Digitalisasikan bisnis toko online Anda untuk meningkatkan penjualan dan memudahkan operasional.”
                    </div>

                    <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                        <a href="#harga"
                            class="inline-flex items-center justify-center rounded-xl bg-indigo-500 px-7 py-3.5 text-base font-semibold text-white shadow-lg shadow-indigo-500/30 transition hover:-translate-y-0.5 hover:bg-indigo-400">
                            Mulai dari Rp 2.500.000
                        </a>
                        <a href="#fitur"
                            class="inline-flex items-center justify-center rounded-xl border border-white/20 bg-white/5 px-7 py-3.5 text-base font-semibold text-white transition hover:border-indigo-300 hover:bg-white/10">
                            Lihat fitur utama
                        </a>
                        <a href="https://shop.akhritech.com" target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center justify-center rounded-xl border border-white/20 bg-white/5 px-7 py-3.5 text-base font-semibold text-white transition hover:border-indigo-300 hover:bg-white/10">
                            Live Demo
                            <i class="fa-solid fa-arrow-up-right-from-square ml-2 text-sm"></i>
                        </a>
                    </div>

                    <div
                        class="mt-5 rounded-2xl border border-indigo-400/20 bg-white/5 p-4 text-sm text-slate-200 backdrop-blur-sm">
                        <p class="font-semibold text-white">Biaya perpanjangan tahunan:</p>
                        <p class="mt-1">Rp 1.250.000 untuk server dan domain, dengan ketentuan jika domain lebih dari Rp
                            250.000 maka ada biaya tahunan tambahan sesuai selisihnya.</p>
                    </div>

                    <div class="mt-8 flex flex-wrap items-center gap-6 text-sm text-slate-300">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-check text-emerald-400"></i>
                            <span>Single tenant</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-check text-emerald-400"></i>
                            <span>Server memadai</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-check text-emerald-400"></i>
                            <span>Domain siap online</span>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div
                        class="rounded-3xl border border-white/10 bg-white/5 p-4 shadow-2xl shadow-indigo-900/40 backdrop-blur-md">
                        <div class="overflow-hidden rounded-2xl border border-white/10 bg-slate-900">
                            <div
                                class="flex items-center justify-between border-b border-white/10 bg-slate-800/80 px-5 py-3">
                                <div class="flex items-center gap-2">
                                    <span class="h-3 w-3 rounded-full bg-rose-400"></span>
                                    <span class="h-3 w-3 rounded-full bg-amber-400"></span>
                                    <span class="h-3 w-3 rounded-full bg-emerald-400"></span>
                                </div>
                                <span class="text-xs uppercase tracking-[0.2em] text-slate-300">AkhriShop</span>
                            </div>
                            <div class="p-5 sm:p-6">
                                <div class="mb-4 flex items-center justify-between">
                                    <div>
                                        <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Revenue dashboard</p>
                                        <h2 class="mt-2 text-2xl font-bold text-white">Rp 18.4 jt</h2>
                                    </div>
                                    <span
                                        class="rounded-full bg-emerald-500/15 px-3 py-1 text-xs font-semibold text-emerald-300">
                                        +27.4% this month
                                    </span>
                                </div>

                                <div class="space-y-3">
                                    <div class="rounded-xl bg-slate-800/80 p-3">
                                        <div class="mb-2 flex justify-between text-xs text-slate-400">
                                            <span>Order hari ini</span>
                                            <span>148</span>
                                        </div>
                                        <div class="h-2.5 overflow-hidden rounded-full bg-slate-700">
                                            <div
                                                class="h-full w-[72%] rounded-full bg-gradient-to-r from-indigo-500 to-cyan-400">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid gap-3 sm:grid-cols-2">
                                        <div class="rounded-xl bg-slate-800/80 p-3">
                                            <p class="text-xs text-slate-400">Product variants</p>
                                            <p class="mt-2 text-xl font-bold text-white">3.2k</p>
                                        </div>
                                        <div class="rounded-xl bg-slate-800/80 p-3">
                                            <p class="text-xs text-slate-400">Courier live</p>
                                            <p class="mt-2 text-xl font-bold text-white">12+</p>
                                        </div>
                                    </div>
                                    <div class="rounded-xl border border-indigo-500/20 bg-indigo-500/10 p-3">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-xs text-indigo-200">Ongkir subsidi</p>
                                                <p class="mt-1 text-lg font-bold text-white">Rp 26.500 / order</p>
                                            </div>
                                            <div class="rounded-full bg-emerald-500/20 p-2 text-emerald-300">
                                                <i class="fa-solid fa-truck-fast"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-16">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid gap-4 text-center md:grid-cols-3">
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-3xl font-black text-slate-900">12+</p>
                    <p class="mt-2 text-slate-600">Ekspedisi nasional terintegrasi</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-3xl font-black text-slate-900">99.9%</p>
                    <p class="mt-2 text-slate-600">Uptime server toko online</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-3xl font-black text-slate-900">1x</p>
                    <p class="mt-2 text-slate-600">Single tenant database eksklusif</p>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur" class="bg-white py-20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="mx-auto mb-12 max-w-3xl text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-indigo-600">Fitur utama</p>
                <h2 class="text-3xl font-black text-slate-900 sm:text-4xl">
                    Semua kebutuhan operasional toko online Anda dalam satu platform.
                </h2>
            </div>

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                <div
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-xl text-indigo-600">
                        <i class="fa-solid fa-boxes-stacked"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">Katalog & Varian</h3>
                    <p class="text-slate-600">Dukungan multi-varian (warna, ukuran), galeri foto & video, badge promo, dan
                        filter interaktif untuk pengalaman belanja yang lebih optimal.</p>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-xl text-emerald-600">
                        <i class="fa-solid fa-warehouse"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">Multi-Gudang</h3>
                    <p class="text-slate-600">Daftarkan banyak alamat gudang dengan penandaan Gudang Utama untuk origin
                        pengiriman RajaOngkir dan pengelolaan stok yang lebih presisi.</p>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-100 text-xl text-cyan-600">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">RajaOngkir Engine</h3>
                    <p class="text-slate-600">Autocomplete pencarian kelurahan, kecamatan, kota, kalkulasi ongkir otomatis,
                        dan fallback rate cerdas untuk menjaga pengalaman checkout tetap lancar.</p>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-xl text-amber-600">
                        <i class="fa-solid fa-tag"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">Subsidi Ongkir Produk</h3>
                    <p class="text-slate-600">Setiap produk dapat diberikan subsidi ongkir langsung untuk menurunkan biaya
                        pengiriman dan meningkatkan conversion rate.</p>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-violet-100 text-xl text-violet-600">
                        <i class="fa-solid fa-qrcode"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">GoQRIS Gateway</h3>
                    <p class="text-slate-600">Generate QRIS dinamis otomatis, auto-checking polling status tanpa konfirmasi
                        manual, dan transaksi lebih cepat dan aman.</p>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-rose-100 text-xl text-rose-600">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">Transfer Bank Manual</h3>
                    <p class="text-slate-600">Nomor rekening dinamis tampil di checkout, email, tracking order, dan
                        WhatsApp untuk mempermudah konfirmasi pembayaran pelanggan.</p>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-sky-100 text-xl text-sky-600">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">Cek Resi Multi-Kurir</h3>
                    <p class="text-slate-600">Pelacakan resi 12+ ekspedisi nasional secara live dengan timeline perjalanan
                        paket agar customer selalu update.</p>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-lime-100 text-xl text-lime-600">
                        <i class="fa-solid fa-rotate-left"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">Cashless Return System</h3>
                    <p class="text-slate-600">Pengajuan retur dalam 48 jam, upload foto/video kendala, dan resi retur
                        otomatis tanpa biaya ongkir untuk pengalaman yang lebih ramah.</p>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-teal-100 text-xl text-teal-600">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">WhatsApp Automation</h3>
                    <p class="text-slate-600">Notifikasi dua arah kepada pelanggan dan admin di setiap perubahan status
                        transaksi agar komunikasi lebih cepat dan terstruktur.</p>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-orange-100 text-xl text-orange-600">
                        <i class="fa-solid fa-file-excel"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">Bulk Excel/CSV Import</h3>
                    <p class="text-slate-600">Template unduhan otomatis, validasi data, background queue, dan notifikasi
                        progres menjadikan import produk lebih cepat tanpa kehilangan data.</p>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-fuchsia-100 text-xl text-fuchsia-600">
                        <i class="fa-solid fa-sliders"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">Livewire Admin Settings</h3>
                    <p class="text-slate-600">5 tab pengaturan terpusat (Profil Toko, Gudang, Bank, Payment QRIS, API Keys)
                        dengan auto-caching untuk operasional yang rapi dan konsisten.</p>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-red-100 text-xl text-red-600">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-slate-900">Role & Authentication</h3>
                    <p class="text-slate-600">Sistem login, registrasi, lupa password, reset password, serta middleware
                        keamanan superadmin untuk kontrol akses yang aman dan profesional.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-900 py-20 text-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid items-center gap-10 lg:grid-cols-2">
                <div>
                    <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-indigo-300">Kenapa AkhriShop</p>
                    <h2 class="text-3xl font-black sm:text-4xl">Toko online yang siap jualan cepat, aman, dan scalable.
                    </h2>
                    <div class="mt-8 space-y-5">
                        <div class="flex gap-4">
                            <div
                                class="mt-1 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-500/20 text-indigo-300">
                                <i class="fa-solid fa-server"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold">Server yang memadai</h3>
                                <p class="text-slate-300">Didesain untuk trafik toko online yang aktif, dengan performa
                                    stabil untuk produk dan transaksi harian.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div
                                class="mt-1 flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-500/20 text-emerald-300">
                                <i class="fa-solid fa-database"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold">Single tenant database</h3>
                                <p class="text-slate-300">Database eksklusif hanya untuk toko pelanggan Anda, tanpa campur
                                    data multi-tenant, lebih aman dan lebih privat.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div
                                class="mt-1 flex h-10 w-10 items-center justify-center rounded-lg bg-amber-500/20 text-amber-300">
                                <i class="fa-solid fa-globe"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold">Domain dan nama brand siap online</h3>
                                <p class="text-slate-300">Sudah termasuk domain .com/.id, dengan subsidi Rp 250.000 untuk
                                    domain berharga di atasnya, sehingga lebih ringan di awal launch.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-700 bg-slate-800/70 p-6 shadow-2xl shadow-slate-950/40">
                    <div class="rounded-2xl border border-indigo-500/30 bg-indigo-500/10 p-5">
                        <p class="text-sm uppercase tracking-[0.2em] text-indigo-200">Harga launch (promo)</p>
                        <div class="mt-4 flex items-end gap-3">
                            <span class="text-5xl font-black text-white">Rp 2,5 jt</span>
                            <span class="pb-2 text-slate-300">/ sekali bayar</span>
                        </div>
                        <p class="mt-4 text-slate-200">Sebelum biaya tambahan domain apabila harga domain lebih dari
                            subsidi. </p>

                        <ul class="mt-6 space-y-3 text-slate-200">
                            <li class="flex items-start gap-3"><i
                                    class="fa-solid fa-check mt-1 text-emerald-400"></i><span>Domain .com / .id sudah
                                    termasuk dalam paket.</span></li>
                            <li class="flex items-start gap-3"><i
                                    class="fa-solid fa-check mt-1 text-emerald-400"></i><span>Subsidi Rp 250.000 untuk
                                    domain yang lebih mahal dari nominal tersebut.</span></li>
                            <li class="flex items-start gap-3"><i
                                    class="fa-solid fa-check mt-1 text-emerald-400"></i><span>Server yang memadai untuk
                                    kebutuhan operasional toko.</span></li>
                            <li class="flex items-start gap-3"><i
                                    class="fa-solid fa-check mt-1 text-emerald-400"></i><span>Single tenant database
                                    eksklusif untuk toko pelanggan.</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="harga" class="bg-slate-50 py-20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-indigo-600">Investasi launch</p>
                <h2 class="text-3xl font-black text-slate-900 sm:text-4xl">Harga AkhriShop</h2>
                <p class="mt-4 text-lg text-slate-600">Paket siap pakai untuk toko online Anda tanpa biaya setup
                    berlebihan.</p>
            </div>

            <div
                class="mx-auto mt-12 max-w-xl rounded-3xl border-2 border-indigo-500 bg-white p-8 shadow-xl shadow-indigo-100">
                <div class="text-center">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-600">Starter Ecommerce</p>
                    <div class="mt-4 flex items-end justify-center gap-2">
                        <span class="text-5xl font-black text-slate-900"><span
                                class="text-3xl block font-normal line-through">Rp 3.500.000</span>
                            <b>Rp
                                2,5
                                jt</b></span>
                    </div>
                    <p class="mt-3 text-slate-500">Sudah termasuk domain .com / .id, server layak pakai, dan single tenant
                        database eksklusif.</p>
                </div>

                <div class="mt-8 rounded-2xl bg-slate-50 p-5 text-left">
                    <h3 class="text-lg font-bold text-slate-900">Catatan penting</h3>
                    <ul class="mt-4 space-y-3 text-slate-600">
                        <li class="flex gap-3"><i class="fa-solid fa-circle-check mt-1 text-emerald-500"></i><span>Biaya
                                perpanjangan tahun selanjutnya sebesar Rp 1.250.000 untuk server dan domain.</span></li>
                        <li class="flex gap-3"><i class="fa-solid fa-circle-check mt-1 text-emerald-500"></i><span>Jika
                                harga domain pilihan Anda di atas Rp 250.000, maka ada biaya tahunan tambahan sesuai
                                selisihnya.</span></li>
                        <li class="flex gap-3"><i class="fa-solid fa-circle-check mt-1 text-emerald-500"></i><span>Server
                                yang disediakan sudah memadai untuk kebutuhan operasional toko online.</span></li>
                        <li class="flex gap-3"><i
                                class="fa-solid fa-circle-check mt-1 text-emerald-500"></i><span>Database single tenant
                                berarti hanya milik satu pelanggan dan secara eksklusif tidak dibagi antar tenant.</span>
                        </li>
                        <li class="flex gap-3"><i
                                class="fa-solid fa-circle-check mt-1 text-emerald-500"></i><span>Aplikasi dapat di-upgrade
                                atau ditambahkan fitur sesuai kebutuhan bisnis, dengan biaya disesuaikan berdasarkan modul
                                yang ditambahkan.</span></li>
                        <li class="flex gap-3"><i class="fa-solid fa-circle-check mt-1 text-emerald-500"></i><span>Siap
                                untuk integrasi dengan Payment Gateway, KiriminAja (untuk resi otomatis), dan pihak ketiga
                                lainnya sesuai kebutuhan, dengan biaya tambahan yang berlaku.</span></li>
                    </ul>
                </div>

                <div class="mt-8 rounded-2xl border border-dashed border-indigo-200 bg-indigo-50 p-5 text-left">
                    <h3 class="text-lg font-bold text-slate-900">Upgrade & Integrasi Tambahan</h3>
                    <p class="mt-3 text-slate-600">Aplikasi ini dapat dikembangkan sesuai kebutuhan bisnis Anda, mulai dari
                        penambahan modul, fitur khusus, hingga integrasi dengan sistem eksternal. Biaya upgrade atau
                        integrasi disesuaikan dengan kompleksitas dan fitur yang ditambahkan.</p>
                    <div class="mt-4 flex flex-wrap gap-2 text-xs font-semibold text-slate-700">
                        <span class="rounded-full bg-white px-3 py-1.5 border border-slate-200">Payment Gateway</span>
                        <span class="rounded-full bg-white px-3 py-1.5 border border-slate-200">KiriminAja</span>
                        <span class="rounded-full bg-white px-3 py-1.5 border border-slate-200">API Pihak Ketiga</span>
                    </div>
                </div>

                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="https://wa.me/{{ companyProfile()->phone }}?text=Halo%20Akhritech,%20saya%20ingin%20membeli%20AkhriShop%20dengan%20harga%20Rp%203.500.000"
                        target="_blank" rel="noopener noreferrer"
                        class="inline-flex flex-1 items-center justify-center rounded-xl bg-slate-900 px-6 py-3.5 text-base font-semibold text-white transition hover:bg-slate-800">
                        <i class="fa-brands fa-whatsapp mr-2"></i>Pesan via WhatsApp
                    </a>
                    <a href="{{ route('home') }}"
                        class="inline-flex flex-1 items-center justify-center rounded-xl border border-slate-300 px-6 py-3.5 text-base font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">
                        Kembali ke beranda
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-indigo-600">Proses kerja</p>
                <h2 class="text-3xl font-black text-slate-900 sm:text-4xl">Mulai dari briefing sampai live</h2>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-4">
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <div
                        class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-lg font-bold text-indigo-600">
                        1</div>
                    <h3 class="text-lg font-bold text-slate-900">Briefing</h3>
                    <p class="mt-2 text-slate-600">Diskusikan kebutuhan brand, katalog, dan alur checkout.</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <div
                        class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-lg font-bold text-indigo-600">
                        2</div>
                    <h3 class="text-lg font-bold text-slate-900">Setup</h3>
                    <p class="mt-2 text-slate-600">Konfigurasi domain, produk, pembayaran, gudang, dan kustomisasi.</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <div
                        class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-lg font-bold text-indigo-600">
                        3</div>
                    <h3 class="text-lg font-bold text-slate-900">Uji coba</h3>
                    <p class="mt-2 text-slate-600">Validasi flow checkout, ongkir, QRIS, dan pengiriman.</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <div
                        class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-lg font-bold text-indigo-600">
                        4</div>
                    <h3 class="text-lg font-bold text-slate-900">Live</h3>
                    <p class="mt-2 text-slate-600">Toko online siap digunakan secara publik dan siap scale.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
