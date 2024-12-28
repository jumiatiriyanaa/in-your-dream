@extends('layouts.user')

@section('title', 'Gallery')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url('{{ asset('assets/img/studio-background.png') }}');">
            <div class="container position-relative">
                <h1>Gallery</h1>
                <p>
                    Home
                    /
                    Gallery
                </p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Services Section -->
        <section class="gallery-section">
            <div class="container">
                <!-- Filter Buttons -->
                <div class="filter-buttons text-center mb-4">
                    <button class="btn btn-filter active" data-filter="all">All</button>
                    @foreach ($galleries->pluck('package.name')->unique() as $category)
                        <button class="btn btn-filter" data-filter="{{ strtolower(str_replace(' ', '-', $category)) }}">
                            {{ $category }}
                        </button>
                    @endforeach
                </div>

                <!-- Gallery Grid -->
                <div class="row gallery-grid">
                    @foreach ($galleries as $gallery)
                        <div
                            class="col-lg-3 col-md-4 col-sm-6 gallery-item {{ strtolower(str_replace(' ', '-', $gallery->package->name)) }}">
                            <div class="gallery-card">
                                <img src="{{ asset('storage/' . $gallery->image_path) }}" class="img-fluid gallery-image"
                                    alt="Gallery Image">
                                {{-- <div class="gallery-info">
                                    <h5 class="gallery-title">{{ $gallery->package->name }}</h5>
                                    <p class="gallery-date">{{ $gallery->created_at->format('d M Y') }}</p>
                                </div> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- /Services Section -->
    </main>
@endsection
