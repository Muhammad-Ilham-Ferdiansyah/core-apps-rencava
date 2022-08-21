@extends('dashboard.layouts.main')
@section('title', 'Tambah Proyek')
@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Add Project</h4>
                <p class="card-description">
                    Add project here.
                </p>
                <form class="forms-sample" method="POST" action="/dashboard/admin/projects">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="project_name" class="col-sm-3 mt-1">Nama Proyek</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('project_name') is-invalid @enderror"
                                        id="project_name" name="project_name" placeholder="Nama Proyek"
                                        value="{{ old('project_name') }}">
                                    @error('project_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="client_id" class="col-sm-3">Nama Klien</label>
                                <div class="col-sm-9">
                                    <select name="client_id"
                                        class="form-control text-dark @error('client_id') is-invalid @enderror">
                                        <option value="" selected disabled>Pilih Klien</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}"
                                                {{ Request::old('client_id') == $client->id ? 'selected' : '' }}>
                                                {{ $client->client_name }}</option>
                                        @endforeach
                                        @error('client_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="product_id" class="col-sm-3">Nama Produk</label>
                                <div class="col-sm-9">
                                    <select name="product_id"
                                        class="form-control text-dark @error('product_id') is-invalid @enderror">
                                        <option value="" disabled selected>Pilih Produk</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ Request::old('product_id') == $product->id ? 'selected' : '' }}>
                                                {{ $product->product_name }}</option>
                                        @endforeach
                                        @error('product_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="user_id" class="col-sm-3">Manajer Proyek</label>
                                <div class="col-sm-9">
                                    <select name="user_id"
                                        class="form-control text-dark @error('user_id') is-invalid @enderror">
                                        <option value="" disabled selected>Pilih Manajer Proyek</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ Request::old('user_id') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}</option>
                                        @endforeach
                                        @error('user_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="technology" class="col-sm-3 mt-1">Teknologi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('technology') is-invalid @enderror"
                                        id="technology" name="technology" placeholder="Nama Teknologi"
                                        value="{{ old('technology') }}">
                                    @error('technology')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="budget" class="col-sm-3 mt-1">Budget</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('budget') is-invalid @enderror"
                                        id="budget" name="budget" placeholder="Budget Project"
                                        value="{{ old('budget') }}">
                                    @error('budget')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="startdate" class="col-sm-3 mt-1">Tanggal Mulai</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('startdate') is-invalid @enderror"
                                        id="startdate" name="startdate" placeholder="Tanggal Dimulai"
                                        value="{{ old('startdate') }}">
                                    @error('startdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="enddate" class="col-sm-3 mt-1">Tanggal Selesai</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('enddate') is-invalid @enderror"
                                        id="enddate" name="enddate" placeholder="Tanggal Selesai"
                                        value="{{ old('enddate') }}">
                                    @error('enddate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/projects/store'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Add
                            </button>
                        </a>
                        <a href="/dashboard/admin/projects" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
