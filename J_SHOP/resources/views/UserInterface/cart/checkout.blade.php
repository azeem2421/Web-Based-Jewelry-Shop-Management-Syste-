@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Checkout</h2>

    <!-- @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif -->

    <form action="{{ route('checkout.placeOrder') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input
                type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name ?? '') }}" >
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
    <label for="email" class="form-label">Email Address</label>
    <input
        type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $user->email ?? '') }}" >
    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>


        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input
                type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone') }}" >
            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Shipping Address</label>
            <textarea
                name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                rows="3" required>{{ old('address') }}</textarea>
            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="city" class="form-label">City</label>
                <input
                    type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror"
                    value="{{ old('city') }}" >
                @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input
                    type="text" name="postal_code" id="postal_code" class="form-control @error('postal_code') is-invalid @enderror"
                    value="{{ old('postal_code') }}" >
                @error('postal_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="country" class="form-label">Country</label>
                <input
                    type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror"
                    value="{{ old('country') }}" >
                @error('country')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <h4>Order Summary</h4>
        <ul class="list-group mb-3">
            @foreach ($cart as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item['name'] }} (x{{ $item['quantity'] }})
                    <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
                <strong>Total</strong>
                <strong>${{ number_format(collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']), 2) }}</strong>
            </li>
        </ul>

        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>
@endsection
