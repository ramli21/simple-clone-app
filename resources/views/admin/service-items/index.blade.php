@extends('layouts.dashboard')

@section('title', 'Manage Services/Packages')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Services/Packages</h1>
        <a href="{{ route('admin.service-items.create') }}" class="btn btn-primary">Add New</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td>
                                    @if ($service->thumbnail)
                                        <img src="{{ asset('storage/' . $service->thumbnail) }}" alt="{{ $service->title }}"
                                            width="50">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->category->name }}</td>
                                <td>{{ $service->price ? number_format($service->price, 2) : '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $service->is_active ? 'success' : 'secondary' }}">
                                        {{ $service->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.service-items.destroy', $service->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.service-items.show', $service->id) }}"
                                            class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('admin.service-items.edit', $service->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No services found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $services->links() }}
            </div>
        </div>
    </div>
@endsection
