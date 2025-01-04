@extends('layouts.admin')

@section('title', 'Edit Data About Us')

@section('content')
    <div class="pagetitle">
        <h1>Manajemen About Us</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.about-us.index') }}">Manajemen About Us</a>
                </li>
                <li class="breadcrumb-item active">Edit About Us</li>
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
                                    Edit Data About Us
                                </h5>

                                <form action="{{ route('admin.about-us.update', $aboutUs->id) }}" class="row g-3"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" id="description" class="form-control" rows="5" required>{{ $aboutUs->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" id="image" class="form-control">
                                            @if ($aboutUs->image_path)
                                                <img src="{{ asset('storage/' . $aboutUs->image_path) }}"
                                                    class="img-fluid mt-3" width="200">
                                            @endif
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
