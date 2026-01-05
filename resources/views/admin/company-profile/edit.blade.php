@extends('layouts.dashboard')

@section('title', 'Edit Company Profile')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Company Profile</h1>
        <a href="{{ route('admin.company-profiles.index') }}" class="btn btn-secondary">Back to Profile</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.company-profiles.update', $companyProfile->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Company Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $companyProfile->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select @error('category') is-invalid @enderror" id="category"
                                name="category" required>
                                <option value="">Select Category</option>
                                <option value="manufacturing"
                                    {{ old('category', $companyProfile->category) == 'manufacturing' ? 'selected' : '' }}>
                                    Manufacturing</option>
                                <option value="travel"
                                    {{ old('category', $companyProfile->category) == 'travel' ? 'selected' : '' }}>Travel
                                    Agency</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email', $companyProfile->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" value="{{ old('phone', $companyProfile->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2">{{ old('address', $companyProfile->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                                name="logo">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if ($companyProfile->logo)
                                <small class="text-muted d-block mt-2">
                                    Current Logo: <br>
                                    <img src="{{ asset('storage/' . $companyProfile->logo) }}" alt="Current Logo"
                                        width="100" class="img-thumbnail mt-1">
                                </small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="about_us" class="form-label">About Us</label>
                            <textarea class="form-control @error('about_us') is-invalid @enderror" id="about_us" name="about_us" rows="4">{{ old('about_us', $companyProfile->about_us) }}</textarea>
                            @error('about_us')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="vision_mission" class="form-label">Vision & Mission</label>
                            <textarea class="form-control @error('vision_mission') is-invalid @enderror" id="vision_mission" name="vision_mission"
                                rows="4">{{ old('vision_mission', $companyProfile->vision_mission) }}</textarea>
                            @error('vision_mission')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Dynamic Social Media Section -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Social Media</h5>
                        <small class="text-muted">Add links to your social media profiles.</small>
                    </div>
                    <div class="card-body" id="social-media-container">
                        @if ($companyProfile->social_media && count($companyProfile->social_media) > 0)
                            @foreach ($companyProfile->social_media as $platform => $url)
                                <div class="row mb-2 social-media-row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Platform (e.g., Facebook)"
                                            name="social_media[]" value="{{ ucfirst($platform) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="url" class="form-control"
                                            placeholder="URL (e.g., https://facebook.com/yourpage)"
                                            name="social_media_url[]" value="{{ $url }}">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button"
                                            class="btn btn-danger btn-sm w-100 remove-social-media">-</button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row mb-2 social-media-row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Platform (e.g., Facebook)"
                                        name="social_media[]">
                                </div>
                                <div class="col-md-6">
                                    <input type="url" class="form-control"
                                        placeholder="URL (e.g., https://facebook.com/yourpage)" name="social_media_url[]">
                                </div>
                                <div class="col-md-2">
                                    <button type="button"
                                        class="btn btn-danger btn-sm w-100 remove-social-media">-</button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-secondary btn-sm" id="add-social-media">+ Add
                            Platform</button>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a href="{{ route('admin.company-profiles.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('social-media-container');
            const addButton = document.getElementById('add-social-media');

            // Fungsi untuk menambah baris social media baru
            addButton.addEventListener('click', function() {
                const newRow = document.createElement('div');
                newRow.className = 'row mb-2 social-media-row';
                newRow.innerHTML = `
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Platform" name="social_media[]">
            </div>
            <div class="col-md-6">
                <input type="url" class="form-control" placeholder="URL" name="social_media_url[]">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm w-100 remove-social-media">-</button>
            </div>
        `;
                container.appendChild(newRow);
            });

            // Event delegation untuk menghapus baris (bekerja untuk elemen yang sudah ada dan yang baru ditambahkan)
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-social-media')) {
                    e.target.closest('.social-media-row').remove();
                }
            });
        });
    </script>
@endsection
