@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">System Users</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between mb-3">
        <h4>System Users</h4>
        <a href="{{ route('admin.system_users.create') }}" class="btn btn-primary">Add System User</a>
        <a href="{{ route('admin.system_users.report') }}" target="_blank" class="btn btn-secondary me-2">Generate Report</a>
        
    </div>

    <!-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif -->

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Assigned Modules</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @forelse($user->modules as $module)
                                <span class="badge bg-info text-dark">{{ $module->name }}</span>
                            @empty
                                <span class="text-muted">No Modules</span>
                            @endforelse
                        </td>
                        <td>
                            <a href="{{ route('admin.system_users.edit', $user->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>

                            <form action="{{ route('admin.system_users.destroy', $user->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No system users found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
