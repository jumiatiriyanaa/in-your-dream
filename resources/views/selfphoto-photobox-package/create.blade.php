@extends('layouts.user')

@section('title', 'Reservasi Photobox - Self Photo Package')

@section('content')
    <div class="container mt-3 mb-5">
        <h1 class="text-center mb-4">Photobox - Self Photo Package</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (Auth::check() && empty(Auth::user()->phone_number))
            <div class="alert alert-warning">
                <strong>Perhatian!</strong> Silahkan lengkapi data profile Anda, terutama nomor telepon.
            </div>
        @endif

        <form action="{{ route('selfphoto-photobox-package.store') }}" method="POST" class="row g-4">
            @csrf
            <div class="col-md-12">
                <label for="package_type" class="form-label">Tipe Paket</label>
                <select class="form-select" id="package_type" name="package_type" required>
                    <option value="" disabled selected>Pilih Tipe Paket</option>
                    <option value="Photobox">Photobox</option>
                    <option value="Self Photo">Self Photo</option>
                </select>
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

            <div class="mt-4 row mb-3">
                <div class="col-md-6">
                    <label for="schedule_date" class="form-label">Tanggal Reservasi</label>
                    <input type="date" class="form-control" id="schedule_date" name="schedule_date" required>
                </div>

                <div class="col-md-6">
                    <label for="schedule_time" class="form-label">Waktu Reservasi</label>
                    <select class="form-select" id="schedule_time" name="schedule_time" required>
                        <option value="" disabled selected>Pilih Waktu Reservasi</option>
                    </select>
                </div>
            </div>

            <div class="row" id="background-list">
                @if ($backgrounds->isNotEmpty())
                    @foreach ($backgrounds as $background)
                        <div class="col-md-3" data-type="{{ $background->type }}">
                            <input type="radio" class="btn-check" name="background_choice"
                                id="background{{ $background->id }}" value="{{ $background->name }}" required>
                            <label class="btn btn-outline-secondary w-100 border-0" for="background{{ $background->id }}">
                                <img src="{{ $background->image_path ? asset('storage/' . $background->image_path) : 'https://via.placeholder.com/300' }}"
                                    style="width: 300px; height: 300px; object-fit: cover;" class="img-fluid rounded mb-2"
                                    alt="{{ $background->name }}">
                                <b class="mt-5">{{ $background->name }}</b> <br>
                                <span>{{ $background->description }}</span>
                            </label>
                        </div>
                    @endforeach
                @else
                    <p>No backgrounds available.</p>
                @endif
            </div>

            <div class="col-md-12">
                <label for="number_of_friends" class="form-label">Estimasi Membawa Teman</label>
                <input type="number" class="form-control" id="number_of_friends" name="number_of_friends" min="1"
                    required>
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
            const packageTypeDropdown = document.getElementById('package_type');
            const backgroundList = document.getElementById('background-list');
            const backgrounds = backgroundList.querySelectorAll('[data-type]');

            packageTypeDropdown.addEventListener('change', function() {
                const selectedType = this.value;

                backgrounds.forEach(background => {
                    if (background.getAttribute('data-type') === selectedType) {
                        background.style.display = 'block';
                    } else {
                        background.style.display = 'none';
                    }
                });
            });

            const initialType = packageTypeDropdown.value;
            if (initialType) {
                backgrounds.forEach(background => {
                    if (background.getAttribute('data-type') === initialType) {
                        background.style.display = 'block';
                    } else {
                        background.style.display = 'none';
                    }
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const scheduleDate = document.getElementById('schedule_date');
            const scheduleTime = document.getElementById('schedule_time');

            function generateTimeOptions(disabledTimes = []) {
                scheduleTime.innerHTML = '<option value="" disabled selected>Pilih Waktu Reservasi</option>';

                const startHour = 10;
                const endHour = 22;
                const intervalMinutes = 15;

                for (let hour = startHour; hour < endHour; hour++) {
                    for (let minute = 0; minute < 60; minute += intervalMinutes) {
                        const timeString =
                            `${String(hour).padStart(2, '0')}:${String(minute).padStart(2, '0')}`;
                        const option = document.createElement('option');
                        option.value = timeString;
                        option.textContent = timeString;

                        if (disabledTimes.includes(timeString)) {
                            option.disabled = true;
                        }

                        scheduleTime.appendChild(option);
                    }
                }
            }

            function fetchDisabledTimes(date) {
                if (!date) return;

                fetch(`/check-reservation?date=${date}`)
                    .then(response => response.json())
                    .then(data => generateTimeOptions(data.disabledTimes));
            }

            scheduleDate.addEventListener('change', function() {
                if (scheduleDate.value) {
                    fetchDisabledTimes(scheduleDate.value);
                } else {
                    generateTimeOptions();
                }
            });

            generateTimeOptions();
        });
    </script>
@endsection
