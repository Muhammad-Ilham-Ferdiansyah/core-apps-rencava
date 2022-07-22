@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Add Detail Project</h4>
                <form class="forms-sample" method="POST" action="/dashboard/admin/detail_projects">
                    @csrf
                    <div class="form-group">
                        <label for="project_id" class="col-sm-3">Nama Project</label>
                        <select name="project_id" class="form-control text-dark @error('project_id') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    {{ Request::old('project_id') == $project->id ? 'selected' : '' }}>
                                    {{ $project->project_name . ' - ' . $project->product->product_name }}</option>
                            @endforeach
                            @error('project_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </select>
                    </div>
                    <p class="card-description">
                        Add detail project here.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Modul</th>
                                    <th scope="col">Person In Charge</th>
                                    <th scope="col">Deskripsi Pekerjaan</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Selesai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="module_name[]" class="form-control"></td>
                                    <td>
                                        <select name="user_id[]" id="mySelectionBox"
                                            class="form-control text-dark @error('user_id') is-invalid @enderror">
                                            <option value="" disabled selected data-name="{{ $users }}">Pilih
                                                PIC</option>
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
                                    <td><input type="text" name="jobdesc[]" class="form-control"></td>
                                    <td><input type="date" name="startdate[]" class="form-control"></td>
                                    <td><input type="date" name="enddate[]" class="form-control"></td>
                                    <td> <button type="button" class="btn btn-sm btn-success" id="add_btn"><i
                                                class="ti-plus fw-bold"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/detail_projects/store'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Add
                            </button>
                        </a>
                        <a href="/dashboard/admin/detail_projects" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
