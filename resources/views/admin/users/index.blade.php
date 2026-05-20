@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Users</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-secondary">View</a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('admin.users.reset-password.form', $user) }}"
                                class="btn btn-sm btn-warning">Reset Password</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                style="display:inline-block" onsubmit="return confirm('Delete user?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
@endsection
