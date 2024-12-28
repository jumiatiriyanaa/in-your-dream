<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>In Your Dream - @yield('title')</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap"
        rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="{{ asset('guest/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('guest/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('guest/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('guest/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('guest/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <!-- Main CSS File -->
    <link href="{{ asset('guest/css/main.css') }}" rel="stylesheet" />
    <!-- My CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center position-relative">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('img/logo.png') }}" alt="Logo In Your Dream" />
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/home" class="{{ Request::is('home') ? 'active' : '' }}">Home</a></li>
                    <li><a href="/gallery" class="{{ Request::is('gallery') ? 'active' : '' }}">Gallery</a></li>
                    <li><a href="/pricelist" class="{{ Request::is('pricelist') ? 'active' : '' }}">Pricelist</a></li>
                    <li><a href="/home#about" class="{{ Request::is('home#about') ? 'active' : '' }}">About Us</a></li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0 m-0">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-link text-decoration-none text-dark w-100 text-start">Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('login') }}">Sign In</a>
                        </li>
                    @endauth
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer id="footer" class="footer dark-background">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <img src="{{ asset('img/logo.png') }}" width="130">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <span class="sitename pt-4">Jl. HOS Cokroaminoto</span>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-3 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="/home">Home</a></li>
                            <li><a href="/home#about">About us</a></li>
                            <li><a href="/gallery">Gallery</a></li>
                            <li><a href="/pricelist">Pricelist</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-3 footer-links">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Center</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div>
                        © Copyright 2024 <strong><span>In Your Dream</span></strong>. All Rights Reserved
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href="081371867783"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.instagram.com/story_inyourdream/"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.instagram.com/inyourdream_studiophoto/"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
    <!-- Vendor JS Files -->
    <script src="{{ asset('guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('guest/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('guest/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('guest/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('guest/js/main.js') }}"></script>
    <!-- My JS -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
