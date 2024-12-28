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
        <h1 class="text-center mb-4">Photobox - Self Photo</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('selfphoto.store') }}" method="POST" class="row g-4">
            @csrf
            <div class="col-md-12">
                <label for="user_name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="user_name" name="user_name"
                    value="{{ Auth::check() ? Auth::user()->name : '' }}" required disabled>
            </div>

            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ Auth::check() ? Auth::user()->email : '' }}" required disabled>
            </div>

            <div class="col-md-12">
                <label for="phone_number" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                    value="{{ Auth::check() ? Auth::user()->phone_number : '' }}" required disabled>
            </div>

            <div class="mt-4 row mb-3">
                <div class="col-md-6">
                    <label for="schedule_date" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="schedule_date" name="schedule_date" required>
                </div>

                <div class="col-md-6">
                    <label for="schedule_time" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="schedule_time" name="schedule_time" required>
                </div>
            </div>

            <div class="col-md-12">
                <label for="background_choice" class="form-label">Pilih Background</label>
                <div class="row">
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background1"
                            value="Green Photobox" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background1">
                            <img src="{{ asset('img/green.png') }}" class="img-fluid rounded mb-2"
                                alt="Green Photobox">
                            <b class="mt-5">Green Photobox</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background2"
                            value="Red Photobox" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background2">
                            <img src="{{ asset('img/red.png') }}" class="img-fluid rounded mb-2" alt="Red Photobox">
                            <b class="mt-5">Red Photobox</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background3"
                            value="Abstract 1" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background3">
                            <img src="{{ asset('img/abstract1.png') }}" class="img-fluid rounded mb-2"
                                alt="Abstract 1">
                            <b class="mt-5">Abstract 1</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background4"
                            value="Abstract 2" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background4">
                            <img src="{{ asset('img/abstract2.png') }}" class="img-fluid rounded mb-2"
                                alt="Abstract 2">
                            <b class="mt-5">Abstract 2</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background5"
                            value="Putih Photobox" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background5">
                            <img src="{{ asset('img/putih.png') }}" class="img-fluid rounded mb-2"
                                alt="Putih Photobox">
                            <b class="mt-5">Putih Photobox</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background6"
                            value="Beige Photobox" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background6">
                            <img src="{{ asset('img/beige.png') }}" class="img-fluid rounded mb-2"
                                alt="Beige Photobox">
                            <b class="mt-5">Beige Photobox</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background7"
                            value="Hitam Photobox" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background7">
                            <img src="{{ asset('img/red.png') }}" class="img-fluid rounded mb-2"
                                alt="Hitam Photobox">
                            <b class="mt-5">Hitam Photobox</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background8"
                            value="Kuning Photobox" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background8">
                            <img src="{{ asset('img/red.png') }}" class="img-fluid rounded mb-2"
                                alt="Kuning Photobox">
                            <b class="mt-5">Kuning Photobox</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <label for="number_of_friends" class="form-label">Jumlah Teman</label>
                <input type="number" class="form-control" id="number_of_friends" name="number_of_friends" required>
            </div>

            <div class="col-md-12">
                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
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
    <script>
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
