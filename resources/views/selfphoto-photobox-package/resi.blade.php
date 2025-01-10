@extends('layouts.user')

@section('title', 'Rincian Reservasi Photobox - Self Photo')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="section-title text-center mb-2">Rincian Reservasi</h1>

        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex align-items-center mb-4">
            @php
                $avatar =
                    $reservation->user->login_type == 'google' && $reservation->user->avatar
                        ? $reservation->user->avatar
                        : ($reservation->user->avatar
                            ? asset('storage/' . $reservation->user->avatar)
                            : 'https://via.placeholder.com/50');
            @endphp
            <img src="{{ $avatar }}" alt="Avatar" class="avatar me-3"
                style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
            <div>
                <h5 class="mb-0">{{ $reservation->user->name }}</h5>
                <p class="mb-0">{{ $reservation->user->email }}</p>
                <p class="mb-0">{{ $reservation->user->phone_number }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $reservation->background_choice }}</h5>
                <span><strong>Alamat:</strong> {{ $reservation->user->address }}</span> <br>
                <span><strong>Tanggal:</strong>
                    {{ \Carbon\Carbon::parse($reservation->schedule_date)->translatedFormat('l, j F Y') }}</span> <br>
                <span><strong>Jam:</strong> {{ $reservation->schedule_time }}</span> <br>
                <span><strong>Estimasi Membawa Teman:</strong> {{ $reservation->number_of_friends }}</span> <br>
                <span><strong>Metode Pembayaran:</strong> {{ $reservation->payment_method }}</span> <br>
                <div class="mt-4">
                    <h5>Rincian Pembayaran</h5>
                    <span>Harga Dasar: Rp. {{ number_format($reservation->base_price, 0, ',', '.') }}</span>
                    <br>
                    <span>Harga Penambahan Orang:
                        Rp. {{ number_format($reservation->additional_person_cost, 0, ',', '.') }}</span> <br>
                    <span>Biaya Admin: Rp. {{ number_format($reservation->admin_fee, 0, ',', '.') }}</span> <br>
                    <p class="total-payment mt-4">Total Pembayaran:
                        Rp. {{ number_format($reservation->total_price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <form action="{{ route('selfphoto-photobox-package.confirm', $reservation->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn-booking">Selesai</button>
        </form>
    </div>
@endsection
