@extends('layouts.admin')

@section('content')
    <div class="container mt-4">


      <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
      </nav>

        <h3 class="mb-4">🛒 Order Management</h3>

        <!-- {{-- Flash messages --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif -->

        {{-- Total Sales --}}
        <div class="alert alert-info">
            <strong>Total Sales (Completed Orders):</strong> Rs. {{ number_format($totalSales, 2) }}
        </div>


        {{-- Filter Form --}}
        <form method="GET" action="{{ route('admin.orders.index') }}" class="d-flex align-items-center mb-3 gap-2">
            <label for="status" class="form-label mb-0 me-2">Filter by Status:</label>
            <select name="status" class="form-select w-auto" onchange="this.form.submit()">
                <option value="">All</option>
                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ request('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">Reset</a>
        </form>

         <!-- <form method="GET" action="{{ route('admin.orders.index') }}" class="d-flex align-items-center mb-3 gap-2">
            <label for="status" class="form-label mb-0 me-2">Filter by date:</label>
            <select name="status" class="form-select w-auto" onchange="this.form.submit()">
                <option value="">All</option>
                                     @foreach($orders as $ord)
                                        <option value="{{ $ord->created_at->format('d M Y') }}" {{ request('created_at') == $ord->created_at ? 'selected' : '' }}>
                                            {{ $ord->created_at->format('d M Y') }}
                                        </option>
                                    @endforeach
            </select>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">Reset</a>
        </form> -->

        {{-- Report Button --}}
        <div class="mb-3">
            <a href="{{ route('admin.orders.report') }}" class="btn btn-sm btn-outline-danger">
                <i class="bi bi-file-earmark-pdf-fill me-1"></i> Download PDF Report
            </a>
        </div>

        {{-- Orders Table --}}
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Total (Rs.)</th>
                        <th>Status</th>
                        <th>Ordered On</th>
                        <th>Actions</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
                <tbody>



                    @forelse ($orders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ $order->user->name ?? 'Guest' }}</td>
                                        <td>{{ number_format($order->total_price, 2) }}</td>
                                        <td>
                                            <span class="badge
                                                @if($order->status === 'Completed') bg-success
                                                @elseif($order->status === 'Pending') bg-warning
                                                @elseif($order->status === 'Cancelled') bg-danger
                                                @else bg-secondary
                                                @endif">
                                                {{ $order->status }}
                                            </span>
                                        </td>

                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-eye"></i> View
                                            </a>

                                                <form action="{{ route('admin.orders.sendInvoice', $order->id) }}" method="POST" style="display:inline;">

                         <td>                       
                        @csrf
                        <button type="submit" class="btn btn-sm btn-secondary" onclick="return confirm('Send invoice to customer?')">
                            <i class="bi bi-send-fill"></i> Send Invoice
                        </button>
                        </form>
                        </td>

                                        </td>
                                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $orders->appends(['status' => request('status')])->links() }}
        </div>
    </div>
@endsection
