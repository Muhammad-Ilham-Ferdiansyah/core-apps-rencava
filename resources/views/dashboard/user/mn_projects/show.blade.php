@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="row m-2">
            <div class="col-md-12 col-lg-12 grid-margin  stretch-card">
                <div class="card card-rounded">
                    <div class="card-body card-rounded">
                        <div class="mb-3">
                            <a href="/dashboard/user/mn_projects" class="fw-bold text-primary text-decoration-none">
                                <i class="ti-arrow-left btn-icon-prepend"></i> Back</a>
                        </div>
                        {{-- <h4 class="card-title lh-base">Detail Pekerjaan</h4> --}}
                        <div class="list align-items-center border-bottom">
                            <div class="wrapper w-100">
                                <p class="mb-2 fw-bold">
                                    Proyek
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-cube-outline me-1"></i>
                                        <p class="mb-0 text-small">
                                            {{ $monitoring_projects[0]->detail_project->project->project_name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 fw-bold">
                                    Pekerjaan
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-file-outline me-1"></i>
                                        <p class="mb-0 text-small">
                                            {{ $monitoring_projects[0]->detail_project->jobdesc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 fw-bold">
                                    Nama Karyawan
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-account me-1"></i>
                                        <p class="mb-0 text-small">
                                            {{ $monitoring_projects[0]->detail_project->user->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 fw-bold">
                                    Tanggal Mulai
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar me-1"></i>
                                        <p class="mb-0 text-small">
                                            {{ date('d M Y', strtotime($monitoring_projects[0]->detail_project->startdate)) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 fw-bold">
                                    Tanggal Selesai
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar me-1"></i>
                                        <p class="mb-0 text-small">
                                            {{ date('d M Y', strtotime($monitoring_projects[0]->detail_project->enddate)) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="table-responsive mt-1">
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Progress</th>
                                        <th>Persentase</th>
                                        <th>Target</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($monitoring_projects as $mn_project)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}</td>
                                            <td>
                                                {{ date('d M Y', strtotime($mn_project->date_progress)) }}
                                            </td>
                                            <td>
                                                {{ $mn_project->desc_progress }}
                                            </td>
                                            <td>
                                                {{ $mn_project->progress . '%' }}
                                            </td>
                                            <td>
                                                {{ date('d M Y', strtotime($mn_project->target)) }}
                                            </td>
                                            @if ($mn_project->progress < 100)
                                                <td>
                                                    <div class="badge badge-opacity-warning">On Going</div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="badge badge-opacity-success">Completed</div>
                                                </td>
                                            @endif
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
