<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\OrderInvoiceMail;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // List orders with pagination
public function index(Request $request)
{
    $status = $request->input('status');

    $orders = Order::with(['user', 'orderItems'])
        ->when($status, fn($q) => $q->where('status', $status))
        ->latest()
        ->paginate(10);

    $totalSales = Order::where('status', 'Completed')->sum('total_price');

    return view('admin.orders.index', compact('orders', 'totalSales', 'status'));
}

    // Show order details with items and address
    public function show($id)
    {
        $order = Order::with(['orderItems.product', 'address', 'user'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Update order status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Processing,Completed,Cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated.');
    }


    public function generateReport()
{
    $orders = Order::with('user')->latest()->get();

    $pdf = PDF::loadView('admin.orders.report', compact('orders'));

    return $pdf->download('orders_report.pdf');
}


public function sendInvoice(Order $order)
{
    Mail::to($order->user->email)->send(new OrderInvoiceMail($order));

    return redirect()->back()->with('success', 'Invoice sent to customer.');
}


}

