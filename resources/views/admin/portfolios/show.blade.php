@extends('layouts.dashboard')

@section('title', 'Portfolio Detail')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Portfolio Detail</h1>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.portfolios.index') }}" class="btn btn-outline-primary">Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    @if ($portfolio->image_url)
                        <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->name }}" class="img-fluid rounded">
                    @else
                        <div class="text-muted">No image</div>
                    @endif
                </div>

                <div class="col-md-8">
                    <h3 class="mb-2">{{ $portfolio->name }}</h3>
                    <div class="mb-3">
                        <span class="badge bg-info">{{ $portfolio->category }}</span>
                        <span class="badge bg-{{ $portfolio->published ? 'success' : 'secondary' }} ms-2">
                            {{ $portfolio->published ? 'Published' : 'Unpublished' }}
                        </span>
                    </div>
                    <p class="text-muted">{{ $portfolio->story }}</p>

                    <h6 class="fw-bold">Highlights</h6>
                    <ul class="ps-3">
                        @forelse(($portfolio->highlights ?? []) as $h)
                            <li class="text-muted">{{ $h }}</li>
                        @empty
                            <li class="text-muted">-</li>
                        @endforelse
                    </ul>

                    @if ($portfolio->link)
                        <a href="{{ $portfolio->link }}" class="btn btn-outline-primary" target="_blank"
                            rel="noopener">Open Link</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
