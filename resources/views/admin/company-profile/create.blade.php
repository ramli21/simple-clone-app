<!-- ... (bagian form lainnya tetap sama) ... -->
@extends('layouts.dashboard')

@section('title', 'Create Company Profile')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Create Company Profile</h1>
        <a href="{{ route('admin.company-profiles.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.company-profiles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Company Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select @error('category') is-invalid @enderror" id="category"
                                name="category" required>
                                <option value="">Select Category</option>
                                <option value="manufacturing" {{ old('category') == 'manufacturing' ? 'selected' : '' }}>
                                    Manufacturing</option>
                                <option value="travel" {{ old('category') == 'travel' ? 'selected' : '' }}>Travel Agency
                                </option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                                name="logo">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="about_us" class="form-label">About Us</label>
                            <textarea class="form-control @error('about_us') is-invalid @enderror" id="about_us" name="about_us" rows="4">{{ old('about_us') }}</textarea>
                            @error('about_us')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="vision_mission" class="form-label">Vision & Mission</label>
                            <textarea class="form-control @error('vision_mission') is-invalid @enderror" id="vision_mission" name="vision_mission"
                                rows="4">{{ old('vision_mission') }}</textarea>
                            @error('vision_mission')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Social Media</label>
                            <div id="social-media-container">
                                <div class="row mb-2 social-media-row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Platform (e.g., Facebook)"
                                            name="social_media_platform[]">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="url" class="form-control"
                                            placeholder="URL (e.g., https://facebook.com/yourpage)"
                                            name="social_media_url[]">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button"
                                            class="btn btn-danger btn-sm w-100 remove-social-media">-</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary btn-sm" id="add-social-media">+ Add
                                Platform</button>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
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

            addButton.addEventListener('click', function() {
                const newRow = document.createElement('div');
                newRow.className = 'row mb-2 social-media-row';
                newRow.innerHTML = `
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Platform" name="social_media_platform[]">
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

            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-social-media')) {
                    e.target.closest('.social-media-row').remove();
                }
            });
        });
    </script>
@endsection
