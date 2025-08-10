@extends('layouts.admin')

@section('content')
    <div class="d-flex flex-column flex-md-row vh-100">
    <!-- Sidebar -->
    <nav class="bg-dark text-white p-3 vh-100" style="width: 250px; min-width: 250px;">
    <h4 class="mb-4">Admin Panel</h4>

    <!-- Search
    <div class="mb-3">
      <input type="search" class="form-control form-control-sm" placeholder="Search...">
    </div> -->

    <ul class="nav flex-column">
      <li class="nav-item mb-2">
      <a href="#" class="nav-link text-white d-flex align-items-center px-2 py-1 rounded hover-bg-primary">
      <i class="bi bi-speedometer2 me-2"></i> Dashboard
      </a>
      </li>
      <li class="nav-item mb-2">
      <a href="{{ route('admin.products.index') }}" class="nav-link text-white d-flex align-items-center px-2 py-1 rounded hover-bg-primary">
      <i class="bi bi-box-seam me-2"></i> Products
      </a>
      </li>
      <li class="nav-item mb-2">
      <a href="{{ route('admin.categories.index') }}" class="nav-link text-white d-flex align-items-center px-2 py-1 rounded hover-bg-primary">
      <i class="bi bi-tags me-2"></i> Categories
      </a>
      </li>
      <li class="nav-item mb-2">
      <a href="{{ route('admin.orders.index') }}" class="nav-link text-white d-flex align-items-center px-2 py-1 rounded hover-bg-primary">
      <i class="bi bi-bag-check me-2"></i> Orders
      </a>
      </li>
      <li class="nav-item mb-2">
      <a href="{{ route('admin.inventory.index') }}" class="nav-link text-white d-flex align-items-center px-2 py-1 rounded hover-bg-primary">
      <i class="bi bi-clipboard-data me-2"></i> Inventory
      </a>
      </li>
      <li class="nav-item mb-2">
      <a href="{{ route('admin.reports.index') }}" class="nav-link text-white d-flex align-items-center px-2 py-1 rounded hover-bg-primary">
      <i class="bi bi-bar-chart-line me-2"></i> Reports
      </a>
      </li>
      <li class="nav-item mb-2">
      <a href="#" class="nav-link text-white d-flex align-items-center px-2 py-1 rounded hover-bg-primary">
      <i class="bi bi-people me-2"></i> User Management
      </a>
      <ul class="nav flex-column ms-3">
      <li class="nav-item mb-1">
      <a href="{{ route('admin.customers.index') }}" class="nav-link text-white px-2 py-1 rounded hover-bg-primary">Customers</a>
      </li>
      <li class="nav-item mb-1">
      <a href="{{ route('admin.system_users.index') }}" class="nav-link text-white px-2 py-1 rounded hover-bg-primary">System Users</a>
      </li>
      </ul>
      </li>

      <li class="nav-item mb-2">
      <a href="{{ route('admin.messages.index') }}"
      class="nav-link text-white d-flex align-items-center px-2 py-1 rounded hover-bg-primary">
      <i class="bi bi-envelope-fill me-2"></i> Contact Messages
      </a>
      </li>


  <li class="nav-item mb-2">
    <a href="{{ route('admin.careers.index') }}"
    class="nav-link text-white d-flex align-items-center px-2 py-1 rounded hover-bg-primary">
    <i class="bi bi-briefcase-fill me-2"></i> Career Applications
    </a>
  </li>



      <li class="nav-item">
      <a href="{{ route('admin.backup.index') }}"  class="nav-link text-white d-flex align-items-center px-2 py-1 rounded hover-bg-primary">
      <i class="bi bi-cloud-arrow-up me-2"></i> Backup
      </a>
      </li>
    </ul>
    </nav>

    <!-- Main Content -->
    <div class="flex-fill d-flex flex-column">
    <!-- Navbar -->
    <header class="d-flex justify-content-between align-items-center bg-white shadow-sm p-3">
      <h2 class="mb-0">
    Welcome, {{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : 'Admin' }}
</h2>

      <div class="d-flex align-items-center gap-3">
      <span class="d-none d-md-inline">
    {{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : 'Admin' }}
    </span>

      <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::guard('admin')->user()->name ?? 'Admin') }}&background=0D8ABC&color=fff"
     alt="Admin Avatar" class="rounded-circle" width="40" height="40">

      <form action="{{ route('admin.logout') }}" method="POST" class="mb-0">
      @csrf
      <button class="btn btn-outline-danger btn-sm">Logout</button>
      </form>
      </div>
    </header>

    <!-- Stats Cards -->
    <div class="container-fluid mt-4 flex-grow-0">
      <div class="row g-3">
      <div class="col-md-3 col-sm-6">
      <div class="card text-white bg-primary h-100">
      <div class="card-body d-flex align-items-center">
      <i class="bi bi-cash-stack fs-2 me-3"></i>
      <div>
      <h5 class="card-title">Total Sales</h5>
      <p class="card-text fs-5">Rs. {{ $salesTotal }}</p>
      </div>
      </div>
      </div>
      </div>
      <div class="col-md-3 col-sm-6">
      <div class="card text-white bg-success h-100">
      <div class="card-body d-flex align-items-center">
      <i class="bi bi-bag-check fs-2 me-3"></i>
      <div>
      <h5 class="card-title">Orders Today</h5>
      <p class="card-text fs-5">{{ $ordersToday }} Orders</p>
      </div>
      </div>
      </div>
      </div>
      <div class="col-md-3 col-sm-6">
      <div class="card text-white bg-warning h-100">
      <div class="card-body d-flex align-items-center">
      <i class="bi bi-exclamation-triangle fs-2 me-3"></i>
      <div>
      <h5 class="card-title">Low Stock Items</h5>
      <p class="card-text fs-5">{{ $lowStockItems }} Alerts</p>
      </div>
      </div>
      </div>
      </div>
      <div class="col-md-3 col-sm-6">
      <div class="card text-white bg-info h-100">
      <div class="card-body d-flex align-items-center">
      <i class="bi bi-box fs-2 me-3"></i>
      <div>
      <h5 class="card-title">Total Products</h5>
      <p class="card-text fs-5">{{ $totalProducts ?? 0 }}</p>
      </div>
      </div>
      </div>
      </div>
      </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="container-fluid mt-4 flex-grow-1 overflow-auto">
      <h4>Recent Orders</h4>
      <div class="table-responsive">
      <table class="table table-striped table-hover align-middle">
      <thead class="table-dark">
      <tr>
      <th>Order ID</th>
      <th>Customer</th>
      <th>Date</th>
      <th>Status</th>
      <th>Total (Rs.)</th>
      <th>Actions</th>
      </tr>
      </thead>
      <tbody>
      @forelse($recentOrders as $order)
      <tr>
      <td>{{ $order->id }}</td>
      <td>{{ $order->customer_name }}</td>
      <td>{{ $order->created_at->format('d M Y') }}</td>
      <td>
      <span class="badge 
      @if($order->status == 'Completed') bg-success 
      @elseif($order->status == 'Pending') bg-warning 
      @else bg-secondary @endif">
      {{ $order->status }}
      </span>
      </td>
      <td>{{ $order->total_amount }}</td>
      <td>
      <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>
      </td>
      </tr>
      @empty
      <tr>
      <td colspan="6" class="text-center">No recent orders found.</td>
      </tr>
      @endforelse
      </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>

    <!-- Additional Styles -->
    <style>
    .hover-bg-primary:hover {
    background-color: #0d6efd !important;
    text-decoration: none;
    }
    .nav-link.active {
    background-color: #0b5ed7 !important;
    }
    /* Sidebar scrollbar */
    nav::-webkit-scrollbar {
    width: 6px;
    }
    nav::-webkit-scrollbar-thumb {
    background: #444;
    border-radius: 3px;
    }
    </style>

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
@endsection
