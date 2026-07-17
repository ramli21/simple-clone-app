@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Add New Bank Account</h1>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('admin.bank-accounts.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="bank_name" class="form-label">Bank Name</label>
      <input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name') }}" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="account_number" class="form-label">Account Number</label>
      <input type="text" name="account_number" id="account_number" value="{{ old('account_number') }}" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="account_holder" class="form-label">Account Holder</label>
      <input type="text" name="account_holder" id="account_holder" value="{{ old('account_holder') }}" class="form-control" required>
    </div>
    <div class="form-check mb-3">
      <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="form-check-input">
      <label for="is_active" class="form-check-label">Active</label>
    </div>
    <button type="submit" class="btn btn-primary">Save Bank Account</button>
    <a href="{{ route('admin.bank-accounts.index') }}" class="btn btn-link">Cancel</a>
  </form>
</div>
@endsection
