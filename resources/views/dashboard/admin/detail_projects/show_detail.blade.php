@extends('dashboard.layouts.main')
@section('container')
    <div class="contain-wrapper">
        <div class="m-3">
            <button type="button" class="btn btn-sm btn-primary btn-icon-text"
                onclick="location.href='/dashboard/admin/detail_projects/{{ $detail_project_user[0]->project_id }}'">
                <i class="ti-arrow-left btn-icon-prepend"></i>
                Back
            </button>
        </div>
        {{-- {{ dd($detail_project) }} --}}
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
                                        <button type="button" class="btn btn-success btn-icon-text p-2"
                                            onclick="location.href='/dashboard/admin/detail_projects/{{ $dpu->project_id }}'">
                                            <i class="ti-pencil-alt btn-icon-prepend"></i>
                                            Update
                                        </button>
                                        <button type="button" class="btn btn-danger btn-icon-text p-2"
                                            onclick="location.href='/dashboard/admin/detail_projects/{{ $dpu->project_id }}'">
                                            <i class="ti-trash btn-icon-prepend"></i>
                                            Delete
                                        </button>
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
