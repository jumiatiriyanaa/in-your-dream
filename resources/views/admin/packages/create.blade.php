@extends('layouts.admin')

@section('title', 'Tambah Data Package')

@section('content')
    <div class="pagetitle">
        <h1>Manajemen Package</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.packages.index') }}">Manajemen Package</a>
                </li>
                <li class="breadcrumb-item active">Tambah Package</li>
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
                                    Tambah Data Package
                                </h5>

                                <form action="{{ route('admin.packages.store') }}" class="row g-3" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label for="name" class="col-sm-2 col-form-label">Nama Paket</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Nama Paket" value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="price" class="col-sm-2 col-form-label">Harga</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="price" id="price" class="form-control"
                                                placeholder="Harga Paket" value="{{ old('price') }}" required>
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="desc" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea name="desc" id="desc" class="form-control" rows="4" placeholder="Deskripsi Paket" required>{{ old('desc') }}</textarea>
                                            @error('desc')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
