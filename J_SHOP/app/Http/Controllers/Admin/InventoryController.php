<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;


class InventoryController extends Controller
{
public function index(Request $request)
{
    $query = Product::with('category');

    if ($request->filter == 'low') {
        $query->whereColumn('stock', '<=', 'low_stock_threshold')->where('stock', '>', 0);
    } elseif ($request->filter == 'out') {
        $query->where('stock', 0);
    } elseif ($request->filter == 'ok') {
        $query->whereColumn('stock', '>', 'low_stock_threshold');
    }

    $products = $query->orderBy('name')->get();

    return view('admin.inventory.index', compact('products'));
}


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
            'low_stock_threshold' => 'required|integer|min:0',
        ]);

        $product->update([
            'stock' => $request->stock,
            'low_stock_threshold' => $request->low_stock_threshold,
        ]);

        return back()->with('success', 'Inventory updated successfully.');
    }


public function generateReport(Request $request)
{
    $query = Product::with('category');

    if ($request->filter == 'low') {
        $query->whereColumn('stock', '<=', 'low_stock_threshold')->where('stock', '>', 0);
    } elseif ($request->filter == 'out') {
        $query->where('stock', 0);
    } elseif ($request->filter == 'ok') {
        $query->whereColumn('stock', '>', 'low_stock_threshold');
    }

    $products = $query->orderBy('name')->get();
    $date = now()->format('Y-m-d');

    $pdf = PDF::loadView('admin.inventory.report', compact('products', 'date'));
    return $pdf->download('inventory_report_' . $date . '.pdf');
}


public function reorder(Request $request)
{
    $query = Product::with('category');

    if ($request->filter == 'low') {
        $query->whereColumn('stock', '<=', 'low_stock_threshold')->where('stock', '<', 0);
    } elseif ($request->filter == 'out') {
        $query->where('stock', 0);
    } elseif ($request->filter == 'ok') {
        $query->whereColumn('stock', '>', 'low_stock_threshold');
    }

    $products = $query->orderBy('name')->get();

    return view('admin.inventory.re-order', compact('products'));
}


}

