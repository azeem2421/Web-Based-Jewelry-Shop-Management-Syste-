<!DOCTYPE html>
<html>
<head>
    <title>Category List</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }
        img {
            max-width: 60px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Category List</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @if ($category->image)
                            <img src="{{ public_path('storage/' . $category->image) }}" alt="img">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
