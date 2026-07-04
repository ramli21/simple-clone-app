@extends('layouts.tailwind')

@php
    /** @var \App\Models\Product $product */
    $hasDiscount = !empty($product->discount_percentage) && (int) $product->discount_percentage > 0;
    $price = (int) ($product->price ?? 0);
    $finalPrice = (int) ($product->final_price ?? ($product->price ?? 0));
    $formattedPrice = 'Rp' . number_format($price, 0, ',', '.');
    $formattedFinalPrice = 'Rp' . number_format($finalPrice, 0, ',', '.');
@endphp

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

                <!-- LEFT COLUMN: Payment Form (2/3) -->
                <div class="lg:col-span-2">
                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-slate-100">
                        <h1 class="text-3xl font-extrabold text-slate-900 mb-2">Konfirmasi Pembayaran</h1>
                        <p class="text-slate-600 mb-8">Ikuti instruksi transfer dan masukkan bukti pembayaran Anda.</p>

                        <!-- Bank Instructions -->
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-8">
                            <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                <i class="fa-solid fa-building text-blue-600"></i> Instruksi Transfer Bank
                            </h3>

                            <div class="space-y-3 text-sm text-slate-700">
                                <div class="flex justify-between">
                                    <span class="font-semibold">Bank:</span>
                                    <span>Bank BCA</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold">No. Rekening:</span>
                                    <span class="font-mono font-bold">777-123-4567</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold">Atas Nama:</span>
                                    <span>PT Akhritech Mulia Mandiri</span>
                                </div>
                            </div>

                            <div class="mt-4 flex flex-wrap gap-2">
                                <button type="button"
                                    class="px-4 py-2 bg-white border border-blue-200 text-blue-600 rounded-lg font-semibold hover:bg-blue-50 text-sm"
                                    onclick="navigator.clipboard.writeText('777-123-4567')">
                                    <i class="fa-solid fa-copy mr-1"></i> Copy No. Rekening
                                </button>
                                <button type="button"
                                    class="px-4 py-2 bg-white border border-blue-200 text-blue-600 rounded-lg font-semibold hover:bg-blue-50 text-sm"
                                    onclick="navigator.clipboard.writeText('Rp{{ number_format($finalPrice, 0, ',', '.') }}')">
                                    <i class="fa-solid fa-copy mr-1"></i> Copy Nominal
                                </button>
                            </div>
                        </div>

                        <!-- Important Notice -->
                        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-8">
                            <div class="flex gap-3">
                                <i class="fa-solid fa-exclamation-triangle text-yellow-600 flex-shrink-0 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-yellow-900 mb-1">Perhatian Penting</h4>
                                    <p class="text-sm text-yellow-900/90">
                                        Mohon transfer sesuai dengan digit nominal terakhir (kode unik di sebelah kanan).
                                        Contoh: Jika total adalah Rp150.000 dan kode unik adalah 123, transfer Rp150.123
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Confirmation Form -->
                        <form action="{{ route('products.confirm-payment') }}" method="POST" enctype="multipart/form-data"
                            id="payment-form" class="space-y-6">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="amount_paid" value="{{ $product->final_price }}">

                            <!-- Customer Information -->
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 mb-4 pb-4 border-b border-slate-100">
                                    <i class="fa-solid fa-user mr-2 text-primary"></i> Informasi Pembayar
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Nama
                                            Lengkap</label>
                                        <input type="text" id="name" name="name"
                                            value="{{ $data['name'] ?? old('name') }}"
                                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 @error('name') border-red-500 @enderror"
                                            readonly>
                                        @error('name')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="email"
                                            class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                                        <input type="email" id="email" name="email"
                                            value="{{ $data['email'] ?? old('email') }}"
                                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 @error('email') border-red-500 @enderror"
                                            readonly>
                                        @error('email')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Bank Transfer Details -->
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 mb-4 pb-4 border-b border-slate-100">
                                    <i class="fa-solid fa-wallet mr-2 text-primary"></i> Detail Transfer
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="whatsapp_number" class="block text-sm font-bold text-slate-700 mb-2">
                                            Nomor WhatsApp (Opsional)
                                        </label>
                                        <input type="tel" id="whatsapp_number" name="whatsapp_number"
                                            value="{{ $data['phone_number'] ?? old('whatsapp_number') }}"
                                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20 @error('whatsapp_number') border-red-500 @enderror"
                                            placeholder="Contoh: 08123456789">
                                        @error('whatsapp_number')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="sender_bank_info" class="block text-sm font-bold text-slate-700 mb-2">
                                            Bank & Nama Pengirim <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="sender_bank_info" name="sender_bank_info"
                                            value="{{ old('sender_bank_info') }}"
                                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20 @error('sender_bank_info') border-red-500 @enderror"
                                            placeholder="Contoh: BCA Andi Wijaya" required>
                                        @error('sender_bank_info')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Proof of Payment -->
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 mb-4 pb-4 border-b border-slate-100">
                                    <i class="fa-solid fa-receipt mr-2 text-primary"></i> Bukti Pembayaran
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
                                            <p class="text-slate-700 font-semibold">Klik atau drag file ke sini</p>
                                            <p class="text-xs text-slate-500 mt-1">JPG, PNG, PDF (max 4MB)</p>
                                        </div>
                                    </div>
                                    <div id="file-name" class="mt-2 text-sm text-slate-600 hidden">
                                        <i class="fa-solid fa-file-check text-green-600"></i>
                                        <span id="file-name-text"></span>
                                    </div>
                                    @error('proof_image')
                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
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

                            <div class="border-t border-slate-100 pt-3 flex justify-between">
                                <span class="font-bold text-slate-900">Total Transfer:</span>
                                <span class="text-2xl font-extrabold text-primary">
                                    Rp{{ number_format($finalPrice, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <!-- Unique Code Info -->
                        <div class="bg-primary/10 border border-primary/20 rounded-lg p-4 mb-4">
                            <div class="text-xs font-bold text-primary uppercase tracking-wider mb-1">Kode Unik</div>
                            <div class="text-2xl font-extrabold text-primary" id="unique-code">123</div>
                            <p class="text-xs text-slate-600 mt-2">Tambahkan 3 digit terakhir ke nominal transfer Anda</p>
                        </div>

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
                            <p class="text-xs text-green-600">Data Anda dilindungi dengan enkripsi SSL.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // File upload drag and drop
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

            // Generate random unique code
            function generateUniqueCode() {
                return String(Math.floor(Math.random() * 1000)).padStart(3, '0');
            }

            const uniqueCode = generateUniqueCode();
            document.getElementById('unique-code').textContent = uniqueCode;

            // Form submission
            paymentForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                const formData = new FormData(paymentForm);

                submitBtn.disabled = true;
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fa-solid fa-spinner animate-spin"></i> Memproses...';

                try {
                    const response = await fetch('{{ route('products.confirm-payment') }}', {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const data = await response.json();

                    if (!response.ok || !data.ok) {
                        throw new Error(data.message || 'Konfirmasi pembayaran gagal.');
                    }

                    // Redirect to success page
                    if (data.redirect_url) {
                        window.location.href = data.redirect_url;
                    } else {
                        // Fallback to Produks index
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
@endsection
