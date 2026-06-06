@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Create Contract</h1>

        <form action="{{ route('admin.contracts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">Client Information</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Company Name</label>
                                <input name="company_name" value="{{ old('company_name') }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Owner Name</label>
                                <input name="owner_name" value="{{ old('owner_name') }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" value="{{ old('email') }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input name="phone_number" value="{{ old('phone_number') }}" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">Contract Metadata</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Contract Number</label>
                                <input name="contract_number" value="{{ old('contract_number') }}" class="form-control"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Document Type</label>
                                <select name="document_type" class="form-select">
                                    <option>Custom Website</option>
                                    <option>Landing Page</option>
                                    <option>SabilSys</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contract Value</label>
                                <input name="contract_value" type="number" value="{{ old('contract_value') }}"
                                    class="form-control" required />
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Start Date</label>
                                    <input name="start_date" type="date" value="{{ old('start_date') }}"
                                        class="form-control" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">End Date</label>
                                    <input name="end_date" type="date" value="{{ old('end_date') }}" class="form-control"
                                        required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option>Draft</option>
                                    <option>Active</option>
                                    <option>Expired</option>
                                    <option>Terminated</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contract File (PDF)</label>
                                <input name="file" type="file" accept="application/pdf" class="form-control"
                                    required />
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" name="is_signed" value="1" class="form-check-input"
                                    id="is_signed" />
                                <label class="form-check-label" for="is_signed">Signed</label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Signed At</label>
                                <input name="signed_at" type="datetime-local" value="{{ old('signed_at') }}"
                                    class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Signed By</label>
                                <input name="signed_by" value="{{ old('signed_by') }}" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.contracts.index') }}" class="mr-2 btn btn-secondary">Cancel</a>
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
