@extends('layouts.tailwind')

@php
    /** @var \App\Models\Product $product */
@endphp

@section('content')
    <!-- Screenshots Gallery -->
    @php
        $images = is_array($product->images) ? $product->images : [];
        $allImages = [];
        if (!empty($product->thumbnail_image)) {
            $allImages[] = $product->thumbnail_image;
        }
        foreach ($images as $img) {
            if (!empty($img)) {
                $allImages[] = $img;
            }
        }
        $imageUrls = array_map(function ($path) {
            if (is_string($path) && str_starts_with($path, 'https://')) {
                return $path;
            }
            return asset('storage/' . ltrim($path, '/'));
        }, $allImages);
        $imageUrls = array_values(array_filter($imageUrls));

        $hasDiscount = !empty($product->discount_percentage) && (int) $product->discount_percentage > 0;
        $price = (int) ($product->price ?? 0);
        $finalPrice = (int) ($product->final_price ?? ($product->price ?? 0));
        $formattedPrice = 'Rp' . number_format($price, 0, ',', '.');
        $formattedFinalPrice = 'Rp' . number_format($finalPrice, 0, ',', '.');
    @endphp
    <div class="pt-24 pb-20 hero-bg min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            <!-- Breadcrumbs -->
            <div class="text-sm text-slate-500 mb-6 flex items-center gap-2">
                <a href="#" class="hover:text-primary">Home</a> <i class="fa-solid fa-chevron-right text-xs"></i>
                <a href="#" class="hover:text-primary">Tema Web</a> <i class="fa-solid fa-chevron-right text-xs"></i>
                <span class="text-slate-800 font-medium">Admin & Dashboard</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- LEFT COLUMN: Content (8/12) -->
                <div class="lg:col-span-8">

                    <!-- Title Header -->
                    <div class="mb-8">
                        <div class="flex flex-wrap gap-2 mb-3">
                            @php
                                $headerCategories = array_slice(explode(',', $product->category), 0, 2);
                                $colors = ['bg-indigo-50 text-indigo-700', 'bg-green-50 text-green-700'];
                            @endphp
                            @foreach ($headerCategories as $index => $cat)
                                <span
                                    class="px-2 py-1 {{ $colors[$index % count($colors)] }} text-xs font-bold rounded uppercase tracking-wide">
                                    {{ trim($cat) }}
                                </span>
                            @endforeach
                        </div>
                        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-2">{{ $product->name }}</h1>

                        <div class="flex flex-wrap items-center gap-3 text-sm text-slate-500">
                            <span class="inline-flex items-center gap-2 text-yellow-400">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="text-slate-900 font-bold">({{ number_format((float) 0, 1) }})</span>
                            </span>

                            <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                            @if ($finalPrice == 0)
                                <span>Download: {{ (int) ($product->sales_count ?? 0) }}x</span>
                            @else
                                <span>Terjual: {{ (int) ($product->sales_count ?? 0) }}x</span>
                            @endif
                            @if (!empty($product->updated_at))
                                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                <span>Update: {{ $product->updated_at->diffForHumans() }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white p-2 rounded-xl border border-slate-200 shadow-sm mb-10">
                        <div class="flex flex-col gap-2">
                            <!-- Main Image -->
                            @if (!empty($imageUrls))
                                <div id="main-image-container"
                                    class="rounded-lg overflow-hidden relative group cursor-pointer border border-slate-100">
                                    <img id="main-preview-img" src="{{ $imageUrls[0] }}" alt="{{ $product->name }}"
                                        class="w-full h-auto object-cover" loading="lazy" />
                                    <div
                                        class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                                        <span
                                            class="text-white font-bold px-4 py-2 bg-black/50 rounded-full backdrop-blur-sm">
                                            <i class="fa-solid fa-expand mr-2"></i> Fullscreen Preview
                                        </span>
                                    </div>
                                </div>

                                <!-- Sub Images (Thumbnails Slider) -->
                                @if (count($imageUrls) > 1)
                                    <div class="flex overflow-x-auto gap-2 pb-2 snap-x">
                                        @foreach (array_slice($imageUrls, 0, 6) as $index => $url)
                                            <img src="{{ $url }}"
                                                alt="{{ $product->name }} thumbnail {{ $index + 1 }}"
                                                class="thumb-img rounded-lg h-24 w-32 md:h-32 md:w-48 object-cover border-2 {{ $index == 0 ? 'border-primary opacity-100' : 'border-slate-100 opacity-70' }} cursor-pointer hover:opacity-100 transition-all flex-shrink-0 snap-start"
                                                data-src="{{ $url }}" loading="lazy" />
                                        @endforeach
                                    </div>
                                @endif
                            @else
                                <div class="py-10 text-center text-slate-500">Gambar tidak tersedia.</div>
                            @endif
                        </div>
                    </div>

                    <!-- Description Section -->
                    <div class="mb-10">
                        <h2 class="text-2xl font-bold text-slate-900 mb-4">Deskripsi Produks</h2>
                        <p class="text-slate-600 leading-relaxed mb-4">{{ $product->short_description }}</p>

                        <div class="text-slate-600 leading-relaxed mb-4">
                            {!! $product->description !!}
                        </div>

                        <h3 class="text-xl font-bold text-slate-900 mt-6 mb-3">Ringkasan Produk</h3>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-tag text-indigo-500 mt-1"></i>
                                <span>Kategori: {{ $product->category }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-layer-group text-indigo-500 mt-1"></i>
                                <span>Stack: {{ $product->stack ?: '-' }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-receipt text-indigo-500 mt-1"></i>
                                <span>SKU: {{ $product->sku }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-circle-check text-indigo-500 mt-1"></i>
                                <span>Status: {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                            </li>
                        </ul>
                    </div>


                    <!-- Files Included -->
                    <div class="mb-10">
                        <h2 class="text-2xl font-bold text-slate-900 mb-4">File yang Termasuk</h2>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="px-3 py-1 bg-white border border-slate-200 rounded-full text-slate-600 text-sm">HTML
                                Files</span>
                            <span class="px-3 py-1 bg-white border border-slate-200 rounded-full text-slate-600 text-sm">CSS
                                Files (SCSS)</span>
                            <span class="px-3 py-1 bg-white border border-slate-200 rounded-full text-slate-600 text-sm">JS
                                Files</span>
                            <span
                                class="px-3 py-1 bg-white border border-slate-200 rounded-full text-slate-600 text-sm">Documentation</span>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN: Sticky Sidebar (4/12) -->
                <div class="lg:col-span-4">
                    <div class="lg:sticky lg:top-24 space-y-6">

                        <!-- Pricing Card -->
                        <div class="bg-white p-6 rounded-2xl shadow-lg border border-slate-100 relative overflow-hidden">
                            <!-- Decorative top accent -->
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-accent"></div>

                            <div class="flex justify-between items-end mb-4">
                                <div>
                                    @if ($hasDiscount)
                                        <span
                                            class="text-slate-500 text-sm line-through mb-1 block">{{ $formattedPrice }}</span>
                                    @endif
                                    <div class="flex items-baseline gap-1">
                                        <span
                                            class="text-4xl font-extrabold text-slate-900">{{ $finalPrice == 0 ? 'Gratis' : $formattedFinalPrice }}</span>
                                    </div>
                                </div>
                                @if ($hasDiscount)
                                    <span class="bg-red-100 text-red-600 text-xs font-bold px-2 py-1 rounded">Diskon
                                        {{ (int) $product->discount_percentage }}%</span>
                                @endif
                            </div>


                            <!-- Buttons -->
                            @if ($finalPrice == 0)
                                <a href="{{ route('products.checkout.form', $product->slug) }}"
                                    class="w-full py-3.5 bg-green-600 text-white rounded-xl font-bold text-lg hover:bg-green-700 transition-all shadow-lg shadow-green-200 mb-3 flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-download"></i> Dapatkan Sekarang
                                </a>
                            @else
                                <a href="{{ route('products.checkout.form', $product->slug) }}"
                                    class="w-full py-3.5 bg-primary text-white rounded-xl font-bold text-lg hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200 mb-3 flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-cart-shopping"></i> Beli Sekarang
                                </a>
                            @endif

                            @php
                                $previewUrl = trim((string) ($product->preview_url ?? ''));
                            @endphp

                            @if (!empty($previewUrl))
                                <a href="{{ $previewUrl }}" target="_blank" rel="noopener noreferrer"
                                    class="block w-full py-3 border border-slate-200 text-slate-700 rounded-xl font-bold text-center hover:bg-slate-50 transition-colors flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-eye"></i> Live Preview
                                </a>
                            @else
                                <button type="button"
                                    class="block w-full py-3 border border-slate-200 text-slate-400 rounded-xl font-bold text-center bg-white cursor-not-allowed flex items-center justify-center gap-2"
                                    title="Preview link belum tersedia">
                                    <i class="fa-solid fa-eye"></i> Live Preview
                                </button>
                            @endif


                            <!-- Divider -->
                            <div class="my-6 border-t border-slate-100"></div>

                            <!-- Info List -->
                            <ul class="space-y-4 text-sm text-slate-600">
                                <li class="flex justify-between">
                                    <span class="text-slate-400"><i class="fa-solid fa-calendar-check w-5"></i> Update
                                        Terakhir:</span>
                                    <span class="font-medium text-slate-900">12 Okt 2023</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-slate-400"><i class="fa-solid fa-code-branch w-5"></i> Versi:</span>
                                    <span class="font-medium text-slate-900">v2.4.0</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-slate-400"><i class="fa-solid fa-file-archive w-5"></i> Ukuran
                                        File:</span>
                                    <span class="font-medium text-slate-900">15.2 MB</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-slate-400"><i class="fa-solid fa-layer-group w-5"></i>
                                        Compatibility:</span>
                                    <span class="font-medium text-slate-900">Bootstrap 5</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="text-slate-400"><i class="fa-solid fa-shield-halved w-5"></i>
                                        Lisensi:</span>
                                    <span class="font-medium text-slate-900">Personal & Commercial</span>
                                </li>
                            </ul>

                            <!-- Divider -->
                            <div class="my-6 border-t border-slate-100"></div>

                            <!-- Tags -->
                            <div>
                                <h4 class="text-xs font-bold text-slate-400 uppercase mb-3">Tags</h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach (explode(',', $product->category) as $tag)
                                        <a href="#"
                                            class="px-3 py-1 bg-slate-50 text-slate-600 text-xs rounded-md hover:bg-slate-100 border border-slate-200">{{ trim($tag) }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Support Info -->
                        <div class="bg-indigo-900 rounded-2xl p-6 text-white text-center">
                            <div
                                class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4 text-xl">
                                <i class="fa-solid fa-headset"></i>
                            </div>
                            <h3 class="text-lg font-bold mb-2">Butuh Bantuan?</h3>
                            <p class="text-indigo-200 text-sm mb-4">Tim support kami siap membantu Anda 24/7 untuk
                                instalasi dan troubleshooting.</p>
                            <a href="#"
                                class="inline-block px-6 py-2 bg-white text-indigo-900 rounded-lg font-bold text-sm hover:bg-indigo-50 transition-colors">
                                Hubungi Support
                            </a>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Free Claim Modal -->
            <div id="free-claim-modal" class="fixed inset-0 z-50 hidden">
                <div class="absolute inset-0 bg-black/50" data-modal-close="true"></div>
                <div class="relative mx-auto max-w-xl h-full flex items-center">
                    <div class="bg-white w-full rounded-2xl shadow-xl overflow-hidden">
                        <div class="p-6 border-b border-slate-100 flex items-start justify-between gap-4">
                            <div>
                                <h3 class="text-xl font-extrabold text-slate-900">Dapatkan Produk Gratis</h3>
                                <p class="text-sm text-slate-500 mt-1">Masukkan data Anda untuk mendapatkan akses unduhan.
                                </p>
                            </div>
                            <button type="button" class="text-slate-500 hover:text-slate-700 text-2xl leading-none"
                                data-modal-close="true">
                                &times;
                            </button>
                        </div>
                        <div class="p-6">
                            <form id="free-claim-form" class="space-y-4">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div>
                                    <label class="text-sm font-bold text-slate-700">Nama Lengkap</label>
                                    <input type="text" name="name" required
                                        class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
                                </div>
                                <div>
                                    <label class="text-sm font-bold text-slate-700">Email</label>
                                    <input type="email" name="email" required
                                        class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
                                </div>
                                <div>
                                    <label class="text-sm font-bold text-slate-700">Nomor WhatsApp</label>
                                    <input type="text" name="whatsapp_number" required
                                        class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
                                </div>
                                <div class="flex items-center gap-3 pt-2">
                                    <button type="submit" id="free-claim-submit-btn"
                                        class="px-5 py-3 bg-green-600 text-white rounded-xl font-bold hover:bg-green-700 transition-colors w-full">
                                        Klaim Sekarang
                                    </button>
                                </div>
                                <div id="free-claim-loading" class="hidden text-sm text-slate-600 text-center">
                                    Memproses...</div>
                                <div id="free-claim-error" class="hidden text-sm text-red-600 font-bold text-center">
                                </div>
                            </form>
                            <div id="free-claim-success" class="hidden text-center">
                                <div
                                    class="mx-auto w-14 h-14 bg-green-100 rounded-full flex items-center justify-center text-green-700 mb-4">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <h3 class="text-xl font-extrabold text-slate-900 mb-2">Berhasil!</h3>
                                <p class="text-slate-600 text-sm mb-4">Akses unduhan Anda telah dibuat.</p>
                                <a href="#" id="free-claim-download-link"
                                    class="px-5 py-3 bg-primary text-white rounded-xl font-bold hover:bg-indigo-700 transition-colors inline-block w-full">
                                    Menuju Halaman Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Modal + AJAX Scripts -->

            <div id="payment-modal" class="fixed inset-0 z-50 hidden">
                <div class="absolute inset-0 bg-black/50" data-modal-close="true"></div>
                <div class="relative mx-auto max-w-2xl h-full flex items-center">
                    <div class="bg-white w-full rounded-2xl shadow-xl overflow-hidden">
                        <div class="p-6 border-b border-slate-100 flex items-start justify-between gap-4">
                            <div>
                                <h3 class="text-xl font-extrabold text-slate-900">Beli Sekarang</h3>
                                <p class="text-sm text-slate-500 mt-1">Konfirmasi pembayaran melalui transfer bank.</p>
                            </div>
                            <button type="button" class="text-slate-500 hover:text-slate-700 text-2xl leading-none"
                                data-modal-close="true">
                                &times;
                            </button>
                        </div>

                        <div class="p-6">
                            <div id="payment-step-form">
                                <div class="mb-5">
                                    <div class="flex flex-wrap items-end justify-between gap-3">
                                        <div>
                                            <div class="text-slate-500 text-sm line-through mb-1" id="original-price">
                                            </div>
                                            <div class="flex items-baseline gap-2">
                                                <span class="text-3xl font-extrabold text-slate-900"
                                                    id="total-transfer"></span>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <div class="text-xs font-bold uppercase tracking-wide text-slate-500">Kode Unik
                                            </div>
                                            <div class="text-2xl font-extrabold text-primary" id="unique-code"></div>
                                        </div>
                                    </div>

                                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-slate-600">
                                        <div class="flex justify-between"><span>Diskon</span><span
                                                id="discount-line"></span></div>
                                        <div class="flex justify-between"><span>Kode Unik</span><span
                                                id="code-line"></span></div>
                                        <div class="flex justify-between sm:col-span-2 border-t border-slate-100 pt-3">
                                            <span class="font-bold">Total Transfer</span><span
                                                class="font-extrabold text-slate-900" id="amount-paid-display"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-slate-50 border border-slate-100 rounded-xl p-4 mb-5">
                                    <div class="text-sm font-extrabold text-slate-900 mb-2">Instruksi Transfer</div>
                                    <div class="text-sm text-slate-700 leading-relaxed" id="bank-instructions">
                                        <div>Bank BCA</div>
                                        <div>No. Rekening: <span class="font-bold">777-123-4567</span></div>
                                        <div>a.n. PT Akhritech Mulia Mandiri</div>
                                    </div>

                                    <div class="mt-4 flex flex-wrap gap-2">
                                        <button type="button"
                                            class="px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-700 font-bold hover:bg-slate-50"
                                            data-copy="account-number">Copy No. Rekening</button>
                                        <button type="button"
                                            class="px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-700 font-bold hover:bg-slate-50"
                                            data-copy="amount-paid">Copy Nominal</button>
                                    </div>

                                    <div class="mt-4 rounded-lg bg-yellow-50 border border-yellow-200 p-3">
                                        <div class="text-yellow-900 text-sm font-bold">Perhatian</div>
                                        <div class="text-yellow-900/90 text-sm mt-1">Mohon transfer sesuai dengan digit
                                            nominal terakhir (kode unik) agar proses verifikasi lebih cepat.</div>
                                    </div>
                                </div>

                                <form id="payment-confirm-form" enctype="multipart/form-data" class="space-y-4">
                                    @csrf

                                    <input type="hidden" name="product_id" id="payment-Produk-id"
                                        value="{{ $product->id }}">
                                    <input type="hidden" name="amount_paid" id="amount-paid-hidden" />

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="text-sm font-bold text-slate-700">Nama Lengkap</label>
                                            <input type="text" name="name" required
                                                class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
                                        </div>
                                        <div>
                                            <label class="text-sm font-bold text-slate-700">Email Penerima</label>
                                            <input type="email" name="email" required
                                                class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="text-sm font-bold text-slate-700">Nomor WhatsApp</label>
                                            <input type="text" name="whatsapp_number" required
                                                class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
                                        </div>
                                        <div>
                                            <label class="text-sm font-bold text-slate-700">Bank & Nama Pengirim</label>
                                            <input type="text" name="sender_bank_info" required
                                                class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
                                        </div>
                                    </div>

                                    <div>
                                        <label class="text-sm font-bold text-slate-700">Bukti Transfer</label>
                                        <input type="file" name="proof_image" accept="image/*,application/pdf"
                                            required
                                            class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-900" />
                                        <p class="text-xs text-slate-500 mt-1">JPG, PNG, PDF (max 4MB)</p>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <button type="submit" id="payment-submit-btn"
                                            class="px-5 py-3 bg-primary text-white rounded-xl font-bold hover:bg-indigo-700 transition-colors">
                                            Konfirmasi Pembayaran
                                        </button>
                                        <div id="payment-loading" class="hidden text-sm text-slate-600">Menyimpan...</div>
                                    </div>

                                    <div id="payment-error" class="hidden text-sm text-red-600 font-bold"></div>
                                </form>
                            </div>

                            <div id="payment-step-success" class="hidden text-center">
                                <div
                                    class="mx-auto w-14 h-14 bg-green-100 rounded-full flex items-center justify-center text-green-700 mb-4">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <h3 class="text-xl font-extrabold text-slate-900 mb-2">🎉 Konfirmasi Terkirim!</h3>
                                <p class="text-slate-600 text-sm mb-4">Terima kasih atas pembayaran Anda. Pembayaran sedang
                                    kami verifikasi secara manual.</p>
                                <div class="text-slate-700 text-sm font-bold">
                                    Link download Produk akan dikirim ke email Anda (dan dikonfirmasi via WhatsApp) dalam
                                    waktu maksimal 1x24 jam.
                                </div>
                                <div class="text-slate-500 text-sm mt-4">
                                    Jika ada kendala, hubungi Admin di WhatsApp: <span class="font-bold text-slate-700">+62
                                        812-3456-7890</span>
                                </div>
                                <button type="button" data-modal-close="true"
                                    class="mt-6 px-5 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition-colors">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                (function() {
                    const buyBtn = document.getElementById('buy-now-btn');
                    const modal = document.getElementById('payment-modal');
                    const closeEls = document.querySelectorAll('[data-modal-close="true"]');
                    const formStep = document.getElementById('payment-step-form');
                    const successStep = document.getElementById('payment-step-success');

                    const originalPriceEl = document.getElementById('original-price');
                    const totalTransferEl = document.getElementById('total-transfer');
                    const uniqueCodeEl = document.getElementById('unique-code');
                    const discountLineEl = document.getElementById('discount-line');
                    const codeLineEl = document.getElementById('code-line');
                    const amountPaidDisplayEl = document.getElementById('amount-paid-display');
                    const amountPaidHiddenEl = document.getElementById('amount-paid-hidden');

                    const paymentErrorEl = document.getElementById('payment-error');
                    const loadingEl = document.getElementById('payment-loading');
                    const submitBtn = document.getElementById('payment-submit-btn');
                    const form = document.getElementById('payment-confirm-form');

                    const accountNumber = '777-123-4567';

                    function formatRp(amount) {
                        try {
                            return 'Rp' + new Intl.NumberFormat('id-ID').format(amount);
                        } catch (e) {
                            return 'Rp' + String(amount);
                        }
                    }

                    function closeModal() {
                        modal.classList.add('hidden');
                        successStep.classList.add('hidden');
                        formStep.classList.remove('hidden');
                        paymentErrorEl.classList.add('hidden');
                        paymentErrorEl.textContent = '';
                        if (loadingEl) loadingEl.classList.add('hidden');
                        if (submitBtn) submitBtn.disabled = false;
                    }

                    function openModal() {
                        modal.classList.remove('hidden');
                        paymentErrorEl.classList.add('hidden');
                        paymentErrorEl.textContent = '';
                    }

                    closeEls.forEach(el => {
                        el.addEventListener('click', closeModal);
                    });

                    if (buyBtn) {
                        buyBtn.addEventListener('click', () => {
                            const ProdukId = buyBtn.getAttribute('data-Produk-id');
                            document.getElementById('payment-Produk-id').value = ProdukId;

                            const original = {{ (int) $price }};
                            const finalBase = {{ (int) $finalPrice }};
                            const discountPercentage = {{ (int) ($product->discount_percentage ?? 0) }};
                            const discountAmount = Math.max(0, original - finalBase);

                            const code = Math.floor(100 + Math.random() * 900); // 3 digits
                            const uniqueCodeStr = String(code); // 3 digits as "Kode Unik" indicator
                            const extra = Number(uniqueCodeStr);
                            const totalTransfer = Number(finalBase) + Number(extra);


                            originalPriceEl.textContent = formatRp(original);
                            totalTransferEl.textContent = formatRp(totalTransfer);
                            uniqueCodeEl.textContent = code;
                            amountPaidHiddenEl.value = totalTransfer;
                            amountPaidDisplayEl.textContent = formatRp(totalTransfer);

                            if (discountPercentage > 0) {
                                discountLineEl.textContent = '-' + discountPercentage + '% (' + formatRp(
                                    discountAmount) + ')';
                                codeLineEl.textContent = formatRp(extra);
                            } else {
                                discountLineEl.textContent = '-';
                                codeLineEl.textContent = formatRp(extra);
                            }

                            formStep.classList.remove('hidden');
                            successStep.classList.add('hidden');

                            openModal();
                        });
                    }

                    document.querySelectorAll('[data-copy="account-number"], [data-copy="amount-paid"]').forEach(btn => {
                        btn.addEventListener('click', async () => {
                            const key = btn.getAttribute('data-copy');
                            const text = key === 'account-number' ? accountNumber : (amountPaidHiddenEl
                                .value || '');
                            try {
                                await navigator.clipboard.writeText(text);
                                btn.textContent = 'Tersalin!';
                                setTimeout(() => {
                                    if (key === 'account-number') btn.textContent =
                                        'Copy No. Rekening';
                                    else btn.textContent = 'Copy Nominal';
                                }, 1200);
                            } catch (e) {
                                alert('Gagal menyalin. Silakan salin manual.');
                            }
                        });
                    });

                    if (form) {
                        form.addEventListener('submit', async (e) => {
                            e.preventDefault();
                            paymentErrorEl.classList.add('hidden');
                            paymentErrorEl.textContent = '';

                            const fd = new FormData(form);

                            const amountPaid = amountPaidHiddenEl.value;
                            if (!amountPaid || Number(amountPaid) < 1) {
                                paymentErrorEl.textContent =
                                    'Nominal pembayaran belum tersedia. Silakan klik “Beli Sekarang” lagi.';
                                paymentErrorEl.classList.remove('hidden');
                                return;
                            }

                            submitBtn.disabled = true;
                            loadingEl.classList.remove('hidden');

                            try {
                                const res = await fetch('{{ route('products.confirm-payment') }}', {
                                    method: 'POST',
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest',
                                        'Accept': 'application/json'
                                    },
                                    body: fd
                                });

                                const data = await res.json().catch(() => null);
                                if (!res.ok || !data || !data.ok) {
                                    const msg = (data && data.message) ? data.message :
                                        'Konfirmasi gagal. Periksa input Anda.';
                                    throw new Error(msg);
                                }

                                formStep.classList.add('hidden');
                                successStep.classList.remove('hidden');
                            } catch (err) {
                                paymentErrorEl.textContent = err.message || 'Konfirmasi gagal.';
                                paymentErrorEl.classList.remove('hidden');
                            } finally {
                                loadingEl.classList.add('hidden');
                                submitBtn.disabled = false;
                            }
                        });
                    }
                })();
            </script>

            <!-- Free Claim Modal -->
            <div id="free-claim-modal" class="fixed inset-0 z-50 hidden">
                <div class="absolute inset-0 bg-black/50" data-modal-close="true"></div>
                <div class="relative mx-auto max-w-xl h-full flex items-center p-4">
                    <div class="bg-white w-full rounded-2xl shadow-xl overflow-hidden max-h-[90vh] overflow-y-auto">
                        <div
                            class="p-6 border-b border-slate-100 flex items-start justify-between gap-4 sticky top-0 bg-white z-10">
                            <div>
                                <h3 class="text-xl font-extrabold text-slate-900">Dapatkan Produk Gratis</h3>
                                <p class="text-sm text-slate-500 mt-1">Masukkan data Anda untuk mendapatkan akses unduhan.
                                </p>
                            </div>
                            <button type="button" class="text-slate-500 hover:text-slate-700 text-2xl leading-none"
                                data-modal-close="true">
                                &times;
                            </button>
                        </div>
                        <div class="p-6">
                            <form id="free-claim-form" class="space-y-4">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div>
                                    <label class="text-sm font-bold text-slate-700">Nama Lengkap</label>
                                    <input type="text" name="name" required
                                        class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
                                </div>
                                <div>
                                    <label class="text-sm font-bold text-slate-700">Email</label>
                                    <input type="email" name="email" required
                                        class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
                                </div>
                                <div>
                                    <label class="text-sm font-bold text-slate-700">Nomor WhatsApp</label>
                                    <input type="text" name="whatsapp_number" required
                                        class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
                                </div>
                                <div class="flex items-center gap-3 pt-2">
                                    <button type="submit" id="free-claim-submit-btn"
                                        class="px-5 py-3 bg-green-600 text-white rounded-xl font-bold hover:bg-green-700 transition-colors w-full">
                                        Klaim Sekarang
                                    </button>
                                </div>
                                <div id="free-claim-loading" class="hidden text-sm text-slate-600 text-center">
                                    Memproses...</div>
                                <div id="free-claim-error" class="hidden text-sm text-red-600 font-bold text-center">
                                </div>
                            </form>
                            <div id="free-claim-success" class="hidden text-center">
                                <div
                                    class="mx-auto w-14 h-14 bg-green-100 rounded-full flex items-center justify-center text-green-700 mb-4">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <h3 class="text-xl font-extrabold text-slate-900 mb-2">Berhasil!</h3>
                                <p class="text-slate-600 text-sm mb-4">Akses unduhan Anda telah dibuat.</p>
                                <a href="#" id="free-claim-download-link"
                                    class="px-5 py-3 bg-primary text-white rounded-xl font-bold hover:bg-indigo-700 transition-colors inline-block w-full">
                                    Menuju Halaman Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fullscreen Image Modal -->
            <div id="image-modal" class="fixed inset-0 z-[60] hidden">
                <div class="absolute inset-0 bg-black/90 backdrop-blur-sm cursor-pointer" data-modal-close="image-modal">
                </div>
                <div class="relative w-full h-full flex items-center justify-center p-4 pointer-events-none">
                    <img id="fullscreen-img" src=""
                        class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl pointer-events-auto" />
                    <button type="button"
                        class="absolute top-4 right-4 w-12 h-12 bg-white/10 hover:bg-white/20 text-white rounded-full flex items-center justify-center text-2xl transition-colors pointer-events-auto"
                        data-modal-close="image-modal">
                        &times;
                    </button>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const mainImg = document.getElementById('main-preview-img');
                    const thumbs = document.querySelectorAll('.thumb-img');
                    const mainContainer = document.getElementById('main-image-container');
                    const imageModal = document.getElementById('image-modal');
                    const fullscreenImg = document.getElementById('fullscreen-img');

                    if (thumbs.length > 0 && mainImg) {
                        thumbs.forEach(thumb => {
                            thumb.addEventListener('click', function() {
                                // Update main image
                                const newSrc = this.getAttribute('data-src');
                                mainImg.setAttribute('src', newSrc);

                                // Update active state
                                thumbs.forEach(t => {
                                    t.classList.remove('border-primary', 'opacity-100');
                                    t.classList.add('border-slate-100', 'opacity-70');
                                });
                                this.classList.remove('border-slate-100', 'opacity-70');
                                this.classList.add('border-primary', 'opacity-100');
                            });
                        });
                    }

                    if (mainContainer && imageModal && fullscreenImg) {
                        mainContainer.addEventListener('click', function() {
                            fullscreenImg.src = mainImg.src;
                            imageModal.classList.remove('hidden');
                        });

                        const closeBtns = imageModal.querySelectorAll('[data-modal-close="image-modal"]');
                        closeBtns.forEach(btn => {
                            btn.addEventListener('click', () => {
                                imageModal.classList.add('hidden');
                            });
                        });
                    }
                });
            </script>

            <!-- Related Themes (Simple Footer Teaser) -->

            @php
                $relatedProduks = \App\Models\Product::where('is_active', true)
                    ->where('id', '!=', $product->id)
                    ->inRandomOrder()
                    ->take(5)
                    ->get();
            @endphp
            <div class="mt-20">
                <h3 class="text-2xl font-bold text-slate-900 mb-8">Tema Lain yang Mungkin Anda Suka</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($relatedProduks as $related)
                        @php
                            $relPrice = (int) ($related->price ?? 0);
                            $relFinalPrice = (int) ($related->final_price ?? ($related->price ?? 0));
                            $relFormatted = 'Rp' . number_format($relFinalPrice, 0, ',', '.');

                            $relImages = is_string($related->images)
                                ? json_decode($related->images, true)
                                : $related->images;
                            if (is_string($relImages)) {
                                $relImages = json_decode($relImages, true);
                            }
                            $relImgUrl = 'https://via.placeholder.com/200';
                            if (is_array($relImages) && count($relImages) > 0) {
                                $firstImg = $relImages[0];
                                if (is_string($firstImg) && str_starts_with($firstImg, 'https://')) {
                                    $relImgUrl = $firstImg;
                                } else {
                                    $relImgUrl = asset('storage/' . ltrim($firstImg, '/'));
                                }
                            }
                        @endphp
                        <a href="{{ route('products.show', $related->slug) }}"
                            class="bg-white rounded-xl border border-slate-200 p-4 flex gap-4 items-center hover:shadow-md transition-shadow">
                            <img src="{{ $relImgUrl }}" alt="{{ $related->name }}"
                                class="w-20 h-20 rounded-lg object-cover">
                            <div>
                                <h4 class="font-bold text-slate-900">{{ $related->name }}</h4>
                                <p class="text-primary font-bold text-sm">
                                    {{ $relFinalPrice == 0 ? 'Gratis' : $relFormatted }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
