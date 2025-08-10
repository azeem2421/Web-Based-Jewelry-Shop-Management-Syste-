<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Azii Jewelers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ✅ Local CSS file -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- ✅ Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- ✅ FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        header.sticky {
            position: sticky;
            top: 0;
            background: white;
            z-index: 1000;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        footer {
            background-color: #222;
            color: white;
            padding: 2rem 1rem;
        }

        footer a {
            color: #f9c74f;
            text-decoration: none;
        }
    </style>
</head>
<body>

    @include('layouts.header')

    <!-- ✅ Flash Messages -->
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show flash-message" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show flash-message" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show flash-message" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- ✅ Main Content -->
    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    <!-- ✅ JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ✅ Auto-dismiss Flash Messages -->
    <script>
        setTimeout(() => {
            const messages = document.querySelectorAll('.flash-message');
            messages.forEach(msg => {
                msg.classList.remove('show');  // Bootstrap fade-out
                msg.classList.add('fade');
                setTimeout(() => msg.remove(), 300);
            });
        }, 5000); // 5 seconds
    </script>

</body>
</html>
