<?php

namespace App\Services;

use App\Models\Payment;
use App\Mail\ProductDownloadLink;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class GoQrisService
{
    protected string $baseUrl;
    protected string $apiKey;
    protected string $projectName;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('services.goqris.base_url', 'https://api.goqris.web.id'), '/');
        $this->apiKey = config('services.goqris.api_key', '');
        $this->projectName = config('services.goqris.project_name', 'AkhriTech');
    }

    /**
     * Create dynamic QRIS transaction via GoQRIS Order API.
     *
     * @param Payment $payment
     * @param int $expiredMinutes
     * @return array
     * @throws \Exception
     */
    public function createQrTransaction(Payment $payment, int $expiredMinutes = 15): array
    {
        Log::info('Initiating GoQRIS order creation for Payment ID: ' . $payment->id);

        $response = Http::timeout(10)->post("{$this->baseUrl}/order", [
            'apikey' => $this->apiKey,
            'nama_project' => $this->projectName,
            'ref_id' => $payment->id,
            'amount' => (int) $payment->amount_paid,
            'customer_name' => $payment->name,
            'expired' => $expiredMinutes,
        ]);

        Log::info('GoQRIS API Response: ' . json_encode($response->json()));

        if ($response->failed()) {
            Log::error('GoQRIS API Connection Failed: ' . $response->body());
            throw new \Exception('Failed to connect to GoQRIS server.');
        }

        $data = $response->json();

        if (($data['status'] ?? '') !== 'success') {
            Log::error('GoQRIS API Business Logic Error: ' . json_encode($data));
            throw new \Exception($data['message'] ?? 'GoQRIS transaction creation failed.');
        }

        return $data['data'];
    }

    /**
     * Check transaction status via GoQRIS Status API.
     *
     * @param string $refId
     * @return array
     * @throws \Exception
     */
    public function checkQrStatus(string $refId): array
    {
        Log::debug('Checking GoQRIS status for Reference ID: ' . $refId);

        $response = Http::timeout(10)->post("{$this->baseUrl}/status", [
            'apikey' => $this->apiKey,
            'ref_id' => $refId,
        ]);

        Log::info('GoQRIS Status API Response: ' . json_encode($response->json()));

        if ($response->failed()) {
            Log::error('GoQRIS Status API Connection Failed: ' . $response->body());
            throw new \Exception('Failed to connect to GoQRIS server for status check.');
        }

        $data = $response->json();

        if (($data['status'] ?? '') !== 'success') {
            Log::error('GoQRIS Status API Business Logic Error: ' . json_encode($data));
            throw new \Exception($data['message'] ?? 'GoQRIS status check failed.');
        }

        return $data['data'];
    }

    /**
     * Mark a payment as approved, generate download token, send email, and update sales counter.
     *
     * @param Payment $payment
     * @return void
     */
    public function handlePaymentSuccess(Payment $payment): void
    {
        if ($payment->status === 'approved') {
            return;
        }

        Log::info("Processing successful payment for Payment ID: {$payment->id}");

        $payment->status = 'approved';
        $payment->save();

        // Increment sales count of the related product
        if ($payment->product) {
            $payment->product->increment('sales_count');
        }

        // Generate download token and send email
        $downloadToken = $payment->setNewOneTimeDownloadToken();
        Mail::to($payment->email)->send(new ProductDownloadLink($payment, $downloadToken));

        Log::info("Successful payment processed and email sent for Payment ID: {$payment->id}");
    }
}

