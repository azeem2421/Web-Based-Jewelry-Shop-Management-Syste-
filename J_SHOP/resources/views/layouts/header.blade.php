<header class="sticky top-0 shadow-sm bg-white z-10">
  <nav class="navbar navbar-expand-lg bg-white py-3">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand fw-bold text-warning d-flex align-items-center" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px;" class="me-2">
        Azii Jewelers
      </a>

      <!-- Hamburger Toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Links -->
      <div class="collapse navbar-collapse justify-content-between" id="mainNavbar">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">

        <li class="nav-item px-3">
  <a class="nav-link text-dark fw-semibold" href="{{ url('/') }}">
    <i class="bi bi-house-door-fill me-1 text-warning"></i> Home
  </a>
</li>

          <!-- Jewellery Dropdown -->
          <li class="nav-item dropdown px-3 position-relative">
            <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="jewelleryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-gem me-1 text-warning"></i> Jewellery
            </a>
            <div class="dropdown-menu border-0 shadow animate__animated animate__fadeIn rounded-3 p-3 mt-2" aria-labelledby="jewelleryDropdown" style="min-width: 220px; background: #fff;">
              @foreach($categories as $category)
                <a class="dropdown-item d-flex align-items-center py-2 rounded small-hover" href="{{ url('/category-id/'.$category->id) }}">
                  <i class="bi bi-chevron-right me-2 text-secondary"></i>
                  {{ $category->name }}
                </a>
              @endforeach
            </div>
          </li>

          <li class="nav-item px-3">
            <a class="nav-link text-dark fw-semibold" href="{{ url('/about') }}">About</a>
          </li>
          <li class="nav-item px-3">
            <a class="nav-link text-dark fw-semibold" href="{{ url('/services') }}">Services</a>
          </li>
          <li class="nav-item px-3">
            <a class="nav-link text-dark fw-semibold" href="{{ url('/contact') }}">Contact</a>
          </li>
          <li class="nav-item px-3">
            <a class="nav-link text-dark fw-semibold" href="{{ url('/careers') }}">Careers</a>
          </li>
        </ul>

        <!-- Icons (Cart + User Menu) -->
        <ul class="navbar-nav mb-2 mb-lg-0">
          <!-- Cart Icon -->
          <li class="nav-item px-2">
            <a class="nav-link text-dark position-relative" href="{{ url('/cart') }}">
              <i class="bi bi-cart4 fs-5"></i>
            </a>
          </li>

          @auth
            <!-- 👤 User Dropdown -->
            <li class="nav-item dropdown px-2">
              <a class="nav-link dropdown-toggle text-dark d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-5 me-1"></i>
                <span class="fw-semibold">Welcome, {{ Auth::user()->name }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end animate__animated animate__fadeIn shadow border-0 mt-2" aria-labelledby="userDropdown">
                <li>
                  <a class="dropdown-item" href="{{ route('my.orders') }}">
                    <i class="bi bi-box-arrow-up-right me-2"></i> My Orders
                  </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form method="POST" action="{{ route('account.logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">
                      <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                  </form>
                </li>
              </ul>
            </li>
          @else
            <!-- Login -->
            <li class="nav-item px-2">
              <a class="nav-link text-dark" href="{{ route('account.login') }}">
                <i class="bi bi-box-arrow-in-right fs-5"></i> Login
              </a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
</header>
