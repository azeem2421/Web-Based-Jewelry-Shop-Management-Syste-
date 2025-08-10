@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h2>Dummy Payment Gateway</h2>
    <p>This is a fake payment gateway page for testing purposes only.</p>
    
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <h4 class="card-title mb-4">Order #{{ $order_id }}</h4>
            <p><strong>Amount to Pay:</strong> Rs. {{ number_format($amount, 2) }}</p>
            <p><strong>Customer:</strong> {{ $shipping['name'] }}</p>
            
            <form method="POST" action="{{ route('checkout.paymentDummyProcess') }}">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order_id }}">
                <button type="submit" class="btn btn-success btn-lg w-100">Pay Now (Simulate Success)</button>
            </form>

            <form method="POST" action="{{ route('checkout.paymentDummyCancel') }}" class="mt-3">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order_id }}">
                <button type="submit" class="btn btn-danger btn-lg w-100">Cancel Payment</button>
            </form>
        </div>
    </div>
</div>
@endsection
