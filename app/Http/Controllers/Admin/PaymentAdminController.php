<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
            ->paginate(15);

        return view('admin.payments.index', [
            'todayCount' => $todayCount,
            'weekCount' => $weekCount,
            'monthCount' => $monthCount,
            'payments' => $payments,
        ]);
    }

    public function approve(Request $request, Payment $payment)
    {
        $payment->status = 'approved';
        $payment->save();

        return back()->with('success', 'Payment disetujui.');
    }

    public function reject(Request $request, Payment $payment)
    {
        $payment->status = 'rejected';
        $payment->save();

        return back()->with('success', 'Payment ditolak.');
    }
}

