<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Baru</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
        <h2 style="color: #007bff;">Inquiry Baru Diterima!</h2>
        <p>Anda menerima inquiry baru dari website. Berikut adalah detailnya:</p>

        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="font-weight: bold; width: 150px; padding: 8px; border-bottom: 1px solid #eee;">Nama:</td>
                <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $inquiry->name }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 150px; padding: 8px; border-bottom: 1px solid #eee;">Email:</td>
                <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $inquiry->email }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 150px; padding: 8px; border-bottom: 1px solid #eee;">WhatsApp:</td>
                <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $inquiry->whatsapp_number }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 150px; padding: 8px; border-bottom: 1px solid #eee;">Subjek:</td>
                <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $inquiry->subject }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 150px; padding: 8px; vertical-align: top;">Pesan:</td>
                <td style="padding: 8px;">{!! nl2br(e($inquiry->message)) !!}</td>
            </tr>
        </table>

        <hr style="margin: 20px 0; border: none; border-top: 1px solid #eee;">
        <p style="font-size: 12px; color: #777;">
            Ini adalah notifikasi otomatis dari sistem Anda. Silakan login ke panel admin untuk mengelola inquiry ini.
        </p>
    </div>
</body>

</html>
