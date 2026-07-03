@extends('layouts.tailwind')

@section('content')
    <section id="theme-directory" class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-primary font-bold tracking-wider uppercase text-sm">Marketplace Tema</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mt-2 mb-4">Jelajahi Koleksi Tema Premium</h2>
                <p class="text-slate-600 text-lg">Temukan desain website yang sempurna untuk proyek Anda. Semua tema dibangun
                    dengan kode bersih, responsif, dan mudah dikustomisasi.</p>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-3 mb-12" id="theme-filters">
                <button
                    class="filter-btn active px-6 py-2.5 rounded-full border border-primary bg-primary text-white font-medium text-sm transition-all hover:shadow-lg"
                    data-filter="all">
                    Semua Kategori
                </button>

                @foreach ($categories as $category)
                    <button
                        class="filter-btn px-6 py-2.5 rounded-full border border-slate-200 bg-white text-slate-600 font-medium text-sm transition-all hover:border-primary hover:text-primary"
                        data-filter="{{ $category }}">
                        {{ $category }}
                    </button>
                @endforeach
            </div>

            <!-- Theme Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="theme-grid">
                @foreach ($templates as $template)
                    @php
                        $category = $template->category ?? '';
                        $stack = $template->stack ?? '';

                        $thumbnailUrl = '';
                        if (!empty($template->thumbnail_image)) {
                            $thumbnailUrl = str_starts_with($template->thumbnail_image, 'https://')
                                ? $template->thumbnail_image
                                : asset('storage/' . $template->thumbnail_image);
                        }

                        $price = (int) ($template->price ?? 0);
                        $finalPrice = (int) ($template->final_price ?? ($template->price ?? 0));
                        $hasDiscount =
                            !empty($template->discount_percentage) && (int) $template->discount_percentage > 0;

                        $formattedPrice = 'Rp' . number_format($price, 0, ',', '.');
                        $formattedFinalPrice = 'Rp' . number_format($finalPrice, 0, ',', '.');
                    @endphp

                    <div class="theme-card group bg-white rounded-2xl overflow-hidden border border-slate-200 hover:border-primary hover:shadow-xl transition-all duration-300"
                        data-category="{{ $category }}">
                        <!-- Image Area -->
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            @if (!empty($thumbnailUrl))
                                <img src="{{ $thumbnailUrl }}" alt="{{ $template->name }}"
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500"
                                    loading="lazy" />
                            @else
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">
                                    No Image
                                </div>
                            @endif

                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3">
                                @if (!empty($template->preview_url))
                                    <a href="{{ $template->preview_url }}" target="_blank" rel="noopener noreferrer"
                                        class="px-4 py-2 bg-white text-slate-900 rounded-lg font-bold text-sm hover:bg-slate-100">
                                        Preview
                                    </a>
                                @else
                                    <button disabled
                                        class="px-4 py-2 bg-white/10 text-slate-200 rounded-lg font-bold text-sm opacity-50 cursor-not-allowed">
                                        Preview
                                    </button>
                                @endif

                                <a href="{{ route('templates.show', $template->slug) }}"
                                    class="px-4 py-2 bg-primary text-white rounded-lg font-bold text-sm hover:bg-indigo-700">
                                    Details
                                </a>
                            </div>

                            @if ($hasDiscount)
                                <span
                                    class="absolute top-4 left-4 bg-emerald-500/90 text-white text-xs font-bold px-2 py-1 rounded">
                                    Diskon {{ (int) $template->discount_percentage }}%
                                </span>
                            @endif
                        </div>

                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <a href="{{ route('templates.show', $template->slug) }}"
                                    class="text-lg font-bold text-slate-900 group-hover:text-primary transition-colors">
                                    {{ $template->name }}
                                </a>

                                <div class="text-right">
                                    @if ($hasDiscount)
                                        <div class="text-xs text-slate-400 line-through">{{ $formattedPrice }}</div>
                                    @endif
                                    <div class="font-bold text-green-600">
                                        {{ $finalPrice == 0 ? 'Free' : $formattedFinalPrice }}</div>
                                </div>
                            </div>

                            <p class="text-slate-500 text-sm mb-4 line-clamp-2">{{ $template->short_description }}</p>

                            <div class="flex flex-wrap gap-2 mb-6">
                                @if (!empty($category))
                                    <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded">
                                        {{ $category }}
                                    </span>
                                @endif
                                @if (!empty($stack))
                                    <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded">
                                        {{ $stack }}
                                    </span>
                                @endif
                            </div>

                            <div class="flex items-center justify-between border-t border-slate-100 pt-4">
                                <div class="flex items-center gap-2 text-slate-500 text-xs">
                                    <i class="fa-solid fa-cart-shopping text-slate-400"></i>
                                    <span>Terjual {{ (int) ($template->sales_count ?? 0) }}x</span>
                                </div>

                                <a href="{{ route('templates.show', $template->slug) }}"
                                    class="text-sm font-bold text-slate-900 hover:text-primary">
                                    Beli <i class="fa-solid fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Empty State -->
            <div id="no-results" class="hidden text-center py-20">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                    <i class="fa-solid fa-magnifying-glass text-slate-400 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Tidak ada tema ditemukan</h3>
                <p class="text-slate-500">Coba ubah filter kategori untuk melihat hasil lain.</p>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const cards = document.querySelectorAll('.theme-card');
            const noResults = document.getElementById('no-results');

            filterBtns.forEach((btn) => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach((b) => {
                        b.classList.remove('active', 'bg-primary', 'text-white',
                            'border-primary');
                        b.classList.add('bg-white', 'text-slate-600', 'border-slate-200');
                    });

                    btn.classList.remove('bg-white', 'text-slate-600', 'border-slate-200');
                    btn.classList.add('active', 'bg-primary', 'text-white', 'border-primary');

                    const filterValue = btn.getAttribute('data-filter');
                    let visibleCount = 0;

                    cards.forEach((card) => {
                        const cardCategory = card.getAttribute('data-category');
                        const shouldShow = filterValue === 'all' || cardCategory ===
                            filterValue;

                        if (shouldShow) {
                            card.classList.remove('hidden');
                            card.style.opacity = '0';
                            setTimeout(() => (card.style.opacity = '1'), 50);
                            visibleCount++;
                        } else {
                            card.classList.add('hidden');
                        }
                    });

                    if (visibleCount === 0) {
                        noResults.classList.remove('hidden');
                    } else {
                        noResults.classList.add('hidden');
                    }
                });
            });
        });
    </script>
@endsection
