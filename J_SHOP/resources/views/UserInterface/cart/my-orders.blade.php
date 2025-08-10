@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">🛒 My Orders</h2>

    <!-- @if(session('success'))
        <div class="alert alert-success text-center shadow-sm">{{ session('success') }}</div>
    @endif -->

    @if($orders->isEmpty())
        <div class="alert alert-info text-center">You have no orders yet. Start shopping!</div>
    @else
        @foreach($orders as $order)
            <div class="card order-card mb-4 shadow-sm rounded-3">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Order #{{ $order->id }}</strong><br>
                        <small class="text-muted">{{ $order->created_at->format('d M Y, h:i A') }}</small>
                    </div>
                    <span class="badge status-badge 
                        @switch($order->status)
                            @case('Processing') bg-warning text-dark @break
                            @case('Shipped') bg-info text-white @break
                            @case('Delivered') bg-success @break
                            @default bg-secondary
                        @endswitch
                    ">
                        {{ $order->status }}
                    </span>
                </div>

                <div class="card-body">
                    <h5 class="mb-3">🧾 Items</h5>
                    <ul class="list-group mb-4">
                        @foreach($order->orderItems as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $item->product->name }} <small class="text-muted">(x{{ $item->quantity }})</small></span>
                                <span class="fw-bold text-primary">${{ number_format($item->price * $item->quantity, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>

                    @if ($order->address)
                        <h5 class="mb-2">📦 Shipping Address</h5>
                        <div class="bg-light p-3 rounded shadow-sm">
                            <p class="mb-1"><strong>{{ $order->address->name }}</strong></p>
                            <p class="mb-1">{{ $order->address->address }}, {{ $order->address->city }}</p>
                            <p class="mb-1">{{ $order->address->postal_code }}, {{ $order->address->country }}</p>
                            <p class="mb-0">📞 {{ $order->address->phone }}</p>
                        </div>
                    @else
                        <div class="alert alert-warning mt-3"><em>No shipping address available for this order.</em></div>
                    @endif

                    <hr>
                    <h5 class="text-end">💰 Total: <span class="text-success">${{ number_format($order->total_price, 2) }}</span></h5>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
