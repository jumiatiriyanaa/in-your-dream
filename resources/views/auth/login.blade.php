@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
    <!-- Left Side -->
    <div class="left-side">
        <div class="background-image active"
            style="
                    background-image: url('https://i.pinimg.com/736x/65/09/7e/65097ec2a4551f628447e57865ef6127.jpg');
                ">
        </div>
        <div class="background-image"
            style="
                    background-image: url('https://i.pinimg.com/736x/9b/6b/8f/9b6b8fdbc6ceeb9851186022bf7f4dd0.jpg');
                ">
        </div>
        <div class="background-image"
            style="
                    background-image: url('https://i.pinimg.com/736x/8a/90/7b/8a907b773292b117c422334f3bd30bf7.jpg');
                ">
        </div>
        <div class="gradient-overlay"></div>

        <div class="logo-container">
            <img src="{{ asset('img/logo.png') }}" class="mb-3" alt="IN YOUR DREAM Logo" />
        </div>
    </div>

    <!-- Right Side -->
    <div class="right-side">
        <h3 class="form-title mb-4">Sign In</h3>
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="form-group mt-4">
                <div class="input-group">
                    <input type="login" class="form-control border-secondary" name="login"
                        placeholder="Email or Phone Number" value="{{ old('login') }}" required />
                </div>
                <span class="text-danger">
                    @error('login')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group mt-4 mb-3">
                <div class="input-group">
                    <input type="password" class="form-control border-secondary" name="password" placeholder="Password"
                        required />
                </div>
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Sign Ip Button -->
            <button type="submit" class="btn btn-signup w-100  rounded-pill">
                Sign In
            </button>

            <p class="mt-3 text-center text-muted">
                Don't have an account?
                <a href="{{ route('register') }}" class="link">Sign Up Now</a>
            </p>

            <div class="d-flex align-items-center my-3">
                <hr class="flex-grow-1" />
                <span class="px-3 text-muted">or</span>
                <hr class="flex-grow-1" />
            </div>

            <!-- Google Sign-Up Button -->
            <button type="button" class="btn social-btn rounded-pill">
                <i class="bi bi-google me-2"></i> <a href="{{ url('auth/google') }}"
                    class="text-decoration-none text-black">Sign In with Google</a>
            </button>
        </form>
    </div>
@endsection
