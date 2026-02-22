@extends('layouts.app')

@push('styles')
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}" />
@endpush

@section('content')
    <section class="py-5 mt-5">

        <div class="container">
            <h1 class="mb-4">Blogs</h1>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset($blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary mt-auto">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
