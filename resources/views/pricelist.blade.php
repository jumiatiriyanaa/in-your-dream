@extends('layouts.user')

@section('title', 'Pricelist')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url('{{ asset('img/studio-background.png') }}');">
            <div class="container position-relative">
                <h1>Pricelist</h1>
                <p>Check our Pricelist here!</p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Pricelist</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Services Section -->
        <section id="services" class="services section">
            <div class="content">
                <div class="container">
                    <div class="row g-0">
                        <div class="col-lg-4 col-md-6">
                            <div class="service-item-card">
                                <span class="number"><span class="text-white">01</span></span>
                                <h3 class="text-center mb-4">Photobox / Self Photo</h3>
                                <div class="container text-center">
                                    <img src="{{ asset('img/photobox.png') }}" alt="" width="100">
                                </div>
                                <div class="service-item-card-content">
                                    <li>1 - 4 orang</li>
                                    <li>15 menit/sesi</li>
                                    <li>Starting from [60k]</li>
                                    <li>Penambahan Waktu 5 Menit/10k</li>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="{{ url('/selfphoto-photobox-package') }}"
                                        class="btn btn-success mb-2">Order</a>
                                    <div class="rating">
                                        <div class="stars" style="display: flex; justify-content: center; gap: 5px;">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <input type="radio" class="star-input" name="rating"
                                                    id="star{{ $i }}" value="{{ $i }}"
                                                    {{ $i == round($ratings['Photobox / Self Photo']) ? 'checked' : '' }}
                                                    disabled>
                                                <label for="star{{ $i }}" class="star-label"
                                                    style="font-size: 1.5rem; color: gold;">&#9733;</label>
                                            @endfor
                                        </div>
                                        <p>{{ number_format($ratings['Photobox / Self Photo'], 1) }} / 5.0</p>
                                        <button class="btn btn-primary mt-2" data-package-id="1"
                                            onclick="openRatingModal(this)">View Reviews</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-item-card">
                                <h3 class="text-center mb-4">Wedding Package</h3>
                                <span class="number"><span class="text-white">02</span></span>
                                <div class="container text-center">
                                    <img src="{{ asset('img/wedding.svg') }}" alt="" width="100">
                                </div>
                                <div class="service-item-card-content mt-3">
                                    <li>Akad</li>
                                    <li>Malam Berinai</li>
                                    <li>Malam Tepung Tawar</li>
                                    <li>Free Flashdisk</li>
                                    <li>Starting from [1.8jt]</li>
                                    <li>+ Album & Cetak 4r (80 lbr) Start [250k]</li>
                                </div>
                                <div class="rating mt-3 text-center">
                                    <a href="{{ url('/wedding-package') }}" class="btn btn-success mb-2">Order</a>
                                    <div class="stars" style="display: flex; justify-content: center; gap: 5px;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <input type="radio" class="star-input" name="rating"
                                                id="star{{ $i }}" value="{{ $i }}"
                                                {{ $i == round($ratings['Wedding Package']) ? 'checked' : '' }} disabled>
                                            <label for="star{{ $i }}" class="star-label"
                                                style="font-size: 1.5rem; color: gold;">&#9733;</label>
                                        @endfor
                                    </div>
                                    <p>{{ number_format($ratings['Wedding Package'], 1) }} / 5.0</p>
                                    <button class="btn btn-primary mt-2" data-package-id="2"
                                        onclick="openRatingModal(this)">View Reviews</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-item-card">
                                <span class="number"><span class="text-white">03</span></span>
                                <h3 class="text-center mb-4">Other Package</h3>
                                <div class="container text-center">
                                    <img src="{{ asset('img/other.png') }}" alt="" width="100">
                                </div>
                                <div class="service-item-card-content mt-3">
                                    <ul>
                                        <li>1 hari sesi</li>
                                        <li>Starting from [100k]</li>
                                        <li>
                                            Tersedia Paket:
                                            <ul>
                                                <li>Wisuda</li>
                                                <li>Ulang Tahun</li>
                                                <li>Prewedding</li>
                                                <li>Tunangan</li>
                                                <li>Akikah</li>
                                                <li>Dan event harian lainnya</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="rating mt-3 text-center">
                                    <a href="{{ url('/other-package') }}" class="btn btn-success mb-2">Order</a>
                                    <div class="stars" style="display: flex; justify-content: center; gap: 5px;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <input type="radio" class="star-input" name="rating"
                                                id="star{{ $i }}" value="{{ $i }}"
                                                {{ $i == round($ratings['Other Package']) ? 'checked' : '' }} disabled>
                                            <label for="star{{ $i }}" class="star-label"
                                                style="font-size: 1.5rem; color: gold;">&#9733;</label>
                                        @endfor
                                    </div>
                                    <p>{{ number_format($ratings['Other Package'], 1) }} / 5.0</p>
                                    <button class="btn btn-primary mt-2" data-package-id="3"
                                        onclick="openRatingModal(this)">View Reviews</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ratingModalLabel">User Reviews</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="ratingContent">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Services Section -->
    </main>

    <script>
        function openRatingModal(button) {
            const packageId = button.getAttribute('data-package-id');
            const modalContent = document.getElementById('ratingContent');

            modalContent.innerHTML = '<p>Loading reviews...</p>';

            fetch(`/package-ratings/${packageId}`)
                .then(response => response.json())
                .then(reviews => {
                    if (reviews.length > 0) {
                        modalContent.innerHTML = reviews.map(review => `
                            <div class="review-item">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="${review.reservation.user.avatar || '/default-avatar.png'}" alt="User Avatar" class="rounded-circle" width="40" height="40">
                                    <h6 class="ms-2">${review.reservation.user.name}</h6>
                                </div>
                                <p><strong>Rating:</strong> ${review.rating} / 5</p>
                                <p><strong>Review:</strong> ${review.review}</p>
                                <hr>
                            </div>
                        `).join('');
                    } else {
                        modalContent.innerHTML = '<p>No reviews available.</p>';
                    }
                })
                .catch(error => {
                    modalContent.innerHTML = '<p>Failed to load reviews.</p>';
                    console.error(error);
                });

            new bootstrap.Modal(document.getElementById('ratingModal')).show();
        }
    </script>
@endsection
