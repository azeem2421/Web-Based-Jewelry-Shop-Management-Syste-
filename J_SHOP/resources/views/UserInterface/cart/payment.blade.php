@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h2>Redirecting to Payment Gateway...</h2>
    <p>Please wait while we redirect you to PayHere to complete your purchase.</p>

    <form method="POST" action="https://sandbox.payhere.lk/pay/checkout" id="payhere-form">
        {{-- Merchant info --}}
        <input type="hidden" name="merchant_id" value="{{ env('PAYHERE_MERCHANT_ID') }}"> 
        <input type="hidden" name="return_url" value="{{ route('checkout.success') }}">
        <input type="hidden" name="cancel_url" value="{{ route('checkout.cancel') }}">
        <input type="hidden" name="notify_url" value="{{ route('checkout.notify') }}">

        {{-- Order Info --}}
        <input type="hidden" name="order_id" value="{{ $order_id }}">
        <input type="hidden" name="items" value="Checkout Purchase">
        <input type="hidden" name="currency" value="LKR">
        <input type="hidden" name="amount" value="{{ number_format($amount, 2, '.', '') }}">

        {{-- Customer Info --}}
        <input type="hidden" name="first_name" value="{{ $shipping['name'] }}">
        <input type="hidden" name="last_name" value="Customer">
        <input type="hidden" name="email" value="{{ $shipping['email'] }}">
        <input type="hidden" name="phone" value="{{ $shipping['phone'] }}">
        <input type="hidden" name="address" value="{{ $shipping['address'] }}">
        <input type="hidden" name="city" value="{{ $shipping['city'] }}">
        <input type="hidden" name="country" value="{{ $shipping['country'] }}">

        <button type="submit" class="btn btn-success btn-lg">Click here if not redirected</button>
    </form>

    <script>
        setTimeout(function () {
            document.getElementById('payhere-form').submit();
        }, 1000);
    </script>
</div>
@endsection
