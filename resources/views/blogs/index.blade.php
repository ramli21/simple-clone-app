@extends('layouts.app')

@push('styles')
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}" />
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --success-color: #198754;
            --border-radius: 12px;
        }

        /* Hero Section */
        .blog-hero {
            background: linear-gradient(135deg, #0d7377 0%, #4DB8C4 100%);
            color: white;
            padding: 80px 20px;
            margin-top: 80px;
            position: relative;
            overflow: hidden;
        }

        .blog-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .blog-hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .blog-hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -1px;
        }

        .blog-hero-subtitle {
            font-size: 1.2rem;
            opacity: 0.95;
            line-height: 1.6;
        }

        /* Blog Card Styling */
        .blog-card {
            border: none;
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            background: #fff;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        .blog-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .blog-card-image {
            position: relative;
            overflow: hidden;
            height: 240px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .blog-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .blog-card:hover .blog-card-image img {
            transform: scale(1.08);
        }

        .blog-card-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(13, 115, 119, 0.95);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            backdrop-filter: blur(4px);
        }

        .blog-card-reading-time {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(25, 135, 84, 0.95);
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            backdrop-filter: blur(4px);
        }

        .blog-card-body {
            padding: 28px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .blog-card-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 12px;
            line-height: 1.4;
            transition: color 0.3s ease;
        }

        .blog-card-title a {
            color: inherit;
            text-decoration: none;
        }

        .blog-card-title a:hover {
            color: #0d7377;
        }

        .blog-card-excerpt {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 16px;
            line-height: 1.6;
            flex: 1;
        }

        .blog-card-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 0;
            border-top: 1px solid #f0f0f0;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 16px;
            font-size: 0.85rem;
            color: #888;
        }

        .blog-card-meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .blog-card-meta i {
            color: #0d7377;
            font-size: 1rem;
        }

        .blog-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .blog-card-footer a {
            color: #0d7377;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .blog-card-footer a:hover {
            color: #4DB8C4;
            transform: translateX(4px);
        }

        /* Featured Blog Section */
        .featured-blog-section {
            margin-bottom: 60px;
        }

        .featured-blog {
            background: linear-gradient(135deg, #0d7377 0%, #4DB8C4 100%);
            border-radius: var(--border-radius);
            overflow: hidden;
            color: white;
            padding: 0;
        }

        .featured-blog-content {
            display: grid;
            grid-Produk-columns: 1fr 1fr;
            gap: 0;
            align-items: center;
        }

        .featured-blog-image {
            height: 100%;
            overflow: hidden;
        }

        .featured-blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .featured-blog-body {
            padding: 40px;
        }

        .featured-blog-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 20px;
            backdrop-filter: blur(4px);
        }

        .featured-blog-body h2 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 16px;
            line-height: 1.3;
        }

        .featured-blog-body p {
            font-size: 1rem;
            margin-bottom: 24px;
            opacity: 0.95;
            line-height: 1.6;
        }

        .featured-blog-button {
            display: inline-block;
            background: white;
            color: #0d7377;
            padding: 12px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .featured-blog-button:hover {
            transform: translateX(4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .featured-blog-content {
                grid-Produk-columns: 1fr;
            }

            .featured-blog-image {
                height: 250px;
            }

            .featured-blog-body {
                padding: 30px;
            }

            .featured-blog-body h2 {
                font-size: 1.5rem;
            }

            .blog-hero h1 {
                font-size: 2rem;
            }

            .blog-hero-subtitle {
                font-size: 1rem;
            }
        }

        /* Section Title */
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 12px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #0d7377 0%, #4DB8C4 100%);
            border-radius: 2px;
        }

        .section-subtitle {
            color: #888;
            font-size: 1rem;
            margin-bottom: 30px;
        }

        /* Empty State */
        .empty-state {
            padding: 80px 20px;
            text-align: center;
        }

        .empty-state-icon {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-state h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #888;
            margin-bottom: 30px;
        }
    </style>
@endpush

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
        content="Jelajahi artikel terbaru tentang web development, software engineering, dan tips teknologi dari tim ahli Akhritech. Pelajari best practices dan inovasi terkini.">
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
            'sameAs' => [
                'https://www.facebook.com/akhritech',
                'https://www.twitter.com/akhritech',
                'https://www.instagram.com/akhritech'
            ]
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
                    'image' => [
                        '@type' => 'ImageObject',
                        'url' => asset($blog->image ?? 'images/blog-default.png'),
                        'width' => 800,
                        'height' => 600
                    ],
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
    <section class="blog-hero">
        <div class="blog-hero-content">
            <h1>Blog Akhritech</h1>
            <p class="blog-hero-subtitle">
                Pelajari insight mendalam tentang web development, software engineering, dan teknologi terkini dari tim ahli
                kami. Tingkatkan skill dan pengetahuan Anda bersama kami.
            </p>
        </div>
    </section>

    <!-- Main Blog Section -->
    <section class="py-5">
        <div class="container">
            <!-- Featured Blog Post (jika ada) -->
            @if ($blogs->isNotEmpty())
                @php $featuredBlog = $blogs->first(); @endphp
                <div class="featured-blog-section">
                    <div class="featured-blog">
                        <div class="featured-blog-content">
                            <div class="featured-blog-image">
                                <img src="{{ $featuredBlog->image ?? asset('images/blog-default.png') }}"
                                    alt="{{ $featuredBlog->title }}" loading="lazy">
                            </div>
                            <div class="featured-blog-body">
                                @if ($featuredBlog->category)
                                    <span class="featured-blog-badge">
                                        <i class="bi bi-lightning-fill"></i>
                                        {{ $featuredBlog->category->name }}
                                    </span>
                                @endif
                                <h2>{{ $featuredBlog->title }}</h2>
                                <p>{{ $featuredBlog->excerpt ?? Str::limit($featuredBlog->content, 200) }}</p>
                                <div class="small mb-3" style="opacity: 0.9;">
                                    @if ($featuredBlog->author)
                                        <span class="me-3">
                                            <i class="bi bi-person-circle"></i>
                                            {{ $featuredBlog->author->name }}
                                        </span>
                                    @endif
                                    @if ($featuredBlog->published_at)
                                        <span>
                                            <i class="bi bi-calendar3"></i>
                                            <time datetime="{{ $featuredBlog->published_at->toIso8601String() }}">
                                                {{ $featuredBlog->published_at->translatedFormat('d M Y') }}
                                            </time>
                                        </span>
                                    @endif
                                </div>
                                <a href="{{ route('blogs.show', $featuredBlog->slug) }}" class="featured-blog-button">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Section Title -->
            <div class="mb-5">
                <h2 class="section-title">Semua Artikel</h2>
                <p class="section-subtitle">Koleksi lengkap artikel terbaru dan tutorial dari tim kami</p>
            </div>

            <!-- Blog Cards Grid -->
            <div class="row g-4">
                @foreach ($blogs as $index => $blog)
                    @if ($index === 0)
                        @continue
                    @endif
                    <article class="col-lg-4 col-md-6">
                        <div class="blog-card">
                            <!-- Blog Image with Badges -->
                            <div class="blog-card-image">
                                <a href="{{ route('blogs.show', $blog->slug) }}" title="{{ $blog->title }}">
                                    <img src="{{ asset($blog->image ?? 'images/blog-default.png') }}"
                                        alt="{{ $blog->title }}" loading="lazy" width="400" height="240">
                                </a>
                                @if ($blog->category)
                                    <span class="blog-card-badge">{{ $blog->category->name }}</span>
                                @endif
                                @php
                                    $wordCount = str_word_count(strip_tags($blog->content));
                                    $readingTime = ceil($wordCount / 200);
                                @endphp
                                <span class="blog-card-reading-time">{{ $readingTime }} min read</span>
                            </div>

                            <div class="blog-card-body">
                                <!-- Blog Title -->
                                <h2 class="blog-card-title">
                                    <a href="{{ route('blogs.show', $blog->slug) }}" title="{{ $blog->title }}">
                                        {{ $blog->title }}
                                    </a>
                                </h2>

                                <!-- Excerpt / Description -->
                                <p class="blog-card-excerpt">
                                    {{ $blog->excerpt ?? Str::limit($blog->content, 120) }}
                                </p>

                                <!-- Meta Information -->
                                <div class="blog-card-meta">
                                    @if ($blog->author)
                                        <div class="blog-card-meta-item">
                                            <i class="bi bi-person-circle"></i>
                                            <span>{{ $blog->author->name }}</span>
                                        </div>
                                    @endif
                                    @if ($blog->published_at)
                                        <div class="blog-card-meta-item">
                                            <i class="bi bi-calendar3"></i>
                                            <time datetime="{{ $blog->published_at->toIso8601String() }}">
                                                {{ $blog->published_at->translatedFormat('d M') }}
                                            </time>
                                        </div>
                                    @endif
                                </div>

                                <!-- Read More Button -->
                                <div class="blog-card-footer">
                                    <a href="{{ route('blogs.show', $blog->slug) }}"
                                        aria-label="Baca selengkapnya: {{ $blog->title }}">
                                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Empty State Message -->
            @if ($blogs->isEmpty())
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <h2>Belum ada artikel</h2>
                    <p>Kami sedang menyiapkan artikel menarik dan bermanfaat untuk Anda.<br>Segera kembali lagi!</p>
                </div>
            @endif
        </div>
    </section>
@endsection
