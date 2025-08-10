@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.system_users.index') }}">System Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add System Users</li>
        </ol>
    </nav>

    <h2>Add System User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.system_users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Assign Modules</label>
            <div class="row">
                @foreach($modules as $module)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="modules[]" value="{{ $module->id }}" id="module_{{ $module->id }}">
                            <label class="form-check-label" for="module_{{ $module->id }}">
                                {{ $module->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create User</button>
        <a href="{{ route('admin.system_users.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
