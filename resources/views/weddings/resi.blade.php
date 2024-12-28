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
        body {
            font-family: 'Open Sans', sans-serif;
        }

        .container {
            max-width: 800px;
        }

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
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">
        <h1 class="section-title text-center mb-4">Rincian Reservasi</h1>
        <div class="d-flex align-items-center mb-4">
            <img src="https://via.placeholder.com/50" alt="Avatar" class="avatar me-3">
            <div>
                <h5 class="mb-0">{{ $reservation->name }}</h5>
                <p class="mb-0">{{ $reservation->email }}</p>
                <p class="mb-0">{{ $reservation->phone_number }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Detail Reservasi</h5>
                <span><strong>Lokasi Acara:</strong> {{ $reservation->event_location }}</span> <br>
                <span><strong>Tanggal Mulai:</strong>
                    {{ \Carbon\Carbon::parse($reservation->start_date)->translatedFormat('l, j F Y') }}</span> <br>
                <span><strong>Tanggal Selesai:</strong>
                    {{ \Carbon\Carbon::parse($reservation->end_date)->translatedFormat('l, j F Y') }}</span> <br>
                <span><strong>Tipe Acara:</strong> {{ $reservation->event_type }}</span> <br>
                <span><strong>Metode Pembayaran:</strong> {{ $reservation->payment_method }}</span> <br>

                <div class="mt-4">
                    <h5>Rincian Pembayaran</h5>
                    <span>Harga Dasar: Rp. {{ number_format($reservation->base_price, 0, ',', '.') }}</span> <br>
                    <span>Tambahan Paket: Rp. {{ number_format($reservation->additional_price, 0, ',', '.') }}</span>
                    <br>
                    <span>Biaya Admin: Rp. {{ number_format($reservation->admin_fee, 0, ',', '.') }}</span> <br>
                    <p class="total-payment mt-4">Total Pembayaran:
                        Rp. {{ number_format($reservation->total_price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <form action="{{ route('weddings.confirm', $reservation->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn-booking">Booking</button>
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
    {{-- <div id="preloader"></div> --}}
    <!-- Vendor JS Files -->
    <script src="{{ asset('guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('guest/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('guest/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('guest/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('guest/js/main.js') }}"></script>
</body>

</html>
