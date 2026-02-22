@extends('layouts.app')

@push('styles')
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}" />
@endpush

@section('content')
    <section class="py-5 mt-5">

        <div class="container">
            <h1 class="mb-4">{{ $blog->title }}</h1>
            <img src="{{ asset($blog->image) }}" class="img-fluid mb-4" alt="{{ $blog->title }}">
            <p>{{ $blog->content }}</p>
        </div>

    </section>
@endsection
