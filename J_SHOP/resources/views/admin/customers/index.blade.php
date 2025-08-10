@extends('layouts.admin')

@section('content')
<div class="container mt-4">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Customers</li>
    </ol>
  </nav>

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Customer List</h2>
    <a href="{{ route('admin.customers.report') }}" class="btn btn-success">
      <i class="bi bi-file-earmark-bar-graph"></i> Generate Report
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Registered On</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($customers as $customer)
            <tr>
              <td>{{ $customer->id }}</td>
              <td>{{ $customer->name }}</td>
              <td>{{ $customer->email }}</td>
              <td>{{ $customer->latestAddress->phone ?? 'N/A' }}</td>
              <td>{{ $customer->latestAddress->address ?? 'N/A' }}</td>
              <td>{{ $customer->created_at->format('d M Y') }}</td>
              <td>
                <a href="{{ route('admin.customers.show', $customer->id) }}" class="btn btn-sm btn-primary">
                  View
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center">No customers found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
