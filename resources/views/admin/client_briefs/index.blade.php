@extends('layouts.dashboard')

@section('content')
<div class="pc-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Client Portals</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Client Portals</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="ti ti-check me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="ti ti-alert-circle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Main Content Card -->
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
            <h5 class="mb-0">Daftar Brief Klien Pemesanan Website</h5>
            <a href="{{ route('admin.client-briefs.create') }}" class="btn btn-primary">
                <i class="ti ti-plus me-1"></i> Buat Portal Baru
            </a>
        </div>
        <div class="card-body">
            <!-- Filter & Search Form -->
            <form action="{{ route('admin.client-briefs.index') }}" method="GET" class="row g-2 mb-4">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama klien, email, atau perusahaan..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Semua Status --</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="submitted" {{ request('status') == 'submitted' ? 'selected' : '' }}>Submitted (Terkirim)</option>
                        <option value="in_review" {{ request('status') == 'in_review' ? 'selected' : '' }}>In Review</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-secondary w-100"><i class="ti ti-search me-1"></i> Cari</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Klien / Perusahaan</th>
                            <th>Kontak</th>
                            <th>Status Brief</th>
                            <th>Kelengkapan</th>
                            <th>Link Portal Klien</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($briefs as $brief)
                            <tr>
                                <td>
                                    <div class="fw-bold text-dark">{{ $brief->company_name_title ?? $brief->company_info['name'] ?? 'Belum ada nama' }}</div>
                                    <small class="text-muted"><i class="ti ti-user me-1"></i>{{ $brief->client_name ?? 'Klien' }}</small>
                                </td>
                                <td>
                                    <small class="d-block text-muted"><i class="ti ti-mail me-1"></i>{{ $brief->client_email ?? '-' }}</small>
                                    <small class="d-block text-muted"><i class="ti ti-phone me-1"></i>{{ $brief->client_phone ?? '-' }}</small>
                                </td>
                                <td>
                                    @php
                                        $statusClass = [
                                            'draft' => 'bg-light-secondary text-secondary',
                                            'submitted' => 'bg-light-primary text-primary',
                                            'in_review' => 'bg-light-warning text-warning',
                                            'in_progress' => 'bg-light-info text-info',
                                            'completed' => 'bg-light-success text-success',
                                        ][$brief->status] ?? 'bg-light-secondary text-secondary';
                                    @endphp
                                    <span class="badge {{ $statusClass }} text-uppercase fs-7">{{ $brief->status }}</span>
                                </td>
                                <td style="min-width: 130px;">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <small class="fw-bold fs-7">{{ $brief->progress_percentage }}%</small>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $brief->progress_percentage }}%;"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group input-group-sm" style="max-width: 240px;">
                                        <input type="text" class="form-control form-control-sm bg-light" value="{{ route('client-portal.show', $brief->token) }}" readonly id="link-{{ $brief->id }}">
                                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="copyLink('link-{{ $brief->id }}')" title="Salin Link">
                                            <i class="ti ti-copy"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.client-briefs.show', $brief->id) }}" class="btn btn-outline-primary" title="Lihat Detail">
                                            <i class="ti ti-eye"></i> Detail
                                        </a>
                                        <a href="{{ route('admin.client-briefs.export-pdf', $brief->id) }}" target="_blank" class="btn btn-outline-secondary" title="Cetak Brief">
                                            <i class="ti ti-printer"></i>
                                        </a>
                                        <form action="{{ route('admin.client-briefs.destroy', $brief->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus brief ini?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"><i class="ti ti-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">Belum ada data Client Brief yang tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $briefs->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    function copyLink(id) {
        const input = document.getElementById(id);
        input.select();
        navigator.clipboard.writeText(input.value);
        alert('Link portal berhasil disalin ke clipboard!');
    }
</script>
@endsection
