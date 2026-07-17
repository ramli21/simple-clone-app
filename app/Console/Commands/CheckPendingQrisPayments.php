<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Payment;
use App\Services\GoQrisService;

class CheckPendingQrisPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qris:check-payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check status of pending QRIS payments from GoQRIS API';

    /**
     * Execute the console command.
     */
    public function handle(GoQrisService $goQrisService)
    {
        $this->info('Starting pending QRIS payments check...');

        // 1. Fetch payments that are pending and not yet expired (with 10 min grace period after expiry)
        $pendingPayments = Payment::where('payment_method', 'qris')
            ->where('status', 'pending')
            ->where('qris_expires_at', '>=', now()->subMinutes(10))
            ->get();

        $this->info('Found ' . $pendingPayments->count() . ' pending QRIS payments to check.');

        foreach ($pendingPayments as $payment) {
            try {
                $statusData = $goQrisService->checkQrStatus($payment->id);
                $paymentStatus = $statusData['payment_status'] ?? 'pending';

                if ($paymentStatus === 'paid') {
                    $goQrisService->handlePaymentSuccess($payment);
                    $this->info("Payment ID {$payment->id} was PAID. Updated status to approved.");
                } else {
                    $this->line("Payment ID {$payment->id} is still {$paymentStatus}.");
                }
            } catch (\Exception $e) {
                $this->error("Failed checking status for Payment ID {$payment->id}: " . $e->getMessage());
            }
        }

        // 2. Fetch and mark expired payments as rejected/expired (older than 15 mins after expiry)
        $expiredPayments = Payment::where('payment_method', 'qris')
            ->where('status', 'pending')
            ->where('qris_expires_at', '<', now()->subMinutes(15))
            ->get();

        if ($expiredPayments->isNotEmpty()) {
            $this->info('Found ' . $expiredPayments->count() . ' expired pending payments. Marking them as rejected...');
            foreach ($expiredPayments as $payment) {
                $payment->update(['status' => 'rejected']);
                $this->warn("Payment ID {$payment->id} marked as REJECTED due to expiration.");
            }
        }

        $this->info('Finished checking QRIS payments.');
    }
}
