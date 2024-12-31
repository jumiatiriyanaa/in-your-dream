@extends('layouts.auth')

@section('title', 'Daftar')

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
        <h3 class="form-title mb-4">Sign Up</h3>
        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input id="name" type="text" class="form-control" name="name" placeholder="Full Name" required />
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <input id="email" type="email" class="form-control" name="email" placeholder="Email" required />
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <input id="phone_number" type="number" class="form-control" name="phone_number" placeholder="Phone Number"
                    required />
                <span class="text-danger">
                    @error('phone_number')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                    required />
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                    placeholder="Confirmation Password" required />
                <span class="text-danger">
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Sign Up Button -->
            <div class="form-action">
                <button type="submit" class="btn btn-signup w-100 rounded-pill">
                    Sign Up
                </button>
            </div>

            <p class="mt-3 text-center text-muted">
                Do you have an account?
                <a href="{{ route('login') }}">Sign In Now</a>
            </p>

            <div class="d-flex align-items-center my-3">
                <hr class="flex-grow-1" />
                <span class="px-3 text-muted">or</span>
                <hr class="flex-grow-1" />
            </div>

            <!-- Google Sign-Up Button -->
            <button type="button" class="btn social-btn rounded-pill">
                <i class="bi bi-google me-2"></i> <a href="{{ url('auth/google') }}"
                    class="text-decoration-none text-black">Sign Up with Google</a>
            </button>
        </form>
    </div>
@endsection
