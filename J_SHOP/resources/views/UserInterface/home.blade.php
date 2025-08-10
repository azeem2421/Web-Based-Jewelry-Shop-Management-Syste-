@extends('layouts.app')

@section('title', 'Home')

@section('content')


<section class="hero-section text-center text-white d-flex align-items-center" style="min-height: 400px;">
  <div class="container">
    <h1 class="display-5 fw-bold">Welcome to Azii Jewelers</h1>
    <p class="lead">Discover elegance in every piece – handcrafted jewellery for every occasion.</p>
    <a href="{{ route('collection') }}" class="btn btn-warning mt-3 px-4">Explore Collection</a>
  </div>
</section>


<!-- Featured Products  -->
<section class="py-5 bg-white">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold text-dark display-6">Featured Jewellery</h2>

    <div class="row g-4 justify-content-center">
      @forelse ($featuredProducts as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card h-100 border-0 shadow-sm product-card position-relative">
            @if($product->is_new)
              <div class="product-badge">New</div>
            @endif
            <div class="overflow-hidden">
              <img src="{{ asset($product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">Rs. {{ number_format($product->price, 2) }}</p>
              <a href="{{ route('product.view', $product->id) }}" class="btn btn-outline-warning btn-sm mt-auto">View Details</a>
            </div>
          </div>
        </div>
      @empty
        <p class="text-center">No products available right now.</p>
      @endforelse
    </div>
  </div>
</section>


<!-- Stylish Gallery Preview -->
<section class="gallery-preview-section py-5 bg-light text-center">
  <div class="container">
    <h2 class="mb-5 text-dark fw-bold display-6 position-relative gallery-heading">
      Our Gallery
      <span class="underline"></span>
    </h2>

    <div class="row g-4 justify-content-center">
      @forelse ($galleryItems as $item)
        <div class="col-6 col-md-4 col-lg-3">
          <div class="gallery-card shadow-sm">
            <div class="gallery-image-container">
              <img src="{{ asset($item->image) }}" class="gallery-img" alt="{{ $item->name }}">
            </div>
          </div>
        </div>
      @empty
        <p class="text-muted">Gallery is empty. New designs coming soon!</p>
      @endforelse
    </div>

    <a href="{{ url('/gallery') }}" class="btn btn-warning mt-5 px-4 py-2 shadow">View Full Gallery</a>
  </div>
</section>


<!-- CTA Section -->
<section class="text-center py-5 bg-warning text-white">
  <div class="container">
    <h2>Visit Us Today</h2>
    <p>We are located in the heart of Colombo. Come see our newest collections in-store!</p>
  </div>
</section>

@endsection
