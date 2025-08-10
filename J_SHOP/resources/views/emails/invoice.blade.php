<!DOCTYPE html>
<html>
<head>
    <title>Invoice for Order #{{ $order->id }}</title>
    <style>
        /* Simple styling for invoice */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2>Invoice for Order #{{ $order->id }}</h2>
    <p>Dear {{ $order->user->name ?? 'Customer' }},</p>
    <p>Thank you for your purchase! Here are your order details:</p>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price (Rs.)</th>
                <th>Subtotal (Rs.)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems ?? [] as $item)
                <tr>
                    <td>{{ $item->product->name ?? 'N/A' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>{{ number_format($item->quantity * $item->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Total: Rs. {{ number_format($order->total_price, 2) }}</strong></p>

    <p>We appreciate your business!</p>
    <p>— Azii Jewelers Team</p>
</body>
</html>
