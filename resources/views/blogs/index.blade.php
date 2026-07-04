@extends('layouts.tailwind')

@push('metadata')
    <!-- SEO Meta Tags untuk Blog Index -->
    <title>Blog Akhritech | Artikel Web Development, Software & Tips Teknologi</title>
    <meta name="description"
        content="Baca artikel terbaru tentang web development, software engineering, dan tips teknologi dari Akhritech. Tingkatkan pengetahuan Anda tentang pengembangan aplikasi dan solusi digital.">
    <meta name="keywords"
        content="blog teknologi, artikel web development, tutorial software, tips programmer, pengembangan web, akhritech blog">
    <meta name="author" content="Akhritech">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="language" content="id">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Blog Akhritech | Artikel Web Development & Teknologi Terkini">
    <meta property="og:description"
        content="Jelajahi artikel terbaru tentang web development, software engineering, dan tips teknologi dari tim ahli Akhritech.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('blogs.index') }}">
    <meta property="og:site_name" content="Akhritech">
    <meta property="og:image" content="{{ asset('images/akhritech-banner.png') }}">
    <meta property="og:image:alt" content="Blog Akhritech - Solusi Web Development dan Software">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Blog Akhritech | Artikel Web Development & Teknologi">
    <meta name="twitter:description"
        content="Artikel terbaru tentang web development, software engineering, dan tips teknologi dari Akhritech.">
    <meta name="twitter:image" content="{{ asset('images/akhritech-banner.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ route('blogs.index') }}">

    <!-- Structured Data - BlogPosting Collection -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'CollectionPage',
        'name' => 'Blog Akhritech',
        'description' => 'Koleksi artikel tentang web development, software engineering, dan tips teknologi',
        'url' => route('blogs.index'),
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Akhritech',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/akhritech-banner.png'),
                'width' => 1200,
                'height' => 630
            ],
        ],
        'mainEntity' => [
            '@type' => 'ItemList',
            'itemListElement' => $blogs->map(function($blog, $index) {
                return [
                    '@type' => 'BlogPosting',
                    '@id' => route('blogs.show', $blog->slug),
                    'position' => $index + 1,
                    'headline' => $blog->title,
                    'description' => $blog->excerpt ?? Str::limit($blog->content, 160),
                    'author' => [
                        '@type' => 'Person',
                        'name' => $blog->author->name ?? 'Akhritech'
                    ],
                    'datePublished' => $blog->published_at?->toIso8601String(),
                    'dateModified' => $blog->updated_at?->toIso8601String(),
                    'articleSection' => $blog->category->name ?? 'Teknologi'
                ];
            })->values()->all()
        ]
    ]) !!}
    </script>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-[#0d7377] to-[#4DB8C4] text-white pt-28 pb-20 overflow-hidden">
        {{-- Decorative circle --}}
        <div class="absolute -top-1/2 -right-[10%] w-[500px] h-[500px] bg-white/10 rounded-full pointer-events-none"></div>

        <div class="container mx-auto px-4 relative z-10 text-center max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-5 tracking-tight">Blog Akhritech</h1>
            <p class="text-lg md:text-xl opacity-95 leading-relaxed">
                Pelajari insight mendalam tentang web development, software engineering, dan teknologi terkini dari tim ahli
                kami. Tingkatkan skill dan pengetahuan Anda bersama kami.
            </p>
        </div>
    </section>

    <!-- Main Blog Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">

            <!-- Featured Blog Post -->
            @if ($blogs->isNotEmpty())
                @php $featuredBlog = $blogs->first(); @endphp
                <div class="mb-16">
                    <div class="bg-gradient-to-br from-[#0d7377] to-[#4DB8C4] rounded-2xl overflow-hidden text-white">
                        <div class="grid grid-cols-1 md:grid-cols-2 items-center">
                            <!-- Featured Image -->
                            <div class="h-64 md:h-full overflow-hidden">
                                <img src="{{ $featuredBlog->image ?? asset('images/blog-default.png') }}"
                                    alt="{{ $featuredBlog->title }}" loading="lazy"
                                    class="w-full h-full object-cover">
                            </div>
                            <!-- Featured Body -->
                            <div class="p-8 md:p-10">
                                @if ($featuredBlog->category)
                                    <span class="inline-block bg-white/20 backdrop-blur-sm text-white text-sm font-semibold px-4 py-2 rounded-full mb-5">
                                        <i class="bi bi-lightning-fill"></i>
                                        {{ $featuredBlog->category->name }}
                                    </span>
                                @endif
                                <h2 class="text-2xl md:text-3xl font-extrabold mb-4 leading-snug">{{ $featuredBlog->title }}</h2>
                                <p class="text-base mb-6 opacity-95 leading-relaxed">
                                    {{ $featuredBlog->excerpt ?? Str::limit($featuredBlog->content, 200) }}
                                </p>
                                <div class="flex flex-wrap gap-4 text-sm opacity-90 mb-6">
                                    @if ($featuredBlog->author)
                                        <span class="flex items-center gap-1.5">
                                            <i class="bi bi-person-circle"></i>
                                            {{ $featuredBlog->author->name }}
                                        </span>
                                    @endif
                                    @if ($featuredBlog->published_at)
                                        <span class="flex items-center gap-1.5">
                                            <i class="bi bi-calendar3"></i>
                                            <time datetime="{{ $featuredBlog->published_at->toIso8601String() }}">
                                                {{ $featuredBlog->published_at->translatedFormat('d M Y') }}
                                            </time>
                                        </span>
                                    @endif
                                </div>
                                <a href="{{ route('blogs.show', $featuredBlog->slug) }}"
                                    class="inline-block bg-white text-[#0d7377] font-semibold px-7 py-3 rounded-lg transition-all duration-300 hover:translate-x-1 hover:shadow-[0_8px_16px_rgba(0,0,0,0.2)] no-underline">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Section Title -->
            <div class="mb-10">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-3 relative inline-block
                    after:absolute after:bottom-[-8px] after:left-0 after:w-16 after:h-1 after:bg-gradient-to-r after:from-[#0d7377] after:to-[#4DB8C4] after:rounded-full">
                    Semua Artikel
                </h2>
                <p class="text-slate-400 mt-4">Koleksi lengkap artikel terbaru dan tutorial dari tim kami</p>
            </div>

            <!-- Blog Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($blogs as $index => $blog)
                    @if ($index === 0)
                        @continue
                    @endif
                    <article class="group bg-white rounded-2xl overflow-hidden shadow-[0_2px_12px_rgba(0,0,0,0.08)] hover:shadow-[0_12px_24px_rgba(0,0,0,0.15)] transition-all duration-300 hover:-translate-y-2 flex flex-col h-full">

                        <!-- Blog Image -->
                        <div class="relative overflow-hidden h-60 bg-gradient-to-br from-slate-100 to-slate-200">
                            <a href="{{ route('blogs.show', $blog->slug) }}" title="{{ $blog->title }}">
                                <img src="{{ asset($blog->image ?? 'images/blog-default.png') }}"
                                    alt="{{ $blog->title }}" loading="lazy" width="400" height="240"
                                    class="w-full h-full object-cover transition-transform duration-400 group-hover:scale-[1.08]">
                            </a>
                            @if ($blog->category)
                                <span class="absolute top-3 left-3 bg-[#0d7377]/95 backdrop-blur-sm text-white text-xs font-semibold uppercase tracking-wide px-3.5 py-1.5 rounded-full">
                                    {{ $blog->category->name }}
                                </span>
                            @endif
                            @php
                                $wordCount = str_word_count(strip_tags($blog->content));
                                $readingTime = ceil($wordCount / 200);
                            @endphp
                            <span class="absolute top-3 right-3 bg-emerald-700/95 backdrop-blur-sm text-white text-[0.7rem] font-semibold px-2.5 py-1 rounded-full">
                                {{ $readingTime }} min read
                            </span>
                        </div>

                        <!-- Blog Body -->
                        <div class="p-7 flex flex-col flex-1">
                            <!-- Title -->
                            <h2 class="text-xl font-bold text-slate-900 mb-3 leading-snug">
                                <a href="{{ route('blogs.show', $blog->slug) }}" title="{{ $blog->title }}"
                                    class="text-inherit no-underline hover:text-[#0d7377] transition-colors duration-300">
                                    {{ $blog->title }}
                                </a>
                            </h2>

                            <!-- Excerpt -->
                            <p class="text-slate-500 text-sm leading-relaxed mb-4 flex-1">
                                {{ $blog->excerpt ?? Str::limit($blog->content, 120) }}
                            </p>

                            <!-- Meta -->
                            <div class="flex flex-wrap items-center gap-4 py-4 border-y border-slate-100 mb-4 text-sm text-slate-400">
                                @if ($blog->author)
                                    <div class="flex items-center gap-1.5">
                                        <i class="bi bi-person-circle text-[#0d7377]"></i>
                                        <span>{{ $blog->author->name }}</span>
                                    </div>
                                @endif
                                @if ($blog->published_at)
                                    <div class="flex items-center gap-1.5">
                                        <i class="bi bi-calendar3 text-[#0d7377]"></i>
                                        <time datetime="{{ $blog->published_at->toIso8601String() }}">
                                            {{ $blog->published_at->translatedFormat('d M') }}
                                        </time>
                                    </div>
                                @endif
                            </div>

                            <!-- Read More -->
                            <div>
                                <a href="{{ route('blogs.show', $blog->slug) }}"
                                    aria-label="Baca selengkapnya: {{ $blog->title }}"
                                    class="inline-flex items-center gap-1.5 text-[#0d7377] hover:text-[#4DB8C4] font-semibold text-sm no-underline transition-all duration-300 hover:translate-x-1">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Empty State -->
            @if ($blogs->isEmpty())
                <div class="py-20 text-center">
                    <div class="text-6xl text-slate-200 mb-5">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-700 mb-3">Belum ada artikel</h2>
                    <p class="text-slate-400">Kami sedang menyiapkan artikel menarik dan bermanfaat untuk Anda.<br>Segera kembali lagi!</p>
                </div>
            @endif
        </div>
    </section>
@endsection
