@extends('layouts.app')

@section('title', 'Register')

@section('content')

<section class="reg-bg py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card register-card p-4">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Register Here</h3>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('account.processRegister') }}" method="POST">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
                                <label for="name">Name</label>
                                @error('name')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
                                <label for="email">Email</label>
                                @error('email')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password">
                                <label for="password">Password</label>
                                @error('password')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                <label for="password_confirmation">Confirm Password</label>
                                @error('password_confirmation')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2">Register Now</button>
                        </form>

                        <hr class="my-4">
                        <p class="text-center">
                            Already have an account?
                            <a href="{{ route('account.login') }}" class="text-decoration-none">Login Here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
