<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Azii Jewelers</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('css/admin-products.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin-lg.css') }}" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body { font-family: 'Segoe UI', sans-serif; }
    .nav-link:hover { color: gold !important; }
  </style>
</head>

<body>

  <!-- 🌟 Flash Messages -->
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

  <!-- 🌍 Main Content -->
  @yield('content')

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- 🔥 Auto-Hide Flash Script -->
  <script>
    setTimeout(() => {
      const messages = document.querySelectorAll('.flash-message');
      messages.forEach(msg => {
        msg.classList.remove('show');  // Bootstrap fade out
        msg.classList.add('fade');
        setTimeout(() => msg.remove(), 300);  // Remove from DOM
      });
    }, 3000); // Adjust time here (5000ms = 5s)
  </script>

  @stack('scripts')
</body>
</html>
