<!DOCTYPE html>
<html>
<head>
    <title>System Users Report</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            padding: 2rem;
            font-family: Arial, sans-serif;
        }
        h2 {
            margin-bottom: 1rem;
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 0.6rem;
            text-align: left;
            border: 1px solid #ccc;
        }
        .badge {
            font-size: 0.8rem;
        }
        .print-btn {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <button onclick="window.print()" class="btn btn-dark print-btn">Print Report</button>
    <h2>System Users Report</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Modules</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->modules as $module)
                        <span class="badge bg-secondary">{{ $module->name }}</span>
                    @endforeach
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No users found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
