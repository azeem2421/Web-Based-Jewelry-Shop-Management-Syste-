@extends('layouts.app')

@section('title', $category->name . ' Products')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold mb-5 text-center explore-heading">
    {{ $category->name }} Collection
  </h2>

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
      <p class="text-center text-muted fs-5">No products found in this category.</p>
    @endforelse
  </div>

  {{-- Pagination --}}
  <nav class="mt-5">
    {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
  </nav>
</div>
@endsection
