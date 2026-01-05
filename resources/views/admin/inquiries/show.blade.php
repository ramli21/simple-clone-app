@extends('layouts.dashboard')

@section('title', 'Inquiry Detail from ' . $inquiry->name)

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Inquiry Detail</h1>
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $inquiry->subject }}</h5>
                    <p class="card-text">{{ $inquiry->message }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sender Information</h5>
                    <p class="card-text"><strong>Name:</strong> {{ $inquiry->name }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $inquiry->email }}</p>
                    <p class="card-text"><strong>WhatsApp:</strong> {{ $inquiry->whatsapp_number }}</p>
                    <p class="card-text"><strong>Date:</strong> {{ $inquiry->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Update Status</h5>
                    <form action="{{ route('admin.inquiries.update', $inquiry->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <select name="status" class="form-select" required>
                                <option value="new" {{ $inquiry->status == 'new' ? 'selected' : '' }}>New</option>
                                <option value="contacted" {{ $inquiry->status == 'contacted' ? 'selected' : '' }}>Contacted
                                </option>
                                <option value="closed" {{ $inquiry->status == 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
