@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>{{ $blog->title }}</h1>
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Content</h5>
                                <div class="content-preview">
                                    {!! $blog->content !!}
                                    {{-- {!! nl2br(e()) !!} --}}
                                </div>
                            </div>
                        </div>

                        @if ($blog->excerpt)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Excerpt</h5>
                                    <p>{{ $blog->excerpt }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Details</h5>

                                @if ($blog->image)
                                    <img src="{{ $blog->image }}" alt="ABCD" class="img-fluid mb-3">
                                @endif

                                <div class="mb-3">
                                    <label class="form-label text-muted">Category</label>
                                    @if ($blog->category)
                                        <p>
                                            <span class="badge bg-info">{{ $blog->category->name }}</span>
                                        </p>
                                    @else
                                        <p class="text-muted">-</p>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-muted">Author</label>
                                    <p>{{ $blog->author->name }}</p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-muted">Status</label>
                                    <p>
                                        @if ($blog->published_at)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-secondary">Draft</span>
                                        @endif
                                    </p>
                                </div>

                                @if ($blog->published_at)
                                    <div class="mb-3">
                                        <label class="form-label text-muted">Published Date</label>
                                        <p>{{ $blog->published_at->format('F d, Y H:i') }}</p>
                                    </div>
                                @endif

                                @if ($blog->is_featured)
                                    <div class="mb-3">
                                        <p><span class="badge bg-warning">Featured Post</span></p>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label class="form-label text-muted">Created</label>
                                    <p>{{ $blog->created_at->format('F d, Y H:i') }}</p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-muted">Updated</label>
                                    <p>{{ $blog->updated_at->format('F d, Y H:i') }}</p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-muted">Slug</label>
                                    <p><code>{{ $blog->slug }}</code></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .content-preview {
            line-height: 1.8;
            color: #333;
        }
    </style>
@endsection
