@extends('dashboard.layouts.main')
@section('title', 'Edit Detail Proyek')
@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">{{ $detail_project->jobdesc }}</h4>
                <p class="card-description">
                    Edit detail project here.
                </p>
                <form class="forms-sample" method="POST" action="/dashboard/admin/detail_projects/{{ $detail_project->id }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="user_id" class="col-sm-3">Nama Employee</label>
                        <select name="user_id" class="form-control text-dark @error('user_id') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Employee</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ $detail_project->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}</option>
                            @endforeach
                            @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jobdesc">Deskripsi Pekerjaan</label>
                        <input type="text" class="form-control @error('jobdesc') is-invalid @enderror" id="jobdesc"
                            name="jobdesc" placeholder="Deskripsi Pekerjaan"
                            value="{{ old('jobdesc', $detail_project->jobdesc) }}">
                        @error('jobdesc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="estimasi_orang">Estimasi Orang</label>
                        <input type="number" class="form-control @error('estimasi_orang') is-invalid @enderror"
                            id="estimasi_orang" name="estimasi_orang" placeholder="Estimasi Orang"
                            value="{{ old('estimasi_orang', $detail_project->estimasi_orang) }}">
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
                                value="{{ old('startdate', $detail_project->startdate) }}">
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
                                name="enddate" placeholder="Tanggal Selesai"
                                value="{{ old('enddate', $detail_project->enddate) }}">
                            @error('enddate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/detail_projects/update'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Update
                            </button>
                        </a>
                        <a href="/dashboard/admin/detail_projects/show_detail/{{ $detail_project->user_id }}"
                            class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
