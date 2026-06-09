@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-4xl px-4 py-10">
        <div class="mb-8">
            <div
                class="inline-flex items-center gap-2 rounded-full bg-indigo-50 border border-indigo-100 px-4 py-2 text-sm font-semibold text-indigo-700">
                <i class="fa-solid fa-file-lines"></i>
                Halaman Resmi
            </div>

            <h1 class="mt-4 text-3xl sm:text-4xl font-bold tracking-tight text-slate-900">Syarat &amp; Ketentuan</h1>
            <p class="mt-3 text-slate-600 text-base">
                (Terakhir Diperbarui: <span class="font-semibold">Juni 2026</span>)
            </p>
        </div>

        <article class="prose prose-slate max-w-none">
            <p>Selamat datang di AkhriTech.com.</p>

            <p>
                Syarat &amp; ketentuan yang tercantum di halaman ini mengatur penggunaan seluruh layanan yang tersedia
                di situs web kami, termasuk pembelian template digital, penggunaan produk Software as a Service
                (SaaS), serta layanan jasa pembuatan website custom.
            </p>

            <p>
                Dengan mengakses, mendaftar, atau melakukan transaksi di AkhriTech.com, Anda dianggap telah membaca,
                memahami, dan menyetujui seluruh isi Syarat &amp; Ketentuan ini. Jika Anda tidak menyetujui bagian apa
                pun dari ketentuan ini, Anda tidak diperkenankan untuk menggunakan layanan kami.
            </p>

            <h2>1. INFORMASI UMUM DAN DEFINISI</h2>
            <ul>
                <li>
                    <strong>AkhriTech</strong> adalah penyedia solusi digital yang bergerak di bidang penjualan template
                    website, penyedia platform SaaS, dan penyedia layanan jasa pembuatan website perorangan/solopreneur.
                </li>
                <li>
                    <strong>Pengguna/Klien/Pembeli</strong> adalah individu atau entitas yang mengakses situs kami,
                    membeli produk kami, atau menyewa layanan jasa kami.
                </li>
            </ul>

            <h2>2. KETENTUAN PRODUK DIGITAL (TEMPLATE &amp; THEMES)</h2>
            <ul>
                <li>
                    <strong>Lisensi Penggunaan:</strong> Setiap pembelian template memberikan Anda lisensi non-eksklusif
                    dan tidak dapat dipindahtangankan. Anda diperbolehkan menggunakan template untuk kebutuhan pribadi
                    maupun proyek klien Anda.
                </li>
                <li>
                    <strong>Pembatasan:</strong> Anda dilarang keras mendistribusikan ulang, menjual kembali, menyewakan,
                    atau membagikan source code file (ZIP / Repositori GitHub) produk kami di platform lain secara
                    gratis maupun berbayar.
                </li>
                <li>
                    <strong>Pengiriman Produk:</strong> Setelah pembayaran dikonfirmasi secara sah oleh sistem payment
                    gateway kami, akses unduhan atau repositori akan diberikan secara otomatis ke akun atau email
                    terdaftar Anda.
                </li>
            </ul>

            <h2>3. KETENTUAN LAYANAN JASA PEMBUATAN WEBSITE (CUSTOM DEVELOPMENT)</h2>
            <ul>
                <li>
                    <strong>Mekanisme Kerja &amp; Pembayaran:</strong> Layanan jasa custom development membutuhkan
                    kesepakatan tertulis (via Kontrak/MoU/Format Pemesanan). Pembayaran umumnya dilakukan menggunakan
                    sistem bertahap (Down Payment di awal dan pelunasan saat termin yang disepakati selesai).
                </li>
                <li>
                    <strong>Hak Kekayaan Intelektual:</strong> Hak cipta atas kode dan desain website yang dibuat secara
                    custom akan sepenuhnya beralih kepada Klien setelah seluruh pelunasan pembayaran diselesaikan.
                    Kami berhak menampilkan hasil kerja tersebut di portofolio kami kecuali ada perjanjian kerahasiaan
                    (NDA) sebelumnya.
                </li>
            </ul>

            <h2>4. KETENTUAN PRODUK SOFTWARE AS A SERVICE (SaaS)</h2>
            <ul>
                <li>
                    <strong>Akun dan Keamanan:</strong> Anda bertanggung jawab penuh untuk menjaga kerahasiaan informasi
                    akun dan kata sandi Anda. Kami tidak bertanggung jawab atas kerugian yang timbul akibat kelalaian
                    Pengguna dalam menjaga keamanan akun.
                </li>
                <li>
                    <strong>Sistem Berlangganan (Subscription):</strong> Beberapa layanan SaaS kami menggunakan sistem biaya
                    berlangganan berkala (bulanan/tahunan). Kegagalan pembayaran pada masa perpanjangan akan menyebabkan
                    penghentian atau pembekuan akses layanan secara otomatis oleh sistem.
                </li>
            </ul>

            <h2>5. KEBIJAKAN PENGEMBALIAN DANA (REFUND POLICY)</h2>
            <ul>
                <li>
                    <strong>Produk Digital (Template):</strong> Karena sifat produk digital yang dapat langsung disalin dan
                    diunduh secara instan, kami tidak melayani pengembalian dana (no refund) setelah file atau akses
                    source code berhasil dikirimkan, kecuali jika produk terbukti cacat total/tidak bisa digunakan sekali
                    dan tim teknis kami tidak dapat memperbaikinya dalam waktu 7x24 jam.
                </li>
                <li>
                    <strong>Layanan Jasa &amp; SaaS:</strong> Pengembalian dana untuk layanan jasa yang sedang berjalan atau
                    sisa masa aktif berlangganan SaaS diatur secara terpisah berdasarkan kontrak kerja spesifik atau
                    kebijakan pembatalan akun yang disetujui bersama.
                </li>
            </ul>

            <h2>6. BATASAN TANGGUNG JAWAB (LIMITATION OF LIABILITY)</h2>
            <ul>
                <li>
                    AkhriTech tidak bertanggung jawab atas kerugian finansial, kehilangan data, atau gangguan bisnis yang
                    dialami oleh Pengguna akibat penyalahgunaan produk, kelalaian pihak ketiga (termasuk gangguan pada
                    hosting/server eksternal yang dipilih klien), atau kegagalan teknis di luar kendali langsung kami
                    (Force Majeure).
                </li>
            </ul>

            <h2>7. PERUBAHAN SYARAT &amp; KETENTUAN</h2>
            <ul>
                <li>
                    Kami berhak untuk mengubah, menambah, atau memperbarui Syarat &amp; Ketentuan ini sewaktu-waktu tanpa
                    pemberitahuan sebelumnya. Perubahan akan langsung berlaku setelah dipublikasikan di halaman ini.
                </li>
            </ul>

            <p class="mt-6">
                <strong>Kontak Kami:</strong> <a class="text-indigo-700 hover:text-indigo-800"
                    href="mailto:support@akhritech.com">support@akhritech.com</a>
                <br>
                <span>(Terakhir Diperbarui: Juni 2026)</span>
            </p>
        </article>

        <div class="mt-8 rounded-2xl border border-slate-100 bg-white p-5">
            <div class="flex items-start gap-3">
                <div class="mt-0.5 text-indigo-700">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <div>
                    <p class="text-slate-900 font-semibold">Penting</p>
                    <p class="text-slate-600 text-sm mt-1">
                        Dengan menggunakan layanan di AkhriTech.com, Anda menyetujui ketentuan yang tertulis pada halaman
                        ini.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
