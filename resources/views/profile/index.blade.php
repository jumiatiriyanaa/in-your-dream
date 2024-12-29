@extends('layouts.user')

@section('title', 'My Profile')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url('{{ asset('img/studio-background.png') }}');">
            <div class="container position-relative">
                <h1>Profile</h1>
                <p>
                    Home
                    /
                    Profile
                </p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Profile Section -->
        <section id="profile" class="profile section">
            <div class="container">
                <div class="row">
                    <!-- Avatar Column (Left) -->
                    <div class="col-md-4 text-center">
                        @if ($user->login_type == 'google' && $user->avatar)
                            <img src="{{ $user->avatar }}" alt="Avatar" class="img-fluid rounded-circle" width="150">
                        @else
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar"
                                class="img-fluid rounded-circle" width="150">
                        @endif
                        <h4 class="mb-3">{{ $user->name }}</h4>
                        <a href="{{ route('profile.edit') }}" class="btn btn-dark">Update Profile</a>
                    </div>

                    <!-- User Data Column (Right) -->
                    <div class="col-md-8">
                        <h4>Nama</h4>
                        <p>{{ $user->name }}</p>

                        <h4>Email</h4>
                        <p>{{ $user->email }}</p>

                        <h4>Nomor Telepon</h4>
                        <p>{{ $user->phone_number ?? 'Tidak ada nomor telepon' }}</p>

                        <h4>Alamat</h4>
                        <p>{{ $user->address ?? 'Tidak ada alamat' }}</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Profile Section -->
    </main>
@endsection
