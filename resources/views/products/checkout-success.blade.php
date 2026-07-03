@extends('layouts.tailwind')

@section('content')
    <div class="pt-24 pb-20 hero-bg min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 text-center">
                    <!-- Success Icon -->
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-6">
                        <i class="fa-solid fa-check text-4xl text-green-600"></i>
                    </div>

                    <!-- Main Message -->
                    <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-3">
                        🎉 Terima Kasih!
                    </h1>

                    <p class="text-xl text-slate-600 mb-8">
                        Pembelian produk Anda telah berhasil diproses.
                    </p>

                    <!-- Product Info -->
                    <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 mb-8 text-left">
                        <h3 class="font-bold text-slate-900 mb-4">Informasi Pesanan</h3>
                        <div class="space-y-3 text-sm text-slate-700">
                            <div class="flex justify-between">
                                <span class="text-slate-600">Produk:</span>
                                <span class="font-semibold">{{ $payment->product->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-600">Nama:</span>
                                <span class="font-semibold">{{ $payment->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-600">Email:</span>
                                <span class="font-semibold">{{ $payment->email }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-600">Kode Unik:</span>
                                <span class="font-mono font-bold text-primary">{{ $payment->unique_code }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Email Notice -->
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-8">
                        <div class="flex gap-3">
                            <i class="fa-solid fa-envelope text-blue-600 flex-shrink-0 mt-1 text-xl"></i>
                            <div class="text-left">
                                <h4 class="font-bold text-blue-900 mb-1">Email Konfirmasi Dikirim</h4>
                                <p class="text-sm text-blue-900/90">
                                    Kami telah mengirimkan link download ke <span
                                        class="font-semibold">{{ $payment->email }}</span>.
                                    Periksa inbox atau folder spam Anda untuk email dari Akhritech.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Download Section -->
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">Dapatkan Produk Anda</h3>
                        <a href="{{ route('download.one-time', ['token' => $downloadToken]) }}"
                            class="inline-block w-full md:w-auto px-8 py-4 bg-primary text-white rounded-xl font-bold text-lg hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2 mb-3">
                            <i class="fa-solid fa-download"></i> Download Sekarang
                        </a>
                        <p class="text-sm text-slate-500">
                            Link download berlaku selamanya untuk akun Anda.
                        </p>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-slate-100 my-8"></div>

                    <!-- Next Steps -->
                    <div class="bg-slate-50 rounded-xl p-6 mb-8">
                        <h4 class="font-bold text-slate-900 mb-4">Langkah Selanjutnya</h4>
                        <ol class="space-y-3 text-left text-sm text-slate-700">
                            <li class="flex gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">1</span>
                                <span>Download file produk dari link di atas atau email Anda</span>
                            </li>
                            <li class="flex gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">2</span>
                                <span>Ekstrak file ZIP dan ikuti dokumentasi yang disertakan</span>
                            </li>
                            <li class="flex gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">3</span>
                                <span>Jika ada pertanyaan, hubungi support kami 24/7</span>
                            </li>
                        </ol>
                    </div>

                    <!-- Support Info -->
                    <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-6 mb-8">
                        <h4 class="font-bold text-indigo-900 mb-2">Butuh Bantuan?</h4>
                        <p class="text-sm text-indigo-900/90 mb-3">
                            Tim support kami siap membantu Anda untuk instalasi, troubleshooting, dan pertanyaan lainnya.
                        </p>
                        <a href="https://wa.me/628123456789" target="_blank"
                            class="inline-block px-6 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition-colors text-sm">
                            <i class="fa-brands fa-whatsapp mr-2"></i> Chat Support via WhatsApp
                        </a>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col md:flex-row gap-4">
                        <a href="{{ route('products.index') }}"
                            class="flex-1 px-6 py-3 border border-slate-200 text-slate-700 rounded-xl font-bold text-center hover:bg-slate-50 transition-colors flex items-center justify-center gap-2">
                            <i class="fa-solid fa-list"></i> Lihat Produk Lain
                        </a>
                        <a href="{{ route('home') }}"
                            class="flex-1 px-6 py-3 bg-slate-900 text-white rounded-xl font-bold text-center hover:bg-slate-800 transition-colors flex items-center justify-center gap-2">
                            <i class="fa-solid fa-home"></i> Kembali ke Home
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
