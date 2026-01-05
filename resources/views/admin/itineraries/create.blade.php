@extends('layouts.dashboard')

@section('title', 'Add Itinerary for ' . $serviceItem->title)

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Itinerary for: {{ $serviceItem->title }}</h1>
        <a href="{{ route('admin.service-items.show', $serviceItem->id) }}" class="btn btn-secondary">Back to Service</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.itineraries.store', $serviceItem->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label for="day_number" class="form-label">Day</label>
                            <input type="number" class="form-control @error('day_number') is-invalid @enderror"
                                id="day_number" name="day_number" value="{{ old('day_number') }}" required>
                            @error('day_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="mb-3">
                            <label for="activity_title" class="form-label">Activity Title</label>
                            <input type="text" class="form-control @error('activity_title') is-invalid @enderror"
                                id="activity_title" name="activity_title" value="{{ old('activity_title') }}" required>
                            @error('activity_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="activity_description" class="form-label">Activity Description</label>
                    <textarea class="form-control @error('activity_description') is-invalid @enderror" id="activity_description"
                        name="activity_description" rows="5" required>{{ old('activity_description') }}</textarea>
                    @error('activity_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Save Itinerary</button>
                    <a href="{{ route('admin.service-items.show', $serviceItem->id) }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
