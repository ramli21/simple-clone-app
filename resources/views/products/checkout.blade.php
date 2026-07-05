@extends('layouts.tailwind')

@php
    /** @var \App\Models\Product $product */
    $hasDiscount = !empty($product->discount_percentage) && (int) $product->discount_percentage > 0;
    $price = (int) ($product->price ?? 0);
    $finalPrice = (int) ($product->final_price ?? ($product->price ?? 0));
    $formattedPrice = 'Rp' . number_format($price, 0, ',', '.');
    $formattedFinalPrice = 'Rp' . number_format($finalPrice, 0, ',', '.');
@endphp

@push('metadata')
    <title>Checkout | Akhritech</title>
    <meta name="description"
        content="Checkout halaman Akhritech untuk pembelian produk {{ $product->name }}. Lanjutkan pembayaran dan dapatkan akses seumur hidup.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
    <div class="pt-24 pb-20 hero-bg min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            <!-- Breadcrumbs -->
            <div class="text-sm text-slate-500 mb-6 flex items-center gap-2">
                <a href="{{ route('home') }}" class="hover:text-primary">Home</a>
                <i class="fa-solid fa-chevron-right text-xs"></i>
                <a href="{{ route('products.index') }}" class="hover:text-primary">Tema Web</a>
                <i class="fa-solid fa-chevron-right text-xs"></i>
                <a href="{{ route('products.show', $product->slug) }}" class="hover:text-primary">{{ $product->name }}</a>
                <i class="fa-solid fa-chevron-right text-xs"></i>
                <span class="text-slate-800 font-medium">Checkout</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT COLUMN: Checkout Form (2/3) -->
                <div class="lg:col-span-2">
                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-slate-100">
                        <h1 class="text-3xl font-extrabold text-slate-900 mb-2">Checkout</h1>
                        <p class="text-slate-600 mb-8">Masukkan data Anda untuk melanjutkan pembelian.</p>

                        <form action="{{ route('products.checkout.process') }}" method="POST" id="checkout-form"
                            class="space-y-6">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <!-- Personal Information Section -->
                            <div>
                                <h2 class="text-xl font-bold text-slate-900 mb-4 pb-4 border-b border-slate-100">
                                    <i class="fa-solid fa-user mr-2 text-primary"></i> Informasi Pribadi
                                </h2>

                                <div class="space-y-4">
                                    <!-- Nama -->
                                    <div>
                                        <label for="name" class="block text-sm font-bold text-slate-700 mb-2">
                                            Nama Lengkap <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20 @error('name') border-red-500 @enderror"
                                            placeholder="Masukkan nama lengkap Anda" required>
                                        @error('name')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label for="email" class="block text-sm font-bold text-slate-700 mb-2">
                                            Email <span class="text-red-500">*</span>
                                        </label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20 @error('email') border-red-500 @enderror"
                                            placeholder="contoh@email.com" required>
                                        @error('email')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Phone Number -->
                                    <div>
                                        <label for="phone_number" class="block text-sm font-bold text-slate-700 mb-2">
                                            Nomor Telepon <span class="text-red-500">*</span>
                                        </label>
                                        <input type="tel" id="phone_number" name="phone_number"
                                            value="{{ old('phone_number') }}"
                                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20 @error('phone_number') border-red-500 @enderror"
                                            placeholder="Contoh: 08123456789" required>
                                        @error('phone_number')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Company Name (Optional) -->
                                    <div>
                                        <label for="company_name" class="block text-sm font-bold text-slate-700 mb-2">
                                            Nama Perusahaan / Organisasi <span class="text-slate-400">(Opsional)</span>
                                        </label>
                                        <input type="text" id="company_name" name="company_name"
                                            value="{{ old('company_name') }}"
                                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20 @error('company_name') border-red-500 @enderror"
                                            placeholder="Nama perusahaan Anda (opsional)">
                                        @error('company_name')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Terms & Conditions -->
                            <div class="bg-slate-50 border border-slate-100 rounded-xl p-6">
                                <div class="flex items-start gap-4">
                                    <input type="checkbox" id="agree_terms" name="agree_terms"
                                        class="mt-1 w-5 h-5 rounded border-slate-300 text-primary focus:ring-primary/20 @error('agree_terms') border-red-500 @enderror"
                                        required>
                                    <div class="flex-1">
                                        <label for="agree_terms" class="text-sm text-slate-700">
                                            <span class="font-bold">Saya setuju dengan syarat dan ketentuan</span>
                                            <a href="{{ route('terms-of-service') }}" target="_blank"
                                                class="text-primary hover:underline">akhritech</a>
                                            dan memahami bahwa
                                        </label>
                                        <p class="text-sm text-slate-600 mt-2 leading-relaxed">
                                            <i class="fa-solid fa-info-circle mr-1 text-blue-500"></i>
                                            Informasi yang saya inputkan di atas hanya digunakan untuk keperluan promosi,
                                            penawaran produk, dan komunikasi terkait layanan dari Akhritech. Data Anda
                                            dijaga dengan aman dan tidak akan dibagikan kepada pihak ketiga tanpa
                                            persetujuan.
                                        </p>
                                    </div>
                                </div>
                                @error('agree_terms')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-4 pt-6 border-t border-slate-100">
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="flex-1 px-6 py-3 border border-slate-200 text-slate-700 rounded-xl font-bold text-center hover:bg-slate-50 transition-colors">
                                    Kembali
                                </a>
                                <button type="submit"
                                    class="flex-1 px-6 py-3 bg-primary text-white rounded-xl font-bold hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-check"></i>
                                    {{ $finalPrice == 0 ? 'Dapatkan Sekarang' : 'Lanjutkan Pembayaran' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Order Summary (1/3) -->
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-slate-100 sticky top-28">

                        <!-- Order Summary Card -->
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-slate-900 mb-4">Ringkasan Pesanan</h3>

                            <!-- Product Image Preview -->
                            @php
                                $images = is_array($product->images) ? $product->images : [];
                                $thumbnail = !empty($product->thumbnail_image)
                                    ? $product->thumbnail_image
                                    : (count($images) > 0
                                        ? $images[0]
                                        : null);
                                $thumbnailUrl = $thumbnail ? asset('storage/' . ltrim($thumbnail, '/')) : null;
                            @endphp

                            @if ($thumbnailUrl)
                                <div class="mb-4 rounded-lg overflow-hidden border border-slate-100">
                                    <img src="{{ $thumbnailUrl }}" alt="{{ $product->name }}"
                                        class="w-full h-32 object-cover">
                                </div>
                            @endif

                            <!-- Product Name -->
                            <h4 class="font-bold text-slate-900 mb-1 text-sm">{{ $product->name }}</h4>
                            <p class="text-xs text-slate-500 mb-4">{{ $product->short_description }}</p>

                            <!-- Divider -->
                            <div class="border-t border-slate-100 my-4"></div>

                            <!-- Price Details -->
                            <div class="space-y-2 mb-4">
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-600">Harga Normal:</span>
                                    <span
                                        class="font-bold {{ $hasDiscount ? 'line-through text-slate-400' : 'text-slate-900' }}">
                                        {{ $formattedPrice }}
                                    </span>
                                </div>

                                @if ($hasDiscount)
                                    <div class="flex justify-between text-sm">
                                        <span class="text-slate-600">Diskon:</span>
                                        <span class="text-red-600 font-bold">
                                            -{{ (int) $product->discount_percentage }}%
                                        </span>
                                    </div>
                                @endif

                                <div class="border-t border-slate-100 pt-2 flex justify-between">
                                    <span class="font-bold text-slate-900">Total:</span>
                                    <span class="text-2xl font-extrabold text-primary">
                                        {{ $finalPrice == 0 ? 'Gratis' : $formattedFinalPrice }}
                                    </span>
                                </div>
                            </div>

                            <!-- Divider -->
                            <div class="border-t border-slate-100 my-4"></div>

                            <!-- Features -->
                            <div class="space-y-2 text-sm text-slate-600">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-check text-green-600"></i>
                                    <span>Akses seumur hidup</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-check text-green-600"></i>
                                    <span>Update gratis selamanya</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-check text-green-600"></i>
                                    <span>Support 24/7</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-check text-green-600"></i>
                                    <span>Lisensi komersial</span>
                                </div>
                            </div>
                        </div>

                        <!-- Security Badge -->
                        <div class="bg-green-50 border border-green-200 rounded-lg p-3 text-center">
                            <div class="text-green-700 font-bold text-sm mb-1">
                                <i class="fa-solid fa-lock mr-1"></i> Transaksi Aman
                            </div>
                            <p class="text-xs text-green-600">Data Anda dilindungi dengan enkripsi SSL.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
