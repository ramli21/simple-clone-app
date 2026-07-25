<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dokumen Brief Pemesanan Website - {{ $brief->company_name_title ?? $brief->client_name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.5;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #4f46e5;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            color: #4f46e5;
        }
        .section-title {
            background: #f1f5f9;
            padding: 6px 10px;
            font-weight: bold;
            font-size: 13px;
            color: #1e293b;
            margin-top: 15px;
            border-left: 4px solid #4f46e5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
        }
        table, th, td {
            border: 1px solid #cbd5e1;
        }
        th, td {
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background-color: #f8fafc;
            width: 30%;
        }
        .badge {
            background: #e2e8f0;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 11px;
        }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>

    <div class="no-print" style="margin-bottom: 15px; text-align: right;">
        <button onclick="window.print()" style="padding: 8px 16px; background: #4f46e5; color: white; border: none; border-radius: 6px; cursor: pointer;">Cetak / Save as PDF</button>
    </div>

    <div class="header">
        <h2>AkhriTech - Client Brief Website</h2>
        <p style="margin: 4px 0 0 0; color: #64748b;">Dokumen Spesifikasi & Kebutuhan Informasi Pemesanan Website</p>
    </div>

    <table>
        <tr><th>Nama Klien:</th><td>{{ $brief->client_name }}</td></tr>
        <tr><th>Email / HP:</th><td>{{ $brief->client_email }} / {{ $brief->client_phone }}</td></tr>
        <tr><th>Nama Perusahaan:</th><td>{{ $brief->company_name_title ?? $brief->company_info['name'] ?? '-' }}</td></tr>
        <tr><th>Status & Kelengkapan:</th><td>Status: {{ strtoupper($brief->status) }} (Kelengkapan: {{ $brief->progress_percentage }}%)</td></tr>
    </table>

    <div class="section-title">1. Informasi Perusahaan & Branding</div>
    <table>
        <tr><th>Brand / Tagline:</th><td>{{ $brief->company_info['brand_name'] ?? '-' }} / {{ $brief->company_info['tagline'] ?? '-' }}</td></tr>
        <tr><th>Tahun Berdiri:</th><td>{{ $brief->company_info['founded_year'] ?? '-' }}</td></tr>
        <tr><th>Deskripsi:</th><td>{{ $brief->company_info['short_description'] ?? '-' }}</td></tr>
        <tr><th>Visi & Misi:</th><td>{{ $brief->company_info['vision'] ?? '-' }} | {{ $brief->company_info['mission'] ?? '-' }}</td></tr>
        <tr><th>Warna Brand:</th><td>{{ $brief->company_info['brand_colors'] ?? '-' }}</td></tr>
    </table>

    <div class="section-title">2. Informasi Kontak & Media Sosial</div>
    <table>
        <tr><th>Alamat & Maps:</th><td>{{ $brief->contact_info['address'] ?? '-' }} ({{ $brief->contact_info['gmaps_link'] ?? '-' }})</td></tr>
        <tr><th>WhatsApp / Telp / Email:</th><td>{{ $brief->contact_info['whatsapp'] ?? '-' }} / {{ $brief->contact_info['phone'] ?? '-' }} / {{ $brief->contact_info['email'] ?? '-' }}</td></tr>
        <tr><th>Media Sosial:</th><td>IG: {{ $brief->social_media['instagram'] ?? '-' }} | FB: {{ $brief->social_media['facebook'] ?? '-' }} | TikTok: {{ $brief->social_media['tiktok'] ?? '-' }}</td></tr>
    </table>

    <div class="section-title">3. Bisnis & Kompetitor</div>
    <table>
        <tr><th>Industri & Target:</th><td>{{ $brief->business_info['industry'] ?? '-' }} (Target: {{ $brief->business_info['target_market'] ?? '-' }})</td></tr>
        <tr><th>USP / Keunggulan:</th><td>{{ $brief->business_info['advantages'] ?? '-' }}</td></tr>
        <tr><th>Kompetitor Utama:</th><td>1. {{ $brief->business_info['competitor_1'] ?? '-' }} | 2. {{ $brief->business_info['competitor_2'] ?? '-' }}</td></tr>
    </table>

    <div class="section-title">4. Domain, Hosting & Email</div>
    <table>
        <tr><th>Domain & Hosting:</th><td>Domain: {{ $brief->domain_hosting['domain_name'] ?? '-' }} ({{ $brief->domain_hosting['has_domain'] ?? '-' }}) | Hosting: {{ $brief->domain_hosting['has_hosting'] ?? '-' }}</td></tr>
        <tr><th>Kredensial Login:</th><td>{{ $brief->domain_hosting['credentials'] ?? '-' }}</td></tr>
        <tr><th>Email Perusahaan:</th><td>{{ $brief->email_info['accounts_list'] ?? '-' }}</td></tr>
    </table>

    <div class="section-title">5. Fitur & Referensi Desain</div>
    <table>
        <tr><th>Fitur Dipilih:</th><td>{{ implode(', ', $brief->features_checklist ?? []) }}</td></tr>
        <tr><th>Gaya Desain & Warna:</th><td>Gaya: {{ $brief->design_references['style_choice'] ?? '-' }} | Warna: {{ $brief->design_references['favorite_colors'] ?? '-' }}</td></tr>
        <tr><th>Target & CTA Utama:</th><td>Tujuan: {{ implode(', ', $brief->target_website ?? []) }} | CTA: {{ $brief->cta_info['main_cta'] ?? '-' }}</td></tr>
    </table>

    <div class="section-title">6. Catatan Tambahan</div>
    <p>{{ $brief->additional_notes ?? 'Tidak ada catatan tambahan.' }}</p>

</body>
</html>
