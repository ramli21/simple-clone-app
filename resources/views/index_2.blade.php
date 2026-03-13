@extends('layouts.app')

@push('styles')
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}" />
@endpush

@push('metadata')
    @include('partials.meta-tags')
@endpush

@section('content')
    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>
@endsection

@push('scripts')
    <script>
        let alertMessage;
        alertMessage = "{{ $message }}"

        if (alertMessage !== '') {
            showToast(alertMessage)
        }
    </script>
@endpush
