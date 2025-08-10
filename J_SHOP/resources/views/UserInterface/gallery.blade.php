@extends('layouts.app')

@section('title', 'Gallery')

@section('content')

<section class="py-5 bg-light text-center">
  <div class="container">
    <h2 class="mb-5 fw-bold text-dark display-5 position-relative">
      Our Full Collection
      <span class="d-block mx-auto mt-2" style="width: 100px; height: 3px; background: #ffc107;"></span>
    </h2>

    <div class="row g-4 justify-content-center">
      @forelse($products as $product)
        <div class="col-6 col-md-4 col-lg-3">
          <div class="gallery-image-card shadow-sm rounded overflow-hidden position-relative">
            <img src="{{ asset($product->image) }}" class="w-100 h-100 object-fit-cover gallery-img" alt="{{ $product->name }}">
          </div>
        </div>
      @empty
        <p class="text-muted">No product images found in the gallery.</p>
      @endforelse
    </div>
  </div>
</section>

@endsection
