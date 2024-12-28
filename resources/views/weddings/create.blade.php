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
    <style>
        .form-label {
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .summary-card {
            border-radius: 12px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center position-relative">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('img/logo.png') }}" alt="Logo In Your Dream" />
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/home" class="active">Home</a></li>
                    <li><a href="/gallery">Gallery</a></li>
                    <li><a href="/pricelist">Pricelist</a></li>
                    <li><a href="/home#about">About Us</a></li>
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

    <div class="container mt-3 mb-5">
        <h1 class="text-center mb-4">Wedding</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('weddings.store') }}" method="POST" class="row g-4">
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
            </div>

            <div class="col-md-6">
                <label for="phone_number" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                    value="{{ Auth::check() ? Auth::user()->phone_number : '' }}" required>
            </div>

            <div class="col-md-6">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="start_date" class="form-label">Tanggal Mulai</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="end_date" class="form-label">Tanggal Selesai</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>

            <div class="col-md-12">
                <label for="event_location" class="form-label">Lokasi Acara</label>
                <input type="text" id="event_location" name="event_location" class="form-control" required>
            </div>

            <div class="col-md-12">
                <label class="form-label">Apakah Indoor atau Outdoor?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="event_type" id="indoor" value="Indoor"
                        required>
                    <label class="form-check-label" for="indoor">Indoor</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="event_type" id="outdoor"
                        value="Outdoor">
                    <label class="form-check-label" for="outdoor">Outdoor</label>
                </div>
            </div>

            <div class="col-md-12">
                <label class="form-label">Lain-lain</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="package_details" id="option1"
                        value="Album & Cetak 4R (80 lbr) Start [250k]">
                    <label class="form-check-label" for="option1">
                        Album & Cetak 4R (80 lbr) Start [250k]
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="package_details" id="option2"
                        value="null" checked>
                    <label class="form-check-label" for="option2">
                        Tidak ada tambahan
                    </label>
                </div>
            </div>

            <div class="col-md-12">
                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                <select id="payment_method" name="payment_method" class="form-select">
                    <option value="Transfer">Transfer</option>
                    <option value="Cash">Cash</option>
                </select>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-dark w-100">Lanjutkan</button>
            </div>
        </form>
    </div>

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
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Pricelist</a></li>
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
</body>

</html>
