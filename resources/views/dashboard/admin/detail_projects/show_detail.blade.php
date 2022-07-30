@extends('dashboard.layouts.main')
@section('container')
    <div class="contain-wrapper">
        <div class="m-3">
            <button type="button" class="btn btn-sm btn-primary btn-icon-text"
                onclick="location.href='/dashboard/admin/detail_projects/{{ $detail_project_users->project_id }}'">
                <i class="ti-arrow-left btn-icon-prepend"></i>
                Back
            </button>
        </div>
        <hr class="m-4">
        <div class="card m-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Deskripsi Pekerjaan</th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_project_user as $dpu)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $dpu->jobdesc }}
                                    </td>
                                    <td>
                                        {{ date('d M Y', strtotime($dpu->startdate)) }}
                                    </td>
                                    <td>
                                        {{ date('d M Y', strtotime($dpu->enddate)) }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="location.href='/dashboard/admin/detail_projects/{{ $dpu->id }}/edit'"><i
                                                        class="mdi mdi-pencil me-2"></i>Update</a>
                                                <div class="dropdown-divider"></div>
                                                <button class="dropdown-item text-danger delete-detail-project"
                                                    data-id="{{ $dpu->id }}" data-name="{{ $dpu->jobdesc }}"
                                                    href="#" name="delete-detail-project"><i
                                                        class="mdi mdi-delete me-2"></i>
                                                    Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal -->
                </div>
            </div>
        </div>
    </div>
@endsection
