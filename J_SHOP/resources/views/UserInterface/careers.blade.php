@extends('layouts.app')

@section('title', 'Careers')

@section('content')

    <section class="careers-section py-5">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
      <div class="careers-form">
        <h2 class="fw-bold mb-4">Join Our Team</h2>
        <form action="{{ route('careers.apply') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
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
            <label for="email" class="form-label">Email</label>
            <input 
              type="email" 
              class="form-control @error('email') is-invalid @enderror" 
              id="email" 
              name="email" 
              value="{{ old('email') }}" 

            >
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="role" class="form-label">Role You're Applying For</label>
            <select 
              name="role" 
              id="role"
              class="form-select @error('role') is-invalid @enderror" 

            >
              <option value="">Select a Role</option>
              <option value="Sales Consultant" {{ old('role') == 'Sales Consultant' ? 'selected' : '' }}>Sales Consultant</option>
              <option value="Jewelry Designer" {{ old('role') == 'Jewelry Designer' ? 'selected' : '' }}>Jewelry Designer</option>
              <option value="Customer Support" {{ old('role') == 'Customer Support' ? 'selected' : '' }}>Customer Support</option>
              <option value="Goldsmith" {{ old('role') == 'Goldsmith' ? 'selected' : '' }}>Goldsmith</option>
            </select>
            @error('role')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="cv" class="form-label">Upload Your CV</label>
            <input 
              type="file" 
              class="form-control @error('cv') is-invalid @enderror" 
              id="cv" 
              name="cv" 

            >
            @error('cv')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-success w-100">Submit Application</button>
        </form>
      </div>
    </section>

@endsection
