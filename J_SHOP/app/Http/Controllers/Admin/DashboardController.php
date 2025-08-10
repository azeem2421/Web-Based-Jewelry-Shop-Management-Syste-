<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
class DashboardController extends Controller
{
    //this will show dashboard page for admin
    public function index()
    {


        
        $salesTotal = Order::where('status', 'Completed')->sum('total_price');

        $ordersToday = Order::whereDate('created_at', Carbon::today())->count();

        $lowStockItems = Product::whereColumn('stock', '<=', 'low_stock_threshold')->count();

        $totalProducts = Product::count();

        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($order) {
                return (object)[
                    'id' => $order->id,
                    'created_at' => $order->created_at,
                    'customer_name' => $order->user->name ?? 'Guest',
                    'total_amount' => $order->total_amount,
                    'status' => $order->status,
                ];
            });

        return view('admin.dashboard', compact(
            'salesTotal',
            'ordersToday',
            'lowStockItems',
            'totalProducts',
            'recentOrders'
        ));
    }
}




