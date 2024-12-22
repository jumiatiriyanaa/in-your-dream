<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>In Your Dream</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon" />
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Background and overall styling */
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .left-side {
            position: relative;
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
            text-align: center;
            overflow: hidden;
        }

        /* Background image styling */
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            filter: blur(3px);
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .background-image.active {
            opacity: 1;
        }

        /* Gradient overlay for the blur effect */
        .gradient-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom,
                    rgba(0, 0, 0, 0.5),
                    rgba(255, 255, 255, 0.2));
        }

        .right-side {
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background-color: #ffffff;
        }

        /* Logo */
        .logo-container {
            position: relative;
            z-index: 2;
            /* Ensures the logo is above the background images */
        }

        .logo-container img {
            width: 120px;
        }

        /* Form styling */
        .form-title {
            font-size: 2rem;
            font-weight: bold;
            color: black;
        }

        .form-control {
            border: none;
            border-bottom: 1px solid #000;
            border-radius: 0;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #2a0848;
            box-shadow: none;
        }

        /* Button styling */
        .btn-signup {
            background: linear-gradient(to right, #000000, #b59f78);
            color: white;
            border: none;
        }

        .btn-signup:hover {
            background: linear-gradient(to right, #b5b18f, #000000);
        }

        .social-btn {
            background-color: #ffffff;
            border: 1px solid #a08fb5;
            color: #000000;
            width: 100%;
            text-align: center;
            margin-top: 10px;
        }

        .social-btn:hover {
            background-color: #b5b18f;
            color: black;
        }

        /* Additional text and links */
        .text-muted {
            font-size: 0.9rem;
        }

        .text-muted a {
            color: black;
            text-decoration: none;
        }

        .text-muted a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Left Side -->
    <div class="left-side">
        <!-- Background images for slideshow -->
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

        <!-- Logo -->
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

            <!-- Sign Up Button -->
            <button type="submit" class="btn btn-signup w-100  rounded-pill">
                Sign In
            </button>

            <!-- Additional links and social sign-up -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        let images = document.querySelectorAll(".background-image");
        let currentIndex = 0;

        function showNextImage() {
            images[currentIndex].classList.remove("active");
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].classList.add("active");
        }

        setInterval(showNextImage, 2000);
    </script>
</body>

</html>
