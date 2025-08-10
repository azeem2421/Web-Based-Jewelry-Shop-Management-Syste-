@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
<section class="py-5 bg-light-yellow">
  <div class="container">
    <h2 class="text-center fw-bold text-dark mb-5 display-6">Our Services</h2>

    <div class="row g-4">
      @php
        $services = [
          ['icon' => 'bi-gem', 'title' => 'Custom Jewellery Design', 'desc' => 'Turn your ideas into reality with our expert craftsmanship. We offer personalized designs tailored to your style, story, and budget.'],
          ['icon' => 'bi-stars', 'title' => 'Jewellery Polishing & Cleaning', 'desc' => 'Restore the sparkle of your precious items with our professional cleaning and polishing service — your jewelry will shine like new.'],
          ['icon' => 'bi-arrow-repeat', 'title' => 'Ring Resizing', 'desc' => 'Need a better fit? Our resizing services ensure your rings feel comfortable and secure, without damaging the design.'],
          ['icon' => 'bi-gem', 'title' => 'Stone Replacement', 'desc' => 'Lost a stone? We provide expert replacement with matching gems to bring your jewelry back to its original elegance.'],
          ['icon' => 'bi-patch-check', 'title' => 'Valuation & Certification', 'desc' => 'Get your jewelry professionally appraised for insurance, resale, or peace of mind. Certified by trusted gemologists.'],
          ['icon' => 'bi-pencil-square', 'title' => 'Jewellery Engraving', 'desc' => 'Add a personal touch with our precision engraving service. Perfect for initials, dates, or meaningful messages on rings, pendants, and more.'],
        ];
      @endphp

      @foreach($services as $service)
      <div class="col-md-6 col-lg-4">
        <div class="card service-card h-100 border-0 shadow-sm transition-all">
          <div class="card-body text-center p-4">
            <div class="icon-circle bg-warning bg-opacity-25 text-warning mb-3 mx-auto">
              <i class="bi {{ $service['icon'] }} fs-3"></i>
            </div>
            <h5 class="fw-semibold text-dark mb-2">{{ $service['title'] }}</h5>
            <p class="text-muted small">{{ $service['desc'] }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="text-center mt-5">
      <a href="{{ url('/contact') }}" class="btn btn-warning px-4 py-2 shadow-sm">
        Contact us for more details <i class="bi bi-envelope-arrow-up ms-2"></i>
      </a>
    </div>
  </div>
</section>
@endsection
