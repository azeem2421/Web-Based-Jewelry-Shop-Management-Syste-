<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use Illuminate\Support\Facades\Auth; 
use App\Models\Address;              
use App\Models\OrderItem;   

class CartController extends Controller
{
    public function __construct()
    {
        // This shares $categories with all views rendered by this controller
        $categories = Category::all();
        view()->share('categories', $categories);
    }

    // Show Cart
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('UserInterface.cart.index', compact('cart'));
    }

    // Add to Cart
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => $request->quantity,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Update quantity
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated successfully!');
        }

        return redirect()->back()->with('error', 'Invalid update request.');
    }

    // Remove from cart
    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    // Show Checkout Page
    public function checkout()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('collection')->with('error', 'Your cart is empty.');
        }

        return view('UserInterface.cart.checkout', [
            'cart' => $cart,
            'user' => auth()->user(),
        ]);
    }

    public function redirectToPayHere(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        $temp_order_id = uniqid('temp_', true);

        session([
            'checkout_data' => [
                'order_id' => $temp_order_id,
                'user_id' => auth()->id(),
                'shipping' => $validated,
                'cart' => $cart,
                'total' => $total,
            ]
        ]);

        return view('UserInterface.cart.dummy-payment', [
            'order_id' => $temp_order_id,
            'amount' => $total,
            'shipping' => $validated,
        ]);
    }

    public function paymentSuccess()
    {
        $checkout = session('checkout_data');

        if (!$checkout) {
            return redirect()->route('collection')->with('error', 'No pending order found.');
        }

        $order = Order::create([
            'user_id'     => $checkout['user_id'],
            'total_price' => $checkout['total'],
            'status'      => 'Processing',
        ]);

        Address::create([
            'order_id'     => $order->id,
            'name'         => $checkout['shipping']['name'],
            'email'        => $checkout['shipping']['email'],
            'phone'        => $checkout['shipping']['phone'],
            'address'      => $checkout['shipping']['address'],
            'city'         => $checkout['shipping']['city'],
            'postal_code'  => $checkout['shipping']['postal_code'],
            'country'      => $checkout['shipping']['country'],
        ]);

        foreach ($checkout['cart'] as $productId => $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $productId,
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
            ]);
        }

        session()->forget('cart');
        session()->forget('checkout_data');

        return redirect()->route('account.orders')->with('success', 'Payment successful and order placed!');
    }

    public function paymentCancel()
    {
        return redirect()->route('collection')->with('error', 'Payment cancelled.');
    }

    public function paymentNotify(Request $request)
    {
        \Log::info('PayHere Notify:', $request->all());
        return response('OK', 200);
    }







    // Show dummy payment page
public function dummyPayment($order_id)
{
    $checkout = session('checkout_data');

    if (!$checkout || $checkout['order_id'] !== $order_id) {
        return redirect()->route('collection')->with('error', 'No pending order found.');
    }

    return view('UserInterface.cart.dummy-payment', [
        'order_id' => $order_id,
        'amount' => $checkout['total'],
        'shipping' => $checkout['shipping'],
    ]);
}

// Handle dummy payment success
public function dummyPaymentProcess(Request $request)
{
    $checkout = session('checkout_data');

    if (!$checkout || $checkout['order_id'] !== $request->order_id) {
        return redirect()->route('collection')->with('error', 'No pending order found.');
    }

    // Create order, address, order items exactly like paymentSuccess()
    $order = Order::create([
        'user_id'     => $checkout['user_id'],
        'total_price' => $checkout['total'],
        'status'      => 'Processing',
    ]);

    Address::create([
        'order_id'     => $order->id,
        'name'         => $checkout['shipping']['name'],
        'email'        => $checkout['shipping']['email'],
        'phone'        => $checkout['shipping']['phone'],
        'address'      => $checkout['shipping']['address'],
        'city'         => $checkout['shipping']['city'],
        'postal_code'  => $checkout['shipping']['postal_code'],
        'country'      => $checkout['shipping']['country'],
    ]);

    foreach ($checkout['cart'] as $productId => $item) {
        OrderItem::create([
            'order_id'   => $order->id,
            'product_id' => $productId,
            'quantity'   => $item['quantity'],
            'price'      => $item['price'],
        ]);
    }

    session()->forget('cart');
    session()->forget('checkout_data');

    return redirect()->route('account.orders')->with('success', 'Payment successful and order placed!');
}

// Handle dummy payment cancel
public function dummyPaymentCancel(Request $request)
{
    session()->forget('checkout_data');

    return redirect()->route('collection')->with('error', 'Payment cancelled.');
}

}
