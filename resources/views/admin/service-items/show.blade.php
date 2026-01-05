@extends('layouts.dashboard')

@section('title', 'Service Detail: ' . $serviceItem->title)

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $serviceItem->title }}</h1>
        <div>
            <a href="{{ route('admin.service-items.edit', $serviceItem->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.service-items.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Description</h5>
                    <p>{!! $serviceItem->description !!}</p>
                </div>
            </div>

            <!-- Tampilkan Itinerary jika ada -->
            @if ($serviceItem->category->name == 'Travel Packages' || $serviceItem->itineraries->isNotEmpty())
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Itinerary</h5>
                    </div>
                    <div class="card-body">
                        @if ($serviceItem->itineraries->isNotEmpty())
                            <div class="accordion" id="itineraryAccordion">
                                @foreach ($serviceItem->itineraries->sortBy('day_number') as $itinerary)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $itinerary->id }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $itinerary->id }}">
                                                Day {{ $itinerary->day_number }}: {{ $itinerary->activity_title }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $itinerary->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#itineraryAccordion">
                                            <div class="accordion-body">
                                                {{ $itinerary->activity_description }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted">No itinerary added yet.</p>
                        @endif
                    </div>
                </div>
            @endif
            <div class="mt-3">
                <a href="{{ route('admin.itineraries.create', $serviceItem->id) }}" class="btn btn-sm btn-primary">Add
                    Itinerary</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Details</h5>
                    <p><strong>Category:</strong> {{ $serviceItem->category->name }}</p>
                    <p><strong>Slug:</strong> {{ $serviceItem->slug }}</p>
                    <p><strong>Price:</strong> {{ $serviceItem->price ? number_format($serviceItem->price, 2) : '-' }}</p>
                    <p><strong>Status:</strong> <span
                            class="badge bg-{{ $serviceItem->is_active ? 'success' : 'secondary' }}">{{ $serviceItem->is_active ? 'Active' : 'Inactive' }}</span>
                    </p>
                    @if ($serviceItem->thumbnail)
                        <p><strong>Thumbnail:</strong></p>
                        <img src="{{ asset('storage/' . $serviceItem->thumbnail) }}" alt="{{ $serviceItem->title }}"
                            class="img-fluid">
                    @endif
                </div>
            </div>

            <!-- Tampilkan Metadata -->
            @if ($serviceItem->metadata && !empty($serviceItem->metadata))
                <div class="card mt-4">
                    <div class="card-body">
                        <h5>Additional Information</h5>
                        <ul>
                            @foreach ($serviceItem->metadata as $key => $value)
                                <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
