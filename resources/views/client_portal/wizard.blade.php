<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Client Portal - Form Informasi Pemesanan Website | AkhriTech</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome & Tabler Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --secondary-color: #06b6d4;
            --dark-bg: #0f172a;
            --light-bg: #f8fafc;
            --card-border: #e2e8f0;
            --text-dark: #1e293b;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: var(--text-dark);
            padding-bottom: 90px; /* Space for mobile sticky footer */
        }

        /* Sticky Mobile Header */
        .portal-header {
            position: sticky;
            top: 0;
            z-index: 1020;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--card-border);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .progress-bar-custom {
            height: 6px;
            background-color: #e2e8f0;
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transition: width 0.4s ease;
        }

        /* Horizontal Scrollable Mobile Steps */
        .step-tabs-wrapper {
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* IE */
            padding-bottom: 4px;
        }

        .step-tabs-wrapper::-webkit-scrollbar {
            display: none; /* Chrome/Safari */
        }

        .step-tab {
            flex: 0 0 auto;
            padding: 10px 16px;
            margin-right: 8px;
            border-radius: 12px;
            background-color: #ffffff;
            border: 1px solid var(--card-border);
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .step-tab.active {
            background-color: var(--primary-color);
            color: #ffffff;
            border-color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        }

        .step-tab.completed {
            background-color: #ecfdf5;
            color: #059669;
            border-color: #a7f3d0;
        }

        /* Card Section Styling */
        .form-section-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid var(--card-border);
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
            padding: 24px;
            margin-bottom: 20px;
        }

        @media (max-width: 576px) {
            .form-section-card {
                padding: 16px;
                border-radius: 14px;
            }
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f1f5f9;
        }

        .section-title i {
            color: var(--primary-color);
        }

        /* Mobile Touch Friendly Inputs */
        .form-control, .form-select {
            min-height: 48px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            font-size: 0.95rem;
            padding: 10px 14px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15);
        }

        .form-label {
            font-weight: 600;
            font-size: 0.88rem;
            color: #334155;
            margin-bottom: 6px;
        }

        /* Dynamic Repeater Box */
        .repeater-box {
            background-color: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 12px;
            position: relative;
        }

        .btn-remove-repeater {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #ef4444;
            background: #fee2e2;
            border: none;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        /* Feature Checkbox Grid */
        .checkbox-card {
            border: 1px solid var(--card-border);
            border-radius: 12px;
            padding: 12px 14px;
            background: #ffffff;
            transition: all 0.2s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            min-height: 52px;
        }

        .checkbox-card:hover, .checkbox-card.checked {
            border-color: var(--primary-color);
            background-color: #f5f3ff;
        }

        .checkbox-card input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: var(--primary-color);
        }

        /* Upload Dropzone Preview */
        .upload-btn-wrapper {
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 18px;
            text-align: center;
            background-color: #f8fafc;
            cursor: pointer;
            transition: background 0.2s;
        }

        .upload-btn-wrapper:hover {
            background-color: #f1f5f9;
            border-color: var(--primary-color);
        }

        /* Sticky Mobile Footer Action Bar */
        .sticky-footer-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(12px);
            border-top: 1px solid var(--card-border);
            padding: 12px 20px;
            box-shadow: 0 -4px 16px rgba(0, 0, 0, 0.05);
        }

        .badge-autosave {
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 20px;
            background: #e0e7ff;
            color: var(--primary-color);
            font-weight: 600;
        }

        .wizard-step-content {
            display: none;
        }

        .wizard-step-content.active {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <!-- Header & Progress Bar -->
    <header class="portal-header py-3 px-3">
        <div class="container-md p-0">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center gap-2">
                    <img src="{{ asset('images/logo-side.png') }}" alt="AkhriTech" height="28" onerror="this.src='https://via.placeholder.com/120x30?text=AkhriTech'">
                    <span class="badge bg-secondary text-white fw-bold d-none d-sm-inline-block">Client Portal</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge-autosave" id="autosave-status">
                        <i class="fa-solid fa-cloud-arrow-up me-1"></i> Tersimpan
                    </span>
                    <span class="fw-bold text-primary small" id="progress-text">{{ $brief->progress_percentage }}% Selesai</span>
                </div>
            </div>
            <div class="progress-bar-custom mb-3">
                <div class="progress-bar-fill" id="progress-bar" style="width: {{ $brief->progress_percentage }}%;"></div>
            </div>

            <!-- Horizontal Scrollable Steps -->
            <div class="step-tabs-wrapper">
                <div class="step-tab active" data-step="1" onclick="switchStep(1)">
                    <span class="step-num">1</span>
                    <span>Profil & Branding</span>
                </div>
                <div class="step-tab" data-step="2" onclick="switchStep(2)">
                    <span class="step-num">2</span>
                    <span>Bisnis & Konten</span>
                </div>
                <div class="step-tab" data-step="3" onclick="switchStep(3)">
                    <span class="step-num">3</span>
                    <span>Galeri & SEO</span>
                </div>
                <div class="step-tab" data-step="4" onclick="switchStep(4)">
                    <span class="step-num">4</span>
                    <span>Domain, Email & Fitur</span>
                </div>
                <div class="step-tab" data-step="5" onclick="switchStep(5)">
                    <span class="step-num">5</span>
                    <span>Desain, Legal & File</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Wizard Form Container -->
    <main class="container-md my-4">
        <form id="client-brief-form" action="{{ route('client-portal.submit', $brief->token) }}" method="POST">
            @csrf

            <!-- STEP 1: Profil Perusahaan, Kontak & Media Sosial -->
            <div class="wizard-step-content active" id="step-1">
                <!-- 1. Informasi Perusahaan (Wajib) -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-building"></i>
                        <span>1. Informasi Perusahaan (Wajib)</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                            <input type="text" name="company_info[name]" class="form-control" placeholder="Contoh: PT AkhriTech Digital Indonesia" value="{{ $brief->company_info['name'] ?? $brief->company_name_title ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nama Brand / Merk</label>
                            <input type="text" name="company_info[brand_name]" class="form-control" placeholder="Contoh: AkhriTech" value="{{ $brief->company_info['brand_name'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tagline / Slogan</label>
                            <input type="text" name="company_info[tagline]" class="form-control" placeholder="Contoh: Innovation Beyond Tomorrow" value="{{ $brief->company_info['tagline'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tahun Berdiri</label>
                            <input type="number" name="company_info[founded_year]" class="form-control" placeholder="Contoh: 2020" value="{{ $brief->company_info['founded_year'] ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Deskripsi Singkat Perusahaan</label>
                            <textarea name="company_info[short_description]" class="form-control" rows="3" placeholder="Jelaskan ringkasan bidang usaha perusahaan Anda...">{{ $brief->company_info['short_description'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Visi Perusahaan</label>
                            <textarea name="company_info[vision]" class="form-control" rows="2" placeholder="Visi utama perusahaan">{{ $brief->company_info['vision'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Misi Perusahaan</label>
                            <textarea name="company_info[mission]" class="form-control" rows="2" placeholder="Misi perusahaan">{{ $brief->company_info['mission'] ?? '' }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nilai Utama Perusahaan (Core Values)</label>
                            <input type="text" name="company_info[core_values]" class="form-control" placeholder="Contoh: Integritas, Inovasi, Kecepatan" value="{{ $brief->company_info['core_values'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Warna Utama Brand (Opsional)</label>
                            <input type="text" name="company_info[brand_colors]" class="form-control" placeholder="Contoh: Biru (#4f46e5), Putih, Abu-abu" value="{{ $brief->company_info['brand_colors'] ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- 2. Informasi Kontak -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-address-book"></i>
                        <span>2. Informasi Kontak</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea name="contact_info[address]" class="form-control" rows="2" placeholder="Alamat fisik kantor/toko">{{ $brief->contact_info['address'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Link Google Maps</label>
                            <input type="url" name="contact_info[gmaps_link]" class="form-control" placeholder="https://maps.google.com/..." value="{{ $brief->contact_info['gmaps_link'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nomor WhatsApp Business</label>
                            <input type="tel" name="contact_info[whatsapp]" class="form-control" placeholder="Contoh: 081234567890" value="{{ $brief->contact_info['whatsapp'] ?? $brief->client_phone ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nomor Telepon Kantor</label>
                            <input type="tel" name="contact_info[phone]" class="form-control" placeholder="Contoh: (021) 555-1234" value="{{ $brief->contact_info['phone'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Perusahaan</label>
                            <input type="email" name="contact_info[email]" class="form-control" placeholder="info@perusahaan.com" value="{{ $brief->contact_info['email'] ?? $brief->client_email ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Website Lama (Jika Ada)</label>
                            <input type="url" name="contact_info[old_website]" class="form-control" placeholder="https://perusahaanlama.com" value="{{ $brief->contact_info['old_website'] ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- 3. Media Sosial -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-share-nodes"></i>
                        <span>3. Media Sosial & Marketplace</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-brands fa-facebook text-primary me-1"></i> Facebook</label>
                            <input type="url" name="social_media[facebook]" class="form-control" placeholder="https://facebook.com/namapage" value="{{ $brief->social_media['facebook'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-brands fa-instagram text-danger me-1"></i> Instagram</label>
                            <input type="text" name="social_media[instagram]" class="form-control" placeholder="@username_instagram" value="{{ $brief->social_media['instagram'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-brands fa-linkedin text-primary me-1"></i> LinkedIn</label>
                            <input type="url" name="social_media[linkedin]" class="form-control" placeholder="https://linkedin.com/company/..." value="{{ $brief->social_media['linkedin'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-brands fa-tiktok text-dark me-1"></i> TikTok</label>
                            <input type="text" name="social_media[tiktok]" class="form-control" placeholder="@username_tiktok" value="{{ $brief->social_media['tiktok'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-brands fa-youtube text-danger me-1"></i> YouTube</label>
                            <input type="url" name="social_media[youtube]" class="form-control" placeholder="https://youtube.com/@channel" value="{{ $brief->social_media['youtube'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-brands fa-x-twitter text-dark me-1"></i> X (Twitter)</label>
                            <input type="text" name="social_media[x]" class="form-control" placeholder="@username_x" value="{{ $brief->social_media['x'] ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label"><i class="fa-solid fa-store text-warning me-1"></i> Marketplace (Shopee / Tokopedia / Lazada)</label>
                            <input type="text" name="social_media[marketplace]" class="form-control" placeholder="Link toko Shopee atau Tokopedia Anda" value="{{ $brief->social_media['marketplace'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 2: Bisnis, Konten, Service/Product, Portfolio & FAQ -->
            <div class="wizard-step-content" id="step-2">
                <!-- 4. Informasi Bisnis & Kompetitor -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>4. Informasi Bisnis & Kompetitor</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Bidang Usaha / Industri</label>
                            <input type="text" name="business_info[industry]" class="form-control" placeholder="Contoh: Kontraktor, Kuliner, Fashion, IT Consultant" value="{{ $brief->business_info['industry'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Produk / Layanan Utama</label>
                            <input type="text" name="business_info[core_products]" class="form-control" placeholder="Contoh: Jasa Pembuatan Skincare, Kaos Sablon" value="{{ $brief->business_info['core_products'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Target Market (Segmen Pelanggan)</label>
                            <input type="text" name="business_info[target_market]" class="form-control" placeholder="Contoh: Pemilik UMKM usia 25-45 tahun" value="{{ $brief->business_info['target_market'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Area Pelayanan</label>
                            <input type="text" name="business_info[service_area]" class="form-control" placeholder="Contoh: Jabodetabek, Seluruh Indonesia, Internasional" value="{{ $brief->business_info['service_area'] ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Keunggulan dibanding Kompetitor (USP)</label>
                            <textarea name="business_info[advantages]" class="form-control" rows="2" placeholder="Mengapa klien harus memilih bisnis Anda? (Contoh: Garansi resmi 2 tahun, harga termurah, CS 24 jam)">{{ $brief->business_info['advantages'] ?? '' }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Kompetitor Utama (3-5 Website / Referensi)</label>
                            <input type="text" name="business_info[competitor_1]" class="form-control mb-2" placeholder="Kompetitor 1: www.kompetitor1.com" value="{{ $brief->business_info['competitor_1'] ?? '' }}">
                            <input type="text" name="business_info[competitor_2]" class="form-control mb-2" placeholder="Kompetitor 2: www.kompetitor2.com" value="{{ $brief->business_info['competitor_2'] ?? '' }}">
                            <input type="text" name="business_info[competitor_3]" class="form-control" placeholder="Kompetitor 3: www.kompetitor3.com" value="{{ $brief->business_info['competitor_3'] ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- 5. Konten Utama Website -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-newspaper"></i>
                        <span>5. Konten Website (Tentang Kami & Layanan / Produk)</span>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-12">
                            <label class="form-label">Sejarah Perusahaan</label>
                            <textarea name="website_content[history]" class="form-control" rows="2" placeholder="Singkat tentang bagaimana perusahaan ini awal didirikan...">{{ $brief->website_content['history'] ?? '' }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Cerita / Story Perusahaan</label>
                            <textarea name="website_content[story]" class="form-control" rows="2" placeholder="Nilai emosional atau cerita perjalanan usaha...">{{ $brief->website_content['story'] ?? '' }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Alasan "Mengapa Memilih Kami"</label>
                            <textarea name="website_content[why_choose_us]" class="form-control" rows="2" placeholder="Poin-poin utama mengapa calon pelanggan memilih Anda...">{{ $brief->website_content['why_choose_us'] ?? '' }}</textarea>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Layanan List Repeater -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0 text-primary"><i class="fa-solid fa-concierge-bell me-1"></i> Daftar Layanan / Services</h6>
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="addServiceRepeater()"><i class="fa-solid fa-plus me-1"></i> Tambah Layanan</button>
                        </div>
                        <div id="services-repeater-container">
                            @php
                                $services = $brief->website_content['services'] ?? [[]];
                            @endphp
                            @foreach($services as $index => $srv)
                                <div class="repeater-box" id="service-box-{{ $index }}">
                                    <button type="button" class="btn-remove-repeater" onclick="removeRepeater('service-box-{{ $index }}')"><i class="fa-solid fa-xmark"></i></button>
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Nama Layanan</label>
                                            <input type="text" name="website_content[services][{{ $index }}][name]" class="form-control" placeholder="Contoh: Jasa Desain Interior" value="{{ $srv['name'] ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Harga (Opsional)</label>
                                            <input type="text" name="website_content[services][{{ $index }}][price]" class="form-control" placeholder="Contoh: Mulai Rp 2.500.000" value="{{ $srv['price'] ?? '' }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Deskripsi Layanan</label>
                                            <textarea name="website_content[services][{{ $index }}][description]" class="form-control" rows="2" placeholder="Penjelasan singkat mengenai layanan ini...">{{ $srv['description'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- 6. Portfolio / Project -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-briefcase"></i>
                        <span>6. Portfolio / Hasil Pekerjaan Project</span>
                    </div>

                    <div id="portfolio-repeater-container">
                        @php
                            $projects = $brief->portfolios_projects ?? [[]];
                        @endphp
                        @foreach($projects as $index => $proj)
                            <div class="repeater-box" id="project-box-{{ $index }}">
                                <button type="button" class="btn-remove-repeater" onclick="removeRepeater('project-box-{{ $index }}')"><i class="fa-solid fa-xmark"></i></button>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Project</label>
                                        <input type="text" name="portfolios_projects[{{ $index }}][name]" class="form-control" placeholder="Contoh: Renovasi Gedung PT ABC" value="{{ $proj['name'] ?? '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Nama Client</label>
                                        <input type="text" name="portfolios_projects[{{ $index }}][client]" class="form-control" placeholder="PT ABC" value="{{ $proj['client'] ?? '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Tahun</label>
                                        <input type="number" name="portfolios_projects[{{ $index }}][year]" class="form-control" placeholder="2023" value="{{ $proj['year'] ?? '' }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Deskripsi Ringkas</label>
                                        <textarea name="portfolios_projects[{{ $index }}][description]" class="form-control" rows="2" placeholder="Detail hasil pekerjaan...">{{ $proj['description'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="addPortfolioRepeater()"><i class="fa-solid fa-plus me-1"></i> Tambah Project Portfolio</button>
                </div>

                <!-- 7. Testimoni Pelanggan & 8. FAQ -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-comments"></i>
                        <span>7. Testimoni & 8. Pertanyaan Umum (FAQ)</span>
                    </div>

                    <h6 class="fw-bold text-primary mb-3">Testimoni Pelanggan</h6>
                    <div id="testimonial-repeater-container">
                        @php
                            $testimonials = $brief->testimonials ?? [[]];
                        @endphp
                        @foreach($testimonials as $index => $tst)
                            <div class="repeater-box" id="testi-box-{{ $index }}">
                                <button type="button" class="btn-remove-repeater" onclick="removeRepeater('testi-box-{{ $index }}')"><i class="fa-solid fa-xmark"></i></button>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Pelanggan</label>
                                        <input type="text" name="testimonials[{{ $index }}][client_name]" class="form-control" placeholder="Bpk. Budi Santoso" value="{{ $tst['client_name'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Jabatan / Perusahaan</label>
                                        <input type="text" name="testimonials[{{ $index }}][position]" class="form-control" placeholder="CEO PT Digital" value="{{ $tst['position'] ?? '' }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Isi Testimoni</label>
                                        <textarea name="testimonials[{{ $index }}][content]" class="form-control" rows="2" placeholder="Ulasan positif pelanggan terhadap layanan Anda...">{{ $tst['content'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary mb-4" onclick="addTestimonialRepeater()"><i class="fa-solid fa-plus me-1"></i> Tambah Testimoni</button>

                    <hr>

                    <h6 class="fw-bold text-primary mb-3">8. FAQ (Minimal 5-10 Pertanyaan yang sering ditanyakan)</h6>
                    <div id="faq-repeater-container">
                        @php
                            $faqs = $brief->faqs ?? [
                                ['question' => 'Berapa lama proses pengerjaan layanan ini?', 'answer' => ''],
                                ['question' => 'Bagaimana sistem pembayaran yang berlaku?', 'answer' => '']
                            ];
                        @endphp
                        @foreach($faqs as $index => $faq)
                            <div class="repeater-box" id="faq-box-{{ $index }}">
                                <button type="button" class="btn-remove-repeater" onclick="removeRepeater('faq-box-{{ $index }}')"><i class="fa-solid fa-xmark"></i></button>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <label class="form-label">Pertanyaan (FAQ)</label>
                                        <input type="text" name="faqs[{{ $index }}][question]" class="form-control" placeholder="Contoh: Berapa lama waktu pengerjaan?" value="{{ $faq['question'] ?? '' }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Jawaban</label>
                                        <textarea name="faqs[{{ $index }}][answer]" class="form-control" rows="2" placeholder="Jawaban resmi dari pihak perusahaan...">{{ $faq['answer'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="addFaqRepeater()"><i class="fa-solid fa-plus me-1"></i> Tambah Pertanyaan FAQ</button>
                </div>
            </div>

            <!-- STEP 3: Galeri Media, Blog & SEO -->
            <div class="wizard-step-content" id="step-3">
                <!-- 9. Galeri Upload Links & Video -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-images"></i>
                        <span>9. Galeri Foto & Video Company Profile</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Link Drive / Cloud Foto Galeri (Kantor, Tim, Kegiatan, Produk)</label>
                            <input type="url" name="gallery_files[drive_link]" class="form-control" placeholder="https://drive.google.com/drive/folders/..." value="{{ $brief->gallery_files['drive_link'] ?? '' }}">
                            <div class="form-text">Anda dapat memasukkan link Google Drive/Dropbox atau mengunggah langsung file di Step 5.</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Link Video Company Profile (YouTube / Vimeo / Google Drive)</label>
                            <input type="url" name="gallery_files[video_url]" class="form-control" placeholder="https://youtube.com/watch?v=..." value="{{ $brief->gallery_files['video_url'] ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- 10. Blog (Opsional) -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-blog"></i>
                        <span>10. Blog / Artikel Awal (Opsional)</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Topik Artikel yang Diinginkan</label>
                            <input type="text" name="blog_info[topic]" class="form-control" placeholder="Contoh: Tips Memilih Skincare untuk Kulit Sensitif" value="{{ $brief->blog_info['topic'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kategori Blog</label>
                            <input type="text" name="blog_info[category]" class="form-control" placeholder="Contoh: Edukasi, Berita, Tutorial" value="{{ $brief->blog_info['category'] ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Target Kata Kunci (Keywords Artikel)</label>
                            <input type="text" name="blog_info[keywords]" class="form-control" placeholder="Contoh: skincare halal, tips kulit glowing" value="{{ $brief->blog_info['keywords'] ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- 11. SEO (Search Engine Optimization) -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>11. Informasi SEO (Penting untuk Rating Google)</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Website di Google (Site Name)</label>
                            <input type="text" name="seo_info[site_name]" class="form-control" placeholder="Contoh: AkhriTech - Jasa Pembuatan Website & Software" value="{{ $brief->seo_info['site_name'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Meta Title Judul Halaman Utama</label>
                            <input type="text" name="seo_info[meta_title]" class="form-control" placeholder="Maksimal 60 karakter" value="{{ $brief->seo_info['meta_title'] ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Meta Description (Ringkasan di Google)</label>
                            <textarea name="seo_info[meta_description]" class="form-control" rows="2" placeholder="Deskripsi menarik singkat (150-160 karakter)...">{{ $brief->seo_info['meta_description'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Keyword Utama</label>
                            <input type="text" name="seo_info[primary_keywords]" class="form-control" placeholder="Contoh: jasa kontraktor jakarta" value="{{ $brief->seo_info['primary_keywords'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Keyword Pendukung</label>
                            <input type="text" name="seo_info[secondary_keywords]" class="form-control" placeholder="Contoh: renovasi rumah murah, bangun ruko" value="{{ $brief->seo_info['secondary_keywords'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kota Target SEO</label>
                            <input type="text" name="seo_info[target_city]" class="form-control" placeholder="Contoh: Jakarta, Bandung, Surabaya" value="{{ $brief->seo_info['target_city'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Area Target</label>
                            <input type="text" name="seo_info[target_area]" class="form-control" placeholder="Contoh: Jabodetabek & Jawa Barat" value="{{ $brief->seo_info['target_area'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 4: Domain, Hosting, Email & Fitur Checklist -->
            <div class="wizard-step-content" id="step-4">
                <!-- 12. Domain & Hosting -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-server"></i>
                        <span>12. Domain & Hosting</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Sudah Memiliki Domain?</label>
                            <select name="domain_hosting[has_domain]" class="form-select">
                                <option value="Belum" {{ ($brief->domain_hosting['has_domain'] ?? '') == 'Belum' ? 'selected' : '' }}>Belum (Diuruskan Pihak AkhriTech)</option>
                                <option value="Sudah" {{ ($brief->domain_hosting['has_domain'] ?? '') == 'Sudah' ? 'selected' : '' }}>Sudah Memiliki Domain</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nama Domain yang Diinginkan / Dimiliki</label>
                            <input type="text" name="domain_hosting[domain_name]" class="form-control" placeholder="Contoh: namaperusahaan.com" value="{{ $brief->domain_hosting['domain_name'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sudah Memiliki Hosting?</label>
                            <select name="domain_hosting[has_hosting]" class="form-select">
                                <option value="Belum" {{ ($brief->domain_hosting['has_hosting'] ?? '') == 'Belum' ? 'selected' : '' }}>Belum (Menggunakan Server AkhriTech)</option>
                                <option value="Sudah" {{ ($brief->domain_hosting['has_hosting'] ?? '') == 'Sudah' ? 'selected' : '' }}>Sudah Memiliki Hosting Sendiri</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kredensial Login Hosting / Domain (Jika Ada)</label>
                            <input type="text" name="domain_hosting[credentials]" class="form-control" placeholder="Provider, Username, Password" value="{{ $brief->domain_hosting['credentials'] ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Akun Cloudflare (Jika Ada)</label>
                            <input type="text" name="domain_hosting[cloudflare]" class="form-control" placeholder="Email & API Key / Password Cloudflare" value="{{ $brief->domain_hosting['cloudflare'] ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- 13. Email Perusahaan -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-envelope"></i>
                        <span>13. Email Perusahaan (Corporate Email)</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Email Perusahaan Utama</label>
                            <input type="email" name="email_info[primary_email]" class="form-control" placeholder="admin@namaperusahaan.com" value="{{ $brief->email_info['primary_email'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Akun Email yang Ingin Dibuat</label>
                            <input type="number" name="email_info[count]" class="form-control" placeholder="Contoh: 3" value="{{ $brief->email_info['count'] ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Daftar Akun Email yang Ingin Dibuat</label>
                            <input type="text" name="email_info[accounts_list]" class="form-control" placeholder="Contoh: admin@, sales@, cs@, info@" value="{{ $brief->email_info['accounts_list'] ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- 14. Fitur Website Checklist -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-list-check"></i>
                        <span>14. Fitur Website (Pilih Fitur yang Dibutuhkan)</span>
                    </div>

                    @php
                        $selectedFeatures = $brief->features_checklist ?? [];
                        $availableFeatures = [
                            'Form Contact' => 'Formulir Kontak Direct Email',
                            'WhatsApp' => 'Tombol Floating WhatsApp Chat',
                            'Live Chat' => 'Fitur Widget Live Chat',
                            'Google Maps' => 'Integrasi Peta Lokasi Google Maps',
                            'Blog' => 'Modul Artikel / Blog Berita',
                            'Portfolio' => 'Galeri Portfolio & Project',
                            'Testimoni' => 'Kategori Ulasan & Testimoni',
                            'Booking' => 'Sistem Booking / Jadwal Temu',
                            'Download Katalog' => 'Fitur Download PDF Katalog/Brosur',
                            'Membership' => 'Sistem Keanggotaan Pelanggan',
                            'Login' => 'Fitur Login & User Dashboard',
                            'Multi Bahasa' => 'Fitur Multi-Language (EN/ID)',
                            'Newsletter' => 'Langganan Email Newsletter',
                            'Payment Gateway' => 'Integrasi Pembayaran Otomatis',
                            'Marketplace' => 'Fitur Toko Online & Keranjang',
                            'Search' => 'Fitur Pencarian Konten Dinamis',
                            'Filter Produk' => 'Filter Kategori & Harga Produk',
                            'Chat AI' => 'Integrasi Chatbot AI Otomatis'
                        ];
                    @endphp

                    <div class="row g-2">
                        @foreach($availableFeatures as $key => $label)
                            <div class="col-6 col-md-4">
                                <label class="checkbox-card {{ in_array($key, $selectedFeatures) ? 'checked' : '' }}">
                                    <input type="checkbox" name="features_checklist[]" value="{{ $key }}" {{ in_array($key, $selectedFeatures) ? 'checked' : '' }} onchange="toggleCheckboxCard(this)">
                                    <span class="small fw-semibold">{{ $key }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- STEP 5: Design Reference, Target, CTA, Legalitas & File Pendukung -->
            <div class="wizard-step-content" id="step-5">
                <!-- 15. Referensi Design & Gaya -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-palette"></i>
                        <span>15. Referensi Desain & Gaya Visual</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Link Website yang Disukai (Referensi)</label>
                            <textarea name="design_references[liked_websites]" class="form-control" rows="2" placeholder="Masukkan 1-3 link website yang desainnya Anda sukai...">{{ $brief->design_references['liked_websites'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Warna Favorit yang Disukai</label>
                            <input type="text" name="design_references[favorite_colors]" class="form-control" placeholder="Contoh: Kombinasi Biru Navy dan Gold" value="{{ $brief->design_references['favorite_colors'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Pilihan Gaya Desain Utama</label>
                            <select name="design_references[style_choice]" class="form-select">
                                @php $style = $brief->design_references['style_choice'] ?? 'Modern'; @endphp
                                <option value="Minimalis" {{ $style == 'Minimalis' ? 'selected' : '' }}>Minimalis (Bersih & Simple)</option>
                                <option value="Corporate" {{ $style == 'Corporate' ? 'selected' : '' }}>Corporate (Profesional & Resmi)</option>
                                <option value="Modern" {{ $style == 'Modern' ? 'selected' : '' }}>Modern (Kekinian & Dynamic)</option>
                                <option value="Luxury" {{ $style == 'Luxury' ? 'selected' : '' }}>Luxury (Mewah & Eksklusif)</option>
                                <option value="Industrial" {{ $style == 'Industrial' ? 'selected' : '' }}>Industrial (Tegas & Bold)</option>
                                <option value="Elegant" {{ $style == 'Elegant' ? 'selected' : '' }}>Elegant (Halus & Anggun)</option>
                                <option value="Dark" {{ $style == 'Dark' ? 'selected' : '' }}>Dark Mode (Gelap & Futuristik)</option>
                                <option value="Colourful" {{ $style == 'Colourful' ? 'selected' : '' }}>Colourful (Ceria & Ceria)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- 16. Target Website & 17. CTA -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-bullseye"></i>
                        <span>16. Target Website & 17. Call To Action (CTA) Utama</span>
                    </div>

                    @php
                        $selectedGoals = $brief->target_website ?? [];
                        $goalsList = ['Mendapat Leads', 'Branding', 'Company Profile', 'Penjualan', 'Booking', 'Edukasi', 'Portfolio'];
                    @endphp

                    <label class="form-label mb-2">16. Tujuan Utama Website (Bisa pilih lebih dari satu):</label>
                    <div class="row g-2 mb-3">
                        @foreach($goalsList as $goal)
                            <div class="col-6 col-md-3">
                                <label class="checkbox-card {{ in_array($goal, $selectedGoals) ? 'checked' : '' }}">
                                    <input type="checkbox" name="target_website[]" value="{{ $goal }}" {{ in_array($goal, $selectedGoals) ? 'checked' : '' }} onchange="toggleCheckboxCard(this)">
                                    <span class="small fw-semibold">{{ $goal }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-12 mt-3">
                        <label class="form-label">17. Call To Action (CTA) Utama</label>
                        <select name="cta_info[main_cta]" class="form-select">
                            @php $mainCta = $brief->cta_info['main_cta'] ?? 'Hubungi Kami'; @endphp
                            <option value="Hubungi Kami" {{ $mainCta == 'Hubungi Kami' ? 'selected' : '' }}>Hubungi Kami (WhatsApp / Telepon)</option>
                            <option value="Konsultasi Gratis" {{ $mainCta == 'Konsultasi Gratis' ? 'selected' : '' }}>Konsultasi Gratis</option>
                            <option value="Minta Penawaran" {{ $mainCta == 'Minta Penawaran' ? 'selected' : '' }}>Minta Penawaran (Get Quote)</option>
                            <option value="Download Katalog" {{ $mainCta == 'Download Katalog' ? 'selected' : '' }}>Download Katalog</option>
                            <option value="Booking Sekarang" {{ $mainCta == 'Booking Sekarang' ? 'selected' : '' }}>Booking Sekarang</option>
                            <option value="Daftar Sekarang" {{ $mainCta == 'Daftar Sekarang' ? 'selected' : '' }}>Daftar Sekarang</option>
                        </select>
                    </div>
                </div>

                <!-- 18. Legalitas, 19. File Pendukung & 20. Catatan Tambahan -->
                <div class="form-section-card">
                    <div class="section-title">
                        <i class="fa-solid fa-folder-open"></i>
                        <span>18. Legalitas, 19. File Pendukung & 20. Catatan</span>
                    </div>

                    <!-- AJAX File Uploader Dropzone -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">18 & 19. Upload Asset & Dokumentasi (Logo PNG/AI, Foto HD, PDF Company Profile, Legalitas)</label>
                        <div class="upload-btn-wrapper" onclick="document.getElementById('portal-file-input').click()">
                            <i class="fa-solid fa-cloud-arrow-up text-primary display-6 mb-2"></i>
                            <div class="fw-bold">Klik untuk Pilih File dari Kamera / HP / Komputer</div>
                            <div class="small text-muted">Format: PNG, JPG, PDF, ZIP, AI, CDR (Maksimal 20MB per file)</div>
                        </div>
                        <input type="file" id="portal-file-input" style="display: none;" onchange="handleFileUpload(this)">
                        
                        <div id="uploaded-files-list" class="mt-3">
                            <!-- JS dynamic list of uploaded files -->
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-bold">20. Catatan Tambahan / Permintaan Khusus</label>
                        <textarea name="additional_notes" class="form-control" rows="3" placeholder="Tuliskan jika ada catatan atau instruksi khusus lainnya untuk tim pengembang website...">{{ $brief->additional_notes }}</textarea>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <!-- Mobile Touch-Friendly Sticky Bottom Bar -->
    <footer class="sticky-footer-bar">
        <div class="container-md p-0 d-flex align-items-center justify-content-between gap-2">
            <button type="button" class="btn btn-outline-secondary px-3 py-2 fw-semibold" id="btn-prev" onclick="prevStep()" style="display: none;">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </button>

            <button type="button" class="btn btn-light text-primary px-3 py-2 fw-semibold border" onclick="triggerAutoSave(true)">
                <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Draf
            </button>

            <button type="button" class="btn btn-primary px-4 py-2 fw-bold" id="btn-next" onclick="nextStep()">
                Lanjut <i class="fa-solid fa-arrow-right ms-1"></i>
            </button>

            <button type="button" class="btn btn-success px-4 py-2 fw-bold" id="btn-submit" onclick="submitForm()" style="display: none;">
                <i class="fa-solid fa-paper-plane me-1"></i> Kirim Brief
            </button>
        </div>
    </footer>

    <!-- Bootstrap & JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentStep = 1;
        const totalSteps = 5;
        const token = "{{ $brief->token }}";

        function switchStep(step) {
            if (step < 1 || step > totalSteps) return;
            
            currentStep = step;
            
            // Hide all steps
            document.querySelectorAll('.wizard-step-content').forEach(el => el.classList.remove('active'));
            document.getElementById('step-' + step).classList.add('active');

            // Update step tabs UI
            document.querySelectorAll('.step-tab').forEach(tab => {
                const tabStep = parseInt(tab.getAttribute('data-step'));
                tab.classList.remove('active');
                if (tabStep === step) {
                    tab.classList.add('active');
                    tab.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                }
            });

            // Update Navigation Buttons
            document.getElementById('btn-prev').style.display = (step > 1) ? 'inline-block' : 'none';
            document.getElementById('btn-next').style.display = (step < totalSteps) ? 'inline-block' : 'none';
            document.getElementById('btn-submit').style.display = (step === totalSteps) ? 'inline-block' : 'none';

            window.scrollTo({ top: 0, behavior: 'smooth' });
            triggerAutoSave();
        }

        function nextStep() {
            if (currentStep < totalSteps) {
                switchStep(currentStep + 1);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                switchStep(currentStep - 1);
            }
        }

        function toggleCheckboxCard(input) {
            const card = input.closest('.checkbox-card');
            if (input.checked) {
                card.classList.add('checked');
            } else {
                card.classList.remove('checked');
            }
            triggerAutoSave();
        }

        // Auto Save Draft AJAX Function
        let saveTimeout = null;
        function triggerAutoSave(manual = false) {
            if (saveTimeout) clearTimeout(saveTimeout);

            const statusEl = document.getElementById('autosave-status');
            if (manual) {
                statusEl.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Menyimpan...';
            }

            saveTimeout = setTimeout(() => {
                const form = document.getElementById('client-brief-form');
                const formData = new FormData(form);

                fetch("{{ route('client-portal.save-draft', $brief->token) }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        "Accept": "application/json"
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        statusEl.innerHTML = '<i class="fa-solid fa-circle-check text-success me-1"></i> Draf Tersimpan';
                        document.getElementById('progress-bar').style.width = data.progress + '%';
                        document.getElementById('progress-text').innerText = data.progress + '% Selesai';
                    }
                })
                .catch(err => {
                    statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation text-warning me-1"></i> Offline';
                });
            }, manual ? 100 : 1500);
        }

        // Auto-trigger save on input changes
        document.getElementById('client-brief-form').addEventListener('input', () => triggerAutoSave());

        // Dynamic Repeaters Javascript
        let serviceCount = {{ count($brief->website_content['services'] ?? [[]]) }};
        function addServiceRepeater() {
            const container = document.getElementById('services-repeater-container');
            const index = serviceCount++;
            const html = `
                <div class="repeater-box" id="service-box-${index}">
                    <button type="button" class="btn-remove-repeater" onclick="removeRepeater('service-box-${index}')"><i class="fa-solid fa-xmark"></i></button>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label class="form-label">Nama Layanan</label>
                            <input type="text" name="website_content[services][${index}][name]" class="form-control" placeholder="Contoh: Layanan Katering">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Harga (Opsional)</label>
                            <input type="text" name="website_content[services][${index}][price]" class="form-control" placeholder="Rp 50.000 / pax">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Deskripsi Layanan</label>
                            <textarea name="website_content[services][${index}][description]" class="form-control" rows="2" placeholder="Deskripsi layanan..."></textarea>
                        </div>
                    </div>
                </div>`;
            container.insertAdjacentHTML('beforeend', html);
        }

        let portfolioCount = {{ count($brief->portfolios_projects ?? [[]]) }};
        function addPortfolioRepeater() {
            const container = document.getElementById('portfolio-repeater-container');
            const index = portfolioCount++;
            const html = `
                <div class="repeater-box" id="project-box-${index}">
                    <button type="button" class="btn-remove-repeater" onclick="removeRepeater('project-box-${index}')"><i class="fa-solid fa-xmark"></i></button>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label class="form-label">Nama Project</label>
                            <input type="text" name="portfolios_projects[${index}][name]" class="form-control" placeholder="Nama project">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Nama Client</label>
                            <input type="text" name="portfolios_projects[${index}][client]" class="form-control" placeholder="Client">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tahun</label>
                            <input type="number" name="portfolios_projects[${index}][year]" class="form-control" placeholder="2024">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Deskripsi Ringkas</label>
                            <textarea name="portfolios_projects[${index}][description]" class="form-control" rows="2" placeholder="Detail pekerjaan..."></textarea>
                        </div>
                    </div>
                </div>`;
            container.insertAdjacentHTML('beforeend', html);
        }

        let testiCount = {{ count($brief->testimonials ?? [[]]) }};
        function addTestimonialRepeater() {
            const container = document.getElementById('testimonial-repeater-container');
            const index = testiCount++;
            const html = `
                <div class="repeater-box" id="testi-box-${index}">
                    <button type="button" class="btn-remove-repeater" onclick="removeRepeater('testi-box-${index}')"><i class="fa-solid fa-xmark"></i></button>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label class="form-label">Nama Pelanggan</label>
                            <input type="text" name="testimonials[${index}][client_name]" class="form-control" placeholder="Nama pelanggan">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jabatan / Perusahaan</label>
                            <input type="text" name="testimonials[${index}][position]" class="form-control" placeholder="Jabatan">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Isi Testimoni</label>
                            <textarea name="testimonials[${index}][content]" class="form-control" rows="2" placeholder="Review pelanggan..."></textarea>
                        </div>
                    </div>
                </div>`;
            container.insertAdjacentHTML('beforeend', html);
        }

        let faqCount = {{ count($brief->faqs ?? [[]]) }};
        function addFaqRepeater() {
            const container = document.getElementById('faq-repeater-container');
            const index = faqCount++;
            const html = `
                <div class="repeater-box" id="faq-box-${index}">
                    <button type="button" class="btn-remove-repeater" onclick="removeRepeater('faq-box-${index}')"><i class="fa-solid fa-xmark"></i></button>
                    <div class="row g-2">
                        <div class="col-12">
                            <label class="form-label">Pertanyaan (FAQ)</label>
                            <input type="text" name="faqs[${index}][question]" class="form-control" placeholder="Pertanyaan umum">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Jawaban</label>
                            <textarea name="faqs[${index}][answer]" class="form-control" rows="2" placeholder="Jawaban..."></textarea>
                        </div>
                    </div>
                </div>`;
            container.insertAdjacentHTML('beforeend', html);
        }

        function removeRepeater(id) {
            const el = document.getElementById(id);
            if (el) {
                el.remove();
                triggerAutoSave();
            }
        }

        // File Upload AJAX
        function handleFileUpload(input) {
            if (!input.files || !input.files[0]) return;
            const file = input.files[0];

            const formData = new FormData();
            formData.append('file', file);
            formData.append('category', 'supporting_files');

            const listContainer = document.getElementById('uploaded-files-list');
            const tempId = 'file-upload-' + Date.now();
            listContainer.insertAdjacentHTML('beforeend', `
                <div class="alert alert-info py-2 px-3 mb-2 small d-flex align-items-center justify-content-between" id="${tempId}">
                    <span><i class="fa-solid fa-spinner fa-spin me-2"></i> Mengunggah <strong>${file.name}</strong>...</span>
                </div>
            `);

            fetch("{{ route('client-portal.upload', $brief->token) }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                const tempEl = document.getElementById(tempId);
                if (data.status === 'success') {
                    tempEl.className = 'alert alert-success py-2 px-3 mb-2 small d-flex align-items-center justify-content-between';
                    tempEl.innerHTML = `
                        <span><i class="fa-solid fa-file-circle-check me-2 text-success"></i> <strong>${data.filename}</strong> berhasil terunggah</span>
                        <a href="${data.url}" target="_blank" class="btn btn-sm btn-link p-0 text-decoration-none">Buka File</a>
                    `;
                    triggerAutoSave();
                } else {
                    tempEl.className = 'alert alert-danger py-2 px-3 mb-2 small';
                    tempEl.innerHTML = `<i class="fa-solid fa-circle-exclamation me-1"></i> Gagal mengunggah file.`;
                }
            })
            .catch(err => {
                const tempEl = document.getElementById(tempId);
                if (tempEl) {
                    tempEl.className = 'alert alert-danger py-2 px-3 mb-2 small';
                    tempEl.innerHTML = `<i class="fa-solid fa-circle-exclamation me-1"></i> Koneksi terputus saat mengunggah.`;
                }
            });
        }

        function submitForm() {
            if (confirm('Apakah Anda yakin ingin mengirimkan seluruh informasi brief ini?')) {
                document.getElementById('client-brief-form').submit();
            }
        }
    </script>
</body>
</html>
