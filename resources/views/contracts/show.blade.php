@extends('layouts.dashboard')

@section('title-page')
    <div class="page-header">
        <h4>Contract Detail</h4>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $contract->contract_number }}</h3>
                <p class="text-muted">Client: {{ $contract->client->company_name ?? '-' }}</p>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Document Type</strong>
                        <div>{{ $contract->document_type }}</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Value</strong>
                        <div>{{ number_format($contract->contract_value) }}</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Period</strong>
                        <div>{{ $contract->start_date?->format('Y-m-d') }} — {{ $contract->end_date?->format('Y-m-d') }}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Status</strong>
                        <div>{{ $contract->status }}</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Signed</strong>
                        <div>{{ $contract->is_signed ? 'Yes' : 'No' }}</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Signed At / By</strong>
                        <div>{{ optional($contract->signed_at)->format('Y-m-d H:i') }}
                            {{ $contract->signed_by ? ' / ' . $contract->signed_by : '' }}</div>
                    </div>
                </div>

                <div class="mt-3">
                    @if ($contract->file_path)
                        <a href="{{ route('admin.contracts.download', $contract) }}" class="btn btn-info">Download PDF</a>
                        <a href="{{ route('admin.contracts.preview', $contract) }}" target="_blank"
                            class="btn btn-outline-primary ms-2">Preview PDF</a>
                    @endif
                    <a href="{{ route('admin.contracts.edit', $contract) }}" class="btn btn-secondary ms-2">Edit</a>
                    <a href="{{ route('admin.contracts.signatures.edit', $contract) }}" class="btn btn-warning ms-2">Edit
                        Signatures</a>
                </div>
            </div>
        </div>
    </div>
@endsection
