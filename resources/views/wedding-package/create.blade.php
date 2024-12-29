@extends('layouts.user')

@section('title', 'Reservasi Wedding Package')

@section('content')
    <div class="container mt-3 mb-5">
        <h1 class="text-center mb-4">Wedding Package</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (Auth::check() && empty(Auth::user()->phone_number))
            <div class="alert alert-warning">
                <strong>Perhatian!</strong> Silahkan lengkapi data profile Anda, terutama nomor telepon.
            </div>
        @endif

        <form action="{{ route('wedding-package.store') }}" method="POST" class="row g-4">
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                    disabled>
            </div>

            <div class="col-md-6">
                <label for="phone_number" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                    value="{{ $user->phone_number }}" disabled>
            </div>

            <div class="col-md-12">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" id="address" name="address" rows="3" disabled>{{ $user->address }}</textarea>
            </div>

            <div class="col-md-6">
                <label for="start_date" class="form-label">Tanggal Mulai</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="end_date" class="form-label">Tanggal Selesai</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>

            <div class="col-md-12">
                <label for="event_location" class="form-label">Lokasi Acara</label>
                <input type="text" id="event_location" name="event_location" class="form-control" required>
            </div>

            <div class="col-md-12">
                <label class="form-label">Apakah Indoor atau Outdoor?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="event_type" id="indoor" value="Indoor" required>
                    <label class="form-check-label" for="indoor">Indoor</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="event_type" id="outdoor" value="Outdoor">
                    <label class="form-check-label" for="outdoor">Outdoor</label>
                </div>
            </div>

            <div class="col-md-12">
                <label class="form-label">Lain-lain</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="details" id="option1"
                        value="Album & Cetak 4R (80 lbr) Start [250k]">
                    <label class="form-check-label" for="option1">
                        Album & Cetak 4R (80 lbr) Start [250k]
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="details" id="option2" value="null" checked>
                    <label class="form-check-label" for="option2">
                        Tidak ada tambahan
                    </label>
                </div>
            </div>

            <div class="col-md-12">
                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                <select id="payment_method" name="payment_method" class="form-select">
                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                    <option value="Transfer">Transfer</option>
                    <option value="Cash">Cash</option>
                </select>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-dark w-100">Lanjutkan</button>
            </div>
        </form>
    </div>
@endsection