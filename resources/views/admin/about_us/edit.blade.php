@extends('layouts.admin')

@section('title', 'Edit Data About Us')

@section('content')
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
                                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" id="description" class="form-control" rows="5" required>{{ $aboutUs->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" id="image" class="form-control">
                                            @if ($aboutUs->image_path)
                                                <img src="{{ asset('storage/' . $aboutUs->image_path) }}"
                                                    alt="Current Image" class="img-fluid mt-2" width="200">
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
