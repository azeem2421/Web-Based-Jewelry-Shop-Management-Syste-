<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        $totalSales = Order::where('status', 'Completed')->sum('total_price');
        $lowStockCount = Product::where('stock', '<=', 5)->count();
        $ordersToday = Order::whereDate('created_at', today())->count();
        $totalProducts = Product::count();

        // Active & total user counts
        // $activeUsers = User::where('is_active', 1)->count();  // Optional if you have that column
        $totalUsers = User::count();

        // Backup mock data
        $lastBackupDate = '2025-06-29 02:15:00';
        $backupStatus = 'Successful';

        return view('admin.reports.index', compact(
            'totalSales',
            'lowStockCount',
            'ordersToday',
            'totalProducts',
            // 'activeUsers',
            'totalUsers',
            'lastBackupDate',
            'backupStatus'
        ));
    }

    public function sales(Request $request)
    {
        $sales = Order::with('user')
            ->where('status', 'Completed')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.reports.sales', compact('sales'));
    }

    public function products()
    {
        $products = Product::with('category')->orderByDesc('stock')->get();

        return view('admin.reports.products', compact('products'));
    }

    public function orders()
    {
        $orders = Order::with('user')->orderByDesc('created_at')->get();

        return view('admin.reports.orders', compact('orders'));
    }

    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.reports.users', compact('users'));
    }

    public function inventory()
    {
        $inventory = Product::with('category')->get();

        return view('admin.reports.inventory', compact('inventory'));
    }

    public function backup()
    {
        // You can later list backup files from storage
        $lastBackupDate = '2025-06-29 02:15:00';
        $backupStatus = 'Successful';

        return view('admin.reports.backup', compact('lastBackupDate', 'backupStatus'));
    }






     public function salesReport()
{
    $sales = DB::table('orders')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total_price) as total'))
        ->where('status', 'Completed')
        ->groupBy(DB::raw('DATE(created_at)'))
        ->orderBy('date', 'desc')
        ->get();

    $totalSales = $sales->sum('total');

    return view('admin.reports.sales', compact('sales', 'totalSales'));
}




}



