<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9fafb;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #4f46e5;
            padding-bottom: 20px;
        }

        .header h1 {
            color: #1f2937;
            font-size: 28px;
            margin: 0;
        }

        .content {
            margin: 30px 0;
        }

        .product-info {
            background-color: #f3f4f6;
            padding: 20px;
            border-radius: 6px;
            margin: 20px 0;
        }

        .product-info p {
            margin: 8px 0;
            font-size: 14px;
        }

        .product-info strong {
            color: #1f2937;
        }

        .download-btn {
            display: inline-block;
            background-color: #4f46e5;
            color: white;
            padding: 14px 32px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin: 20px 0;
            text-align: center;
        }

        .download-btn:hover {
            background-color: #4338ca;
        }

        .code-box {
            background-color: #f0f9ff;
            border-left: 4px solid #4f46e5;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }

        .code-box .code {
            font-family: 'Courier New', monospace;
            font-size: 18px;
            font-weight: bold;
            color: #4f46e5;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .social-links {
            margin-top: 20px;
        }

        .social-links a {
            color: #4f46e5;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🎉 Terima Kasih!</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Halo {{ $payment->name }},</p>

            <p>Terima kasih telah membeli <strong>{{ $payment->product->name }}</strong> dari Akhritech! Kami sangat
                menghargai kepercayaan Anda.</p>

            <p>Produk Anda siap untuk diunduh. Klik tombol di bawah ini untuk mengakses file Anda:</p>

            <!-- Download Button -->
            <div style="text-align: center;">
                <a href="{{ $downloadUrl }}" class="download-btn">📥 Download Sekarang</a>
            </div>

            <p>Atau salin link ini di browser Anda:</p>
            <div class="code-box">
                <div style="word-break: break-all; font-size: 12px;">{{ $downloadUrl }}</div>
            </div>

            <!-- Product Info -->
            <div class="product-info">
                <p><strong>Informasi Pesanan:</strong></p>
                <p><strong>Produk:</strong> {{ $payment->product->name }}</p>
                <p><strong>Email:</strong> {{ $payment->email }}</p>
                <p><strong>Kode Unik:</strong> <span class="code">{{ $payment->unique_code }}</span></p>
                @if ($payment->amount_paid > 0)
                    <p><strong>Jumlah:</strong> Rp{{ number_format($payment->amount_paid, 0, ',', '.') }}</p>
                @else
                    <p><strong>Status:</strong> Gratis</p>
                @endif
            </div>

            <!-- Instructions -->
            <h3 style="color: #1f2937; margin-top: 30px;">Langkah Selanjutnya:</h3>
            <ol style="padding-left: 20px;">
                <li>Klik tombol "Download Sekarang" atau gunakan link di atas</li>
                <li>Ekstrak file ZIP yang telah diunduh</li>
                <li>Baca dokumentasi yang disertakan dalam paket</li>
                <li>Jika ada pertanyaan, jangan ragu untuk menghubungi support kami</li>
            </ol>

            <!-- Support Notice -->
            <div
                style="background-color: #fef3c7; border-left: 4px solid #f59e0b; padding: 15px; margin: 30px 0; border-radius: 4px;">
                <p style="margin: 0;"><strong>📞 Butuh Bantuan?</strong></p>
                <p style="margin: 8px 0 0 0;">Tim support kami tersedia 24/7 untuk membantu instalasi, troubleshooting,
                    dan pertanyaan lainnya. Hubungi kami di WhatsApp: +62 812-3456-7890</p>
            </div>

            <p>Terima kasih telah menjadi bagian dari komunitas Akhritech!</p>

            <p>Salam,<br>
                <strong>Tim Akhritech</strong>
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Email ini dikirim ke {{ $payment->email }} karena Anda baru saja membeli produk dari Akhritech.</p>
            <p>Untuk pertanyaan, silakan balas email ini atau hubungi kami melalui website.</p>
            <div class="social-links">
                <a href="https://www.akhritech.com">Website</a> |
                <a href="https://wa.me/628123456789">WhatsApp</a> |
                <a href="https://instagram.com/akhritech">Instagram</a>
            </div>
            <p style="margin-top: 15px;">&copy; 2024 Akhritech. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
