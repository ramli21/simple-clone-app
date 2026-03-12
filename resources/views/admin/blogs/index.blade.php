@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Blog Posts</h1>
                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> New Blog Post
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Featured</th>
                                    <th>Published</th>
                                    <th>Viewers</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($blogs as $blog)
                                    <tr>
                                        <td>
                                            <strong>{{ Str::limit($blog->title, 40) }}</strong>
                                        </td>
                                        <td>
                                            @if ($blog->category)
                                                <span class="badge bg-info">{{ $blog->category->name }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $blog->author->name ?? '-' }}</td>
                                        <td>
                                            @if ($blog->is_featured)
                                                <span class="badge bg-warning">Featured</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($blog->published_at)
                                                <small>{{ $blog->published_at->format('M d, Y') }}</small>
                                            @else
                                                <span class="text-muted">Draft</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $blog->views }}
                                        </td>
                                        <td>
                                            <small>{{ $blog->created_at->format('M d, Y') }}</small>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('admin.blogs.show', $blog) }}" class="btn btn-info"
                                                    title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-warning"
                                                    title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" title="Delete"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <p class="text-muted">No blog posts found. <a
                                                    href="{{ route('admin.blogs.create') }}">Create one</a></p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-4">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
