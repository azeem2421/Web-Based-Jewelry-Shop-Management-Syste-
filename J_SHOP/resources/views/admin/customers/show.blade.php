@extends('layouts.admin')

@section('content')
<div class="container mt-4">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.customers.index') }}">Customers</a></li>
      <li class="breadcrumb-item active" aria-current="page">Customer Details</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4>Customer Details</h4>
      <a href="{{ route('admin.customers.index') }}" class="btn btn-sm btn-secondary">← Back</a>
    </div>
    <div class="card-body">
      <ul class="list-group">
        <li class="list-group-item"><strong>Name:</strong> {{ $customer->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $customer->email }}</li>
        <li class="list-group-item"><strong>Phone:</strong> {{ $customer->latestAddress->phone ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Address:</strong> {{ $customer->latestAddress->address ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Registered On:</strong> {{ $customer->created_at->format('d M Y - h:i A') }}</li>
      </ul>
    </div>
  </div>
</div>
@endsection
