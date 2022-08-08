@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Tambah Bobot</h4>
                <p class="card-description">
                    Tambah Bobot referensi
                </p>
                <form class="forms-sample" method="POST" action="/dashboard/admin/setup_reference">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="reference_name" class="col-sm-3 mt-1">Nama Bobot</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('reference_name') is-invalid @enderror"
                                        id="reference_name" name="reference_name" placeholder="Nama Bobot"
                                        value="{{ old('reference_name') }}">
                                    @error('reference_name')
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
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="bobot" class="col-sm-3">Bobot</label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label" for="bobot1">
                                                    <input type="radio" class="form-check-input" name="bobot"
                                                        id="bobot1" value="1">
                                                    1 - Tidak Penting
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="bobot2">
                                                    <input type="radio" class="form-check-input" name="bobot"
                                                        id="bobot2" value="2">
                                                    2 - Kurang Penting
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="bobot3">
                                                    <input type="radio" class="form-check-input" name="bobot"
                                                        id="bobot3" value="3">
                                                    3 - Cukup Penting
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="bobot4">
                                                    <input type="radio" class="form-check-input" name="bobot"
                                                        id="bobot4" value="4">
                                                    4 - Penting
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="bobot5">
                                                    <input type="radio" class="form-check-input" name="bobot"
                                                        id="bobot5" value="5">
                                                    5 - Sangat Penting
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="mt-3">
                <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/setup_reference/store'"
                    class="text-decoration-none">
                    <button class="btn btn-primary">Add
                    </button>
                </a>
                <a href="/dashboard/admin/setup_reference" class="btn btn-outline-dark">Cancel</a>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
