@php
    /** @var \App\Models\WebTemplate $template */
@endphp

@extends('layouts.app')

@section('content')
    @php
        $breadcrumb = route('templates.index');

        $thumbnailUrl = '';
        if (!empty($template->thumbnail_image)) {
            $thumbnailUrl = str_starts_with($template->thumbnail_image, 'https://')
                ? $template->thumbnail_image
                : asset('storage/' . $template->thumbnail_image);
        }

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

        $hasDiscount = !empty($template->discount_percentage) && (int) $template->discount_percentage > 0;
        $price = (int) ($template->price ?? 0);
        $finalPrice = (int) ($template->final_price ?? ($template->price ?? 0));

        $formattedPrice = 'Rp' . number_format($price, 0, ',', '.');
        $formattedFinalPrice = 'Rp' . number_format($finalPrice, 0, ',', '.');

        $preview = $template->preview_url;
        $hasPreview = !empty($preview);
    @endphp

    <div class="container py-5 my-5">
        <div class="mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb }}">Templates</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $template->name }}</li>
                </ol>
            </nav>
        </div>

        <div class="row g-4">
            {{-- Left column: gallery + description --}}
            <div class="col-12 col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
                            <div>
                                <h1 class="h4 mb-1">{{ $template->name }}</h1>
                                <div class="text-muted small">Kategori: {{ $template->category }}</div>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                @if (!empty($template->category))
                                    <span class="badge bg-light text-dark border">{{ $template->category }}</span>
                                @endif
                                @if (!empty($template->stack))
                                    <span class="badge bg-primary">{{ $template->stack }}</span>
                                @endif
                                @if ($hasDiscount)
                                    <span class="badge bg-success">Diskon {{ (int) $template->discount_percentage }}%</span>
                                @endif
                            </div>
                        </div>

                        {{-- Gallery --}}
                        @if (count($imageUrls) > 0)
                            <div class="row g-3">
                                @foreach ($imageUrls as $url)
                                    <div class="col-12 col-sm-6">
                                        <div class="border rounded overflow-hidden" style="height: 220px;">
                                            <img src="{{ $url }}" class="w-100 h-100" style="object-fit: cover;"
                                                alt="{{ $template->name }}" loading="lazy" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-muted">Gambar tidak tersedia.</div>
                        @endif
                    </div>
                </div>

                {{-- Description --}}
                <div class="mt-4 card shadow-sm border-0">
                    <div class="card-body">
                        <h2 class="h5">Deskripsi</h2>
                        <div class="mt-3 text-muted" style="white-space: normal;">
                            {!! nl2br(e($template->description)) !!}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right column: sticky pricing card --}}
            <div class="col-12 col-lg-4">
                <div class="position-lg-sticky" style="top: 2rem;">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <div>
                                    <div class="text-muted small">Harga</div>

                                    @if ($hasDiscount)
                                        <div class="mt-2">
                                            <div class="text-muted text-decoration-line-through">{{ $formattedPrice }}</div>
                                            <div class="display-6 text-primary fw-bold">{{ $formattedFinalPrice }}</div>
                                        </div>
                                    @else
                                        <div class="display-6 text-primary fw-bold mt-2">{{ $formattedFinalPrice }}</div>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between">
                                <div class="text-muted small">SKU</div>
                                <div class="fw-semibold">{{ $template->sku }}</div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="text-muted small">Kategori</div>
                                <div class="fw-semibold">{{ $template->category }}</div>
                            </div>

                            <div class="mt-4 d-grid gap-2">
                                <a href="#" class="btn btn-primary fw-semibold">
                                    Beli via Midtrans
                                </a>

                                @if ($hasPreview)
                                    <a href="{{ $preview }}" target="_blank" rel="noopener noreferrer"
                                        class="btn btn-outline-dark fw-semibold">
                                        Live Preview
                                    </a>
                                @else
                                    <button type="button" class="btn btn-outline-secondary" disabled>
                                        Live Preview
                                    </button>
                                @endif
                            </div>

                            <div class="mt-3 text-muted small">
                                Pembelian akan membuka akses download template sesuai delivery_type.
                            </div>

                            <div class="mt-3 text-muted small">
                                Terjual {{ (int) ($template->sales_count ?? 0) }}x
                            </div>
                        </div>
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
        $metaTitle = "Jual Template {$template->name} - {$template->category} | {$businessName}";
        $metaDescription = $template->short_description;

        $ogImage = '';
        if (!empty($template->thumbnail_image)) {
            $ogImage = str_starts_with($template->thumbnail_image, 'https://')
                ? $template->thumbnail_image
                : asset('storage/' . $template->thumbnail_image);
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
