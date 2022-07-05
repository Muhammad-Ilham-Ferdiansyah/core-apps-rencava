@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3" style="max-width: 640px;">
            <div class="card-body">
                <h4 class="card-title">Edit Profile</h4>
                <p class="card-description">
                    Edit your profile here.
                </p>
                <form action="/dashboard/profile/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="image" class="form-label">Profile Image</label>
                        <input type="hidden" name="oldImage" value="{{ $users[0]->image }}">
                        @if ($users[0]->image)
                            <img src="{{ asset('storage/' . $users[0]->image) }}"
                                class="img-preview img-fluid mb-3 col-sm-7 rounded d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-7 rounded">
                        @endif
                        <input type="file" class="form-control pb-4 @error('image') is-invalid @enderror" id="image"
                            name="image" onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <p class="text-sm text-danger">*Maximum size 1 MB</p>
                    </div>
                    <div class="form-group">
                        <label for="name">Fullname</label>
                        <input class="form-control p-4 @error('name') is-invalid @enderror" id="name" name="name"
                            type="text" value="{{ old('name', $users[0]->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control p-4 @error('username') is-invalid @enderror" id="username"
                            name="username" type="text" value="{{ old('username', $users[0]->username) }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input class="form-control p-4 @error('email') is-invalid @enderror" id="email" name="email"
                            type="email" value="{{ old('email', $users[0]->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='{{ url('dashboard/profile/edit') }}'"
                            class="text-decoration-none">
                            <button class="btn btn-primary"> Update
                                Profile</button>
                        </a>
                        <a href="/dashboard/profile" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        //preview profile image
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
