@extends('layouts.user')

@section('title', 'Rincian Reservasi Wedding')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="section-title text-center mb-4">Rincian Reservasi</h1>
        <div class="d-flex align-items-center mb-4">
            <img src="https://via.placeholder.com/50" alt="Avatar" class="avatar me-3">
            <div>
                <h5 class="mb-0">{{ $reservation->user->name }}</h5>
                <p class="mb-0">{{ $reservation->user->email }}</p>
                <p class="mb-0">{{ $reservation->user->phone_number }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Detail Reservasi</h5>
                <span><strong>Alamat:</strong> {{ $reservation->user->address }}</span> <br>
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

        <form action="{{ route('wedding-package.confirm', $reservation->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn-booking">Booking</button>
        </form>
    </div>
@endsection
