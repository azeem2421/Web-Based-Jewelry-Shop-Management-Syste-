<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;  // Use the User model
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // List all customers with their latest address
    public function index()
    {
        // Get all users with role 'customer' and eager load latestAddress relation
        $customers = User::where('role', 'customer')->with('latestAddress')->get();

        return view('admin.customers.index', compact('customers'));
    }

    // Show details of one customer
    public function show($id)
    {
        $customer = User::where('role', 'customer')->with('latestAddress')->findOrFail($id);

        return view('admin.customers.show', compact('customer'));
    }

    // Generate PDF report of customers with their latest address
    public function generatePdfReport()
    {
        $customers = User::where('role', 'customer')->with('latestAddress')->get();

        $pdf = Pdf::loadView('admin.customers.report', compact('customers'));

        return $pdf->download('customers_report.pdf');
    }
}
