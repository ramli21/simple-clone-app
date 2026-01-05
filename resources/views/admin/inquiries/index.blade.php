@extends('layouts.dashboard')

@section('title', 'Manage Inquiries')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Inquiries</h1>
    </div>

    <!-- Filter -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.inquiries.index') }}">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <label for="status" class="form-label">Filter by Status</label>
                        <select name="status" id="status" class="form-select" onchange="this.form.submit()">
                            <option value="all" {{ $status == 'all' ? 'selected' : '' }}>All Status</option>
                            <option value="new" {{ $status == 'new' ? 'selected' : '' }}>New</option>
                            <option value="contacted" {{ $status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="closed" {{ $status == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Received Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($inquiries as $inquiry)
                            <tr>
                                <td>{{ $inquiry->name }}</td>
                                <td>{{ $inquiry->email }}</td>
                                <td>{{ $inquiry->subject }}</td>
                                <td>{{ $inquiry->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $inquiry->status == 'new' ? 'primary' : ($inquiry->status == 'contacted' ? 'info' : 'secondary') }}">
                                        {{ ucfirst($inquiry->status) }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.inquiries.show', $inquiry->id) }}"
                                            class="btn btn-sm btn-info">View</a>
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this inquiry?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No inquiries found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $inquiries->links() }}
            </div>
        </div>
    </div>
@endsection
