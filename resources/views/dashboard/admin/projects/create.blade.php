@extends('dashboard.layouts.main')

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
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table select-table">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Project Manager</th>
                                <th scope="col">Technology</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="product_id[]" id="mySelectionBoxProduct"
                                        class="form-control text-dark @error('product_id') is-invalid @enderror">
                                        <option value="" disabled selected data-name="{{ $products }}">Pilih
                                            Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ Request::old('product_id') == $product->id ? 'selected' : '' }}>
                                                {{ $product->product_name }}</option>
                                        @endforeach
                                        @error('project_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </td>
                                <td>
                                    <select name="user_id[]" id="mySelectionBoxPM"
                                        class="form-control text-dark @error('user_id') is-invalid @enderror">
                                        <option value="" disabled selected data-name="{{ $users }}">Pilih
                                            Project Manager</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ Request::old('user_id') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}</option>
                                        @endforeach
                                        @error('project_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </td>
                                <td><input type="text" name="technology[]" class="form-control"></td>
                                <td><input type="text" name="budget[]" class="form-control"></td>
                                <td><input type="date" name="startdate[]" class="form-control"></td>
                                <td><input type="date" name="enddate[]" class="form-control"></td>
                                <td> <button type="button" class="btn btn-sm btn-success" id="add_btn_project"><i
                                            class="ti-plus fw-bold"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
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
