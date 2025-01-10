@extends('layouts.user')

@section('title', 'Reservasi Other Package')

@section('content')
    <div class="container mt-3 mb-5">
        <h1 class="text-center mb-4">Other Package</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (Auth::check() && empty(Auth::user()->phone_number))
            <div class="alert alert-warning">
                <strong>Perhatian!</strong> Silahkan lengkapi data profile Anda, terutama nomor telepon.
            </div>
        @endif

        <form action="{{ route('other-package.store') }}" method="POST" class="row g-4">
            @csrf
            <div class="col-md-12">
                <label for="package_type" class="form-label">Paket</label>
                <select class="form-select" id="package_type" name="package_type" required>
                    <option value="" disabled selected>Pilih Paket</option>
                    @foreach ($packages as $package)
                        <option value="{{ $package->name }}">{{ $package->name }}</option>
                    @endforeach
                </select>
            </div>

            <div id="event_other_container" class="col-md-12" style="display: none;">
                <label for="other_event_name" class="form-label">Nama Event Lainnya</label>
                <input type="text" class="form-control" id="other_event_name" name="other_event_name"
                    placeholder="Masukkan nama event lainnya">
            </div>

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

            <div class="col-md-12">
                <label for="reservation_date" class="form-label">Tanggal Reservasi</label>
                <input type="text" class="form-control" id="reservation_date" name="reservation_date" required>
            </div>

            <div class="col-md-12">
                <label for="location" class="form-label">Lokasi Acara</label>
                <input type="text" id="location" name="location" class="form-control" required>
            </div>

            <div class="col-md-12">
                <label for="additional_info" class="form-label">Keterangan Tambahan</label>
                <textarea class="form-control" id="additional_info" name="additional_info" rows="3"></textarea>
            </div>

            <div class="col-md-12">
                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                    <option value="Cash">Cash</option>
                    {{-- <option value="Transfer">Transfer</option> --}}
                    <option value="Dompet Digital">Dompet Digital</option>
                </select>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn-booking">Booking</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reservedDates = @json($reservedDates);

            flatpickr("#reservation_date", {
                dateFormat: "Y-m-d",
                minDate: "today",
                disable: reservedDates
            });
        });
    </script>
@endsection
