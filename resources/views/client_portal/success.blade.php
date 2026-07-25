<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brief Berhasil Terkirim - AkhriTech Client Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .success-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 40px 30px;
            max-width: 540px;
            text-align: center;
            border: 1px solid #e2e8f0;
        }
        .icon-circle {
            width: 80px;
            height: 80px;
            background: #dcfce7;
            color: #16a34a;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container px-3">
        <div class="success-card mx-auto">
            <div class="icon-circle">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <h3 class="fw-bold text-dark mb-2">Informasi Brief Berhasil Diterima!</h3>
            <p class="text-muted mb-4">
                Terima kasih <strong>{{ $brief->company_name_title ?? $brief->client_name ?? 'Klien' }}</strong>. Tim pengembang website AkhriTech telah menerima data dan dokumen brief Anda.
            </p>

            <div class="bg-light p-3 rounded-3 mb-4 text-start small">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Status Pengerjaan:</span>
                    <span class="badge bg-primary text-white text-uppercase">{{ $brief->status }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Kelengkapan Data:</span>
                    <span class="fw-bold text-success">{{ $brief->progress_percentage }}%</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Waktu Penyerahan:</span>
                    <span class="fw-medium">{{ $brief->submitted_at ? $brief->submitted_at->format('d M Y, H:i') : now()->format('d M Y, H:i') }} WIB</span>
                </div>
            </div>

            <p class="small text-muted mb-4">
                Kami akan segera meninjau brief Anda dan menghubungi via WhatsApp/Email apabila membutuhkan konfirmasi tambahan. Anda dapat membuka kembali link portal ini kapan saja untuk memantau status.
            </p>

            <div class="d-grid gap-2">
                <a href="{{ route('client-portal.show', $brief->token) }}" class="btn btn-outline-primary py-2 fw-semibold">
                    <i class="fa-solid fa-eye me-1"></i> Lihat / Edit Kembali Brief Anda
                </a>
            </div>
        </div>
    </div>
</body>
</html>
