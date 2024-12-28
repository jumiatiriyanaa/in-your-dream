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
    <!-- My CSS -->
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        /* Pricelist */
        .service-item-card {
            background-color: #fff;
            padding: 20px;
            margin: 10px;
            position: relative;
            padding-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .service-item-card:hover {
            transform: scale(1.05);
        }

        .service-item-card .number {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #807a49;
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .service-item-card img {
            max-width: 100px;
            margin: 10px auto;
        }

        .service-item-card h3 {
            font-size: 1.2rem;
            color: #333;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .service-item-card-content {
            font-size: 0.95rem;
            color: #555;
            text-align: left;
            list-style: none;
            padding: 0;
        }

        .service-item-card-content li {
            margin-bottom: 5px;
            line-height: 1.6;
        }

        .service-item-card-content ul {
            padding-left: 20px;
        }

        .service-item-card .btn {
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

        .service-item-card .btn:hover {
            background-color: #555;
        }

        /* Gallery */
        /* Filter Buttons */
        .filter-buttons {
            margin-bottom: 20px;
        }

        .btn-filter {
            background-color: transparent;
            color: #000;
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 8px 16px;
            margin: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-filter.active,
        .btn-filter:hover {
            background-color: #807a49;
            color: #fff;
            border-color: #807a49;
        }

        /* Gallery Grid */
        .gallery-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .gallery-item {
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .gallery-image {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        .gallery-card:hover .gallery-image {
            transform: scale(1.1);
        }

        .gallery-info {
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .gallery-item {
                flex: 0 0 48%;
            }
        }

        @media (max-width: 576px) {
            .gallery-item {
                flex: 0 0 100%;
            }
        }

        /* Order Form Packages */
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .order-summary {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }

        .order-summary h5 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .total-payment {
            font-size: 20px;
            font-weight: bold;
        }

        .btn-booking {
            background-color: #000;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 8px;
            width: 100%;
        }

        .btn-booking:hover {
            background-color: #444;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
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
    <!-- My JS -->
    <script>
        // Gallery
        document.addEventListener('DOMContentLoaded', () => {
            const filterButtons = document.querySelectorAll('.btn-filter');
            const galleryItems = document.querySelectorAll('.gallery-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');

                    const filter = button.getAttribute('data-filter');

                    galleryItems.forEach(item => {
                        if (filter === 'all' || item.classList.contains(filter)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });

        // Order Form Packages
        document.addEventListener("DOMContentLoaded", function() {
            const numberOfFriendsInput = document.getElementById("number_of_friends");
            const totalPaymentInput = document.querySelector("input[name='total_payment']");
            const basePrice = 60000;
            const additionalCostPerPerson = 15000;
            const adminFee = 2000;

            numberOfFriendsInput.addEventListener("input", function() {
                const numberOfFriends = parseInt(numberOfFriendsInput.value) || 0;
                let additionalCost = 0;

                if (numberOfFriends > 4) {
                    additionalCost = (numberOfFriends - 4) * additionalCostPerPerson;
                }

                const totalPayment = basePrice + additionalCost + adminFee;
                totalPaymentInput.value = totalPayment;

                document.getElementById("display-total").textContent =
                    `Rp${totalPayment.toLocaleString('id-ID')}`;
            });
        });
    </script>
</body>

</html>
