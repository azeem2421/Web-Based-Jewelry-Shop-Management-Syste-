@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1>Sales Report</h1>

    <div class="alert alert-info">
        <strong>Total Sales (Completed Orders):</strong> Rs. {{ number_format($totalSales, 2) }}
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Sales (Rs.)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $sale)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($sale->date)->format('Y-m-d') }}</td>
                    <td>{{ number_format($sale->total, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No sales data available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
