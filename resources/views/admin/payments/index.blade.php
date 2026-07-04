@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="h3 fw-bold text-dark mb-1">Admin Payments</h1>
                <p class="text-muted small mb-0">Laporan pembeli & manajemen transaksi</p>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success fw-bold small" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row mb-4">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small fw-bold mb-1">Hari ini</div>
                        <div class="fs-2 fw-bold text-dark">{{ $todayCount }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small fw-bold mb-1">Minggu ini</div>
                        <div class="fs-2 fw-bold text-dark">{{ $weekCount }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small fw-bold mb-1">Bulan ini</div>
                        <div class="fs-2 fw-bold text-dark">{{ $monthCount }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h5 class="mb-0 fw-bold text-dark">Daftar Transaksi</h5>
                    <small class="text-muted">Total per halaman: 15</small>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-muted">
                        <tr>
                            <th class="py-3 px-4 fw-bold">Produk</th>
                            <th class="py-3 px-4 fw-bold">Pembeli</th>
                            <th class="py-3 px-4 fw-bold">Nominal</th>
                            <th class="py-3 px-4 fw-bold">Status</th>
                            <th class="py-3 px-4 fw-bold">Waktu</th>
                            <th class="py-3 px-4 fw-bold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $payment)
                            <tr>
                                <td class="py-3 px-4">
                                    <div class="fw-bold text-dark">{{ $payment->Produk?->name ?? '-' }}</div>
                                    <div class="small text-muted">{{ $payment->Produk?->slug ?? '' }}</div>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="fw-bold text-dark">{{ $payment->name }}</div>
                                    <div class="small text-muted">{{ $payment->email }}</div>
                                    <div class="small text-muted">WA: {{ $payment->whatsapp_number }}</div>
                                    <div class="small text-muted">{{ $payment->sender_bank_info }}</div>
                                </td>
                                <td class="py-3 px-4 fw-bold text-dark">
                                    Rp{{ number_format((int) $payment->amount_paid, 0, ',', '.') }}
                                </td>
                                <td class="py-3 px-4">
                                    @php
                                        $status = $payment->status;
                                        $badge = match ($status) {
                                            'approved' => 'bg-success',
                                            'rejected' => 'bg-danger',
                                            default => 'bg-warning text-dark',
                                        };
                                    @endphp
                                    <span class="badge {{ $badge }} rounded-pill px-3 py-2 fw-bold text-uppercase" style="font-size: 0.7rem;">
                                        {{ $status }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-muted small">
                                    {{ $payment->created_at?->format('d M Y H:i') }}
                                </td>
                                <td class="py-3 px-4">
                                    <div class="d-flex flex-wrap gap-2">
                                        @if ($payment->status !== 'approved')
                                            <form method="POST" action="{{ route('admin.payments.approve', $payment) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm fw-bold">Approve</button>
                                            </form>
                                        @endif

                                        @if ($payment->status !== 'rejected')
                                            <form method="POST" action="{{ route('admin.payments.reject', $payment) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm fw-bold">Reject</button>
                                            </form>
                                        @endif
                                    </div>

                                    @if ($payment->proof_image)
                                        <a href="{{ asset('storage/' . ltrim($payment->proof_image, '/')) }}"
                                            target="_blank"
                                            class="d-block mt-2 small fw-bold text-primary text-decoration-none">
                                            Lihat Bukti
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-5 px-4 text-center text-muted fw-bold">
                                    Belum ada transaksi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-white py-3 px-4">
                {{ $payments->links() }}
            </div>
        </div>
    </div>
@endsection
