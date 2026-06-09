@extends('layouts.tailwind')

@php
    /** @var \App\Models\WebTemplate $template */
@endphp

@section('content')
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
                            <span
                                class="px-2 py-1 bg-indigo-50 text-indigo-700 text-xs font-bold rounded uppercase tracking-wide">Admin
                                Template</span>
                            <span
                                class="px-2 py-1 bg-green-50 text-green-700 text-xs font-bold rounded uppercase tracking-wide">Bootstrap
                                5</span>
                        </div>
                        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-2">{{ $template->name }}</h1>

                        <div class="flex flex-wrap items-center gap-3 text-sm text-slate-500">
                            <span class="inline-flex items-center gap-2 text-yellow-400">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <span class="text-slate-900 font-bold">({{ number_format((float) 5, 1) }})</span>
                            </span>

                            <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                            <span>Terjual: {{ (int) ($template->sales_count ?? 0) }}x</span>
                            @if (!empty($template->updated_at))
                                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                <span>Update: {{ $template->updated_at->diffForHumans() }}</span>
                            @endif
                        </div>

                    </div>

                    <!-- Screenshots Gallery -->
                    @php
                        $images = is_array($template->images) ? $template->images : [];
                        $allImages = [];
                        if (!empty($template->thumbnail_image)) {
                            $allImages[] = $template->thumbnail_image;
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

                        $hasDiscount =
                            !empty($template->discount_percentage) && (int) $template->discount_percentage > 0;
                        $price = (int) ($template->price ?? 0);
                        $finalPrice = (int) ($template->final_price ?? ($template->price ?? 0));
                        $formattedPrice = 'Rp' . number_format($price, 0, ',', '.');
                        $formattedFinalPrice = 'Rp' . number_format($finalPrice, 0, ',', '.');
                    @endphp

                    <div class="bg-white p-2 rounded-xl border border-slate-200 shadow-sm mb-10">
                        <div class="grid grid-cols-2 gap-2">
                            <!-- Main Image -->
                            @if (!empty($imageUrls))
                                <div
                                    class="col-span-2 rounded-lg overflow-hidden relative group cursor-pointer border border-slate-100">
                                    <img src="{{ $imageUrls[0] }}" alt="{{ $template->name }}"
                                        class="w-full h-auto object-cover" loading="lazy" />
                                    <div
                                        class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <span
                                            class="text-white font-bold px-4 py-2 bg-black/50 rounded-full backdrop-blur-sm">
                                            <i class="fa-solid fa-expand mr-2"></i> Fullscreen Preview
                                        </span>
                                    </div>
                                </div>

                                <!-- Sub Images -->
                                @foreach (array_slice($imageUrls, 1, 2) as $url)
                                    <img src="{{ $url }}" alt="{{ $template->name }}"
                                        class="rounded-lg w-full h-40 object-cover border border-slate-100 cursor-pointer hover:opacity-90"
                                        loading="lazy" />
                                @endforeach
                            @else
                                <div class="col-span-2 text-slate-500 py-10 text-center">Gambar tidak tersedia.</div>
                            @endif
                        </div>
                    </div>

                    <!-- Description Section -->
                    <div class="mb-10">
                        <h2 class="text-2xl font-bold text-slate-900 mb-4">Deskripsi Produk</h2>
                        <p class="text-slate-600 leading-relaxed mb-4">{{ $template->short_description }}</p>

                        <div class="text-slate-600 leading-relaxed mb-4">
                            {!! nl2br(e($template->description)) !!}
                        </div>

                        <h3 class="text-xl font-bold text-slate-900 mt-6 mb-3">Ringkasan Produk</h3>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-tag text-indigo-500 mt-1"></i>
                                <span>Kategori: {{ $template->category }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-layer-group text-indigo-500 mt-1"></i>
                                <span>Stack: {{ $template->stack ?: '-' }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-receipt text-indigo-500 mt-1"></i>
                                <span>SKU: {{ $template->sku }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-circle-check text-indigo-500 mt-1"></i>
                                <span>Status: {{ $template->is_active ? 'Aktif' : 'Nonaktif' }}</span>
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
                                    <span class="text-slate-500 text-sm line-through mb-1 block">$59.00</span>
                                    <div class="flex items-baseline gap-1">
                                        <span
                                            class="text-4xl font-extrabold text-slate-900">{{ $formattedFinalPrice }}</span>
                                    </div>
                                </div>
                                @if ($hasDiscount)
                                    <span class="bg-red-100 text-red-600 text-xs font-bold px-2 py-1 rounded">Diskon
                                        {{ (int) $template->discount_percentage }}%</span>
                                @endif
                            </div>


                            <!-- Buttons -->
                            <button
                                class="w-full py-3.5 bg-primary text-white rounded-xl font-bold text-lg hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200 mb-3 flex items-center justify-center gap-2">
                                <i class="fa-solid fa-cart-shopping"></i> Beli Sekarang
                            </button>
                            <a href="#"
                                class="block w-full py-3 border border-slate-200 text-slate-700 rounded-xl font-bold text-center hover:bg-slate-50 transition-colors flex items-center justify-center gap-2">
                                <i class="fa-solid fa-eye"></i> Live Preview
                            </a>

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
                                    <a href="#"
                                        class="px-3 py-1 bg-slate-50 text-slate-600 text-xs rounded-md hover:bg-slate-100 border border-slate-200">admin</a>
                                    <a href="#"
                                        class="px-3 py-1 bg-slate-50 text-slate-600 text-xs rounded-md hover:bg-slate-100 border border-slate-200">dashboard</a>
                                    <a href="#"
                                        class="px-3 py-1 bg-slate-50 text-slate-600 text-xs rounded-md hover:bg-slate-100 border border-slate-200">bootstrap
                                        5</a>
                                    <a href="#"
                                        class="px-3 py-1 bg-slate-50 text-slate-600 text-xs rounded-md hover:bg-slate-100 border border-slate-200">saas</a>
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

            <!-- Related Themes (Simple Footer Teaser) -->
            <div class="mt-20">
                <h3 class="text-2xl font-bold text-slate-900 mb-8">Tema Lain yang Mungkin Anda Suka</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Related Item 1 -->
                    <div
                        class="bg-white rounded-xl border border-slate-200 p-4 flex gap-4 items-center hover:shadow-md transition-shadow">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                            class="w-20 h-20 rounded-lg object-cover">
                        <div>
                            <h4 class="font-bold text-slate-900">CorpX Theme</h4>
                            <p class="text-primary font-bold text-sm">$39</p>
                        </div>
                    </div>
                    <!-- Related Item 2 -->
                    <div
                        class="bg-white rounded-xl border border-slate-200 p-4 flex gap-4 items-center hover:shadow-md transition-shadow">
                        <img src="https://images.unsplash.com/photo-1559028012-481c04fa702d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                            class="w-20 h-20 rounded-lg object-cover">
                        <div>
                            <h4 class="font-bold text-slate-900">StartUp Landing</h4>
                            <p class="text-primary font-bold text-sm">$29</p>
                        </div>
                    </div>
                    <!-- Related Item 3 -->
                    <div
                        class="bg-white rounded-xl border border-slate-200 p-4 flex gap-4 items-center hover:shadow-md transition-shadow">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                            class="w-20 h-20 rounded-lg object-cover">
                        <div>
                            <h4 class="font-bold text-slate-900">E-Shopify</h4>
                            <p class="text-primary font-bold text-sm">$55</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
