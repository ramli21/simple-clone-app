<?php

namespace App\Services;

use App\Models\Inquiry;
use App\Models\Payment;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FonnteWhatsAppService
{
    private const API_URL = 'https://api.fonnte.com/send';

    public function notifyNewInquiry(Inquiry $inquiry): bool
    {
        $message = implode("\n", [
            'Inquiry baru masuk',
            'Nama: ' . $inquiry->name,
            'Email: ' . $inquiry->email,
            'WhatsApp: ' . $inquiry->whatsapp_number,
            'Subjek: ' . $inquiry->subject,
            'Pesan: ' . $inquiry->message,
        ]);

        return $this->sendToAdmin($message, 'inquiry');
    }

    public function notifyProductOrder(Payment $payment, string $title = 'Pesanan produk baru'): bool
    {
        $product = $payment->product;
        $message = implode("\n", [
            $title,
            'ID pesanan: ' . $payment->id,
            'Produk: ' . ($product?->name ?? '-'),
            'Pembeli: ' . $payment->name,
            'Email: ' . $payment->email,
            'WhatsApp: ' . ($payment->whatsapp_number ?: '-'),
            'Total: Rp ' . number_format((int) $payment->amount_paid, 0, ',', '.'),
            'Metode pembayaran: ' . ($payment->payment_method ?: '-'),
            'Status: ' . $payment->status,
        ]);

        return $this->sendToAdmin($message, 'product_order');
    }

    public function sendToAdmin(string $message, string $event): bool
    {
        $token = config('services.fonnte.token');
        $target = config('services.fonnte.admin_number');

        if (!$token || !$target) {
            Log::warning('Fonnte notification skipped because its token or admin number is not configured.', [
                'event' => $event,
            ]);

            return false;
        }

        try {
            $response = Http::asForm()
                ->withHeaders(['Authorization' => $token])
                ->timeout(10)
                ->post(self::API_URL, [
                    'target' => $target,
                    'message' => $message,
                    'countryCode' => config('services.fonnte.country_code', '62'),
                ]);
        } catch (ConnectionException $exception) {
            Log::error('Fonnte notification request failed to connect.', [
                'event' => $event,
                'error' => $exception->getMessage(),
            ]);

            return false;
        }

        $data = $response->json();
        $accepted = $response->successful()
            && is_array($data)
            && in_array($data['status'] ?? null, [true, 1, 'true'], true);

        if (!$accepted) {
            Log::warning('Fonnte did not accept the WhatsApp notification.', [
                'event' => $event,
                'status_code' => $response->status(),
            ]);

            return false;
        }

        return true;
    }
}
