@extends('layouts.admin')

@section('content')
<div class="container mt-4">

  <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Inventory</li>
    </ol>
  </nav>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Re order Inventory Management</h3>
        <!-- <a href="{{ route('admin.inventory.report', ['filter' => request('filter')]) }}" class="btn btn-outline-secondary">
            <i class="bi bi-download me-1"></i> Download Report (PDF)
        </a> -->
    </div>

    <!-- @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif -->

    <!-- Filter Dropdown
    <form method="GET" class="mb-3">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <label for="filter" class="col-form-label">Filter by Stock:</label>
            </div>
            <div class="col-auto">
                <select name="filter" id="filter" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="">All</option>
                    <option value="low" {{ request('filter') == 'low' ? 'selected' : '' }}>Low Stock</option>
                    <option value="out" {{ request('filter') == 'out' ? 'selected' : '' }}>Out of Stock</option>
                    <option value="ok" {{ request('filter') == 'ok' ? 'selected' : '' }}>Sufficient Stock</option>
                </select>
            </div>
        </div>
    </form> -->

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Current Stock</th>
                    <th>Low Stock Threshold</th>
                    <!-- <th>Status</th>
                    <th>Update</th> -->
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                  <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('admin.inventory.update', $product->id) }}" method="POST" class="d-flex align-items-center gap-2">
                            @csrf
                            <input type="number" name="stock" value="{{ $product->stock }}" class="form-control form-control-sm w-50">
                    </td>
                    <td>
                            <input type="number" name="low_stock_threshold" value="{{ $product->low_stock_threshold }}" class="form-control form-control-sm w-50">
                    </td>
                    <td>
                        @if($product->stock == 0)
                            <span class="badge bg-secondary">Out of Stock</span>
                        @elseif($product->stock <= $product->low_stock_threshold)
                            <span class="badge bg-danger">Low</span>
                        @else
                            <span class="badge bg-success">OK</span>
                        @endif
                    </td>
                    <td>
                            <button class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center text-muted">No matching products found.</td>
                  </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
