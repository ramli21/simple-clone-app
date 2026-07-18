{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- =========================================================== --}}
    {{-- HALAMAN STATIS                                               --}}
    {{-- =========================================================== --}}
    @foreach ($staticPages as $page)
    <url>
        <loc>{{ $page['loc'] }}</loc>
        <lastmod>{{ $page['lastmod'] }}</lastmod>
        <changefreq>{{ $page['changefreq'] }}</changefreq>
        <priority>{{ $page['priority'] }}</priority>
    </url>
    @endforeach

    {{-- =========================================================== --}}
    {{-- PRODUK DINAMIS (otomatis saat produk baru ditambahkan)       --}}
    {{-- =========================================================== --}}
    @foreach ($products as $product)
    <url>
        <loc>{{ url('/products/' . $product->slug) }}</loc>
        <lastmod>{{ $product->updated_at?->toIso8601String() ?? now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    {{-- =========================================================== --}}
    {{-- BLOG DINAMIS (otomatis saat blog baru dipublish)             --}}
    {{-- =========================================================== --}}
    @foreach ($blogs as $blog)
    <url>
        <loc>{{ url('/blogs/' . $blog->slug) }}</loc>
        <lastmod>{{ $blog->updated_at?->toIso8601String() ?? now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

</urlset>
