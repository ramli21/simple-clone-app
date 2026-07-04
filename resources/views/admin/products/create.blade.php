@extends('layouts.dashboard')

@section('title-page')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Produk</h1>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection

@push('styles')
    <!-- include summernote css/js -->
    <link href="{{ asset('vendors/summernote/summernote-bs5.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid px-0">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

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
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">SKU</label>
                            <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
                                value="{{ old('sku') }}" placeholder="TMP-001">
                            @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Short Description</label>
                            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="3"
                                required>{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Description (HTML/Markdown)</label>
                            <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror"
                                rows="6" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Category</label>
                            <input type="text" name="category"
                                class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}"
                                required>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Stack</label>
                            <input type="text" name="stack" class="form-control @error('stack') is-invalid @enderror"
                                value="{{ old('stack') }}" placeholder="Laravel, Tailwind">
                            @error('stack')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Price</label>
                            <input type="number" name="price" min="0"
                                class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                                required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Discount %</label>
                            <input type="number" name="discount_percentage" min="0" max="100"
                                class="form-control @error('discount_percentage') is-invalid @enderror"
                                value="{{ old('discount_percentage') }}" placeholder="0-100">
                            @error('discount_percentage')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Is Active</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    id="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                            @error('is_active')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Preview URL</label>
                            <input type="text" name="preview_url"
                                class="form-control @error('preview_url') is-invalid @enderror"
                                value="{{ old('preview_url') }}" placeholder="https://...">
                            @error('preview_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Delivery Type</label>
                            <select name="delivery_type" id="deliveryType"
                                class="form-select @error('delivery_type') is-invalid @enderror">
                                @foreach (['file' => 'file', 'github_repo' => 'github_repo', 'external_link' => 'external_link'] as $value => $label)
                                    <option value="{{ $value }}"
                                        {{ old('delivery_type', 'file') === $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('delivery_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3" id="fileUploadField" style="display: none;">
                            <label class="form-label fw-bold">File Upload (ZIP)</label>
                            <input type="file" name="produk_file"
                                class="form-control @error('produk_file') is-invalid @enderror" accept=".zip">
                            @error('produk_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="text-muted small mt-1">Upload file ZIP Produk (max 100MB)</div>
                        </div>

                        <div class="col-md-6 mb-3" id="downloadPathField">
                            <label class="form-label fw-bold">Download Path</label>
                            <input type="text" name="download_path"
                                class="form-control @error('download_path') is-invalid @enderror"
                                value="{{ old('download_path') }}" placeholder="path/di-privatkan/produk">
                            @error('download_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Thumbnail Image</label>
                            <input type="file" name="thumbnail_image"
                                class="form-control @error('thumbnail_image') is-invalid @enderror" accept="image/*">
                            @error('thumbnail_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Images (3-6 screenshots)</label>
                            <input type="file" name="images[]"
                                class="form-control @error('images') is-invalid @enderror" accept="image/*" multiple>
                            @error('images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @error('images.*')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <div class="text-muted small mt-1">Pilih beberapa file gambar untuk field images[].</div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Sales Count</label>
                            <input type="number" name="sales_count" min="0"
                                class="form-control @error('sales_count') is-invalid @enderror"
                                value="{{ old('sales_count', 0) }}">
                            @error('sales_count')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection


@push('scripts')
    <script src="{{ asset('vendors/summernote/summernote-bs5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deliveryTypeSelect = document.getElementById('deliveryType');
            const fileUploadField = document.getElementById('fileUploadField');
            const downloadPathField = document.getElementById('downloadPathField');

            function toggleDeliveryFields() {
                const selectedType = deliveryTypeSelect.value;
                if (selectedType === 'file') {
                    fileUploadField.style.display = 'block';
                    downloadPathField.style.display = 'none';
                } else {
                    fileUploadField.style.display = 'none';
                    downloadPathField.style.display = 'block';
                }
            }

            // Trigger on load
            toggleDeliveryFields();

            // Trigger on change
            deliveryTypeSelect.addEventListener('change', toggleDeliveryFields);
        });
    </script>
@endpush
