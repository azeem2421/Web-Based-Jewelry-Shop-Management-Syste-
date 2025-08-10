<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Category;

class OrderController extends Controller
{
    // Display list of logged-in user's orders with related items and address
    public function index()
    {
        $orders = Order::with(['orderItems.product', 'address'])
                       ->where('user_id', Auth::id())
                       ->orderBy('created_at', 'desc')
                       ->get();

        $categories = Category::all(); // ✅ Add this line

        return view('UserInterface.cart.my-orders', compact('orders', 'categories'));
    }
}
