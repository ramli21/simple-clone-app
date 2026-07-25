@extends('layouts.dashboard')

@section('content')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Buat Client Portal Baru</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.client-briefs.index') }}">Client Portals</a></li>
                        <li class="breadcrumb-item">Buat Baru</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card col-md-8 mx-auto">
        <div class="card-header">
            <h5 class="mb-0">Form Pembuatan Portal Klien</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.client-briefs.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Klien / Pemesan <span class="text-danger">*</span></label>
                    <input type="text" name="client_name" class="form-control" required placeholder="Contoh: Bpk. Budi Santoso">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Perusahaan / Brand</label>
                    <input type="text" name="company_name_title" class="form-control" placeholder="Contoh: PT AkhriTech Digital">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Email Klien</label>
                        <input type="email" name="client_email" class="form-control" placeholder="klien@gmail.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor WhatsApp / HP</label>
                        <input type="tel" name="client_phone" class="form-control" placeholder="081234567890">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Tautkan ke Order Pembayaran (Opsional)</label>
                    <select name="payment_id" class="form-select">
                        <option value="">-- Tanpa Tautan Pembayaran --</option>
                        @foreach($payments as $p)
                            <option value="{{ $p->id }}">{{ $p->customer_name ?? 'Pelanggan' }} - {{ $p->product->name ?? 'Produk' }} (Rp {{ number_format($p->amount_paid, 0, ',', '.') }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.client-briefs.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="ti ti-check me-1"></i> Generate Client Portal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
