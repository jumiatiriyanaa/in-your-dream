@extends('layouts.admin')

@section('title', 'Edit Data Background')

@section('content')
    <div class="pagetitle">
        <h1>Manajemen Background</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.backgrounds.index') }}">Manajemen Background</a>
                </li>
                <li class="breadcrumb-item active">Edit Background</li>
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
                                    Edit Data Background
                                </h5>

                                <form action="{{ route('admin.backgrounds.update', $background->id) }}" class="row g-3"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="col-12">
                                        <label for="name" class="col-form-label">Nama Background</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Nama Background" value="{{ old('name', $background->name) }}"
                                                required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="description" class="col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Deskripsi Background">{{ old('description', $background->description) }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="is_free" class="col-form-label">Gratis?</label>
                                        <div class="col-sm-10">
                                            <select name="is_free" id="is_free" class="form-select" required>
                                                <option value="1"
                                                    {{ old('is_free', $background->is_free) == 1 ? 'selected' : '' }}>Ya
                                                </option>
                                                <option value="0"
                                                    {{ old('is_free', $background->is_free) == 0 ? 'selected' : '' }}>Tidak
                                                </option>
                                            </select>
                                            @error('is_free')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="image" class="col-form-label">Gambar</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" id="image" class="form-control">
                                            @error('image')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                            <img src="{{ asset('storage/' . $background->image_path) }}"
                                                class="img-fluid mt-3" width="200">
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
