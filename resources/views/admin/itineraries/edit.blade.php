@extends('layouts.dashboard')

@section('title', 'Edit Itinerary')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Itinerary: Day {{ $itinerary->day_number }}</h1>
        <a href="{{ route('admin.service-items.show', $itinerary->service_item_id) }}" class="btn btn-secondary">Back to
            Service</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.itineraries.update', $itinerary->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label for="day_number" class="form-label">Day</label>
                            <input type="number" class="form-control @error('day_number') is-invalid @enderror"
                                id="day_number" name="day_number" value="{{ old('day_number', $itinerary->day_number) }}"
                                required>
                            @error('day_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="mb-3">
                            <label for="activity_title" class="form-label">Activity Title</label>
                            <input type="text" class="form-control @error('activity_title') is-invalid @enderror"
                                id="activity_title" name="activity_title"
                                value="{{ old('activity_title', $itinerary->activity_title) }}" required>
                            @error('activity_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="activity_description" class="form-label">Activity Description</label>
                    <textarea class="form-control @error('activity_description') is-invalid @enderror" id="activity_description"
                        name="activity_description" rows="5" required>{{ old('activity_description', $itinerary->activity_description) }}</textarea>
                    @error('activity_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Itinerary</button>
                    <a href="{{ route('admin.service-items.show', $itinerary->service_item_id) }}"
                        class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
