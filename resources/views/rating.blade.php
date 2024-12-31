@extends('layouts.user')

@section('title', 'Rating Package')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url('{{ asset('img/studio-background.png') }}');">
            <div class="container position-relative">
                <h1>Rate Your Reservation</h1>
                <p>
                    Home /
                    Rate Reservation
                </p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Rate Reservation</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Rating Section -->
        <section id="rating" class="rating section">
            <div class="container">
                <h2 class="section-title">Rate Your Reservation</h2>

                <form action="{{ route('ratings.store', $reservation->id) }}" method="POST" class="row g-4">
                    @csrf
                    <div class="col-md-12">
                        <label for="rating" class="form-label">Rating (1 to 5)</label>
                        <div class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <input type="radio" class="star-input" name="rating" id="star{{ $i }}"
                                    value="{{ $i }}" required>
                                <label for="star{{ $i }}" class="star-label">&#9733;</label>
                            @endfor
                        </div>
                        @error('rating')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="review" class="form-label">Ulasan</label>
                        <textarea name="review" id="review" class="form-control" rows="4" maxlength="1000">{{ old('review') }}</textarea>
                        @error('review')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-dark">Submit Rating</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /Rating Section -->
    </main>
@endsection
