@extends('layouts.user')

@section('title', 'Pricelist')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url('{{ asset('img/studio-background.png') }}');">
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
                            <a href="{{ url('/selfphoto-photobox-package') }}"
                                style="text-decoration: none; color: inherit;">
                                <div class="service-item-card">
                                    <span class="number"><span class="text-white">01</span></span>
                                    <h3 class="text-center mb-4">Photobox / Self Photo</h3>
                                    <div class="container text-center">
                                        <img src="{{ asset('img/photobox.png') }}" alt="" width="100">
                                    </div>
                                    <div class="service-item-card-content">
                                        <li>1 - 4 orang</li>
                                        <li>15 menit/sesi</li>
                                        <li>Starting from [60k]</li>
                                        <li>Penambahan Waktu 5 Menit/10k</li>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ url('/wedding-package') }}" style="text-decoration: none; color: inherit;">
                                <div class="service-item-card">
                                    <h3 class="text-center mb-4">Wedding Package</h3>
                                    <span class="number"><span class="text-white">02</span></span>
                                    <div class="container text-center">
                                        <img src="{{ asset('img/wedding.svg') }}" alt="" width="100">
                                    </div>
                                    <div class="service-item-card-content mt-3">
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
                            <a href="{{ url('/other-package') }}" style="text-decoration: none; color: inherit;">
                                <div class="service-item-card">
                                    <span class="number"><span class="text-white">03</span></span>
                                    <h3 class="text-center mb-4">Other Package</h3>
                                    <div class="container text-center">
                                        <img src="{{ asset('img/other.png') }}" alt="" width="100">
                                    </div>
                                    <div class="service-item-card-content mt-3">
                                        <ul>
                                            <li>1 hari sesi</li>
                                            <li>Starting from [100k]</li>
                                            <li>
                                                Tersedia Paket:
                                                <ul>
                                                    <li>Wisuda</li>
                                                    <li>Ulang Tahun</li>
                                                    <li>Prewedding</li>
                                                    <li>Tunangan</li>
                                                    <li>Akikah</li>
                                                    <li>Dan event harian lainnya</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Services Section -->
    </main>
@endsection
