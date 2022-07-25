@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Add Detail Project</h4>
                <form class="forms-sample" method="POST" action="/dashboard/admin/detail_projects">
                    @csrf
                    <div class="form-group">
                        <label for="detail_project_id" class="col-sm-3">Nama Pekerjaan</label>
                        <select name="detail_project_id"
                            class="form-control text-dark fw-bold @error('detail_project_id') is-invalid @enderror">
                            <option value="{{ $detail_projects[0]->project_id }}" disabled selected>
                                {{ $detail_projects[0]->jobdesc }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_assessment">Tanggal</label>
                        <input type="date" class="form-control @error('date_assessment') is-invalid @enderror"
                            id="date_assessment" name="date_assessment" placeholder="Tanggal"
                            value="{{ old('date_assessment') }}">
                        @error('date_assessment')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="target">Target Tanggal</label>
                        <input type="date" class="form-control @error('target') is-invalid @enderror" id="target"
                            name="target" placeholder="Target" value="{{ old('target') }}">
                        @error('target')
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
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/detail_projects/store'"
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
