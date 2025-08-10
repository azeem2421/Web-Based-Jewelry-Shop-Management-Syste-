@extends('layouts.admin')

@section('title', 'Career Applications')

@section('content')
<div class="container mt-4">

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Career Applications</li>
    </ol>
  </nav>

  <h3 class="mb-4">👨‍💼 Career Applications</h3>

  <!-- {{-- Flash Messages --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif -->

  @if($applications->count())
  <div class="table-responsive shadow-sm border rounded-4">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Submitted</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($applications as $index => $app)
        <tr>
          <td>{{ $applications->firstItem() + $index }}</td>
          <td>{{ $app->name }}</td>
          <td>{{ $app->email }}</td>
          <td>{{ $app->role }}</td>
          <td>{{ $app->created_at->format('d M Y, h:i A') }}</td>
          <td>
            @if($app->checked)
              <span class="badge bg-success">Checked</span>
            @else
              <span class="badge bg-warning text-dark">Pending</span>
            @endif
          </td>
          <td class="d-flex gap-1">
            <a href="{{ route('admin.careers.download', $app->id) }}" class="btn btn-sm btn-outline-primary">
              <i class="bi bi-download"></i>
            </a>
            @if(!$app->checked)
            <form action="{{ route('admin.careers.check', $app->id) }}" method="POST">
              @csrf
              <button class="btn btn-sm btn-outline-success" type="submit">
                <i class="bi bi-check2-circle"></i>
              </button>
            </form>
            @endif
            <form action="{{ route('admin.careers.delete', $app->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this application?');">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">
                <i class="bi bi-trash3"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Pagination --}}
  <div class="mt-4">
    {{ $applications->links('pagination::bootstrap-5') }}
  </div>

  @else
    <div class="alert alert-info">No career applications submitted yet.</div>
  @endif

</div>
@endsection
