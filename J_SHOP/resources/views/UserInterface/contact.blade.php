@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<section class="contact-section py-5 bg-light">
  <div class="container">
    <h2 class="text-center fw-bold text-dark mb-5 display-6">Get In Touch With Us</h2>
    <div class="row g-4 align-items-start">
      
      <!-- 📬 Contact Form -->
      <div class="col-md-7">
        <div class="p-4 bg-white shadow rounded-4 contact-card">
          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif
          <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label fw-semibold">Name</label>
              <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name') }}" 
             
              >
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="email" class="form-label fw-semibold">Email</label>
              <input 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                id="email" 
                name="email" 
                value="{{ old('email') }}" 
                placeholder="name@example.com" 
               
              >
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="message" class="form-label fw-semibold">Your Message</label>
              <textarea 
                class="form-control @error('message') is-invalid @enderror" 
                id="message" 
                name="message" 
                rows="5" 
              
              >{{ old('message') }}</textarea>
              @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <button type="submit" class="btn btn-warning px-4 py-2 rounded-pill shadow-sm">Send Message</button>
          </form>
        </div>
      </div>

      <!-- 📍 Contact Info -->
      <div class="col-md-5">
        <div class="bg-white shadow rounded-4 p-4 contact-card">
          <h5 class="fw-bold mb-3">Contact Details</h5>
          <p><i class="bi bi-geo-alt-fill text-warning me-2"></i> 123 Galle Road, Colombo, Sri Lanka</p>
          <p><i class="bi bi-telephone-fill text-warning me-2"></i> +94 77 123 4567</p>
          <p><i class="bi bi-envelope-fill text-warning me-2"></i> support@aziijewelers.com</p>

          <h6 class="fw-semibold mt-4">Follow Us</h6>
          <div class="d-flex gap-3 fs-4">
            <a href="#" class="text-dark"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-dark"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-dark"><i class="bi bi-whatsapp"></i></a>
            <a href="#" class="text-dark"><i class="bi bi-twitter-x"></i></a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection
