@extends('layouts.admin')

@section('content')

@php use Illuminate\Support\Str; @endphp

<div class="container mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </nav>

    <!-- Page Header with Search and Filter in Same Row -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Product List</h2>
    </div>

    <!-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif -->

    <!-- Search and Filter Row -->
    <div class="row mb-3 align-items-center">
        <div class="col-md-6">
            <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control me-2" 
                    placeholder="Search Products..." 
                    value="{{ request('search') }}"
                >
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>

        <div class="col-md-6">
            <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex align-items-center justify-content-md-end">
                <label for="category" class="me-2 mb-0">Filter by Category:</label>
                <select 
                    name="category" 
                    onchange="this.form.submit()" 
                    class="form-select w-auto"
                    id="category"
                >
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->name }}" {{ request('category') == $cat->name ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>

    <!-- Add Product Button -->
    <div class="mb-3">
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">+ Add New Product</a>
    </div>

    <!-- Product Grid -->
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card p-2 small-card">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title" title="{{ $product->name }}">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description ?? 'No description available', 50) }}</p>
                        <p><strong>Price:</strong> Rs {{ $product->price }}</p>
                        <p><strong>Stock:</strong> {{ $product->stock }}</p>
                        <p><strong>Category:</strong> {{ $product->category->name ?? 'Uncategorized' }}</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">No products found.</p>
            </div>
        @endforelse
    </div>

    <!-- Report Generation -->
    <div class="text-right mt-4">
        <a href="{{ route('admin.products.report') }}" class="btn btn-danger mb-3">Generate Report (PDF)</a>
    </div>
</div>

@endsection
