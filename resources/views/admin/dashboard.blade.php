@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Reservasi Card -->
                    <div class="col-xxl-4 col-md-6">
                        <a href="{{ route('admin.reservations.index') }}" class="text-decoration-none">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Reservasi
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-credit-card-2-back"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalReservation }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Reservasi Card -->

                    <!-- Gallery Card -->
                    <div class="col-xxl-4 col-md-6">
                        <a href="{{ route('admin.galleries.index') }}" class="text-decoration-none">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Gallery
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-image"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalGalleries }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Gallery Card -->

                    <!-- Photographer Card -->
                    <div class="col-xxl-4 col-md-6">
                        <a href="{{ route('admin.photographers.index') }}" class="text-decoration-none">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Photographer
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-gear"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalUsersLevel0 }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Photographer Card -->

                    <!-- Background Card -->
                    <div class="col-xxl-4 col-md-6">
                        <a href="{{ route('admin.backgrounds.index') }}" class="text-decoration-none">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Background
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-images"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalBackgrounds }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Background Card -->

                    <!-- Package Card -->
                    <div class="col-xxl-4 col-md-6">
                        <a href="{{ route('admin.packages.index') }}" class="text-decoration-none">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Package
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-plus-square"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalPackages }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Package Card -->

                    <!-- About Us Card -->
                    <div class="col-xxl-4 col-md-6">
                        <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Total Users
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-circle"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalUsersLevel1 }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End About Us Card -->
                </div>
            </div>
        </div>
    </section>
@endsection
