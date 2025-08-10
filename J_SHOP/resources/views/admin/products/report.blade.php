<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Products Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; text-align: left; }
        img { max-width: 60px; max-height: 60px; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Products Report</h2>
    <p>Generated on: {{ now()->format('Y-m-d H:i:s') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price (Rs)</th>
                <th>Stock</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if ($product->image && file_exists(public_path($product->image)))
                            <img src="{{ public_path($product->image) }}" alt="{{ $product->name }}">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description ?? 'No description' }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->category->name ?? 'Uncategorized' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
