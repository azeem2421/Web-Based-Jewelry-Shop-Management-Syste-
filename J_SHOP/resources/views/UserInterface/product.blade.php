@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container py-5">

                <!-- @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif -->

  <div class="row g-5 align-items-start">
    {{-- Product Image --}}
    <div class="col-md-6">
      <div class="product-detail-image shadow rounded-4 overflow-hidden">
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-100 h-auto">
      </div>
    </div>

    {{-- Product Info --}}
    <div class="col-md-6">
      <h2 class="fw-bold">{{ $product->name }}</h2>
      <p class="text-muted fs-5 mb-3">Category: <span class="badge bg-secondary">{{ $product->category->name ?? 'Uncategorized' }}</span></p>
      <p class="fs-4 fw-semibold text-warning">Rs. {{ number_format($product->price, 2) }}</p>
      <p class="text-muted mb-4">{{ $product->description ?? 'No description available for this item.' }}</p>

      <form action="{{ route('cart.add') }}" method="POST" class="d-flex align-items-center gap-3">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="number" name="quantity" value="1" min="1" class="form-control w-auto" style="max-width: 100px;">
        <button type="submit" class="btn btn-warning px-4 py-2 shadow rounded-pill">
          <i class="bi bi-cart-plus me-2"></i>Add to Cart
        </button>
      </form>

      <a href="{{ route('collection') }}" class="btn btn-outline-dark px-4 py-2 rounded-pill mt-3 d-inline-block">
        <i class="bi bi-chevron-left me-1"></i>Back to Collection
      </a>
    </div>
  </div>
</div>
@endsection
