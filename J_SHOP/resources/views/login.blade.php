@extends('layouts.app')

@section('title', 'Login')

@section('content')
<section class="login-bg d-flex align-items-center justify-content-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-6 col-xl-5">
                <div class="card shadow-lg border-0 rounded-4 bg-white bg-opacity-90">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-dark">🔐 Login to Your Account</h3>
                        </div>

                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                        @endif

                        <form action="{{ route('account.authenticate') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                    value="{{ old('email') }}" placeholder="Email" required>
                                <label for="email">Email</label>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Log in</button>
                            </div>

                            <div class="text-center">
                                <a href="#" class="text-muted">Forgot Password?</a>
                            </div>
                        </form>

                        <hr class="my-4">

                        <div class="text-center">
                            <span class="text-muted">Don't have an account?</span>
                            <a href="{{ route('account.register') }}" class="text-decoration-none fw-bold">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
