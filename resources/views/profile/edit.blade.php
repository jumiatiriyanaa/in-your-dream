@extends('layouts.user')

@section('title', 'Edit Profile')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url('{{ asset('img/studio-background.png') }}');">
            <div class="container position-relative">
                <h1>Edit Profile</h1>
                <p>
                    Home
                    /
                    Profile
                    /
                    Edit
                </p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('profile.index') }}">Profile</a></li>
                        <li class="current">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Edit Profile Section -->
        <section id="edit-profile" class="profile section">
            <div class="container">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Avatar Column -->
                        <div class="col-md-4 text-center">
                            @php
                                $avatar =
                                    $user->login_type == 'google' && $user->avatar
                                        ? $user->avatar
                                        : ($user->avatar
                                            ? asset('storage/' . $user->avatar)
                                            : 'https://via.placeholder.com/300');
                            @endphp
                            <img src="{{ $avatar }}" alt="Avatar" class="img-fluid rounded-circle"
                                style="width: 278px; height: 278px; object-fit: cover;">
                            <h4>{{ $user->name }}</h4>
                            <!-- Avatar Upload -->
                            @if ($user->login_type != 'google')
                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Update Avatar</label>
                                    <input type="file" class="form-control" id="avatar" name="avatar">
                                </div>
                            @endif
                        </div>

                        <!-- User Data Column (Right) -->
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}" @if ($user->login_type == 'google') disabled @endif>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" @if ($user->login_type == 'google') disabled @endif>
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ $user->phone_number }}">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control" id="address" name="address">{{ old('address', $user->address) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-dark">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- /Edit Profile Section -->
    </main>
@endsection
