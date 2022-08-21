@extends('dashboard.layouts.main')
@section('title', 'Data Proyek')
@section('container')
    <div class="contain-wrapper">
        @if (auth()->user()->roles->first()->id == 3)
            <div class="row m-3">
                @foreach ($project_by_pm as $item)
                    <div class="col-md-4 col-lg-4 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <div class="card-body card-rounded">
                                <div class="list align-items-center border-bottom py-2">
                                    <div class="wrapper w-100">
                                        <p class="mb-2 fw-bold">
                                            Nama Proyek
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <i class="mdi mdi-cube-send me-1"></i>
                                                <p class="mb-0 text-small">
                                                    {{ $item->project_name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list align-items-center border-bottom py-2">
                                    <div class="wrapper w-100">
                                        <p class="mb-2 fw-bold">
                                            Nama Produk
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <i class="mdi mdi-cube-outline me-1"></i>
                                                <p class="mb-0 text-small">
                                                    {{ $item->product->product_name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list align-items-center border-bottom py-2">
                                    <div class="wrapper w-100">
                                        <p class="mb-2 fw-bold">
                                            Teknologi
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <i class="mdi mdi-file-outline me-1"></i>
                                                <p class="mb-0 text-small">
                                                    {{ $item->technology }}
                                                </p>
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
                                                    {{ date('d/m/Y', strtotime($item->startdate)) }}
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
                                                    {{ date('d/m/Y', strtotime($item->enddate)) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list align-items-center pt-3">
                                    <div class="wrapper w-100">
                                        <p class="mb-0">
                                            <a href="/dashboard/user/mn_projects/assessment/{{ $item->id }}"
                                                class="fw-bold text-primary">
                                                Show detail</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
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
                                                <?php $monitoring_project = DB::table('monitoring_projects')
                                                    ->where('detail_project_id', $dt_project->id)
                                                    ->first(); ?>
                                                @if (!$monitoring_project)
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-icon-text p-2"
                                                            onclick="location.href='/dashboard/user/mn_projects/{{ $dt_project->id }}'"
                                                            disabled>
                                                            <i class="ti-pencil-alt btn-icon-prepend"></i>
                                                            Belum Ada Progress
                                                        </button>
                                                    </td>
                                                @else
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-icon-text p-2"
                                                            onclick="location.href='/dashboard/user/mn_projects/{{ $dt_project->id }}'">
                                                            <i class="ti-eye btn-icon-prepend"></i>
                                                            Detail
                                                        </button>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
        @endif
        </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
