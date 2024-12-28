@extends('layouts.user')

@section('title', 'Rincian Reservasi Photobox - Self Photo')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="section-title text-center mb-4">Rincian Reservasi</h1>
        <div class="d-flex align-items-center mb-4">
            <img src="https://via.placeholder.com/50" alt="Avatar" class="avatar me-3">
            <div>
                <h5 class="mb-0">{{ $reservation->user_name }}</h5>
                <p class="mb-0">{{ $reservation->email }}</p>
                <p class="mb-0">{{ $reservation->phone_number }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $reservation->background_choice }}</h5>
                <span><strong>Schedule Date:</strong>
                    {{ \Carbon\Carbon::parse($reservation->schedule_date)->translatedFormat('l, j F Y') }}</span> <br>
                <span><strong>Time:</strong> {{ $reservation->schedule_time }}</span> <br>
                <span><strong>Metode Pembayaran:</strong> {{ $reservation->payment_method }}</span> <br>
                <span><strong>Estimasi Membawa Teman:</strong> {{ $reservation->number_of_friends }}</span> <br>
                <div class="mt-4">
                    <h5>Rincian Pembayaran</h5>
                    <span>Subtotal Paket: Rp. {{ number_format($reservation->subtotal_package, 0, ',', '.') }}</span>
                    <br>
                    <span>Subtotal Penambahan Orang:
                        Rp. {{ number_format($reservation->additional_person_cost, 0, ',', '.') }}</span> <br>
                    <span>Biaya Admin: Rp. {{ number_format($reservation->admin_fee, 0, ',', '.') }}</span> <br>
                    <p class="total-payment mt-4">Total Pembayaran:
                        Rp. {{ number_format($reservation->total_payment, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <form action="{{ route('selfphoto.confirm', $reservation->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn-booking">Booking</button>
        </form>
    </div>
@endsection
