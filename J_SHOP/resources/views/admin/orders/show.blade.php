@extends('layouts.admin')

@section('content')
<div class="container mt-4">

  <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Order</a></li>
      <li class="breadcrumb-item active" aria-current="page">View Order</li>
    </ol>
  </nav>

    <h3 class="mb-4">Order Details - #{{ $order->id }}</h3>

    <!-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif -->

    <div class="mb-4">
        <h5>Customer Info</h5>
        <p><strong>Name:</strong> {{ $order->user->name ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $order->address->email ?? 'N/A' }}</p>
        <p><strong>Phone:</strong> {{ $order->address->phone ?? 'N/A' }}</p>
    </div>

    <div class="mb-4">
        <h5>Shipping Address</h5>
        <p>
            {{ $order->address->address ?? 'N/A' }}<br>
            {{ $order->address->city ?? '' }}, {{ $order->address->postal_code ?? '' }}<br>
            {{ $order->address->country ?? '' }}
        </p>
    </div>

    <div class="mb-4">
        <h5>Order Items</h5>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price (Rs.)</th>
                    <th>Subtotal (Rs.)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name ?? 'N/A' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>{{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h5 class="text-end">Total: Rs. {{ number_format($order->total_price, 2) }}</h5>
    </div>

    <div class="mb-4">
        <h5>Update Order Status</h5>
        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-flex align-items-center gap-3">
            @csrf
            <select name="status" class="form-select w-auto" required>
                <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
    </div>
</div>
@endsection
