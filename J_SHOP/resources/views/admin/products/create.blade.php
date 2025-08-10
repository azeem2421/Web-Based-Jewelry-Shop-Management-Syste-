@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
        </ol>
    </nav>

    <h2 class="mb-4">Add New Product</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">

            <div class="col-md-6">
                <label for="name" class="form-label">Product Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name') }}" 
                  
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="price" class="form-label">Price (Rs)</label>
                <input 
                    type="number" 
                    name="price" 
                    id="price" 
                    class="form-control @error('price') is-invalid @enderror" 
                    step="0.01" 
                    value="{{ old('price') }}" 
                   
                >
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="stock" class="form-label">Stock</label>
                <input 
                    type="number" 
                    name="stock" 
                    id="stock" 
                    class="form-control @error('stock') is-invalid @enderror" 
                    value="{{ old('stock') }}" 
                 
                >
                @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="category" class="form-label">Category</label>
                <select 
                    name="category_id" 
                    id="category" 
                    class="form-select @error('category_id') is-invalid @enderror" 
                 
                >
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option 
                            value="{{ $category->id }}" 
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="4" 
                    class="form-control @error('description') is-invalid @enderror" 
                 
                >{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="image" class="form-label">Product Image</label>
                <input 
                    type="file" 
                    name="image" 
                    id="image" 
                    class="form-control @error('image') is-invalid @enderror" 
                    
                >
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Add Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
