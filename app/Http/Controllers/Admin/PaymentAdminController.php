<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductDownloadLink;

class PaymentAdminController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        $todayStart = $now->copy()->startOfDay();
        $todayEnd = $now->copy()->endOfDay();

        $weekStart = $now->copy()->startOfWeek();
        $weekEnd = $now->copy()->endOfWeek();

        $monthStart = $now->copy()->startOfMonth();
        $monthEnd = $now->copy()->endOfMonth();

        $todayCount = Payment::query()
            ->whereBetween('created_at', [$todayStart, $todayEnd])
            ->count();

        $weekCount = Payment::query()
            ->whereBetween('created_at', [$weekStart, $weekEnd])
            ->count();

        $monthCount = Payment::query()
            ->whereBetween('created_at', [$monthStart, $monthEnd])
            ->count();

        $payments = Payment::query()
            ->with('product')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.payments.index', [
            'todayCount' => $todayCount,
            'weekCount' => $weekCount,
            'monthCount' => $monthCount,
            'payments' => $payments,
        ]);
    }

    public function approve(Request $request, Payment $payment)
    {
        if ($payment->status === 'approved') {
            return back()->with('info', 'Pembayaran sudah disetujui sebelumnya.');
        }

        $payment->status = 'approved';
        $payment->save();

        // Increment sales count
        if ($payment->product) {
            $payment->product->increment('sales_count');
        }

        // Generate download token and send email
        $downloadToken = $payment->setNewOneTimeDownloadToken();
        Mail::to($payment->email)->send(new ProductDownloadLink($payment, $downloadToken));

        return back()->with('success', 'Payment disetujui, sales count diperbarui, dan email akses download telah dikirim.');
    }

    public function reject(Request $request, Payment $payment)
    {
        $payment->status = 'rejected';
        $payment->save();

        return back()->with('success', 'Payment ditolak.');
    }
}
