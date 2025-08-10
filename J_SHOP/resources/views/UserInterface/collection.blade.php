@extends('layouts.app')

@section('title', 'Explore Collection')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold mb-5 text-center explore-heading">Explore Our Jewellery</h2>

  <div class="row mb-5 g-3 align-items-center">

    {{-- Search Form --}}
    <div class="col-md-6">
      <form method="GET" action="{{ route('collection') }}" class="d-flex search-form">
        <input 
          type="text" 
          name="search" 
          value="{{ old('search', $search ?? '') }}" 
          class="form-control border-0 ps-4" 
          placeholder="Search products..."
          aria-label="Search products"
          autocomplete="off"
        >
        <button class="btn btn-warning px-4" type="submit">Search</button>
      </form>
    </div>

    {{-- Category Filter Form --}}
    <div class="col-md-6">
      <form method="GET" action="{{ route('collection') }}" class="d-flex filter-form">
        <select name="category" class="form-select border-0" aria-label="Filter by category">
          <option value="" disabled selected>Filter by Category</option>
          <option value="">All Categories</option>
          @foreach ($categories as $cat)
            <option value="{{ $cat->id }}" {{ (isset($selectedCategory) && $selectedCategory == $cat->id) ? 'selected' : '' }}>
              {{ $cat->name }}
            </option>
          @endforeach
        </select>
        <button class="btn btn-warning px-4" type="submit">Apply</button>
      </form>
    </div>

  </div>

  {{-- Products Grid --}}
  <div class="row g-4">
    @forelse ($products as $product)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card product-card h-100 shadow border-0 rounded-4">
          <div class="overflow-hidden rounded-top">
            <img 
              src="{{ asset($product->image) }}" 
              class="card-img-top product-image" 
              alt="{{ $product->name }}"
            >
          </div>
          <div class="card-body d-flex flex-column text-center">
            <h5 class="card-title text-truncate" title="{{ $product->name }}">{{ $product->name }}</h5>
            <p class="text-muted mb-3 fs-5 fw-semibold">Rs. {{ number_format($product->price, 2) }}</p>
            <a href="{{ route('product.view', $product->id) }}" class="btn btn-outline-warning mt-auto rounded-pill px-4 py-2 fw-semibold shadow-sm">
              View Details
            </a>
          </div>
        </div>
      </div>
    @empty
      <p class="text-center text-muted fs-5">No products found.</p>
    @endforelse
  </div>

  {{-- Pagination --}}
  <nav class="mt-5">
    {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
  </nav>
</div>
@endsection
