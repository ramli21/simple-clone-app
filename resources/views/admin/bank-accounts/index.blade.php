@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Bank Accounts</h1>
        <a href="{{ route('admin.bank-accounts.create') }}" class="btn btn-primary">Add New Bank Account</a>
    </div>
    <div class="row">
        @foreach ($bankAccounts as $bank)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $bank->bank_name }}</h5>
                        <p class="card-text"><strong>Account:</strong> {{ $bank->account_number }}</p>
                        <p class="card-text"><strong>Account Holder:</strong> {{ $bank->account_holder }}</p>
                        <p class="card-text text-muted">Status: {{ $bank->is_active ? 'Active' : 'Inactive' }}</p>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between">
                        <a href="{{ route('admin.bank-accounts.edit', $bank) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('admin.bank-accounts.destroy', $bank) }}" method="POST" onsubmit="return confirm('Delete this bank account?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
