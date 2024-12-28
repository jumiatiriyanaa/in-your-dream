@extends('layouts.user')

@section('title', 'From Candid Smiles to Perfect Poses, We Frame Your Unique Story')

@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-item active">
                    <img src="{{ asset('img/studio-background.png') }}" alt="" />
                    <div class="carousel-container">
                        <h2>
                            In <br> Your <br> Dream
                        </h2>
                        <p>
                            From Candid Smiles to Perfect Poses, We Frame Your Unique Story
                        </p>
                    </div>
                </div>
                <!-- End Carousel Item -->
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            @if (!empty($aboutUs) && $aboutUs->image_path)
                                <img src="{{ asset($aboutUs->image_path) }}" alt="About Us Image"
                                    class="img-fluid img-overlap" data-aos="zoom-out" />
                            @else
                                <img src="{{ asset('img/aboutus.png') }}" alt="Image" class="img-fluid img-overlap"
                                    data-aos="zoom-out" />
                            @endif
                        </div>
                        <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                            <h2 class="content-title mb-4">
                                About
                                <strong>Us</strong>
                            </h2>
                            <p class="opacity-50">
                                {{ $aboutUs->description ?? 'In Your Dream adalah studio foto profesional yang berlokasi di kota Bengkalis, tempat di mana momen-momen istimewa Anda diabadikan dengan sepenuh hati. IYD Studio menawarkan layanan fotografi untuk berbagai keperluan, mulai dari pemotretan pernikahan, potret pribadi dan keluarga, hingga acara-acara spesial lainnya.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /About Section -->

        <!-- Services 2 Section -->
        <section id="services-2" class="services-2 section dark-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <p class="text-center">Our Gallery</p>
            </div>
            <!-- End Section Title -->

            <div class="services-carousel-wrap">
                <div class="container">
                    <div class="swiper init-swiper">
                        <script
                                type="application/json"
                                class="swiper-config"
                            >
                                {
                                    "loop": true,
                                    "speed": 600,
                                    "autoplay": {
                                        "delay": 5000
                                    },
                                    "slidesPerView": "auto",
                                    "pagination": {
                                        "el": ".swiper-pagination",
                                        "type": "bullets",
                                        "clickable": true
                                    },
                                    "navigation": {
                                        "nextEl": ".js-custom-next",
                                        "prevEl": ".js-custom-prev"
                                    },
                                    "breakpoints": {
                                        "320": {
                                            "slidesPerView": 1,
                                            "spaceBetween": 40
                                        },
                                        "1200": {
                                            "slidesPerView": 3,
                                            "spaceBetween": 40
                                        }
                                    }
                                }
                            </script>
                        <button class="navigation-prev js-custom-prev">
                            <i class="bi bi-arrow-left-short"></i>
                        </button>
                        <button class="navigation-next js-custom-next">
                            <i class="bi bi-arrow-right-short"></i>
                        </button>
                        <div class="swiper-wrapper">
                            @foreach ($sliderImages as $image)
                                <div class="swiper-slide">
                                    <div class="service-item">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}"
                                            class="img-fluid" style="width: auto; height: 500px;" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Services 2 Section -->
    </main>
@endsection
