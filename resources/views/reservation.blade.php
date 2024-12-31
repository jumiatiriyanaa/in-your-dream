@extends('layouts.user')

@section('title', 'Reservation')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url('{{ asset('img/studio-background.png') }}');">
            <div class="container position-relative">
                <h1>Reservation</h1>
                <p>
                    Home
                    /
                    Reservation
                </p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Reservation</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Reservation Section -->
        <section id="reservations" class="reservations section">
            <div class="container">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <h2 class="section-title mt-4">Reservation Status</h2>

                @if ($currentReservation)
                    <!-- Current Reservation -->
                    <div class="reservation-card card mb-5">
                        <div class="card-header d-flex justify-content-between p-3">
                            <span class="package-title">
                                {{ $currentReservation->package_type }} •
                                {{ \Carbon\Carbon::parse($currentReservation->reservation_date)->format('l, j F Y - H:i') }}
                            </span>
                            <span class="status-label pending">
                                {{ $currentReservation->status }}
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="reservation-details d-flex justify-content-between">
                                <div class="details">
                                    <p class="package-name">
                                        {{ $currentReservation->package->name ?? $currentReservation->package_type }}
                                    </p>
                                </div>
                                <div class="pricing text-right">
                                    <p>Rp {{ number_format($currentReservation->total_price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="reservation-fees mt-3">
                                <p>Biaya Admin:
                                    <span>{{ number_format($currentReservation->admin_fee, 0, ',', '.') }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <form action="{{ route('reservations.cancel', $currentReservation->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to cancel this reservation?');">
                                @csrf
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                @else
                    <p class="text-center mb-5">Anda tidak memiliki reservasi yang aktif.</p>
                @endif

                <!-- Reservation History -->
                <h2 class="section-title">Reservation History</h2>
                @forelse($reservationHistory as $history)
                    <div class="reservation-card card mb-5">
                        <div class="card-header d-flex justify-content-between p-3">
                            <span class="package-title">
                                {{ $history->package_type }} •
                                {{ \Carbon\Carbon::parse($history->reservation_date)->format('l, j F Y - H:i') }}
                            </span>
                            <span class="status-label {{ $history->status == 'Completed' ? 'completed' : 'cancelled' }}">
                                {{ $history->status }}
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="reservation-details d-flex justify-content-between">
                                <div class="details">
                                    <p class="package-name">{{ $history->package->name ?? $history->package_type }}</p>
                                </div>
                                <div class="pricing text-right">
                                    <p>{{ $history->payment_method }} - Rp
                                        {{ number_format($history->total_price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-primary">Sesi Selesai</button>
                            <button class="btn btn-outline-primary"
                                onclick="window.location.href='{{ route('ratings.create', $history->id) }}'">Beri
                                Ulasan</button>
                        </div>
                    </div>
                @empty
                    <p class="text-center mb-5">Tidak ada riwayat reservasi.</p>
                @endforelse
            </div>
        </section>
        <!-- /Reservation Section -->
    </main>
@endsection
