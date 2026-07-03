@php
    /** @var \App\Models\Product $product */
@endphp

@extends('layouts.app')

@section('content')
    @php
        $breadcrumb = route('products.index');

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
            if (is_string($path) && str_starts_with($path, ['http://', 'https://'])) {
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

        $preview = $product->preview_url;
        $hasPreview = !empty($preview);
    @endphp

    <div class="mx-auto max-w-7xl px-4 py-10 my-5">
        <div class="mb-4">
            <nav aria-label="breadcrumb" class="text-sm text-slate-600">
                <ol class="flex flex-wrap items-center gap-2">
                    <li>
                        <a href="{{ $breadcrumb }}" class="hover:text-indigo-700 transition-colors">Produks</a>
                    </li>
                    <li class="text-slate-400">/</li>
                    <li class="text-slate-900 font-medium" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-8">
            {{-- Left column --}}
            <div class="md:col-span-8">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                    <div class="flex flex-wrap items-start justify-between gap-4 mb-6">
                        <div>
                            <h1 class="text-xl sm:text-2xl font-bold text-slate-900 leading-tight">{{ $product->name }}
                            </h1>
                            <div class="text-slate-500 text-sm mt-1">Kategori: {{ $product->category }}</div>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            @if (!empty($product->category))
                                <span
                                    class="inline-flex items-center rounded-full bg-slate-50 border border-slate-200 px-3 py-1 text-xs font-semibold text-slate-700">
                                    {{ $product->category }}
                                </span>
                            @endif

                            @if (!empty($product->stack))
                                <span
                                    class="inline-flex items-center rounded-full bg-indigo-50 border border-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700">
                                    {{ $product->stack }}
                                </span>
                            @endif

                            @if ($hasDiscount)
                                <span
                                    class="inline-flex items-center rounded-full bg-emerald-50 border border-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                                    Diskon {{ (int) $product->discount_percentage }}%
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Gallery --}}
                    @if (count($imageUrls) > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach ($imageUrls as $url)
                                <div class="rounded-xl overflow-hidden border border-slate-100 bg-slate-50 h-[220px] group">
                                    <img src="{{ $url }}" alt="{{ $product->name }}" loading="lazy"
                                        class="w-full h-full object-cover transition duration-300 ease-in-out group-hover:scale-[1.05]" />
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-slate-500">Gambar tidak tersedia.</div>
                    @endif
                </div>

                {{-- Description --}}
                <div class="mt-4 bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                    <h2 class="text-base sm:text-lg font-semibold text-slate-900">Deskripsi</h2>
                    <div class="mt-3 text-slate-600 leading-relaxed text-sm sm:text-base">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>
            </div>

            {{-- Right column --}}
            <div class="md:col-span-4">
                <div class="md:sticky md:top-24">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                        <div>
                            <div class="text-slate-500 text-sm font-medium">Harga</div>

                            @if ($hasDiscount)
                                <div class="mt-3">
                                    <div class="text-slate-400 text-sm line-through">{{ $formattedPrice }}</div>
                                    <div class="text-slate-900 text-3xl font-bold mt-1">{{ $formattedFinalPrice }}</div>
                                </div>
                            @else
                                <div class="text-slate-900 text-3xl font-bold mt-2">{{ $formattedFinalPrice }}</div>
                            @endif
                        </div>

                        <div class="mt-5 pt-5 border-t border-slate-100 space-y-3">
                            <div class="flex items-center justify-between">
                                <div class="text-slate-500 text-sm">SKU</div>
                                <div class="font-semibold text-slate-900">{{ $product->sku }}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="text-slate-500 text-sm">Kategori</div>
                                <div class="font-semibold text-slate-900">{{ $product->category }}</div>
                            </div>
                        </div>

                        <div class="mt-6 grid gap-3">
                            <a href="#"
                                class="inline-flex justify-center items-center w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-5 py-2.5 rounded-xl transition-all duration-200 shadow-sm shadow-indigo-100">
                                Beli via Midtrans
                            </a>

                            @if ($hasPreview)
                                <a href="{{ $preview }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex justify-center items-center w-full bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-medium px-5 py-2.5 rounded-xl transition-all duration-200 shadow-sm border border-indigo-100">
                                    Live Preview
                                </a>
                            @else
                                <button type="button" disabled
                                    class="w-full inline-flex justify-center items-center bg-slate-50 text-slate-400 font-medium px-5 py-2.5 rounded-xl border border-slate-200 cursor-not-allowed">
                                    Live Preview
                                </button>
                            @endif
                        </div>

                        <div class="mt-4 text-slate-500 text-xs leading-relaxed">
                            Pembelian akan membuka akses download Produk sesuai delivery_type.
                        </div>

                        <div class="mt-2 text-slate-500 text-xs">Terjual {{ (int) ($product->sales_count ?? 0) }}x</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Meta tags requirement (dynamic) --}}
@push('head_meta')
    @php
        $businessName = config('app.name', 'NamaBisnis Anda');
        $metaTitle = "Jual Produk {$product->name} - {$product->category} | {$businessName}";
        $metaDescription = $product->short_description;

        $ogImage = '';
        if (!empty($product->thumbnail_image)) {
            $ogImage = str_starts_with($product->thumbnail_image, ['http://', 'https://'])
                ? $product->thumbnail_image
                : asset('storage/' . $product->thumbnail_image);
        }
        $ogImage = $ogImage ?: asset('images/undraw_building.png');

        $ogUrl = url()->current();
    @endphp

    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}" />

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $metaTitle }}" />
    <meta property="og:description" content="{{ $metaDescription }}" />
    <meta property="og:image" content="{{ $ogImage }}" />
    <meta property="og:url" content="{{ $ogUrl }}" />

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $metaTitle }}" />
    <meta name="twitter:description" content="{{ $metaDescription }}" />
    <meta name="twitter:image" content="{{ $ogImage }}" />
@endpush
