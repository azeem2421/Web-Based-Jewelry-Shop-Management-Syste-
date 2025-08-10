@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Backup Files</h3>

    <!-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif -->

   <form action="{{ route('admin.backup.createBackup') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-primary mb-3">Create New Backup</button>
</form>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Filename</th>
                <th>Size</th>
                <th>Last Modified</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($backups as $backup)
                <tr>
                    <td>{{ $backup->file_name }}</td>
                    <td>{{ $backup->file_size }}</td>
                    <td>{{ $backup->last_modified }}</td>
                    <td>
                        <a href="{{ route('admin.backup.downloadBackup', $backup->file_name) }}" class="btn btn-sm btn-success">Download</a>
                        
                        <form action="{{ route('admin.backup.deleteBackup', $backup->file_name) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this backup?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No backups found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
