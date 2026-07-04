@extends('layouts.tailwind')

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
    <header class="relative bg-gradient-to-br from-[#0d7377] to-[#4DB8C4] text-white pt-28 pb-12 overflow-hidden">
        {{-- Decorative circle --}}
        <div class="absolute -top-1/2 -right-[10%] w-[400px] h-[400px] bg-white/10 rounded-full pointer-events-none"></div>

        <div class="container mx-auto px-4 relative z-10 max-w-4xl">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-sm text-white/75 mb-5" aria-label="Breadcrumb">
                <a href="{{ route('home') ?? url('/') }}" class="hover:text-white transition-colors no-underline text-white/75">Beranda</a>
                <span>→</span>
                <a href="{{ route('blogs.index') }}" class="hover:text-white transition-colors no-underline text-white/75">Blog</a>
                <span>→</span>
                <span class="text-white/50 truncate max-w-xs">{{ $blog->title }}</span>
            </nav>

            <!-- Category Badge -->
            @if ($blog->category)
                <div class="inline-block bg-white/20 backdrop-blur-sm text-white text-sm font-semibold px-4 py-1.5 rounded-full mb-4">
                    <i class="bi bi-tag-fill mr-1"></i>{{ $blog->category->name }}
                </div>
            @endif

            <!-- Title -->
            <h1 class="text-3xl md:text-5xl font-extrabold mb-6 leading-tight">{{ $blog->title }}</h1>

            <!-- Meta -->
            <div class="flex flex-wrap items-center gap-5 pt-4 border-t border-white/25 text-sm">
                @if ($blog->author)
                    <div class="flex items-center gap-2">
                        <i class="bi bi-person-circle"></i>
                        <span>{{ $blog->author->name }}</span>
                    </div>
                @endif
                @if ($blog->published_at)
                    <div class="flex items-center gap-2">
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
                <div class="flex items-center gap-2">
                    <i class="bi bi-clock"></i>
                    <span>{{ $readingTime }} menit baca</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Article Content -->
    <article>
        <div class="container mx-auto px-4">
            <div class="mx-auto max-w-3xl">
                <!-- Featured Image -->
                @if ($blog->image)
                    <figure class="my-10">
                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"
                            class="w-full rounded-2xl shadow-[0_8px_24px_rgba(0,0,0,0.12)]" loading="lazy">
                    </figure>
                @endif

                <!-- Main Content — prose styles for rich content -->
                <div class="prose prose-slate prose-lg max-w-none py-6
                    prose-headings:font-bold prose-headings:text-slate-900
                    prose-h2:border-b-4 prose-h2:border-[#0d7377] prose-h2:pb-2
                    prose-a:text-[#0d7377] prose-a:no-underline hover:prose-a:underline
                    prose-blockquote:border-l-4 prose-blockquote:border-[#0d7377] prose-blockquote:bg-slate-50 prose-blockquote:py-1 prose-blockquote:rounded-r-lg
                    prose-code:bg-slate-100 prose-code:rounded prose-code:px-1.5 prose-code:py-0.5 prose-code:text-[#0d7377]
                    prose-pre:bg-slate-900 prose-pre:text-slate-100 prose-pre:rounded-xl prose-pre:shadow-lg"
                    style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                    {!! $blog->content !!}
                </div>

                <!-- Social Share Section -->
                <div class="border-l-4 border-[#0d7377] bg-slate-50 rounded-r-xl p-6 my-10">
                    <h5 class="font-bold text-slate-800 mb-4 text-base">
                        <i class="bi bi-share mr-2 text-[#0d7377]"></i>Bagikan Artikel Ini
                    </h5>
                    <div class="flex flex-wrap gap-3">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('blogs.show', $blog->slug) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-[#1877F2] hover:bg-[#0a66c2] text-white flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5"
                            title="Bagikan ke Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <!-- Twitter/X -->
                        <a href="https://twitter.com/intent/tweet?url={{ route('blogs.show', $blog->slug) }}&text={{ urlencode($blog->title) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-[#1DA1F2] hover:bg-[#1a8cd8] text-white flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5"
                            title="Bagikan ke Twitter">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <!-- WhatsApp -->
                        <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . route('blogs.show', $blog->slug)) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-[#25D366] hover:bg-[#1fa854] text-white flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5"
                            title="Bagikan ke WhatsApp">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('blogs.show', $blog->slug) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 rounded-full bg-[#0A66C2] hover:bg-[#084b9f] text-white flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5"
                            title="Bagikan ke LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <!-- Copy Link -->
                        <button onclick="copyToClipboard()"
                            class="w-10 h-10 rounded-full bg-slate-500 hover:bg-slate-600 text-white flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 border-0 cursor-pointer"
                            title="Salin Link" id="copy-btn">
                            <i class="bi bi-link-45deg"></i>
                        </button>
                    </div>
                </div>

                <!-- Author Box -->
                @if ($blog->author)
                    <div class="bg-gradient-to-br from-[#0d7377]/10 to-[#4DB8C4]/10 border border-[#0d7377]/30 rounded-2xl p-6 my-10">
                        <div class="flex gap-4 items-start">
                            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-[#0d7377] to-[#4DB8C4] flex items-center justify-center text-white text-3xl font-bold flex-shrink-0">
                                {{ strtoupper(substr($blog->author->name, 0, 1)) }}
                            </div>
                            <div>
                                <h5 class="font-bold text-slate-900 mb-1">
                                    Tentang {{ $blog->author->name }}
                                </h5>
                                <span class="text-xs text-slate-400 block mb-2">
                                    {{ $blog->author->position ?? 'Penulis' }} di Akhritech.
                                </span>
                                <p class="text-slate-500 text-sm mb-0">
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
        <section class="py-16">
            <div class="container mx-auto px-4 max-w-4xl">
                <h3 class="text-3xl font-extrabold text-slate-900 border-b border-slate-200 pb-4 mb-10">Artikel Terkait</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($relatedArticles as $related)
                        <div class="group bg-white rounded-xl shadow-sm hover:shadow-[0_8px_20px_rgba(0,0,0,0.12)] border border-slate-100 overflow-hidden transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
                            <!-- Related Image -->
                            <div class="h-48 overflow-hidden bg-gradient-to-br from-slate-100 to-slate-200">
                                <a href="{{ route('blogs.show', $related->id) }}" class="no-underline block h-full">
                                    <img src="{{ asset($related->image ?? 'images/blog-default.png') }}"
                                        alt="{{ $related->title }}"
                                        class="w-full h-full object-cover transition-transform duration-400 group-hover:scale-[1.05]"
                                        loading="lazy">
                                </a>
                            </div>
                            <!-- Related Body -->
                            <div class="p-5 flex flex-col flex-1">
                                <h6 class="font-bold text-slate-900 mb-2 leading-snug">
                                    <a href="{{ route('blogs.show', $related->slug) }}"
                                        class="no-underline text-slate-900 hover:text-[#0d7377] transition-colors">
                                        {{ $related->title }}
                                    </a>
                                </h6>
                                <p class="text-sm text-slate-400 mb-4 flex-1">
                                    {{ Str::limit($related->excerpt ?? $related->content, 80) }}
                                </p>
                                <a href="{{ route('blogs.show', $related->slug) }}"
                                    class="inline-flex items-center gap-1.5 text-[#0d7377] hover:text-[#4DB8C4] font-semibold text-sm no-underline transition-all duration-300 hover:translate-x-1">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <div class="container mx-auto px-4 pb-16 max-w-4xl">
        <div class="bg-gradient-to-br from-[#0d7377] to-[#4DB8C4] text-white text-center rounded-2xl py-14 px-8">
            <h4 class="text-3xl font-extrabold mb-3">Tertarik Mengembangkan Solusi Digital Anda?</h4>
            <p class="text-lg opacity-75 mb-8 max-w-xl mx-auto">
                Tim ahli kami siap membantu mewujudkan visi teknologi bisnis Anda dengan solusi yang inovatif dan terpercaya.
            </p>
            <a href="{{ config('app.superadmin_wa') ? 'https://wa.me/' . config('app.superadmin_wa') . '?text=Halo%20Akhritech%2C%20saya%20tertarik%20konsultasi%20pembuatan%20website%20bisnis.' : '#' }}"
                target="_blank"
                class="inline-block bg-white text-[#0d7377] font-semibold px-7 py-3 rounded-xl no-underline transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_8px_16px_rgba(0,0,0,0.2)]">
                Konsultasi Gratis <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
@endsection

<script>
    function copyToClipboard() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            const btn = document.getElementById('copy-btn');
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
