@extends('layouts.admin')

@section('content')
<div class="container mt-4">

      <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
  </nav>

    <h2>Edit Category</h2>


    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input 
                type="text" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name', $category->name) }}"
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea 
                name="description" 
                class="form-control @error('description') is-invalid @enderror"
            >{{ old('description', $category->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            @if ($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" width="100">
            @else
                <span class="text-muted">N/A</span>
            @endif
        </div>

        <div class="mb-3">
            <label>New Image</label>
            <input 
                type="file" 
                name="image" 
                class="form-control @error('image') is-invalid @enderror"
            >
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
