@extends('layouts.dashboard')

@section('title-page')
    <div class="page-header">
        <h4>Contracts</h4>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 mb-0">Contracts</h1>
            <a href="{{ route('admin.contracts.create') }}" class="btn btn-primary">New Contract</a>
        </div>

        <form method="GET" class="mb-3">
            <div class="input-group">
                <input name="q" value="{{ request('q') }}" placeholder="Search contract or client"
                    class="form-control" />
                <button class="btn btn-outline-secondary">Search</button>
            </div>
        </form>

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Contract</th>
                            <th>Client</th>
                            <th>Doc Type</th>
                            <th>Status</th>
                            <th>Signed</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contracts as $contract)
                            <tr>
                                <td>{{ $loop->iteration + ($contracts->currentPage() - 1) * $contracts->perPage() }}</td>
                                <td>{{ $contract->contract_number }}</td>
                                <td>{{ $contract->client->company_name ?? '-' }}</td>
                                <td>{{ $contract->document_type }}</td>
                                <td>
                                    @if ($contract->status === 'Active')
                                        <span class="badge bg-success">{{ $contract->status }}</span>
                                    @elseif($contract->status === 'Draft')
                                        <span class="badge bg-warning text-dark">{{ $contract->status }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $contract->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($contract->is_signed)
                                        <span class="badge bg-success">Signed</span>
                                        <div class="small text-muted">
                                            {{ optional($contract->signed_at)->format('Y-m-d H:i') }} by
                                            {{ $contract->signed_by }}</div>
                                    @else
                                        <span class="badge bg-secondary">Not signed</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.contracts.show', $contract) }}"
                                        class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('admin.contracts.edit', $contract) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.contracts.destroy', $contract) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Delete contract?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">{{ $contracts->links() }}</div>
    </div>
@endsection
