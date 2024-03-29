@extends('dashboard.layouts.main')
@section('title', 'Edit Data Klien')
@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Edit Client</h4>
                <p class="card-description">
                    Edit client here.
                </p>
                <form class="forms-sample" method="POST" action="/dashboard/admin/clients/{{ $clients->id }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="client_name">Client Name</label>
                        <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                            id="client_name" name="client_name" placeholder="Client Name"
                            value="{{ old('client_name', $clients->client_name) }}">
                        @error('client_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="client_image" class="form-label">Client Image</label>
                        <input type="hidden" name="oldImage" value="{{ $clients->client_image }}">
                        @if ($clients->client_image)
                            <img src="{{ asset('storage/' . $clients->client_image) }}"
                                class="img-preview d-block img-fluid mb-3 col-sm-5 rounded-xl">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5 rounded-xl">
                        @endif
                        <input type="file" class="form-control pb-4 @error('client_image') is-invalid @enderror"
                            id="client_image" name="client_image" onchange="previewImage()">
                        @error('client_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-floating">
                            <textarea class="form-control @error('address') is-invalid @enderror" placeholder="Client Address" id="address"
                                name="address" style="height: 100px" value="{{ old('address') }}">{{ $clients->address }}</textarea>
                            <label for="address">Client Address</label>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/clients/update'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Update
                            </button>
                        </a>
                        <a href="/dashboard/admin/clients" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        //preview image
        function previewImage() {
            const image = document.querySelector('#client_image');
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
