@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reportss</li>
        </ol>
    </nav>

    <h1 class="mb-4">Reports Dashboard</h1>

    <div class="row g-4">
        <!-- Sales Reports Card -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Sales Reports</h5>
                    <p class="card-text">View detailed sales data including total sales, sales by date, and revenue insights.</p>
                    <a href="{{ route('admin.reports.sales') }}" class="btn btn-primary">View Sales Reports</a>
                </div>
            </div>
        </div>

        <!-- Products Reports Card -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Products Reports</h5>
                    <p class="card-text">Track inventory levels, low stock alerts, and product performance.</p>
                    <a href="{{ route('admin.products.report') }}" class="btn btn-primary">View Product Reports</a>
                </div>
            </div>
        </div>

        <!-- Orders Reports Card -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Orders Reports</h5>
                    <p class="card-text">Analyze orders by status, date, and customer data for better management.</p>
                    <a href="{{ route('admin.orders.report') }}" class="btn btn-primary">View Order Reports</a>
                </div>
            </div>
        </div>

        <!-- Users Reports Card -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Users Reports</h5>
                    <p class="card-text">Monitor user registrations, active users, and user roles distribution.</p>
                    <a href="{{ route('admin.system_users.report') }}" class="btn btn-primary">View User Reports</a>
                </div>
            </div>
        </div>

        <!-- Inventory Reports Card -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Inventory Reports</h5>
                    <p class="card-text">Overview of stock levels, stock value, and critical inventory alerts.</p>
                    <a href="{{ route('admin.inventory.report', ['filter' => request('filter')]) }}"class="btn btn-primary">View Inventory Reports</a>
                </div>
            </div>
        </div>

        <!-- Backup Reports Card -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Backup Reports</h5>
                    <p class="card-text">Check backup status, last backup date, and restore points.</p>
                    <a href="{{ route('admin.reports.backup') }}" class="btn btn-primary">View Backup Reports</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="mt-5">
        <h3>Summary</h3>
        <div class="row g-3">
            <div class="col-md-3">
                <div class="card bg-info text-white p-3">
                    <h5>Total Sales</h5>
                    <p class="fs-4">Rs. {{ number_format($totalSales ?? 1234567, 2) }}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-dark p-3">
                    <h5>Low Stock Items</h5>
                    <p class="fs-4">{{ $lowStockCount ?? 15 }}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white p-3">
                    <h5>Orders Today</h5>
                    <p class="fs-4">{{ $ordersToday ?? 48 }}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-secondary text-white p-3">
                    <h5>Total Products</h5>
                    <p class="fs-4">{{ $totalProducts ?? 254 }}</p>
                </div>
            </div>
            <!-- <div class="col-md-3 mt-3">
                <div class="card bg-primary text-white p-3">
                    <h5>Active Users</h5>
                    <p class="fs-4">{{ $activeUsers ?? 1024 }}</p>
                </div>
            </div> -->
            <div class="col-md-3 mt-3">
                <div class="card bg-dark text-white p-3">
                    <h5>Total Users</h5>
                    <p class="fs-4">{{ $totalUsers ?? 2048 }}</p>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="card bg-danger text-white p-3">
                    <h5>Last Backup Date</h5>
                    <p class="fs-5">{{ $lastBackupDate ?? '2025-06-29 02:15:00' }}</p>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="card bg-secondary text-white p-3">
                    <h5>Backup Status</h5>
                    <p class="fs-5">{{ $backupStatus ?? 'Successful' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
