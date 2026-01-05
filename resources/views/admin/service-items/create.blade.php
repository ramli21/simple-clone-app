@extends('layouts.dashboard')

@section('title', 'Add New Service/Package')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Service/Package</h1>
        <a href="{{ route('admin.service-items.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.service-items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="10" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price (optional)</label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                                id="price" name="price" value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                id="thumbnail" name="thumbnail">
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                                    value="1" checked>
                                <label class="form-check-label" for="is_active">
                                    Active
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Metadata Section -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Additional Information (Metadata)</h5>
                        <small class="text-muted">Add specific information based on the type of service (e.g., min_order for
                            products, duration for travel).</small>
                    </div>
                    <div class="card-body" id="metadata-container">
                        <div class="row mb-2 metadata-row">
                            <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="Key (e.g., duration)"
                                    name="metadata[]">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="Value (e.g., 9 Days)"
                                    name="metadata_value[]">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger btn-sm w-100 remove-metadata">-</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-secondary btn-sm" id="add-metadata">+ Add More</button>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.service-items.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('metadata-container');
            const addButton = document.getElementById('add-metadata');

            addButton.addEventListener('click', function() {
                const newRow = document.createElement('div');
                newRow.className = 'row mb-2 metadata-row';
                newRow.innerHTML = `
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Key" name="metadata[]">
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Value" name="metadata_value[]">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-sm w-100 remove-metadata">-</button>
                </div>
            `;
                container.appendChild(newRow);
            });

            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-metadata')) {
                    e.target.closest('.metadata-row').remove();
                }
            });
        });
    </script>
@endsection
