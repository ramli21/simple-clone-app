@extends('layouts.dashboard')

@section('title', 'Manage Inquiries')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Company Profile</h1>
        @if (!$company)
            <a href="{{ route('admin.company-profiles.create') }}" class="btn btn-primary">Create Company Profile</a>
        @endif
    </div>

    @if ($company)
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Company Information</h5>
                <a href="{{ route('admin.company-profiles.edit', $company->id) }}"
                    class="btn btn-sm btn-outline-primary">Edit</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $company->name }}</p>
                        <p><strong>Category:</strong> {{ ucfirst($company->category) }}</p>
                        <p><strong>Email:</strong> {{ $company->email ?? 'Not set' }}</p>
                        <p><strong>Phone:</strong> {{ $company->phone ?? 'Not set' }}</p>
                        <p><strong>Address:</strong> {{ $company->address ?? 'Not set' }}</p>
                    </div>
                    <div class="col-md-6">
                        @if ($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}"
                                class="img-thumbnail mb-3" style="max-height: 200px;">
                        @endif
                        @if ($company->social_media && !empty($company->social_media))
                            <p><strong>Social Media:</strong></p>
                            <ul>
                                @foreach ($company->social_media as $platform => $url)
                                    <li>{{ ucfirst($platform) }}: <a href="{{ $url }}"
                                            target="_blank">{{ $url }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="mt-3">
                    <p><strong>About Us:</strong></p>
                    <p>{{ $company->about_us ?? 'Not set' }}</p>
                </div>
                <div class="mt-3">
                    <p><strong>Vision & Mission:</strong></p>
                    <p>{{ $company->vision_mission ?? 'Not set' }}</p>
                </div>
            </div>
        </div>
    @endif
@endsection
