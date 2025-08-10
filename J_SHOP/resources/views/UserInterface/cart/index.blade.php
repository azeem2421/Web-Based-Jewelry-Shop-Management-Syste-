@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container py-5">
  <h1 class="mb-4">Your Shopping Cart</h1>

  <!-- {{-- Success & Error Messages --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif -->

  @if(count($cart) > 0)
    <table class="table table-bordered align-middle">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th style="width:120px;">Quantity</th>
          <th>Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @php $grandTotal = 0; @endphp
        @foreach($cart as $id => $details)
          @php $total = $details['price'] * $details['quantity']; @endphp
          @php $grandTotal += $total; @endphp
          <tr>
            <td class="d-flex align-items-center gap-3">
              <img src="{{ asset($details['image']) }}" alt="{{ $details['name'] }}" style="width:70px; height:70px; object-fit:cover; border-radius:5px;">
              <span>{{ $details['name'] }}</span>
            </td>
            <td>Rs. {{ number_format($details['price'], 2) }}</td>
            <td>
              <form action="{{ route('cart.update') }}" method="POST" class="d-flex align-items-center gap-2">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">
                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control form-control-sm" style="width:70px;">
                <button type="submit" class="btn btn-sm btn-primary">Update</button>
              </form>
            </td>
            <td>Rs. {{ number_format($total, 2) }}</td>
            <td>
              <a href="{{ route('cart.remove', $id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove this item?')">
                Remove
              </a>
            </td>
          </tr>
        @endforeach
        <tr>
          <td colspan="3" class="text-end fw-bold fs-5">Grand Total:</td>
          <td colspan="2" class="fw-bold fs-5">Rs. {{ number_format($grandTotal, 2) }}</td>
        </tr>
      </tbody>
    </table>

    {{-- Checkout Button --}}
    <div class="text-end mt-4">
      <a href="{{ route('cart.checkout') }}" class="btn btn-success btn-lg px-5">
        <i class="bi bi-bag-check me-2"></i>Proceed to Checkout
      </a>
    </div>

  @else
    <p>Your cart is empty. <a href="{{ route('collection') }}">Browse products</a></p>
  @endif
</div>
@endsection
