@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Add Detail Project</h4>
                <p class="card-description">
                    Add detail project here.
                </p>
                <form class="forms-sample" method="POST" action="/dashboard/admin/detail_projects">
                    @csrf
                    <div class="form-group">
                        <label for="project_id" class="col-sm-3">Nama Project</label>
                        <select name="project_id" class="form-control @error('project_id') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    {{ Request::old('project_id') == $project->id ? 'selected' : '' }}>
                                    {{ $project->project_name }}</option>
                            @endforeach
                            @error('project_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_id" class="col-sm-3">Nama Product</label>
                        <select name="product_id" class="form-control @error('product_id') is-invalid @enderror">
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
                    <div class="form-group">
                        <label for="estimasi_orang">Estimasi Orang</label>
                        <input type="number" class="form-control @error('estimasi_orang') is-invalid @enderror"
                            id="estimasi_orang" name="estimasi_orang" placeholder="Estimasi Orang"
                            value="{{ old('estimasi_orang') }}">
                        @error('estimasi_orang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="startdate">Tanggal Mulai</label>
                            <input type="date" class="form-control @error('startdate') is-invalid @enderror"
                                id="startdate" name="startdate" placeholder="Tanggal Mulai"
                                value="{{ old('start_date') }}">
                            @error('startdate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="enddate">Tanggal Selesai</label>
                            <input type="date" class="form-control @error('enddate') is-invalid @enderror" id="enddate"
                                name="enddate" placeholder="Tanggal Selesai" value="{{ old('enddate') }}">
                            @error('enddate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/detail_projects/store'"
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
