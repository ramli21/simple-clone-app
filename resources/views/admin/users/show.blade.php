@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>User: {{ $user->name }}</h1>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Created:</strong> {{ $user->created_at }}</p>

        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('admin.users.reset-password.form', $user) }}" class="btn btn-warning">Reset Password</a>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
