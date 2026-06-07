@php
    /** @var \Illuminate\Support\Collection|\Illuminate\Pagination\LengthAwarePaginator $templates */
@endphp

@extends('layouts.app')

@section('title', 'Katalog Templates | ' . config('app.name', 'NamaBisnis Anda'))

@section('content')
    <div class="container py-5 my-5">
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4">
            <div>
                <h1 class="h2 mb-2 fw-bold text-dark">Katalog Templates</h1>
                <p class="text-muted mb-0">Pilih template yang sesuai kebutuhan Anda.</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <span class="badge text-bg-light border">Template Aktif</span>
                <span class="badge bg-light border text-dark">
                    Total:
                    {{ is_object($templates) && method_exists($templates, 'total') ? $templates->total() : $templates->count() }}
                </span>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($templates as $template)
                @php
                    $thumbnailUrl = '';
                    if (!empty($template->thumbnail_image)) {
                        $thumbnailUrl = str_starts_with($template->thumbnail_image, 'https://')
                            ? $template->thumbnail_image
                            : asset('storage/' . $template->thumbnail_image);
                    }

                    $category = $template->category ?? '';
                    $stack = $template->stack ?? '';

                    $price = (int) ($template->price ?? 0);
                    $finalPrice = (int) ($template->final_price ?? ($template->price ?? 0));
                    $hasDiscount = !empty($template->discount_percentage) && (int) $template->discount_percentage > 0;

                    $formattedPrice = 'Rp' . number_format($price, 0, ',', '.');
                    $formattedFinalPrice = 'Rp' . number_format($finalPrice, 0, ',', '.');
                @endphp

                <div class="col-12 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            @if (!empty($thumbnailUrl))
                                <a href="{{ route('templates.show', $template->slug) }}" class="d-block">
                                    <img src="{{ $thumbnailUrl }}" class="card-img-top" alt="{{ $template->name }}"
                                        style="height: 220px; object-fit: cover; transform: scale(1); transition: transform .35s ease;"
                                        loading="lazy" onmouseover="this.style.transform='scale(1.08)'"
                                        onmouseout="this.style.transform='scale(1)'">
                                </a>
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                    style="height: 220px;">
                                    <span class="text-muted">No Image</span>
                                </div>
                            @endif

                            <div class="position-absolute top-0 start-0 p-3 d-flex flex-wrap gap-2">
                                @if ($category)
                                    <span class="badge bg-white text-dark border">{{ $category }}</span>
                                @endif
                                @if ($stack)
                                    <span class="badge bg-primary">{{ $stack }}</span>
                                @endif
                            </div>

                            @if ($hasDiscount)
                                <div class="position-absolute top-0 end-0 p-3">
                                    <span class="badge bg-success">Diskon {{ (int) $template->discount_percentage }}%</span>
                                </div>
                            @endif
                        </div>

                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold text-dark" style="min-height: 2.6rem;">
                                {{ $template->name }}
                            </h5>

                            <p class="text-muted small"
                                style="min-height: 3.0rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                {{ $template->short_description }}
                            </p>

                            <div class="mt-3">
                                @if ($hasDiscount)
                                    <div class="d-flex align-items-baseline gap-2">
                                        <div class="text-muted text-decoration-line-through small">{{ $formattedPrice }}
                                        </div>
                                        <div class="text-primary fw-bold fs-4 mb-0">{{ $formattedFinalPrice }}</div>
                                    </div>
                                @else
                                    <div class="text-dark fw-bold fs-4">{{ $formattedFinalPrice }}</div>
                                @endif
                            </div>

                            <div class="mt-4 d-grid gap-3" style="grid-template-columns: 1fr 1fr;">
                                <div class="d-grid gap-2 d-sm-flex">
                                    <a href="{{ $template->preview_url }}" target="_blank" rel="noopener noreferrer"
                                        class="btn btn-primary flex-fill fw-semibold">
                                        Live Preview
                                    </a>
                                    <a href="{{ route('templates.show', $template->slug) }}"
                                        class="btn btn-outline-dark flex-fill fw-semibold">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>

                            <div class="mt-3 text-muted small">
                                Terjual {{ (int) ($template->sales_count ?? 0) }}x
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
