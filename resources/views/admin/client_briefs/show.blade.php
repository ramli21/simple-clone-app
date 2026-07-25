@extends('layouts.dashboard')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Detail Brief Klien: {{ $brief->company_name_title ?? $brief->company_info['name'] ?? $brief->client_name }}</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.client-briefs.index') }}">Client Portals</a></li>
                        <li class="breadcrumb-item">Detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="ti ti-check me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-3 mb-4">
        <!-- Sidebar Info Card -->
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h6 class="mb-0 fw-bold">Ringkasan Client Brief</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted d-block">Nama Klien / Perusahaan</small>
                        <strong class="fs-6 text-dark">{{ $brief->company_name_title ?? $brief->company_info['name'] ?? '-' }}</strong>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Pemesan</small>
                        <span>{{ $brief->client_name ?? '-' }}</span>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Kontak Email / WA</small>
                        <div><i class="ti ti-mail me-1"></i>{{ $brief->client_email ?? '-' }}</div>
                        <div><i class="ti ti-phone me-1"></i>{{ $brief->client_phone ?? '-' }}</div>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block mb-1">Kelengkapan Form ({{ $brief->progress_percentage }}%)</small>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: {{ $brief->progress_percentage }}%;"></div>
                        </div>
                    </div>

                    <hr>

                    <!-- Update Status Form -->
                    <form action="{{ route('admin.client-briefs.update-status', $brief->id) }}" method="POST" class="mb-3">
                        @csrf
                        <label class="form-label fw-bold">Status Pengerjaan Website:</label>
                        <div class="input-group">
                            <select name="status" class="form-select">
                                <option value="draft" {{ $brief->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="submitted" {{ $brief->status == 'submitted' ? 'selected' : '' }}>Submitted</option>
                                <option value="in_review" {{ $brief->status == 'in_review' ? 'selected' : '' }}>In Review</option>
                                <option value="in_progress" {{ $brief->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $brief->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.client-briefs.download-zip', $brief->id) }}" class="btn btn-outline-primary">
                            <i class="ti ti-download me-1"></i> Download All Assets (ZIP)
                        </a>
                        <a href="{{ route('admin.client-briefs.export-pdf', $brief->id) }}" target="_blank" class="btn btn-outline-secondary">
                            <i class="ti ti-printer me-1"></i> Cetak Dokumen PDF
                        </a>
                    </div>
                </div>
            </div>

            <!-- Portal URL Copy Card -->
            <div class="card">
                <div class="card-body">
                    <label class="form-label fw-bold small text-muted">URL Portal Akses Klien:</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm bg-light" id="portal-url" value="{{ route('client-portal.show', $brief->token) }}" readonly>
                        <button class="btn btn-outline-secondary btn-sm" onclick="copyPortalUrl()"><i class="ti ti-copy"></i></button>
                    </div>
                    <small class="text-muted d-block mt-2">Klien dapat mengedit kembali brief via link di atas tanpa login.</small>
                </div>
            </div>
        </div>

        <!-- 20 Categories Tabs & Content -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header border-bottom">
                    <ul class="nav nav-tabs card-header-tabs" id="brief-tabs" role="tablist">
                        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-company">Perusahaan & Kontak</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-business">Bisnis & Konten</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-media">SEO & Galeri</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-tech">Domain & Fitur</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-design">Desain & File</button></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="brief-tab-content">
                        
                        <!-- TAB 1: Perusahaan, Kontak, Sosmed -->
                        <div class="tab-pane fade show active" id="tab-company">
                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-building me-1"></i> 1. Informasi Perusahaan</h6>
                            <table class="table table-sm table-striped">
                                <tr><th width="35%">Nama Perusahaan:</th><td>{{ $brief->company_info['name'] ?? '-' }}</td></tr>
                                <tr><th>Nama Brand:</th><td>{{ $brief->company_info['brand_name'] ?? '-' }}</td></tr>
                                <tr><th>Tagline:</th><td>{{ $brief->company_info['tagline'] ?? '-' }}</td></tr>
                                <tr><th>Tahun Berdiri:</th><td>{{ $brief->company_info['founded_year'] ?? '-' }}</td></tr>
                                <tr><th>Deskripsi Singkat:</th><td>{{ $brief->company_info['short_description'] ?? '-' }}</td></tr>
                                <tr><th>Visi:</th><td>{{ $brief->company_info['vision'] ?? '-' }}</td></tr>
                                <tr><th>Misi:</th><td>{{ $brief->company_info['mission'] ?? '-' }}</td></tr>
                                <tr><th>Core Values:</th><td>{{ $brief->company_info['core_values'] ?? '-' }}</td></tr>
                                <tr><th>Warna Brand:</th><td>{{ $brief->company_info['brand_colors'] ?? '-' }}</td></tr>
                            </table>

                            <h6 class="fw-bold text-primary mt-4 mb-3"><i class="ti ti-phone me-1"></i> 2. Informasi Kontak</h6>
                            <table class="table table-sm table-striped">
                                <tr><th width="35%">Alamat:</th><td>{{ $brief->contact_info['address'] ?? '-' }}</td></tr>
                                <tr><th>Google Maps:</th><td><a href="{{ $brief->contact_info['gmaps_link'] ?? '#' }}" target="_blank">{{ $brief->contact_info['gmaps_link'] ?? '-' }}</a></td></tr>
                                <tr><th>WhatsApp:</th><td>{{ $brief->contact_info['whatsapp'] ?? '-' }}</td></tr>
                                <tr><th>Telepon:</th><td>{{ $brief->contact_info['phone'] ?? '-' }}</td></tr>
                                <tr><th>Email:</th><td>{{ $brief->contact_info['email'] ?? '-' }}</td></tr>
                                <tr><th>Website Lama:</th><td>{{ $brief->contact_info['old_website'] ?? '-' }}</td></tr>
                            </table>

                            <h6 class="fw-bold text-primary mt-4 mb-3"><i class="ti ti-share me-1"></i> 3. Media Sosial & Marketplace</h6>
                            <table class="table table-sm table-striped">
                                <tr><th width="35%">Facebook:</th><td>{{ $brief->social_media['facebook'] ?? '-' }}</td></tr>
                                <tr><th>Instagram:</th><td>{{ $brief->social_media['instagram'] ?? '-' }}</td></tr>
                                <tr><th>LinkedIn:</th><td>{{ $brief->social_media['linkedin'] ?? '-' }}</td></tr>
                                <tr><th>TikTok:</th><td>{{ $brief->social_media['tiktok'] ?? '-' }}</td></tr>
                                <tr><th>YouTube:</th><td>{{ $brief->social_media['youtube'] ?? '-' }}</td></tr>
                                <tr><th>X (Twitter):</th><td>{{ $brief->social_media['x'] ?? '-' }}</td></tr>
                                <tr><th>Marketplace:</th><td>{{ $brief->social_media['marketplace'] ?? '-' }}</td></tr>
                            </table>
                        </div>

                        <!-- TAB 2: Bisnis & Konten -->
                        <div class="tab-pane fade" id="tab-business">
                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-chart-bar me-1"></i> 4. Informasi Bisnis & Kompetitor</h6>
                            <table class="table table-sm table-striped mb-4">
                                <tr><th width="35%">Bidang Usaha:</th><td>{{ $brief->business_info['industry'] ?? '-' }}</td></tr>
                                <tr><th>Produk/Jasa Utama:</th><td>{{ $brief->business_info['core_products'] ?? '-' }}</td></tr>
                                <tr><th>Target Market:</th><td>{{ $brief->business_info['target_market'] ?? '-' }}</td></tr>
                                <tr><th>Area Pelayanan:</th><td>{{ $brief->business_info['service_area'] ?? '-' }}</td></tr>
                                <tr><th>Keunggulan (USP):</th><td>{{ $brief->business_info['advantages'] ?? '-' }}</td></tr>
                                <tr><th>Kompetitor:</th><td>
                                    <div>1. {{ $brief->business_info['competitor_1'] ?? '-' }}</div>
                                    <div>2. {{ $brief->business_info['competitor_2'] ?? '-' }}</div>
                                    <div>3. {{ $brief->business_info['competitor_3'] ?? '-' }}</div>
                                </td></tr>
                            </table>

                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-file-text me-1"></i> 5. Konten Website & Layanan</h6>
                            <p><strong>Sejarah:</strong> {{ $brief->website_content['history'] ?? '-' }}</p>
                            <p><strong>Story:</strong> {{ $brief->website_content['story'] ?? '-' }}</p>
                            <p><strong>Mengapa Memilih Kami:</strong> {{ $brief->website_content['why_choose_us'] ?? '-' }}</p>

                            <h6 class="fw-bold text-secondary mt-3">Daftar Layanan:</h6>
                            <ul class="list-group mb-4">
                                @forelse($brief->website_content['services'] ?? [] as $srv)
                                    @if(!empty($srv['name']))
                                        <li class="list-group-item">
                                            <strong class="text-dark">{{ $srv['name'] }}</strong> @if(!empty($srv['price'])) <span class="badge bg-light-primary text-primary">({{ $srv['price'] }})</span> @endif
                                            <div class="small text-muted">{{ $srv['description'] ?? '' }}</div>
                                        </li>
                                    @endif
                                @empty
                                    <li class="list-group-item text-muted small">Belum diisi</li>
                                @endforelse
                            </ul>

                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-briefcase me-1"></i> 6. Portfolio & Project</h6>
                            <ul class="list-group mb-4">
                                @forelse($brief->portfolios_projects ?? [] as $proj)
                                    @if(!empty($proj['name']))
                                        <li class="list-group-item">
                                            <strong>{{ $proj['name'] }}</strong> (Client: {{ $proj['client'] ?? '-' }}, Tahun: {{ $proj['year'] ?? '-' }})
                                            <div class="small text-muted">{{ $proj['description'] ?? '' }}</div>
                                        </li>
                                    @endif
                                @empty
                                    <li class="list-group-item text-muted small">Belum diisi</li>
                                @endforelse
                            </ul>

                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-message-dots me-1"></i> 7. Testimoni & 8. FAQ</h6>
                            <div class="accordion mb-3" id="adminFaqAccordion">
                                @forelse($brief->faqs ?? [] as $idx => $faq)
                                    @if(!empty($faq['question']))
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#faq-item-{{ $idx }}">
                                                    {{ $faq['question'] }}
                                                </button>
                                            </h2>
                                            <div id="faq-item-{{ $idx }}" class="accordion-collapse collapse" data-bs-parent="#adminFaqAccordion">
                                                <div class="accordion-body small text-muted">
                                                    {{ $faq['answer'] ?: 'Belum ada jawaban' }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <div class="text-muted small">Belum diisi</div>
                                @endforelse
                            </div>
                        </div>

                        <!-- TAB 3: SEO & Galeri -->
                        <div class="tab-pane fade" id="tab-media">
                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-photo me-1"></i> 9. Galeri Foto & Video</h6>
                            <p><strong>Link Google Drive:</strong> <a href="{{ $brief->gallery_files['drive_link'] ?? '#' }}" target="_blank">{{ $brief->gallery_files['drive_link'] ?? '-' }}</a></p>
                            <p><strong>Link Video Profile:</strong> <a href="{{ $brief->gallery_files['video_url'] ?? '#' }}" target="_blank">{{ $brief->gallery_files['video_url'] ?? '-' }}</a></p>

                            <hr>

                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-news me-1"></i> 10. Blog (Artikel Awal)</h6>
                            <p><strong>Topik:</strong> {{ $brief->blog_info['topic'] ?? '-' }}</p>
                            <p><strong>Kategori:</strong> {{ $brief->blog_info['category'] ?? '-' }}</p>
                            <p><strong>Keywords:</strong> {{ $brief->blog_info['keywords'] ?? '-' }}</p>

                            <hr>

                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-search me-1"></i> 11. Informasi SEO</h6>
                            <table class="table table-sm table-striped">
                                <tr><th width="35%">Site Name:</th><td>{{ $brief->seo_info['site_name'] ?? '-' }}</td></tr>
                                <tr><th>Meta Title:</th><td>{{ $brief->seo_info['meta_title'] ?? '-' }}</td></tr>
                                <tr><th>Meta Description:</th><td>{{ $brief->seo_info['meta_description'] ?? '-' }}</td></tr>
                                <tr><th>Keyword Utama:</th><td>{{ $brief->seo_info['primary_keywords'] ?? '-' }}</td></tr>
                                <tr><th>Keyword Pendukung:</th><td>{{ $brief->seo_info['secondary_keywords'] ?? '-' }}</td></tr>
                                <tr><th>Kota Target:</th><td>{{ $brief->seo_info['target_city'] ?? '-' }}</td></tr>
                                <tr><th>Area Target:</th><td>{{ $brief->seo_info['target_area'] ?? '-' }}</td></tr>
                            </table>
                        </div>

                        <!-- TAB 4: Domain & Fitur -->
                        <div class="tab-pane fade" id="tab-tech">
                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-server me-1"></i> 12. Domain & Hosting</h6>
                            <table class="table table-sm table-striped mb-4">
                                <tr><th width="35%">Status Domain:</th><td>{{ $brief->domain_hosting['has_domain'] ?? '-' }}</td></tr>
                                <tr><th>Nama Domain:</th><td>{{ $brief->domain_hosting['domain_name'] ?? '-' }}</td></tr>
                                <tr><th>Status Hosting:</th><td>{{ $brief->domain_hosting['has_hosting'] ?? '-' }}</td></tr>
                                <tr><th>Credentials:</th><td><code>{{ $brief->domain_hosting['credentials'] ?? '-' }}</code></td></tr>
                                <tr><th>Cloudflare:</th><td><code>{{ $brief->domain_hosting['cloudflare'] ?? '-' }}</code></td></tr>
                            </table>

                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-mail me-1"></i> 13. Email Perusahaan</h6>
                            <p><strong>Primary Email:</strong> {{ $brief->email_info['primary_email'] ?? '-' }}</p>
                            <p><strong>Jumlah Email:</strong> {{ $brief->email_info['count'] ?? '-' }}</p>
                            <p><strong>Akun Email:</strong> {{ $brief->email_info['accounts_list'] ?? '-' }}</p>

                            <hr>

                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-checkup-list me-1"></i> 14. Fitur Website Checklist</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @forelse($brief->features_checklist ?? [] as $feat)
                                    <span class="badge bg-primary fs-6">{{ $feat }}</span>
                                @empty
                                    <span class="text-muted small">Belum ada fitur dipilih</span>
                                @endforelse
                            </div>
                        </div>

                        <!-- TAB 5: Desain & File -->
                        <div class="tab-pane fade" id="tab-design">
                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-palette me-1"></i> 15. Referensi Design & Gaya</h6>
                            <p><strong>Website Referensi:</strong> {{ $brief->design_references['liked_websites'] ?? '-' }}</p>
                            <p><strong>Warna Favorit:</strong> {{ $brief->design_references['favorite_colors'] ?? '-' }}</p>
                            <p><strong>Gaya Desain:</strong> <span class="badge bg-info text-dark fs-6">{{ $brief->design_references['style_choice'] ?? '-' }}</span></p>

                            <hr>

                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-target me-1"></i> 16. Target & 17. CTA</h6>
                            <p><strong>Tujuan Website:</strong> 
                                @foreach($brief->target_website ?? [] as $t)
                                    <span class="badge bg-secondary me-1">{{ $t }}</span>
                                @endforeach
                            </p>
                            <p><strong>CTA Utama:</strong> <span class="badge bg-success fs-6">{{ $brief->cta_info['main_cta'] ?? '-' }}</span></p>

                            <hr>

                            <h6 class="fw-bold text-primary mb-3"><i class="ti ti-file me-1"></i> 18, 19 & 20. File Pendukung & Catatan</h6>
                            <p><strong>Catatan Tambahan:</strong></p>
                            <div class="bg-light p-3 rounded mb-3">{{ $brief->additional_notes ?? 'Tidak ada catatan tambahan.' }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyPortalUrl() {
        const input = document.getElementById('portal-url');
        input.select();
        navigator.clipboard.writeText(input.value);
        alert('URL Portal Klien berhasil disalin!');
    }
</script>
@endsection
