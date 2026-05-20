@php
    $isEdit = isset($portfolio) && $portfolio;
@endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $isEdit ? $portfolio->name : '') }}"
            required>
        @error('name')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Category</label>
        <input type="text" name="category" class="form-control"
            value="{{ old('category', $isEdit ? $portfolio->category : '') }}" required>
        @error('category')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label fw-bold">Link (external URL)</label>
        <input type="url" name="link" class="form-control" placeholder="https://..."
            value="{{ old('link', $isEdit ? $portfolio->link : '') }}">
        @error('link')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label fw-bold">Story</label>
        <textarea name="story" class="form-control" rows="4" required>{{ old('story', $isEdit ? $portfolio->story : '') }}</textarea>
        @error('story')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label fw-bold">Highlights</label>
        <textarea name="highlights" class="form-control" rows="4" required
            placeholder="Satu highlight per baris (atau comma/newline)\nAutomasi alur bisnis\nDashboard real-time\nKeamanan data & role akses">{{ old('highlights', $isEdit ? (is_array($portfolio->highlights) ? implode("\n", $portfolio->highlights) : $portfolio->highlights) : '') }}</textarea>
        @error('highlights')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
        <div class="text-muted small mt-1">Format: 1 item per baris.</div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label fw-bold">Image</label>
        <input type="file" name="image" class="form-control" accept="image/*">
        @error('image')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
        @if ($isEdit && $portfolio->image_url)
            <div class="mt-2">
                <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->name }}" width="120">
            </div>
        @endif
    </div>

    <div class="col-md-12 mb-3">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="published" value="1"
                id="publishedSwitch"
                {{ old('published', $isEdit ? (bool) $portfolio->published : true) ? 'checked' : '' }}>
            <label class="form-check-label" for="publishedSwitch">Published (ditampilkan di landing)</label>
        </div>
    </div>
</div>
