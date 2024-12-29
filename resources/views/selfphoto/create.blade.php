@extends('layouts.user')

@section('title', 'Reservasi Photobox - Self Photo')

@section('content')
    <div class="container mt-3 mb-5">
        <h1 class="text-center mb-4">Photobox - Self Photo</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('selfphoto.store') }}" method="POST" class="row g-4">
            @csrf
            <div class="col-md-12">
                <label for="user_name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="user_name" name="user_name"
                    value="{{ Auth::check() ? Auth::user()->name : '' }}" required disabled>
            </div>

            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ Auth::check() ? Auth::user()->email : '' }}" required disabled>
            </div>

            <div class="col-md-12">
                <label for="phone_number" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                    value="{{ Auth::check() ? Auth::user()->phone_number : '' }}" required disabled>
            </div>

            <div class="mt-4 row mb-3">
                <div class="col-md-6">
                    <label for="schedule_date" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="schedule_date" name="schedule_date" required>
                </div>

                <div class="col-md-6">
                    <label for="schedule_time" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="schedule_time" name="schedule_time" required>
                </div>
            </div>

            <div class="col-md-12">
                <label for="background_choice" class="form-label">Pilih Background</label>
                <div class="row">
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background1"
                            value="Green Photobox" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background1">
                            <img src="{{ asset('img/green.png') }}" style="width: 300px; height: 300px; object-fit: cover;"
                                class="img-fluid rounded mb-2" alt="Green Photobox">
                            <b class="mt-5">Green Photobox</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background2"
                            value="Red Photobox" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background2">
                            <img src="{{ asset('img/red.png') }}" style="width: 300px; height: 300px; object-fit: cover;"
                                class="img-fluid rounded mb-2" alt="Red Photobox">
                            <b class="mt-5">Red Photobox</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background3" value="Abstract 1"
                            required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background3">
                            <img src="{{ asset('img/abstract1.jpg') }}"
                                style="width: 300px; height: 300px; object-fit: cover;" class="img-fluid rounded mb-2"
                                alt="Abstract 1">
                            <b class="mt-5">Abstract 1</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background4" value="Abstract 2"
                            required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background4">
                            <img src="{{ asset('img/abstract2.jpg') }}"
                                style="width: 300px; height: 300px; object-fit: cover;" class="img-fluid rounded mb-2"
                                alt="Abstract 2">
                            <b class="mt-5">Abstract 2</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    {{-- <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background5"
                            value="Putih Photobox" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background5">
                            <img src="{{ asset('img/putih.png') }}" class="img-fluid rounded mb-2"
                                alt="Putih Photobox">
                            <b class="mt-5">Putih Photobox</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background6"
                            value="Beige Photobox" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background6">
                            <img src="{{ asset('img/beige.png') }}" class="img-fluid rounded mb-2"
                                alt="Beige Photobox">
                            <b class="mt-5">Beige Photobox</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background7"
                            value="Hitam Photobox" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background7">
                            <img src="{{ asset('img/red.png') }}" class="img-fluid rounded mb-2"
                                alt="Hitam Photobox">
                            <b class="mt-5">Hitam Photobox</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" class="btn-check" name="background_choice" id="background8"
                            value="Kuning Photobox" required>
                        <label class="btn btn-outline-secondary w-100 border-0" for="background8">
                            <img src="{{ asset('img/red.png') }}" class="img-fluid rounded mb-2"
                                alt="Kuning Photobox">
                            <b class="mt-5">Kuning Photobox</b> <br>
                            <span>Background Gratis</span>
                        </label>
                    </div> --}}
                </div>
            </div>

            <div class="col-md-12">
                <label for="number_of_friends" class="form-label">Estimasi Membawa Teman</label>
                <input type="number" class="form-control" id="number_of_friends" name="number_of_friends"
                    min="1" required>
            </div>

            <div class="col-md-12">
                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
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
