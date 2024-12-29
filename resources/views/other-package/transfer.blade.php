@extends('layouts.user')

@section('title', 'Pembayaran Transfer')

@section('content')
    <div class="container mt-3 mb-5">
        <h1 class="text-center mb-4">Pembayaran Transfer</h1>

        <div class="card mb-4">
            <div class="card-body text-center">
                <h5 class="card-title mb-4">Bank BCA</h5>
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="Logo BCA"
                    style="height: 50px; margin-bottom: 15px;">

                <p class="card-text">
                <h6 class="mb-2">Nomor Rekening</h6>
                <div class="container mb-2">
                    <span id="account-number" style="font-size: 1.2rem; font-weight: bold;">03123123</span>
                    <button class="btn btn-sm btn-outline-secondary ms-2" onclick="copyAccountNumber()">
                        <i class="bi bi-clipboard"></i>
                    </button>
                </div>
                <p>A/N <strong>Bimo Nugraha</strong></p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $reservation->package_type }}</h5>
                <div class="mt-4">
                    <span>Harga Dasar: <b>Rp. {{ number_format($reservation->base_price, 0, ',', '.') }}</b></span> <br>
                    <span>Biaya Admin: <b>Rp. {{ number_format($reservation->admin_fee, 0, ',', '.') }}</b></span> <br>
                    <p class="total-payment mt-4">Total Pembayaran:
                        Rp. {{ number_format($reservation->total_price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <form action="{{ route('other-package.upload-proof') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="payment_proof" class="form-label">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" id="payment_proof" name="payment_proof" required>
            </div>
            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
            <button type="submit" class="btn btn-dark w-100">Kirim Bukti Pembayaran</button>
        </form>
    </div>
@endsection
