@extends('layouts.tailwind')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-2">Ketentuan Layanan Akhritech</h1>
            <p class="text-blue-100">Harap baca dan pahami ketentuan ini sebelum menggunakan layanan kami</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Last Updated -->
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-8 rounded">
            <p class="text-sm text-gray-700">
                <strong>Terakhir diperbarui:</strong> <span id="lastUpdated"></span>
            </p>
        </div>

        <!-- Introduction -->
        <section class="mb-10">
            <p class="text-gray-700 leading-relaxed text-base">
                Selamat datang di Akhritech. Dengan mengakses website kami dan membeli produk atau jasa kami, Anda
                dianggap telah membaca, memahami, dan menyetujui ketentuan di bawah ini.
            </p>
        </section>

        <!-- Section 1: Definisi & Ruang Lingkup -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                1. Definisi & Ruang Lingkup
            </h2>
            <ul class="space-y-3 ml-4">
                <li class="flex">
                    <span class="text-blue-500 mr-3 font-bold">•</span>
                    <div>
                        <strong class="text-gray-900">"Akhritech"</strong>
                        <p class="text-gray-700">adalah pemilik dan pengelola layanan, platform, dan produk digital yang
                            tersedia di website ini.</p>
                    </div>
                </li>
                <li class="flex">
                    <span class="text-blue-500 mr-3 font-bold">•</span>
                    <div>
                        <strong class="text-gray-900">"Produk Digital"</strong>
                        <p class="text-gray-700">meliputi starter kit, web theme, landing page, dan modul perangkat
                            lunak lainnya.</p>
                    </div>
                </li>
                <li class="flex">
                    <span class="text-blue-500 mr-3 font-bold">•</span>
                    <div>
                        <strong class="text-gray-900">"Layanan"</strong>
                        <p class="text-gray-700">meliputi jasa pengembangan website, integrasi sistem, dan dukungan
                            teknis.</p>
                    </div>
                </li>
            </ul>
        </section>

        <!-- Section 2: Penggunaan Produk Digital -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                2. Penggunaan Produk Digital
            </h2>
            <div class="space-y-4">
                <div class="bg-white border-l-4 border-blue-500 p-4 rounded">
                    <h3 class="font-bold text-gray-900 mb-2">Lisensi</h3>
                    <p class="text-gray-700">Setiap produk digital yang Anda beli dari Akhritech diberikan lisensi untuk
                        penggunaan pribadi atau komersial sesuai dengan jenis lisensi yang tertera pada saat pembelian
                        (kecuali dinyatakan lain).</p>
                </div>
                <div class="bg-white border-l-4 border-red-500 p-4 rounded">
                    <h3 class="font-bold text-gray-900 mb-2">Larangan</h3>
                    <p class="text-gray-700">Anda dilarang keras untuk menjual kembali (reselling), mendistribusikan
                        ulang, atau menyebarkan kode sumber (source code) kami tanpa izin tertulis dari Akhritech.</p>
                </div>
                <div class="bg-white border-l-4 border-yellow-500 p-4 rounded">
                    <h3 class="font-bold text-gray-900 mb-2">Tanggung Jawab</h3>
                    <p class="text-gray-700">Kode sumber kami disediakan "apa adanya" (as is). Akhritech tidak
                        bertanggung jawab atas kerugian atau kerusakan sistem yang mungkin terjadi akibat modifikasi
                        kode yang dilakukan oleh pembeli.</p>
                </div>
            </div>
        </section>

        <!-- Section 3: Layanan Jasa & Pengembangan -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                3. Layanan Jasa & Pengembangan
            </h2>
            <div class="space-y-4">
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">Ruang Lingkup Pekerjaan</h3>
                    <p class="text-gray-700">Pekerjaan dilakukan sesuai dengan spesifikasi yang disepakati di awal
                        (brief). Penambahan fitur di luar scope akan dikenakan biaya tambahan.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">Pembayaran</h3>
                    <p class="text-gray-700">Pembayaran jasa dilakukan sesuai dengan invoice yang diterbitkan. Proyek
                        akan dikerjakan setelah pembayaran uang muka (DP) diterima.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">Hak Cipta</h3>
                    <p class="text-gray-700">Setelah pelunasan, hak kepemilikan hasil akhir proyek (deliverables)
                        diserahkan kepada klien, kecuali komponen pendukung (seperti starter kit Akhritech) yang menjadi
                        lisensi penggunaan tetap milik Akhritech.</p>
                </div>
            </div>
        </section>

        <!-- Section 4: Pembayaran & Pengembalian Dana -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                4. Pembayaran & Pengembalian Dana (Refund)
            </h2>
            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-yellow-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Metode Pembayaran:</strong> Pembayaran dapat dilakukan
                            melalui metode yang tersedia di website (via iPaymu).</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-yellow-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Refund:</strong> Karena produk kami bersifat digital dan
                            dapat diunduh seketika, kami <strong>tidak memberikan refund</strong> kecuali terbukti
                            terdapat kerusakan fatal pada file/sistem yang membuat produk tidak bisa digunakan sama
                            sekali dan tidak dapat diperbaiki dalam 7 hari kerja sejak pelaporan.</span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Section 5: Dukungan Teknis -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                5. Dukungan Teknis (Support)
            </h2>
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                <p class="text-gray-700 mb-4">Kami menyediakan dukungan teknis melalui email/WhatsApp untuk membantu
                    instalasi produk atau kendala penggunaan standar.</p>
                <p class="text-gray-700 font-semibold mb-3">Dukungan teknis tidak mencakup:</p>
                <ul class="space-y-2 ml-4">
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-3">✓</span>
                        <span class="text-gray-700">Modifikasi kode kustom</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-3">✓</span>
                        <span class="text-gray-700">Instalasi di server klien</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-3">✓</span>
                        <span class="text-gray-700">Perbaikan masalah yang disebabkan oleh pihak ketiga</span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Section 6: Batasan Tanggung Jawab -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                6. Batasan Tanggung Jawab
            </h2>
            <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded">
                <p class="text-gray-700">
                    Akhritech tidak bertanggung jawab atas kehilangan data, keuntungan, atau kerugian tidak langsung
                    yang disebabkan oleh penggunaan layanan atau produk kami.
                </p>
            </div>
        </section>

        <!-- Section 7: Perubahan Ketentuan -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                7. Perubahan Ketentuan
            </h2>
            <p class="text-gray-700 leading-relaxed">
                Akhritech berhak untuk mengubah ketentuan layanan ini sewaktu-waktu. Perubahan akan berlaku segera
                setelah dipublikasikan di halaman ini.
            </p>
        </section>

        <!-- Section 8: Kontak -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                8. Kontak
            </h2>
            <p class="text-gray-700 leading-relaxed mb-6">
                Jika Anda memiliki pertanyaan mengenai Ketentuan Layanan ini, silakan hubungi kami di:
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2 flex items-center">
                        <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                        Email
                    </h3>
                    <p class="text-gray-600">[support@akhritech.com]</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2 flex items-center">
                        <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773c.418 1.265 1.215 2.807 2.298 3.89 1.083 1.083 2.625 1.88 3.89 2.298l.773-1.548a1 1 0 011.06-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                            </path>
                        </svg>
                        WhatsApp
                    </h3>
                    <p class="text-gray-600">[+62 xxx xxxx xxxx]</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2 flex items-center">
                        <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Website
                    </h3>
                    <p class="text-gray-600"><a href="https://akhritech.com/"
                            class="text-blue-500 hover:underline">akhritech.com</a></p>
                </div>
            </div>
        </section>

        <!-- Footer Note -->
        <div class="bg-gray-100 border border-gray-300 rounded-lg p-6 mt-12">
            <p class="text-sm text-gray-600">
                Dengan menggunakan layanan atau membeli produk dari Akhritech, Anda menyetujui untuk terikat oleh
                Ketentuan Layanan ini. Jika Anda tidak setuju dengan bagian manapun dari ketentuan ini, harap jangan
                menggunakan layanan kami.
            </p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">Akhritech</h3>
                    <p class="text-gray-400">Solusi digital terpercaya untuk bisnis Anda.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Layanan</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Web Development</a></li>
                        <li><a href="#" class="hover:text-white transition">SaaS</a></li>
                        <li><a href="#" class="hover:text-white transition">Produk Digital</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Perusahaan</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="/" class="hover:text-white transition">Home</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="{{ route('privacy-policy') }}" class="hover:text-white transition">Privasi</a>
                        </li>
                        <li><a href="{{ route('terms') }}" class="hover:text-white transition">Ketentuan Layanan</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Hubungi Kami</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="mailto:support@akhritech.com"
                                class="hover:text-white transition">support@akhritech.com</a></li>
                        <li><a href="https://wa.me/62" class="hover:text-white transition">WhatsApp</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8">
                <p class="text-center text-gray-400">
                    &copy; 2026 Akhritech. Semua hak dilindungi.
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Set last updated date to today
        document.getElementById('lastUpdated').textContent = new Date().toLocaleDateString('id-ID', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    </script>
    </body>

    </html>
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
            <strong>Produk Digital (Produk):</strong> Karena sifat produk digital yang dapat langsung disalin dan
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
@endsection
