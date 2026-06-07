@extends('layouts.dashboard')

@section('title-page')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Web Templates</h1>
        <a href="{{ route('admin.templates.create') }}" class="btn btn-primary">
            <i class="ti ti-plus"></i> Add Template
        </a>
    </div>
@endsection

@section('content')
    <div class="container-fluid px-0">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>SKU</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Sales Count</th>
                                <th style="width: 180px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($templates as $template)
                                <tr>
                                    <td>
                                        <strong>{{ $template->name }}</strong>
                                        <div class="text-muted small">{{ $template->slug }}</div>
                                    </td>
                                    <td>
                                        {{ $template->sku ?? '-' }}
                                    </td>
                                    <td>{{ $template->category }}</td>
                                    <td>
                                        <span
                                            class="fw-semibold">{{ number_format((int) $template->price, 0, ',', '.') }}</span>
                                        @if (!is_null($template->discount_percentage) && (int) $template->discount_percentage > 0)
                                            <div class="text-muted small">
                                                Final: {{ number_format((int) $template->final_price, 0, ',', '.') }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($template->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ (int) $template->sales_count }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.templates.edit', $template) }}" class="btn btn-warning"
                                                title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.templates.destroy', $template) }}" method="POST"
                                                onsubmit="return confirm('Delete this template?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="text-muted">No templates found.</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-3">
            {{ $templates->links() }}
        </div>
    </div>
@endsection
