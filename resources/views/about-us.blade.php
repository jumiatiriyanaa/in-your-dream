@extends('layouts.user')

@section('title', 'About Us')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url('{{ asset('img/studio-background.png') }}');">
            <div class="container position-relative">
                <h1>About Us</h1>
                <p>
                    Home
                    /
                    About Us
                </p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- About Section -->
        <section id="about" class="about section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ !empty($aboutUs->image_path) ? asset('storage/' . $aboutUs->image_path) : asset('img/aboutus.png') }}"
                            alt="About Us Image" class="img-fluid img-overlap" data-aos="zoom-out" />
                    </div>
                    <div class="col-md-6" data-aos="zoom-out">
                        <h2>In Your Dream</h2>
                        <p class="text-dark">{{ $aboutUsData->description }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Meet Our Team Section -->
        <section id="team" class="team section">
            <div class="container">
                <h1 class="mb-5">Meet Our Team</h1>
                <div class="row justify-content-center">
                    @foreach ($teamMembers as $member)
                        <div class="col-md-3 col-sm-6 text-center">
                            <div class="team-member" data-aos="zoom-in">
                                <img src="{{ asset('img/photographer.png') }}" alt="Camera Icon" />
                                <h4 class="mt-3">{{ $member->name }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section">
            <div class="container text-center">
                <h2 class="text-white">Trusted by Over 1200+ Happy Customers</h2>
                <p>Rating for Exceptional Photography Services</p>
                <a href="/pricelist" class="btn btn-dark">Contact Us</a>
            </div>
        </section>
    </main>
@endsection
