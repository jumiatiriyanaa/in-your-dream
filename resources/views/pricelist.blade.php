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
        .service-item {
            background-color: #fff;
            /* Warna putih untuk latar belakang */
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            /* Sudut membulat */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Bayangan */
            text-align: center;
            transition: transform 0.3s ease-in-out;
            /* Animasi saat hover */
        }

        .service-item:hover {
            transform: scale(1.05);
            /* Perbesar sedikit saat hover */
        }

        .service-item .number {
            display: inline-block;
            background-color: #807a49;
            /* Warna latar belakang angka */
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .service-item img {
            max-width: 100px;
            /* Atur lebar maksimal gambar */
            margin: 10px auto;
        }

        .service-item h3 {
            font-size: 1.2rem;
            color: #333;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .service-item-content {
            font-size: 0.95rem;
            color: #555;
            text-align: left;
            list-style: none;
            padding: 0;
        }

        .service-item-content li {
            margin-bottom: 5px;
            line-height: 1.6;
        }

        .service-item-content ul {
            padding-left: 20px;
        }

        .service-item .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 20px;
            background-color: #807a49;
            color: #fff;
            border: none;
            border-radius: 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .service-item .btn:hover {
            background-color: #555;
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

    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url('{{ asset('assets/img/studio-background.png') }}');">
            <div class="container position-relative">
                <h1>Pricelist</h1>
                <p>
                    Home
                    /
                    Pricelist
                </p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Pricelist</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Services Section -->
        <section id="services" class="services section">
            <div class="content">
                <div class="container">
                    <div class="row g-0">
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ url('/selfphoto') }}" style="text-decoration: none; color: inherit;">
                                <div class="service-item">
                                    <span class="number"><span class="text-white">01</span></span>
                                    <h3 class="text-center mb-4">Photobox / Self Photo</h3>
                                    <div class="container text-center">
                                        <img src="{{ asset('guest/img/photobox.png') }}" alt="" width="100">
                                    </div>
                                    <div class="service-item-content">
                                        <li>1 - 4 orang</li>
                                        <li>15 menit/sesi</li>
                                        <li>Starting from [60k]</li>
                                        <li>Penambahan Waktu 5 Menit/10k</li>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ url('/weddings') }}" style="text-decoration: none; color: inherit;">
                                <div class="service-item">
                                    <h3 class="text-center mb-4">Wedding Package</h3>
                                    <span class="number"><span class="text-white">02</span></span>
                                    <div class="container text-center">
                                        <img src="{{ asset('guest/img/wedding.svg') }}" alt="" width="100">
                                    </div>
                                    <div class="service-item-content mt-3">
                                        <li>Akad</li>
                                        <li>Malam Berinai</li>
                                        <li>Malam Tepung Tawar</li>
                                        <li>Free Flashdisk</li>
                                        <li>Starting from [1.8jt]</li>
                                        <li>+ Album & Cetak 4r (80 lbr) Start [250k]</li>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-item">
                                <span class="number"><span class="text-white">03</span></span>
                                <h3 class="text-center mb-4">Order Package</h3>
                                <div class="container text-center">
                                    <img src="{{ asset('guest/img/order.png') }}" alt="" width="100">
                                </div>
                                <div class="service-item-content mt-3">
                                    <ul>
                                        <li>1 hari sesi</li>
                                        <li>Starting from [100k]</li>
                                        <li>
                                            Tersedia Paket:
                                            <ul>
                                                <li>Wisuda</li>
                                                <li>Ulang Tahun</li>
                                                <li>Pre Wedding</li>
                                                <li>Tunangan</li>
                                                <li>Akikah</li>
                                                <li>Dan event harian lainnya</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Services Section -->
    </main>

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
