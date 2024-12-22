@extends('layouts.admin')

@section('title', 'Edit Data Gallery')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Edit Data Gallery
                                </h5>

                                <form action="{{ route('admin.galleries.update', $gallery->id) }}" class="row g-3"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <label for="package_id" class="col-sm-2 col-form-label">Paket</label>
                                        <div class="col-sm-10">
                                            <select name="package_id" id="package_id" class="form-control">
                                                <option value="" selected>Pilih Paket</option>
                                                @foreach ($packages as $package)
                                                    <option value="{{ $package->id }}"
                                                        {{ $package->id == $gallery->package_id ? 'selected' : '' }}>
                                                        {{ $package->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" id="image" class="form-control">
                                            <img src="{{ asset('storage/' . $gallery->image_path) }}" width="100"
                                                class="mt-3">
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
