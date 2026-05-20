@extends('layouts.app')

@push('styles')
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}" />
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #0d7377 0%, #4DB8C4 100%);
            --primary-color: #0d7377;
            --secondary-color: #4DB8C4;
        }

        .article-header {
            background: var(--primary-gradient);
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
        }

        .article-category {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(4px);
        }

        .article-featured-image {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .article-content h2 {
            border-bottom: 3px solid var(--primary-color);
        }

        .article-content blockquote {
            border-left: 4px solid var(--primary-color);
        }

        .article-share {
            border-left: 4px solid var(--primary-color);
        }

        .author-box {
            background: linear-gradient(135deg, rgba(13, 115, 119, 0.1) 0%, rgba(77, 184, 196, 0.1) 100%);
            border: 1px solid var(--primary-color);
        }

        .author-avatar {
            background: var(--primary-gradient);
            width: 80px;
            height: 80px;
        }

        .related-card {
            transition: all 0.3s ease;
        }

        .related-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12) !important;
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

        .related-card-link {
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .related-card-link:hover {
            color: var(--secondary-color);
            transform: translateX(4px);
        }

        .blog-cta {
            background: var(--primary-gradient);
        }

        .cta-button {
            background: white;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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
    <meta property="og:url" content="{{ route('blogs.show', $blog->slug) }}">
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
    <link rel="canonical" href="{{ route('blogs.show', $blog->slug) }}">

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
    <header class="article-header text-white py-5 mt-5 mb-5">
        <div class="container">
            <div class="article-header-content mx-auto" style="max-width: 900px;">
                <!-- Breadcrumb -->
                <nav class="article-breadcrumb mb-3" aria-label="Breadcrumb">
                    <a href="{{ route('home') ?? url('/') }}"
                        class="text-white text-decoration-none opacity-75">Beranda</a>
                    <span class="separator mx-2">→</span>
                    <a href="{{ route('blogs.index') }}" class="text-white text-decoration-none opacity-75">Blog</a>
                    <span class="separator mx-2">→</span>
                    <span class="text-white-50">{{ $blog->title }}</span>
                </nav>

                <!-- Category Badge -->
                @if ($blog->category)
                    <div class="badge article-category text-white mb-3">
                        <i class="bi bi-tag-fill"></i>
                        {{ $blog->category->name }}
                    </div>
                @endif

                <!-- Article Title -->
                <h1 class="display-4 fw-bold mb-4 lh-1">{{ $blog->title }}</h1>

                <!-- Article Meta -->
                <div
                    class="article-meta d-flex flex-wrap align-items-center gap-3 pt-3 border-top border-white border-opacity-25">
                    @if ($blog->author)
                        <div class="meta-item d-flex align-items-center gap-2">
                            <i class="bi bi-person-circle"></i>
                            <span>{{ $blog->author->name }}</span>
                        </div>
                    @endif

                    @if ($blog->published_at)
                        <div class="meta-item d-flex align-items-center gap-2">
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
                    <div class="meta-item d-flex align-items-center gap-2">
                        <i class="bi bi-clock"></i>
                        <span>{{ $readingTime }} menit baca</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Article Content -->
    <article class="blog-article">
        <div class="container">
            <div class="article-content mx-auto" style="max-width: 850px;">
                <!-- Featured Image -->
                @if ($blog->image)
                    <figure class="mb-5">
                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"
                            class="article-featured-image img-fluid rounded" loading="lazy">
                    </figure>
                @endif

                <!-- Main Content -->
                <div class="lh-lg" style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                    {!! $blog->content !!}
                </div>

                <!-- Social Share Section -->
                <div class="article-share bg-light rounded p-4 my-5">
                    <h5 class="fw-bold mb-3 text-dark">
                        <i class="bi bi-share"></i> Bagikan Artikel Ini
                    </h5>
                    <div class="share-buttons d-flex gap-2 flex-wrap">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('blogs.show', $blog->slug) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="share-button share-facebook text-white d-inline-flex align-items-center justify-content-center rounded-circle"
                            style="width: 40px; height: 40px;" title="Bagikan ke Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ route('blogs.show', $blog->slug) }}&text={{ urlencode($blog->title) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="share-button share-twitter text-white d-inline-flex align-items-center justify-content-center rounded-circle"
                            style="width: 40px; height: 40px;" title="Bagikan ke Twitter">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . route('blogs.show', $blog->slug)) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="share-button share-whatsapp text-white d-inline-flex align-items-center justify-content-center rounded-circle"
                            style="width: 40px; height: 40px;" title="Bagikan ke WhatsApp">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('blogs.show', $blog->slug) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="share-button share-linkedin text-white d-inline-flex align-items-center justify-content-center rounded-circle"
                            style="width: 40px; height: 40px;" title="Bagikan ke LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <button
                            class="share-button share-copy text-white d-inline-flex align-items-center justify-content-center rounded-circle border-0"
                            style="width: 40px; height: 40px; cursor: pointer;" onclick="copyToClipboard()"
                            title="Salin Link">
                            <i class="bi bi-link-45deg"></i>
                        </button>
                    </div>
                </div>

                <!-- Author Box -->
                @if ($blog->author)
                    <div class="author-box rounded p-4 my-5">
                        <div class="author-info d-flex gap-3 align-items-start">
                            <div
                                class="author-avatar rounded-circle d-flex align-items-center justify-content-center text-white fs-3 flex-shrink-0">
                                {{ strtoupper(substr($blog->author->name, 0, 1)) }}
                            </div>
                            <div class="author-details">
                                <h5 class="fw-bold mb-2 text-dark">
                                    Tentang {{ $blog->author->name }}
                                    <span class="text-muted d-block fw-normal mt-1"
                                        style="font-size: 0.8rem;">{{ $blog->author->position ?? 'Penulis' }} di
                                        Akhritech.</span>
                                </h5>
                                <p class="mb-0 text-muted">
                                    {{ $blog->author->about ?? 'Berpengalaman dalam mengembangkan solusi digital inovatif untuk berbagai industri.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
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
        <section class="container my-5">
            <div class="related-articles mx-auto" style="max-width: 850px;">
                <h3 class="display-6 fw-bold mb-5 text-dark border-bottom pb-3">Artikel Terkait</h3>
                <div class="row g-4">
                    @foreach ($relatedArticles as $related)
                        <div class="col-md-6 col-lg-4">
                            <div class="card related-card h-100 border-0">
                                <div class="related-card-image position-relative overflow-hidden">
                                    <a href="{{ route('blogs.show', $related->id) }}" class="text-decoration-none">
                                        <img src="{{ asset($related->image ?? 'images/blog-default.png') }}"
                                            alt="{{ $related->title }}" class="img-fluid" loading="lazy">
                                    </a>
                                </div>
                                <div class="card-body related-card-body">
                                    <h6 class="card-title fw-bold mb-3">
                                        <a href="{{ route('blogs.show', $related->slug) }}"
                                            class="text-decoration-none text-dark">
                                            {{ $related->title }}
                                        </a>
                                    </h6>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit($related->excerpt ?? $related->content, 80) }}</p>
                                    <a href="{{ route('blogs.show', $related->slug) }}"
                                        class="related-card-link fw-semibold text-decoration-none">
                                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- CTA Section -->
                <div class="blog-cta text-white text-center rounded py-5 my-5 mx-auto">
                    <div class="container">
                        <h4 class="h2 fw-bold mb-3">Tertarik Mengembangkan Solusi Digital Anda?</h4>
                        <p class="lead mb-4 opacity-75">
                            Tim ahli kami siap membantu mewujudkan visi teknologi bisnis Anda dengan solusi yang inovatif
                            dan
                            terpercaya.
                        </p>
                        <a href="{{ config('app.superadmin_wa') ? 'https://wa.me/' . config('app.superadmin_wa') . '?text=Halo%20Akhritech%2C%20saya%20tertarik%20konsultasi%20pembuatan%20website%20bisnis.' : '#' }}"
                            target="_blank" class="cta-button btn px-4 py-2 fw-semibold text-decoration-none">
                            Konsultasi Gratis <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection


<script>
    function copyToClipboard() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            const btn = event.target.closest('button');
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-check-circle"></i>';
            setTimeout(() => {
                btn.innerHTML = originalHTML;
            }, 2000);
        }).catch(() => {
            alert('Gagal menyalin link');
        });
    }
</script>
