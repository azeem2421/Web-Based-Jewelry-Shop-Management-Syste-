@extends('layouts.admin')

@section('title', 'Login')

@section('content')
<section class="bg-login-section p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
        <div class="card login-card border-0">
          <div class="card-body p-3 p-md-4 p-xl-5">

            @if (Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if (Session::has('error'))
              <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <div class="mb-5 text-center">
              <h4 class="fw-bold">Login Here</h4>
            </div>

            <form action="{{ route('admin.authenticate') }}" method="post">
              @csrf
              <div class="row gy-3 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" id="email" placeholder="name@example.com">
                    <label for="email">Email</label>
                  </div>
                  @error('email')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                  </div>
                  @error('password')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn btn-primary py-3" type="submit">Log in now</button>
                  </div>
                </div>
              </div>
            </form>

            <div class="row">
              <div class="col-12">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-center">
                  <a href="{{ route('account.register') }}" class="link-secondary text-decoration-none">
                    Create new account
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
