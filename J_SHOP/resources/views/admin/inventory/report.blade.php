<!DOCTYPE html>
<html>
<head>
    <title>Inventory Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; border: 1px solid #000; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { margin-bottom: 0; }
        p { margin-top: 5px; font-size: 12px; }
    </style>
</head>
<body>
    <h2>📋 Inventory Report</h2>
    <p>Date: {{ $date }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Threshold</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $i => $product)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->low_stock_threshold }}</td>
                    <td>
                        @if($product->stock == 0)
                            Out of Stock
                        @elseif($product->stock <= $product->low_stock_threshold)
                            Low Stock
                        @else
                            In Stock
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
