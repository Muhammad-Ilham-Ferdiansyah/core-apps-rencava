@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Add Detail Project</h4>
                <form class="forms-sample" method="POST" action="/dashboard/user/mn_projects">
                    @csrf
                    <div class="form-group">
                        <label for="detail_project_id" class="col-sm-3">Nama Proyek</label>
                        <select name="detail_project_id"
                            class="form-control text-dark @error('detail_project_id') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Project</option>
                            @foreach ($detail_projects as $dt_project)
                                <option value="{{ $dt_project->id }}"
                                    {{ Request::old('detail_project_id') == $dt_project->id ? 'selected' : '' }}>
                                    {{ $dt_project->project->project_name . ' - ' . $dt_project->jobdesc }}</option>
                            @endforeach
                            @error('detail_project_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_progress">Tanggal</label>
                        <input type="date" class="form-control @error('date_progress') is-invalid @enderror"
                            id="date_progress" name="date_progress" placeholder="Tanggal"
                            value="{{ old('date_progress') }}">
                        @error('date_progress')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="progress">Progress</label>
                        <input type="text" class="form-control @error('progress') is-invalid @enderror" id="progress"
                            name="progress" placeholder="Progress" value="{{ old('progress') }}">
                        @error('progress')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/user/mn_projects/store'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Add
                            </button>
                        </a>
                        <a href="/dashboard/user/mn_projects/" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
