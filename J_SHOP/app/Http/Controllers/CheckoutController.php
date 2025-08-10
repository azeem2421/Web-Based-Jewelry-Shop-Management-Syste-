<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Address;
use App\Http\Controllers\Controller; 
use App\Models\Category;

class CheckoutController extends Controller
{
public function success(Order $order)
{
    $order->status = 'Paid';
    $order->save();

    return redirect()->route('account.orders')->with('success', 'Payment successful!');
}

public function cancel(Order $order)
{
    $order->status = 'Cancelled';
    $order->save();

    return redirect()->route('account.orders')->with('error', 'Payment cancelled.');
}

public function notify(Request $request)
{
    // Optional: validate signature using your PayHere secret
    $orderId = $request->input('order_id');
    $order = Order::find($orderId);

    if ($order && $request->input('status_code') == 2) {
        $order->status = 'Paid';
        $order->save();
    }

    return response('OK', 200);
}

}
