@extends('layouts.tailwind')

@php
    /** @var \App\Models\Payment $payment */
    /** @var \App\Models\Product $product */
    $product = $payment->product;
    $hasDiscount = !empty($product->discount_percentage) && (int) $product->discount_percentage > 0;

    $price = (int) ($product->price ?? 0);
    $finalPrice = (int) ($payment->amount_paid ?? ($product->final_price ?? ($product->price ?? 0)));

    $formattedPrice = 'Rp' . number_format($price, 0, ',', '.');
    $formattedFinalPrice = 'Rp' . number_format($finalPrice, 0, ',', '.');
@endphp

@push('metadata')
    <title>Pembayaran | Akhritech</title>
    <meta name="description"
        content="Halaman pembayaran Akhritech untuk pembelian produk {{ $product->name }}. Selesaikan pembayaran Anda menggunakan QRIS otomatis atau transfer manual.">
    <meta name="robots" content="noindex, nofollow">
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
                <span class="text-slate-800 font-medium">Pembayaran</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT COLUMN: Payment Method Display (2/3) -->
                <div class="lg:col-span-2">

                    @if ($payment->payment_method === 'qris')
                        <!-- QRIS PAYMENT FLOW -->
                        <div class="bg-white p-8 rounded-2xl shadow-lg border border-slate-100 text-center"
                            id="qris-container">
                            <h1 class="text-3xl font-extrabold text-slate-900 mb-2 flex items-center justify-center gap-2">
                                <i class="fa-solid fa-qrcode text-primary"></i> Pembayaran QRIS Otomatis
                            </h1>
                            <p class="text-slate-600 mb-6">Scan QR Code di bawah menggunakan e-wallet
                                atau aplikasi mobile banking Anda.</p>

                            <!-- Timer & Expiration Warning -->
                            <div
                                class="inline-flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-6 py-3 rounded-xl mb-8 font-medium">
                                <i class="fa-solid fa-clock-three animate-pulse text-lg"></i>
                                <span>Selesaikan Pembayaran Dalam: </span>
                                <span id="countdown" class="font-mono text-xl font-bold">15:00</span>
                            </div>

                            <!-- QR Image Card -->
                            <div
                                class="max-w-xs mx-auto bg-slate-50 border border-slate-200 rounded-2xl p-6 shadow-sm mb-6 relative overflow-hidden">
                                @if ($payment->qris_qr_image)
                                    <img src="{{ $payment->qris_qr_image }}" alt="QRIS Code"
                                        class="w-full h-auto mx-auto rounded-lg" id="qris-qr-image">
                                @else
                                    <div
                                        class="w-full h-64 bg-slate-200 flex items-center justify-center text-slate-500 rounded-lg">
                                        <i class="fa-solid fa-spinner animate-spin text-3xl"></i>
                                    </div>
                                @endif

                                <div class="mt-4 border-t border-slate-200/60 pt-3 flex items-center justify-center gap-2">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo_QRIS.svg"
                                        alt="QRIS Logo" class="h-6 object-contain">
                                </div>
                            </div>

                            <!-- Polling Status -->
                            <div
                                class="bg-blue-50 border border-blue-200 rounded-xl p-4 max-w-md mx-auto mb-8 flex items-center justify-center gap-3 text-blue-800">
                                <i class="fa-solid fa-spinner animate-spin text-lg"></i>
                                <span class="font-semibold" id="status-text">Menunggu Pembayaran
                                    dideteksi...</span>
                            </div>

                            <!-- Instructions -->
                            <div
                                class="max-w-md mx-auto text-left bg-slate-50 rounded-xl p-6 border border-slate-100 text-sm text-slate-700 space-y-3">
                                <h4 class="font-bold text-slate-900 mb-1"><i
                                        class="fa-solid fa-circle-info text-primary mr-1"></i> Cara
                                    Pembayaran:</h4>
                                <ol class="list-decimal list-inside space-y-2">
                                    <li>Buka aplikasi e-wallet Anda (Gopay, OVO, Dana, LinkAja,
                                        ShopeePay) atau Mobile Banking.</li>
                                    <li>Pilih menu <strong>Scan / Bayar / QRIS</strong>.</li>
                                    <li>Scan QR Code yang tampil di atas.</li>
                                    <li>Periksa kembali nominal pembayaran apakah sudah sesuai.</li>
                                    <li>Masukkan PIN Anda dan selesaikan transaksi.</li>
                                    <li>Halaman ini akan otomatis dialihkan ketika pembayaran berhasil.
                                    </li>
                                </ol>
                            </div>

                            <div class="mt-8 pt-6 border-t border-slate-100 flex justify-center">
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="px-6 py-3 border border-slate-200 text-slate-700 rounded-xl font-bold hover:bg-slate-50 transition-colors">
                                    Batalkan Pembelian
                                </a>
                            </div>
                        </div>

                        <!-- EXPIRED STATE -->
                        <div class="bg-white p-8 rounded-2xl shadow-lg border border-slate-100 text-center hidden"
                            id="expired-container">
                            <div
                                class="inline-flex items-center justify-center w-20 h-20 bg-red-100 rounded-full mb-6 text-red-600">
                                <i class="fa-solid fa-circle-exclamation text-4xl"></i>
                            </div>
                            <h1 class="text-3xl font-extrabold text-slate-900 mb-2">QRIS Telah
                                Kedaluwarsa</h1>
                            <p class="text-slate-600 mb-8">Waktu pembayaran Anda telah habis. Silakan
                                lakukan proses checkout ulang untuk mendapatkan QRIS baru.</p>

                            <div class="flex gap-4 max-w-md mx-auto">
                                <a href="{{ route('products.checkout.form', $product->slug) }}"
                                    class="flex-1 px-6 py-3 bg-primary text-white rounded-xl font-bold hover:bg-indigo-700 transition-colors">
                                    Checkout Ulang
                                </a>
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="flex-1 px-6 py-3 border border-slate-200 text-slate-700 rounded-xl font-bold hover:bg-slate-50 transition-colors">
                                    Kembali ke Detail
                                </a>
                            </div>
                        </div>
                    @else
                        <!-- MANUAL BANK TRANSFER FLOW -->
                        <div class="bg-white p-8 rounded-2xl shadow-lg border border-slate-100">
                            <h1 class="text-3xl font-extrabold text-slate-900 mb-2">Konfirmasi
                                Pembayaran</h1>
                            <p class="text-slate-600 mb-8">Ikuti instruksi transfer dan masukkan bukti
                                pembayaran Anda di bawah.</p>

                            <!-- Bank Instructions -->
                            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-8">
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <i class="fa-solid fa-building text-blue-600"></i> Instruksi
                                    Transfer Bank
                                </h3>

                                <div class="space-y-3 text-sm text-slate-700">
                                    @php
                                        $bank = \App\Models\BankAccount::where('is_active', true)->first();
                                    @endphp
                                    @if ($bank)
                                        <div class="flex justify-between">
                                            <span class="font-semibold">Bank:</span>
                                            <span>{{ $bank->bank_name }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-semibold">No. Rekening:</span>
                                            <span class="font-mono font-bold">{{ $bank->account_number }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-semibold">Atas Nama:</span>
                                            <span>{{ $bank->account_holder }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-4 flex flex-wrap gap-2">
                                    <button type="button"
                                        class="px-4 py-2 bg-white border border-blue-200 text-blue-600 rounded-lg font-semibold hover:bg-blue-50 text-sm"
                                        onclick="navigator.clipboard.writeText('{{ $bank ? $bank->account_number : '' }}')">
                                        <i class="fa-solid fa-copy mr-1"></i> Copy No. Rekening
                                    </button>
                                    <button type="button"
                                        class="px-4 py-2 bg-white border border-blue-200 text-blue-600 rounded-lg font-semibold hover:bg-blue-50 text-sm"
                                        onclick="navigator.clipboard.writeText('{{ $payment->manual_unique_code ? ($payment->amount_paid + $payment->manual_unique_code) : $finalPrice }}')">
                                        <i class="fa-solid fa-copy mr-1"></i> Copy Nominal
                                    </button>
                                </div>
                            </div>

                            <!-- Important Notice -->
                            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-8">
                                <div class="flex gap-3">
                                    <i class="fa-solid fa-exclamation-triangle text-yellow-600 flex-shrink-0 mt-1"></i>
                                    <div>
                                        <h4 class="font-bold text-yellow-900 mb-1">Perhatian Penting
                                        </h4>
                                        <p class="text-sm text-yellow-900/90">
                                            Mohon transfer sesuai nominal tertera termasuk kode unik di
                                            digit terakhir untuk mempermudah proses verifikasi manual
                                            kami.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Confirmation Form -->
                            <form action="{{ route('products.confirm-payment') }}" method="POST"
                                enctype="multipart/form-data" id="payment-form" class="space-y-6">
                                @csrf

                                <input type="hidden" name="payment_id" value="{{ $payment->id }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="amount_paid" value="{{ $payment->manual_unique_code ? ($payment->amount_paid + $payment->manual_unique_code) : $finalPrice }}">

                                <!-- Customer Information -->
                                <div>
                                    <h3 class="text-lg font-bold text-slate-900 mb-4 pb-4 border-b border-slate-100">
                                        <i class="fa-solid fa-user mr-2 text-primary"></i> Informasi
                                        Pembayar
                                    </h3>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Nama
                                                Lengkap</label>
                                            <input type="text" id="name" name="name"
                                                value="{{ $payment->name }}"
                                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-900"
                                                readonly>
                                        </div>

                                        <div>
                                            <label for="email"
                                                class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                                            <input type="email" id="email" name="email"
                                                value="{{ $payment->email }}"
                                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-900"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bank Transfer Details -->
                                <div>
                                    <h3 class="text-lg font-bold text-slate-900 mb-4 pb-4 border-b border-slate-100">
                                        <i class="fa-solid fa-wallet mr-2 text-primary"></i> Detail
                                        Transfer
                                    </h3>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="whatsapp_number"
                                                class="block text-sm font-bold text-slate-700 mb-2">
                                                Nomor WhatsApp
                                            </label>
                                            <input type="tel" id="whatsapp_number" name="whatsapp_number"
                                                value="{{ $payment->whatsapp_number }}"
                                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20"
                                                placeholder="Contoh: 08123456789">
                                        </div>

                                        <div>
                                            <label for="sender_bank_info"
                                                class="block text-sm font-bold text-slate-700 mb-2">
                                                Bank & Nama Pengirim <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" id="sender_bank_info" name="sender_bank_info"
                                                value="{{ old('sender_bank_info') }}"
                                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20"
                                                placeholder="Contoh: BCA Andi Wijaya" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Proof of Payment -->
                                <div>
                                    <h3 class="text-lg font-bold text-slate-900 mb-4 pb-4 border-b border-slate-100">
                                        <i class="fa-solid fa-receipt mr-2 text-primary"></i> Bukti
                                        Pembayaran
                                    </h3>

                                    <div>
                                        <label for="proof_image" class="block text-sm font-bold text-slate-700 mb-2">
                                            Unggah Bukti Transfer <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative border-2 border-dashed border-slate-300 rounded-xl p-6 text-center hover:border-primary transition-colors"
                                            id="upload-area">
                                            <input type="file" id="proof_image" name="proof_image"
                                                accept="image/*,application/pdf"
                                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                            <div class="pointer-events-none">
                                                <i class="fa-solid fa-cloud-arrow-up text-4xl text-slate-400 mb-2"></i>
                                                <p class="text-slate-700 font-semibold">Klik atau drag
                                                    file ke sini</p>
                                                <p class="text-xs text-slate-500 mt-1">JPG, PNG, PDF
                                                    (max 4MB)</p>
                                            </div>
                                        </div>
                                        <div id="file-name" class="mt-2 text-sm text-slate-600 hidden">
                                            <i class="fa-solid fa-file-circle-check text-green-600"></i>
                                            <span id="file-name-text"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-4 pt-6 border-t border-slate-100">
                                    <a href="{{ route('products.show', $product->slug) }}"
                                        class="flex-1 px-6 py-3 border border-slate-200 text-slate-700 rounded-xl font-bold text-center hover:bg-slate-50 transition-colors">
                                        Kembali
                                    </a>
                                    <button type="submit"
                                        class="flex-1 px-6 py-3 bg-primary text-white rounded-xl font-bold hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
                                        <i class="fa-solid fa-check"></i> Konfirmasi Pembayaran
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>

                <!-- RIGHT COLUMN: Order Summary (1/3) -->
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-slate-100 sticky top-28">

                        <!-- Payment Summary -->
                        <h3 class="text-lg font-bold text-slate-900 mb-4">Ringkasan Pembayaran</h3>

                        <!-- Product Image -->
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

                        <h4 class="font-bold text-slate-900 mb-1 text-sm">{{ $product->name }}</h4>
                        <p class="text-xs text-slate-500 mb-4">{{ $product->short_description }}</p>

                        <!-- Divider -->
                        <div class="border-t border-slate-100 my-4"></div>

                        <!-- Price Calculation -->
                        <div class="space-y-3 mb-4 text-sm">
                            <div class="flex justify-between">
                                <span class="text-slate-600">Harga:</span>
                                <span
                                    class="font-bold {{ $hasDiscount ? 'line-through text-slate-400' : 'text-slate-900' }}">
                                    {{ $formattedPrice }}
                                </span>
                            </div>

                            @if ($hasDiscount)
                                <div class="flex justify-between">
                                    <span class="text-slate-600">Diskon:</span>
                                    <span class="text-red-600 font-bold">
                                        -{{ (int) $product->discount_percentage }}%
                                    </span>
                                </div>
                            @endif

                            @if ($payment->payment_method === 'qris' && $payment->qris_unique_code)
                                <div class="flex justify-between text-slate-600">
                                    <span>Kode Unik QRIS:</span>
                                    <span
                                        class="font-bold text-primary">+Rp{{ number_format($payment->qris_unique_code, 0, ',', '.') }}</span>
                                </div>
                                <div class="border-t border-slate-100 pt-3 flex justify-between">
                                    <span class="font-bold text-slate-900">Total Pembayaran:</span>
                                    <span class="text-2xl font-extrabold text-primary">
                                        Rp{{ number_format($payment->qris_total_amount, 0, ',', '.') }}
                                    </span>
                                </div>
                            @elseif ($payment->payment_method === 'manual' && $payment->manual_unique_code)
                                <div class="flex justify-between text-slate-600">
                                    <span>Kode Unik Transfer:</span>
                                    <span
                                        class="font-bold text-primary">+Rp{{ number_format($payment->manual_unique_code, 0, ',', '.') }}</span>
                                </div>
                                <div class="border-t border-slate-100 pt-3 flex justify-between">
                                    <span class="font-bold text-slate-900">Total Transfer:</span>
                                    <span class="text-2xl font-extrabold text-primary">
                                        Rp{{ number_format($payment->amount_paid + $payment->manual_unique_code, 0, ',', '.') }}
                                    </span>
                                </div>
                            @else
                                <div class="border-t border-slate-100 pt-3 flex justify-between">
                                    <span class="font-bold text-slate-900">Total Transfer:</span>
                                    <span class="text-2xl font-extrabold text-primary">
                                        {{ $formattedFinalPrice }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        @if ($payment->payment_method !== 'qris')
                            <!-- Unique Code Info for Manual Payment -->
                            <div class="bg-primary/10 border border-primary/20 rounded-lg p-4 mb-4">
                                <div class="text-xs font-bold text-primary uppercase tracking-wider mb-1">
                                    Kode Referensi Anda</div>
                                <div class="text-2xl font-extrabold text-primary" id="unique-code">
                                    {{ $payment->unique_code }}</div>
                                <p class="text-xs text-slate-600 mt-2">Gunakan kode di atas sebagai
                                    referensi transfer Anda.</p>
                            </div>
                        @endif

                        <!-- Features -->
                        <div class="space-y-2 text-sm text-slate-600 mb-4">
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
                        </div>

                        <!-- Divider -->
                        <div class="border-t border-slate-100 my-4"></div>

                        <!-- Security -->
                        <div class="bg-green-50 border border-green-200 rounded-lg p-3 text-center">
                            <div class="text-green-700 font-bold text-sm mb-1">
                                <i class="fa-solid fa-lock mr-1"></i> Transaksi Aman
                            </div>
                            <p class="text-xs text-green-600">Data Anda dilindungi dengan enkripsi SSL.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @if ($payment->payment_method === 'qris')
        <!-- QRIS COUNTDOWN TIMER & POLLING SCRIPT -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const expiryString =
                    "{{ $payment->qris_expires_at ? $payment->qris_expires_at->toIso8601String() : '' }}";
                if (!expiryString) return;

                const expiryTime = new Date(expiryString).getTime();
                const countdownEl = document.getElementById('countdown');
                const qrisContainer = document.getElementById('qris-container');
                const expiredContainer = document.getElementById('expired-container');
                const statusText = document.getElementById('status-text');

                // 1. Countdown Timer
                const timerInterval = setInterval(function() {
                    const now = new Date().getTime();
                    const distance = expiryTime - now;

                    if (distance < 0) {
                        clearInterval(timerInterval);
                        clearInterval(pollingInterval);
                        countdownEl.textContent = "00:00";
                        qrisContainer.classList.add('hidden');
                        expiredContainer.classList.remove('hidden');
                        return;
                    }

                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    const formattedMin = String(minutes).padStart(2, '0');
                    const formattedSec = String(seconds).padStart(2, '0');

                    countdownEl.textContent = `${formattedMin}:${formattedSec}`;
                }, 1000);

                // 2. Polling Status
                const statusUrl = "{{ route('products.payment.status', $payment->id) }}";
                const pollingInterval = setInterval(async function() {
                    try {
                        const response = await fetch(statusUrl, {
                            method: 'GET',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        });

                        if (!response.ok) return;

                        const data = await response.json();

                        if (data.status === 'success') {
                            clearInterval(timerInterval);
                            clearInterval(pollingInterval);
                            statusText.innerHTML =
                                '<span class="text-green-600"><i class="fa-solid fa-circle-check"></i> Pembayaran berhasil dideteksi! Mengalihkan...</span>';
                            setTimeout(() => {
                                window.location.href = data.redirect_url;
                            }, 1500);
                        } else if (data.status === 'expired') {
                            clearInterval(timerInterval);
                            clearInterval(pollingInterval);
                            qrisContainer.classList.add('hidden');
                            expiredContainer.classList.remove('hidden');
                        }
                    } catch (error) {
                        console.error('Polling error:', error);
                    }
                }, 15000); // Poll every 15 seconds
            });
        </script>
    @else
        <!-- MANUAL PAYMENT FILE UPLOAD SCRIPT -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const uploadArea = document.getElementById('upload-area');
                const fileInput = document.getElementById('proof_image');
                const fileName = document.getElementById('file-name');
                const fileNameText = document.getElementById('file-name-text');
                const paymentForm = document.getElementById('payment-form');
                const submitBtn = paymentForm.querySelector('[type="submit"]');

                uploadArea.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    uploadArea.classList.add('border-primary', 'bg-primary/5');
                });

                uploadArea.addEventListener('dragleave', () => {
                    uploadArea.classList.remove('border-primary', 'bg-primary/5');
                });

                uploadArea.addEventListener('drop', (e) => {
                    e.preventDefault();
                    uploadArea.classList.remove('border-primary', 'bg-primary/5');
                    fileInput.files = e.dataTransfer.files;
                    updateFileName();
                });

                fileInput.addEventListener('change', updateFileName);

                function updateFileName() {
                    if (fileInput.files.length > 0) {
                        fileNameText.textContent = fileInput.files[0].name;
                        fileName.classList.remove('hidden');
                    } else {
                        fileName.classList.add('hidden');
                    }
                }

                // Form submission
                paymentForm.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    const formData = new FormData(paymentForm);

                    submitBtn.disabled = true;
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML =
                        '<i class="fa-solid fa-spinner animate-spin"></i> Memproses...';

                    try {
                        const response = await fetch(
                            '{{ route('products.confirm-payment') }}', {
                                method: 'POST',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'Accept': 'application/json'
                                },
                                body: formData
                            });

                        const data = await response.json();

                        if (!response.ok || !data.ok) {
                            throw new Error(data.message ||
                                'Konfirmasi pembayaran gagal.');
                        }

                        if (data.redirect_url) {
                            window.location.href = data.redirect_url;
                        } else {
                            window.location.href = '{{ route('products.index') }}';
                        }
                    } catch (error) {
                        alert('Error: ' + error.message);
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    }
                });
            });
        </script>
    @endif
@endsection
