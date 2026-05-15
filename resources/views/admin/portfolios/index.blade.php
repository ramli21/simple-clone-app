@extends('layouts.dashboard')

@section('title', 'Manage Portfolios')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Portfolios</h1>
        <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">Add New</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($portfolios as $portfolio)
                            <tr>
                                <td>
                                    @if ($portfolio->image_url)
                                        <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->name }}" width="50">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $portfolio->name }}</td>
                                <td>{{ $portfolio->category }}</td>
                                <td>
                                    <span class="badge bg-{{ $portfolio->published ? 'success' : 'secondary' }}">
                                        {{ $portfolio->published ? 'Published' : 'Unpublished' }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.portfolios.show', $portfolio->id) }}"
                                            class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No portfolios found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $portfolios->links() }}
            </div>
        </div>
    </div>
@endsection
