@extends('layouts.admin')

@section('title', 'Manajemen Reservation')

@section('content')
    <div class="pagetitle">
        <h1>Manajemen Reservation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Manajemen Reservation</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Manajemen Reservation
                                </h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Nomor HP</th>
                                            <th>Tanggal Reservasi</th>
                                            <th>Jenis Paket</th>
                                            <th>Total Harga</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($reservations as $reservation)
                                            <tr>
                                                <td>{{ $loop->iteration }}.</td>
                                                <td>{{ $reservation->user->name }}</td>
                                                <td>{{ $reservation->user->phone_number }}</td>
                                                <td>{{ $reservation->reservation_date }}</td>
                                                <td>{{ $reservation->package_type }}</td>
                                                <td>Rp. {{ number_format($reservation->total_price, 0, ',', '.') }}</td>
                                                <td>
                                                    @if ($reservation->status == 'Confirmed')
                                                        <span class="badge bg-info">{{ $reservation->status }}</span>
                                                    @elseif($reservation->status == 'Reserved')
                                                        <span class="badge bg-success">{{ $reservation->status }}</span>
                                                    @elseif($reservation->status == 'Cancelled')
                                                        <span class="badge bg-danger">{{ $reservation->status }}</span>
                                                    @else
                                                        <span class="badge bg-secondary">{{ $reservation->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($reservation->status == 'Confirmed')
                                                        <form
                                                            action="{{ route('admin.reservations.update', $reservation->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="Reserved">
                                                            <button type="submit"
                                                                class="badge bg-success border-0">Terima</button>
                                                        </form>

                                                        <form
                                                            action="{{ route('admin.reservations.update', $reservation->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="Cancelled">
                                                            <button type="submit"
                                                                class="badge bg-danger border-0">Tolak</button>
                                                        </form>
                                                    @endif

                                                    <!-- Badge Bukti Pembayaran -->
                                                    @if ($reservation->payment_proof)
                                                        <button type="button" class="badge bg-warning text-dark border-0"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#paymentProofModal{{ $reservation->id }}">
                                                            Bukti Pembayaran
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>

                                            <!-- Modal Bukti Pembayaran -->
                                            <div class="modal fade" id="paymentProofModal{{ $reservation->id }}"
                                                tabindex="-1" aria-labelledby="paymentProofModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="paymentProofModalLabel">
                                                                Bukti Pembayaran untuk {{ $reservation->user->name }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if (filter_var($reservation->payment_proof, FILTER_VALIDATE_URL))
                                                                <img src="{{ $reservation->payment_proof }}"
                                                                    class="img-fluid" alt="Bukti Pembayaran">
                                                            @else
                                                                <p><a href="{{ asset('storage/' . $reservation->payment_proof) }}"
                                                                        target="_blank">Lihat Bukti Pembayaran</a></p>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Tidak ada data reservasi.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
