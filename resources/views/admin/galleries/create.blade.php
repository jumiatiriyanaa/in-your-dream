@extends('layouts.admin')

@section('title', 'Tambah Data Gallery')

@section('content')
    <div class="pagetitle">
        <h1>Manajemen Gallery</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.galleries.index') }}">Manajemen Gallery</a>
                </li>
                <li class="breadcrumb-item active">Tambah Gallery</li>
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
                                    Tambah Data Gallery
                                </h5>

                                <form action="{{ route('admin.galleries.store') }}" class="row g-3" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label for="package_id" class="col-sm-2 col-form-label">Paket</label>
                                        <div class="col-sm-10">
                                            <select name="package_id" id="package_id" class="form-control">
                                                <option value="" selected>Pilih Paket</option>
                                                @foreach ($packages as $package)
                                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" id="image" class="form-control"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
