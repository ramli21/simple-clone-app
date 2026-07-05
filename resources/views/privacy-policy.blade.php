@extends('layouts.tailwind')

@push('metadata')
    <title>Kebijakan Privasi | Akhritech</title>
    <meta name="description"
        content="Kebijakan Privasi Akhritech terkait pengelolaan data pengguna dan layanan digital kami.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
@endpush


@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-[#0d7377] to-[#4DB8C4] text-white pt-28 pb-20 overflow-hidden">
        {{-- Decorative circle --}}
        <div class="absolute -top-1/2 -right-[10%] w-[500px] h-[500px] bg-white/10 rounded-full pointer-events-none"></div>

        <div class="container mx-auto px-4 relative z-10 text-center max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-5 tracking-tight">Kebijakan Privasi Akhritech</h1>
            <p class="text-lg md:text-xl opacity-95 leading-relaxed">
                Selamat datang di halaman Kebijakan Privasi Akhritech. Di sini, kami menjelaskan bagaimana kami
                mengumpulkan, menggunakan, dan melindungi data Anda.
            </p>
        </div>
    </section>
    <!-- Main Content -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 pt-24">
        <div class="py-6">
            <h1 class="text-4xl font-bold mb-2 text-black">Kebijakan Privasi Akhritech</h1>
            <p class="text-purple-600">Kami berkomitmen melindungi privasi dan data pribadi Anda</p>
        </div>
        <hr class="my-6" />
        <!-- Last Updated -->
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-8 rounded">
            <p class="text-sm text-gray-700">
                <strong>Terakhir diperbarui:</strong> <span id="lastUpdated"></span>
            </p>
        </div>

        <!-- Introduction -->
        <section class="mb-10">
            <p class="text-gray-700 leading-relaxed text-base">
                Selamat datang di Akhritech. Kami sangat menghargai privasi Anda dan berkomitmen untuk melindungi data
                pribadi yang Anda percayakan kepada kami. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan,
                menggunakan, dan melindungi informasi Anda saat Anda menggunakan layanan kami, termasuk jasa
                pengembangan website, pembelian produk digital (theme, starter kit), dan penggunaan layanan SaaS kami.
            </p>
        </section>

        <!-- Section 1: Informasi yang Dikumpulkan -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                1. Informasi yang Kami Kumpulkan
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Kami mengumpulkan informasi untuk memberikan layanan terbaik bagi Anda:
            </p>
            <ul class="space-y-4">
                <li class="flex">
                    <span class="text-blue-500 mr-3 mt-1">•</span>
                    <div>
                        <strong class="text-gray-900">Informasi Identitas:</strong>
                        <p class="text-gray-700">Nama, alamat email, nomor telepon, dan informasi penagihan (seperti
                            alamat atau NPWP jika diperlukan untuk invoice).</p>
                    </div>
                </li>
                <li class="flex">
                    <span class="text-blue-500 mr-3 mt-1">•</span>
                    <div>
                        <strong class="text-gray-900">Data Teknis:</strong>
                        <p class="text-gray-700">Alamat IP, jenis browser, dan informasi perangkat saat Anda mengakses
                            website atau aplikasi SaaS kami.</p>
                    </div>
                </li>
                <li class="flex">
                    <span class="text-blue-500 mr-3 mt-1">•</span>
                    <div>
                        <strong class="text-gray-900">Data Transaksi:</strong>
                        <p class="text-gray-700">Detail mengenai produk atau jasa yang Anda beli, riwayat pesanan, dan
                            metode pembayaran (kami tidak menyimpan detail kartu kredit secara langsung; proses ini
                            ditangani oleh <em>payment gateway</em> mitra kami, seperti iPaymu).</p>
                    </div>
                </li>
                <li class="flex">
                    <span class="text-blue-500 mr-3 mt-1">•</span>
                    <div>
                        <strong class="text-gray-900">Data Komunikasi:</strong>
                        <p class="text-gray-700">Catatan korespondensi jika Anda menghubungi kami melalui email atau
                            WhatsApp.</p>
                    </div>
                </li>
            </ul>
        </section>

        <!-- Section 2: Penggunaan Informasi -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                2. Bagaimana Kami Menggunakan Informasi Anda
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Kami menggunakan data yang dikumpulkan untuk:
            </p>
            <ul class="space-y-3">
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-700">Memproses dan mengirimkan produk digital yang Anda beli.</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-700">Memberikan dukungan teknis terkait jasa pengembangan atau produk yang
                        Anda gunakan.</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-700">Mengelola akun pelanggan dan akses ke layanan SaaS.</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-700">Mengirimkan pembaruan produk, informasi teknis, atau penawaran yang
                        relevan (jika Anda berlangganan <em>newsletter</em>).</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-700">Meningkatkan kualitas layanan dan keamanan website kami.</span>
                </li>
            </ul>
        </section>

        <!-- Section 3: Keamanan Data -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                3. Keamanan Data
            </h2>
            <div class="bg-green-50 border-l-4 border-green-500 p-6 rounded">
                <p class="text-gray-700 leading-relaxed">
                    Keamanan data Anda adalah prioritas kami. Kami menerapkan langkah-langkah teknis dan administratif
                    untuk melindungi data Anda dari akses yang tidak sah, pengungkapan, atau modifikasi. Semua transmisi
                    data sensitif dilakukan melalui koneksi terenkripsi (HTTPS).
                </p>
            </div>
        </section>

        <!-- Section 4: Pihak Ketiga & Payment Gateway -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                4. Pihak Ketiga & Payment Gateway
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Dalam menjalankan bisnis, kami bekerja sama dengan pihak ketiga:
            </p>
            <div class="space-y-4">
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">Payment Gateway (iPaymu)</h3>
                    <p class="text-gray-700">Data transaksi diproses melalui iPaymu. Mohon merujuk pada kebijakan
                        privasi iPaymu untuk memahami bagaimana mereka mengelola data keuangan Anda.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <h3 class="font-bold text-gray-900 mb-2">Layanan Pihak Ketiga Lainnya</h3>
                    <p class="text-gray-700">Kami hanya membagikan data kepada pihak ketiga (seperti penyedia hosting
                        atau alat analisis) sebatas yang diperlukan untuk menjalankan operasional bisnis kami, dan kami
                        memastikan mereka juga mematuhi standar privasi yang ketat.</p>
                </div>
            </div>
        </section>

        <!-- Section 5: Hak Anda -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                5. Hak Anda
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Anda memiliki hak untuk:
            </p>
            <ul class="space-y-3">
                <li class="flex items-start">
                    <span
                        class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-blue-100 text-blue-600 text-sm font-semibold mr-3 flex-shrink-0">1</span>
                    <span class="text-gray-700">Mengakses informasi pribadi yang kami miliki tentang Anda.</span>
                </li>
                <li class="flex items-start">
                    <span
                        class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-blue-100 text-blue-600 text-sm font-semibold mr-3 flex-shrink-0">2</span>
                    <span class="text-gray-700">Meminta koreksi atau penghapusan data pribadi Anda (sesuai dengan
                        kewajiban hukum kami untuk menyimpan catatan transaksi).</span>
                </li>
                <li class="flex items-start">
                    <span
                        class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-blue-100 text-blue-600 text-sm font-semibold mr-3 flex-shrink-0">3</span>
                    <span class="text-gray-700">Berhenti berlangganan dari komunikasi pemasaran kapan saja melalui
                        tautan di email yang kami kirimkan.</span>
                </li>
            </ul>
        </section>

        <!-- Section 6: Perubahan Kebijakan -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                6. Perubahan Kebijakan
            </h2>
            <p class="text-gray-700 leading-relaxed">
                Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu. Setiap perubahan akan diumumkan di
                halaman ini dengan memperbarui tanggal "Terakhir diperbarui" di atas.
            </p>
        </section>

        <!-- Section 7: Kontak Kami -->
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-500">
                7. Kontak Kami
            </h2>
            <p class="text-gray-700 leading-relaxed mb-6">
                Jika Anda memiliki pertanyaan mengenai kebijakan privasi ini atau pengelolaan data di Akhritech, silakan
                hubungi kami di:
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
                    <p class="text-gray-600">{{ companyProfile()->email }}</p>
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
                    <p class="text-gray-600">{{ phoneNumber(companyProfile()->phone) }}</p>
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
                Kebijakan Privasi ini berlaku untuk semua pengguna, pengunjung, dan pelanggan dari Akhritech. Dengan
                menggunakan layanan kami, Anda menyetujui pengumpulan dan penggunaan informasi sesuai dengan kebijakan
                ini.
            </p>
        </div>
    </section>
@endsection

@push('script')
    <script>
        // Set last updated date to today
        document.getElementById('lastUpdated').textContent = new Date().toLocaleDateString('id-ID', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    </script>
@endpush
