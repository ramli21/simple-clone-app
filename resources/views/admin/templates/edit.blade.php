@extends('layouts.dashboard')

@section('title-page')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Web Template</h1>
        <a href="{{ route('admin.templates.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection

@section('content')
    <div class="container-fluid px-0">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.templates.update', $template) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $template->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">SKU</label>
                            <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
                                value="{{ old('sku', $template->sku) }}" placeholder="TMP-001">
                            @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Short Description</label>
                            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="3"
                                required>{{ old('short_description', $template->short_description) }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Description (HTML/Markdown)</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="6" required>{{ old('description', $template->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Category</label>
                            <input type="text" name="category"
                                class="form-control @error('category') is-invalid @enderror"
                                value="{{ old('category', $template->category) }}" required>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Stack</label>
                            <input type="text" name="stack" class="form-control @error('stack') is-invalid @enderror"
                                value="{{ old('stack', $template->stack) }}" placeholder="Laravel, Tailwind">
                            @error('stack')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Price</label>
                            <input type="number" name="price" min="0"
                                class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price', $template->price) }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Discount %</label>
                            <input type="number" name="discount_percentage" min="0" max="100"
                                class="form-control @error('discount_percentage') is-invalid @enderror"
                                value="{{ old('discount_percentage', $template->discount_percentage) }}"
                                placeholder="0-100">
                            @error('discount_percentage')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Is Active</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    id="is_active" {{ old('is_active', $template->is_active) ? 'checked' : '' }}>
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
                                value="{{ old('preview_url', $template->preview_url) }}" placeholder="https://...">
                            @error('preview_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Download Path</label>
                            <input type="text" name="download_path"
                                class="form-control @error('download_path') is-invalid @enderror"
                                value="{{ old('download_path', $template->download_path) }}"
                                placeholder="path/di-privatkan/produk">
                            @error('download_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Delivery Type</label>
                            <select name="delivery_type"
                                class="form-select @error('delivery_type') is-invalid @enderror">
                                @foreach (['file' => 'file', 'github_repo' => 'github_repo', 'external_link' => 'external_link'] as $value => $label)
                                    <option value="{{ $value }}"
                                        {{ old('delivery_type', $template->delivery_type) === $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('delivery_type')
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
                            @if (!empty($template->thumbnail_image))
                                <div class="mt-2">
                                    <img src="{{ Storage::disk('public')->url($template->thumbnail_image) }}"
                                        alt="Thumbnail" style="max-width: 140px;" class="img-thumbnail">
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Images (multiple)</label>
                            <input type="file" name="images[]"
                                class="form-control @error('images') is-invalid @enderror" accept="image/*" multiple>
                            @error('images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @error('images.*')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                            @php
                                $existingImages = is_array($template->images) ? $template->images : [];
                            @endphp

                            @if (count($existingImages) > 0)
                                <div class="mt-3">
                                    <div class="row g-2">
                                        @foreach ($existingImages as $path)
                                            <div class="col-6 col-md-3">
                                                <img src="{{ Storage::disk('public')->url($path) }}" alt="screenshot"
                                                    class="img-thumbnail" style="max-height: 120px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Sales Count</label>
                            <input type="number" name="sales_count" min="0"
                                class="form-control @error('sales_count') is-invalid @enderror"
                                value="{{ old('sales_count', $template->sales_count) }}">
                            @error('sales_count')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-9 mb-3">
                            <label class="form-label fw-bold">Final Price (computed)</label>
                            <div class="form-control bg-light" style="height: auto;">
                                {{ number_format((int) $template->final_price, 0, ',', '.') }}</div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.templates.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
