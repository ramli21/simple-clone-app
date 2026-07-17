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
            <div
                class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
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
                                    <div class="fw-bold text-dark">{{ $payment->product?->name ?? '-' }}</div>
                                    <div class="small text-muted">{{ $payment->product?->slug ?? '' }}</div>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="fw-bold text-dark">{{ $payment->name }}</div>
                                    <div class="small text-muted">{{ $payment->email }}</div>
                                    <div class="small text-muted">WA: {{ $payment->whatsapp_number }}</div>
                                    <div class="small text-muted">{{ $payment->sender_bank_info }}</div>
                                </td>
                                <td class="py-3 px-4 fw-bold text-dark">
                                    @if ($payment->payment_method === 'qris' && $payment->qris_total_amount)
                                        Rp{{ number_format((int) $payment->qris_total_amount, 0, ',', '.') }}
                                        <div class="small text-muted fw-normal" style="font-size: 0.75rem;">(QRIS
                                            +Rp{{ $payment->qris_unique_code }})</div>
                                    @elseif ($payment->payment_method === 'manual' && $payment->manual_unique_code)
                                        Rp{{ number_format((int) ($payment->amount_paid + $payment->manual_unique_code), 0, ',', '.') }}
                                        <div class="small text-muted fw-normal" style="font-size: 0.75rem;">(Manual
                                            +Rp{{ $payment->manual_unique_code }})</div>
                                    @else
                                        Rp{{ number_format((int) $payment->amount_paid, 0, ',', '.') }}
                                    @endif
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
                                    <span class="badge {{ $badge }} rounded-pill px-3 py-2 fw-bold text-uppercase"
                                        style="font-size: 0.7rem;">
                                        {{ $status }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-muted small">
                                    {{ $payment->created_at?->format('d M Y H:i') }}
                                </td>
                                <td class="py-3 px-4">
                                    <div class="d-flex flex-wrap gap-2 align-items-center">
                                        <button type="button" class="btn btn-primary btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#paymentDetailModal-{{ $payment->id }}">
                                            Detail
                                        </button>

                                        @if ($payment->status !== 'approved')
                                            <form method="POST" action="{{ route('admin.payments.approve', $payment) }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm fw-bold">Approve</button>
                                            </form>
                                        @endif

                                        @if ($payment->status !== 'rejected')
                                            <form method="POST" action="{{ route('admin.payments.reject', $payment) }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm fw-bold">Reject</button>
                                            </form>
                                        @endif
                                    </div>
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

    <!-- Detail Modals rendered outside of the table to prevent layout breakdown -->
    @foreach ($payments as $payment)
        @php
            $status = $payment->status;
            $badge = match ($status) {
                'approved' => 'bg-success',
                'rejected' => 'bg-danger',
                default => 'bg-warning text-dark',
            };
        @endphp
        <div class="modal fade" id="paymentDetailModal-{{ $payment->id }}" tabindex="-1" aria-labelledby="paymentDetailModalLabel-{{ $payment->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="paymentDetailModalLabel-{{ $payment->id }}">
                            Detail Transaksi - {{ $payment->unique_code }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        <div class="row">
                            <!-- Left Column: Customer & Product Info -->
                            <div class="col-md-6 border-end">
                                <h6 class="fw-bold text-primary mb-3">Informasi Pelanggan</h6>
                                <table class="table table-sm table-borderless">
                                    <tr>
                                        <th class="text-muted" style="width: 120px;">Nama</th>
                                        <td>: {{ $payment->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Email</th>
                                        <td>: {{ $payment->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">WhatsApp</th>
                                        <td>: {{ $payment->whatsapp_number }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Perusahaan</th>
                                        <td>: {{ $payment->company_name ?? '-' }}</td>
                                    </tr>
                                </table>

                                <h6 class="fw-bold text-primary mt-4 mb-3">Informasi Produk</h6>
                                <table class="table table-sm table-borderless">
                                    <tr>
                                        <th class="text-muted" style="width: 120px;">Produk</th>
                                        <td>: {{ $payment->product?->name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Metode</th>
                                        <td>: <span class="badge bg-secondary text-uppercase">{{ $payment->payment_method }}</span></td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Status</th>
                                        <td>: 
                                            <span class="badge {{ $badge }} text-uppercase">{{ $payment->status }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Waktu</th>
                                        <td>: {{ $payment->created_at?->format('d M Y H:i:s') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Right Column: Payment Specific Details -->
                            <div class="col-md-6">
                                @if ($payment->payment_method === 'qris')
                                    <h6 class="fw-bold text-primary mb-3">Detail Transaksi QRIS (GoQris)</h6>
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <th class="text-muted" style="width: 140px;">ID Transaksi QRIS</th>
                                            <td>: {{ $payment->qris_trx_id ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Jumlah Base</th>
                                            <td>: Rp{{ number_format((int) $payment->qris_amount, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Kode Unik</th>
                                            <td>: Rp{{ number_format((int) $payment->qris_unique_code, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Total Pembayaran</th>
                                            <td class="fw-bold text-primary">: Rp{{ number_format((int) $payment->qris_total_amount, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Kedaluwarsa</th>
                                            <td>: {{ $payment->qris_expires_at?->format('d M Y H:i:s') ?? '-' }}</td>
                                        </tr>
                                    </table>
                                    @if ($payment->qris_qr_image)
                                        <div class="text-center mt-3">
                                            <p class="small text-muted mb-1">QR Code QRIS</p>
                                            <img src="{{ $payment->qris_qr_image }}" alt="QRIS QR Code" class="img-fluid rounded border p-2" style="max-height: 180px;">
                                        </div>
                                    @endif
                                @else
                                    <h6 class="fw-bold text-primary mb-3">Detail Transfer Manual</h6>
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <th class="text-muted" style="width: 140px;">Jumlah Base</th>
                                            <td>: Rp{{ number_format((int) $payment->amount_paid, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Kode Unik</th>
                                            <td>: Rp{{ number_format((int) $payment->manual_unique_code, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Total Transfer</th>
                                            <td class="fw-bold text-primary">: Rp{{ number_format((int) ($payment->amount_paid + $payment->manual_unique_code), 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Bank Pengirim</th>
                                            <td>: {{ $payment->sender_bank_info ?? '-' }}</td>
                                        </tr>
                                    </table>

                                    @if ($payment->proof_image && $payment->proof_image !== 'free' && $payment->proof_image !== 'pending_qris')
                                        <div class="mt-3">
                                            <p class="small text-muted mb-1">Bukti Transfer</p>
                                            @php
                                                $isPdf = str_ends_with(strtolower($payment->proof_image), '.pdf');
                                            @endphp
                                            @if ($isPdf)
                                                <div class="border rounded p-3 text-center bg-light">
                                                    <i class="fa-solid fa-file-pdf text-danger fs-1 mb-2"></i>
                                                    <div>
                                                        <a href="{{ asset('storage/' . ltrim($payment->proof_image, '/')) }}" target="_blank" class="btn btn-outline-danger btn-sm">
                                                            Buka File PDF Bukti Transfer
                                                        </a>
                                                    </div>
                                                </div>
                                            @else
                                                <a href="{{ asset('storage/' . ltrim($payment->proof_image, '/')) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . ltrim($payment->proof_image, '/')) }}" alt="Bukti Transfer" class="img-fluid rounded border shadow-sm w-100" style="max-height: 250px; object-fit: contain;">
                                                </a>
                                                <div class="text-center mt-1">
                                                    <small class="text-muted">Klik gambar untuk memperbesar</small>
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <div class="alert alert-secondary mt-3 mb-0 py-2 small text-center">
                                            Tidak ada bukti transfer (Gratis atau belum diunggah)
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @if ($payment->status !== 'approved')
                            <form method="POST" action="{{ route('admin.payments.approve', $payment) }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success fw-bold">Approve Payment</button>
                            </form>
                        @endif
                        @if ($payment->status !== 'rejected')
                            <form method="POST" action="{{ route('admin.payments.reject', $payment) }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger fw-bold">Reject Payment</button>
                            </form>
                        @endif
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
