@extends('dashboard.layouts.main')
@section('container')
    <div class="contain-wrapper">
        <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/user/mn_projects/create" class="btn btn-primary text-white me-0"><i
                        class="mdi mdi-plus me-2"></i>Add Progress</a>
            </div>
        </div>
        <div class="row flex-grow m-2">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title">Job Requests</h4>
                                <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p>
                            </div>
                        </div>
                        <div class="table-responsive mt-1">
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Proyek</th>
                                        <th>Deskripsi Pekerjaan</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail_projects as $dt_project)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}</td>
                                            <td>
                                                {{ $dt_project->project->project_name }}
                                            </td>
                                            <td>
                                                {{ $dt_project->jobdesc }}
                                            </td>
                                            <td>
                                                {{ date('d M Y', strtotime($dt_project->startdate)) }}
                                            </td>
                                            <td>
                                                {{ date('d M Y', strtotime($dt_project->enddate)) }}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-icon-text p-2"
                                                    onclick="location.href='/dashboard/user/mn_projects/{{ $dt_project->id }}'">
                                                    <i class="ti-eye btn-icon-prepend"></i>
                                                    Detail
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
