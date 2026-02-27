@extends('layouts.app')

@push('styles')
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}" />
    <style>
        /* Blog Article Styles */
        .blog-article {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #333;
        }

        .article-header {
            background: linear-gradient(135deg, #0d7377 0%, #4DB8C4 100%);
            color: white;
            padding: 60px 20px;
            margin-top: 80px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .article-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .article-header-content {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
        }

        .article-breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .article-breadcrumb a {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .article-breadcrumb a:hover {
            opacity: 0.7;
        }

        .article-breadcrumb .separator {
            opacity: 0.6;
        }

        .article-category {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 16px;
            backdrop-filter: blur(4px);
        }

        .article-header h1 {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .article-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 24px;
            font-size: 0.95rem;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .article-content {
            max-width: 850px;
            margin: 0 auto 60px;
        }

        .article-content h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 40px 0 20px;
            color: #1a1a1a;
            border-bottom: 3px solid #0d7377;
            padding-bottom: 12px;
        }

        .article-content h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin: 30px 0 15px;
            color: #1a1a1a;
        }

        .article-content p {
            margin-bottom: 20px;
            text-align: justify;
        }

        .article-content ul,
        .article-content ol {
            margin-bottom: 20px;
            padding-left: 30px;
        }

        .article-content li {
            margin-bottom: 10px;
        }

        .article-content img {
            max-width: 100%;
            height: auto;
            margin: 30px 0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .article-content blockquote {
            border-left: 4px solid #0d7377;
            padding: 20px;
            background: #f5f5f5;
            margin: 30px 0;
            border-radius: 4px;
            font-style: italic;
            color: #555;
        }

        .article-content code {
            background: #f5f5f5;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            color: #d63384;
        }

        .article-content pre {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 20px;
            border-radius: 8px;
            overflow-x: auto;
            margin: 20px 0;
        }

        /* Featured Image */
        .article-featured-image {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            margin-bottom: 40px;
        }

        /* Social Share */
        .article-share {
            background: #f9f9f9;
            padding: 24px;
            border-radius: 12px;
            margin: 40px 0;
            border-left: 4px solid #0d7377;
        }

        .article-share h4 {
            margin-bottom: 16px;
            font-weight: 700;
            color: #1a1a1a;
        }

        .share-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .share-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s ease;
            color: white;
            font-size: 1rem;
        }

        .share-facebook {
            background: #1877F2;
        }

        .share-facebook:hover {
            background: #0a66c2;
            transform: translateY(-2px);
        }

        .share-twitter {
            background: #1DA1F2;
        }

        .share-twitter:hover {
            background: #1a8cd8;
            transform: translateY(-2px);
        }

        .share-whatsapp {
            background: #25D366;
        }

        .share-whatsapp:hover {
            background: #1fa854;
            transform: translateY(-2px);
        }

        .share-linkedin {
            background: #0A66C2;
        }

        .share-linkedin:hover {
            background: #084b9f;
            transform: translateY(-2px);
        }

        .share-copy {
            background: #888;
        }

        .share-copy:hover {
            background: #666;
            transform: translateY(-2px);
        }

        /* Author Box */
        .author-box {
            background: linear-gradient(135deg, rgba(13, 115, 119, 0.1) 0%, rgba(77, 184, 196, 0.1) 100%);
            padding: 24px;
            border-radius: 12px;
            margin: 40px 0;
            border: 1px solid #0d7377;
        }

        .author-info {
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }

        .author-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0d7377 0%, #4DB8C4 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            flex-shrink: 0;
        }

        .author-details h4 {
            margin: 0 0 4px;
            color: #1a1a1a;
            font-weight: 700;
        }

        .author-details p {
            margin: 0;
            color: #666;
            font-size: 0.95rem;
        }

        /* Related Articles */
        .related-articles {
            margin-top: 60px;
            padding-top: 40px;
            border-top: 2px solid #eee;
        }

        .related-articles h3 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 30px;
            color: #1a1a1a;
        }

        .related-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .related-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .related-card-image {
            height: 200px;
            overflow: hidden;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .related-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .related-card:hover .related-card-image img {
            transform: scale(1.05);
        }

        .related-card-body {
            padding: 20px;
        }

        .related-card-body h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: #1a1a1a;
            line-height: 1.4;
        }

        .related-card-body p {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 16px;
            line-height: 1.5;
        }

        .related-card-link {
            color: #0d7377;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .related-card-link:hover {
            color: #4DB8C4;
            transform: translateX(4px);
        }

        /* CTA Section */
        .blog-cta {
            background: linear-gradient(135deg, #0d7377 0%, #4DB8C4 100%);
            color: white;
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            margin-top: 60px;
        }

        .blog-cta h3 {
            color: white;
            margin-bottom: 16px;
        }

        .blog-cta p {
            margin-bottom: 24px;
            opacity: 0.95;
        }

        .cta-button {
            display: inline-block;
            background: white;
            color: #0d7377;
            padding: 12px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .article-header {
                padding: 40px 20px;
            }

            .article-header h1 {
                font-size: 1.8rem;
            }

            .article-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .article-content h2 {
                font-size: 1.4rem;
            }

            .author-info {
                flex-direction: column;
            }

            .author-avatar {
                margin: 0 auto;
            }
        }
    </style>
@endpush

@push('metadata')
    <!-- SEO Meta Tags untuk Blog Detail -->
    <title>{{ $blog->title }} | Blog Akhritech</title>
    <meta name="description" content="{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta name="keywords"
        content="{{ $blog->category->name ?? 'Teknologi' }}, {{ implode(', ', explode(' ', $blog->title)) }}, blog, artikel">
    <meta name="author" content="{{ $blog->author->name ?? 'Akhritech' }}">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="language" content="id">
    <meta name="article:published_time" content="{{ $blog->published_at?->toIso8601String() }}">
    <meta name="article:modified_time" content="{{ $blog->updated_at?->toIso8601String() }}">
    <meta name="article:author" content="{{ $blog->author->name ?? 'Akhritech' }}">
    @if ($blog->category)
        <meta name="article:section" content="{{ $blog->category->name }}">
    @endif

    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('blogs.show', $blog->id) }}">
    <meta property="og:site_name" content="Akhritech">
    <meta property="og:image" content="{{ asset($blog->image ?? 'images/blog-default.png') }}">
    <meta property="og:image:alt" content="{{ $blog->title }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->title }}">
    <meta name="twitter:description" content="{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta name="twitter:image" content="{{ asset($blog->image ?? 'images/blog-default.png') }}">
    <meta name="twitter:image:alt" content="{{ $blog->title }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ route('blogs.show', $blog->id) }}">

    <!-- Structured Data - BlogPosting -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $blog->title,
        'description' => $blog->excerpt ?? Str::limit(strip_tags($blog->content), 160),
        'image' => asset($blog->image ?? 'images/blog-default.png'),
        'datePublished' => $blog->published_at?->toIso8601String(),
        'dateModified' => $blog->updated_at?->toIso8601String(),
        'author' => [
            '@type' => 'Person',
            'name' => $blog->author->name ?? 'Akhritech'
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Akhritech',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/akhritech-banner.png')
            ]
        ],
        'mainEntity' => [
            '@type' => 'Article',
            'headline' => $blog->title,
            'articleBody' => strip_tags($blog->content),
            'articleSection' => $blog->category->name ?? 'Teknologi'
        ]
    ]) !!}
    </script>


@endpush

@section('content')
    <!-- Article Header -->
    <header class="article-header">
        <div class="article-header-content">
            <!-- Breadcrumb -->
            <nav class="article-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') ?? url('/') }}">Beranda</a>
                <span class="separator">→</span>
                <a href="{{ route('blogs.index') }}">Blog</a>
                <span class="separator">→</span>
                <span>{{ $blog->title }}</span>
            </nav>

            <!-- Category Badge -->
            @if ($blog->category)
                <div class="article-category">
                    <i class="bi bi-tag-fill"></i>
                    {{ $blog->category->name }}
                </div>
            @endif

            <!-- Article Title -->
            <h1>{{ $blog->title }}</h1>

            <!-- Article Meta -->
            <div class="article-meta">
                @if ($blog->author)
                    <div class="meta-item">
                        <i class="bi bi-person-circle"></i>
                        <span>{{ $blog->author->name }}</span>
                    </div>
                @endif

                @if ($blog->published_at)
                    <div class="meta-item">
                        <i class="bi bi-calendar3"></i>
                        <time datetime="{{ $blog->published_at->toIso8601String() }}">
                            {{ $blog->published_at->translatedFormat('d F Y') }}
                        </time>
                    </div>
                @endif

                @php
                    $wordCount = str_word_count(strip_tags($blog->content));
                    $readingTime = ceil($wordCount / 200);
                @endphp
                <div class="meta-item">
                    <i class="bi bi-clock"></i>
                    <span>{{ $readingTime }} menit baca</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Article Content -->
    <article class="article-content blog-article">
        <!-- Featured Image -->
        @if ($blog->image)
            <figure>
                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="article-featured-image"
                    loading="lazy">
            </figure>
        @endif

        <!-- Main Content -->
        {!! $blog->content !!}

        <!-- Social Share Section -->
        <div class="article-share">
            <h4><i class="bi bi-share"></i> Bagikan Artikel Ini</h4>
            <div class="share-buttons">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('blogs.show', $blog->id) }}" target="_blank"
                    rel="noopener noreferrer" class="share-button share-facebook" title="Bagikan ke Facebook">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ route('blogs.show', $blog->id) }}&text={{ urlencode($blog->title) }}"
                    target="_blank" rel="noopener noreferrer" class="share-button share-twitter" title="Bagikan ke Twitter">
                    <i class="bi bi-twitter"></i>
                </a>
                <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . route('blogs.show', $blog->id)) }}"
                    target="_blank" rel="noopener noreferrer" class="share-button share-whatsapp"
                    title="Bagikan ke WhatsApp">
                    <i class="bi bi-whatsapp"></i>
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('blogs.show', $blog->id) }}"
                    target="_blank" rel="noopener noreferrer" class="share-button share-linkedin"
                    title="Bagikan ke LinkedIn">
                    <i class="bi bi-linkedin"></i>
                </a>
                <button class="share-button share-copy" onclick="copyToClipboard()" title="Salin Link">
                    <i class="bi bi-link-45deg"></i>
                </button>
            </div>
        </div>

        <!-- Author Box -->
        @if ($blog->author)
            <div class="author-box">
                <div class="author-info">
                    <div class="author-avatar">
                        {{ strtoupper(substr($blog->author->name, 0, 1)) }}
                    </div>
                    <div class="author-details">
                        <h4>Tentang {{ $blog->author->name }}</h4>
                        <p>Bagian dari tim ahli Akhritech yang berdedikasi untuk berbagi pengetahuan dan insight terbaru
                            tentang teknologi, web development, dan software engineering.</p>
                    </div>
                </div>
            </div>
        @endif
    </article>

    <!-- Related Articles -->
    @php
        $relatedArticles = \App\Models\Blog::published()
            ->where('id', '!=', $blog->id)
            ->when($blog->category, fn($q) => $q->where('category_id', $blog->category_id))
            ->limit(3)
            ->get();
    @endphp

    @if ($relatedArticles->isNotEmpty())
        <section class="related-articles">
            <h3>Artikel Terkait</h3>
            <div class="row g-4">
                @foreach ($relatedArticles as $related)
                    <div class="col-md-4">
                        <div class="related-card">
                            <div class="related-card-image">
                                <a href="{{ route('blogs.show', $related->id) }}">
                                    <img src="{{ asset($related->image ?? 'images/blog-default.png') }}"
                                        alt="{{ $related->title }}" loading="lazy">
                                </a>
                            </div>
                            <div class="related-card-body">
                                <h4>
                                    <a href="{{ route('blogs.show', $related->id) }}"
                                        class="text-decoration-none text-dark">
                                        {{ $related->title }}
                                    </a>
                                </h4>
                                <p>{{ Str::limit($related->excerpt ?? $related->content, 80) }}</p>
                                <a href="{{ route('blogs.show', $related->id) }}" class="related-card-link">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <div class="blog-cta">
        <h3>Tertarik Mengembangkan Solusi Digital Anda?</h3>
        <p>Tim ahli kami siap membantu mewujudkan visi teknologi bisnis Anda dengan solusi yang inovatif dan terpercaya.</p>
        <a href="{{ config('app.superadmin_wa') ? 'https://wa.me/' . config('app.superadmin_wa') . '?text=Halo%20Akhritech%2C%20saya%20tertarik%20konsultasi%20pembuatan%20website%20bisnis.' : '#' }}"
            target="_blank" class="cta-button">
            Konsultasi Gratis <i class="bi bi-arrow-right"></i>
        </a>
    </div>
@endsection

<script>
    function copyToClipboard() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            alert('Link berhasil disalin ke clipboard!');
        }).catch(() => {
            alert('Gagal menyalin link');
        });
    }
</script>
