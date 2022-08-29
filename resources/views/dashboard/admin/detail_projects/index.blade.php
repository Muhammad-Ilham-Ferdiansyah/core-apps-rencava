@extends('dashboard.layouts.main')
@section('title', 'Data Detail Proyek')
@section('container')
    <div class="contain-wrapper">
        {{-- <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/admin/detail_projects/create" class="btn btn-primary text-white me-0"><i
                        class="mdi mdi-plus me-2"></i>Add Detail Project</a>
            </div>
        </div> --}}
        {{-- {{ dd($detail_project) }} --}}
        {{-- <hr class="m-4"> --}}
        {{-- <div class="card m-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Proyek</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_project as $dp)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $dp->project->project_name }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-icon-text p-2"
                                            onclick="location.href='/dashboard/admin/detail_projects/{{ $dp->project_id }}'">
                                            <i class="ti-eye btn-icon-prepend"></i>
                                            Show Details
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal -->
                </div>
            </div>
        </div> --}}
        <div class="form-group row mt-3 ms-2 me-2">
            {{-- {{ dd($project[0]) }} --}}
            @foreach ($project as $pro)
                <div class="col-md-4 col-lg-4 stretch-card mt-3">
                    <div class="card card-rounded">
                        <div class="card-body card-rounded">
                            <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                        Project Manager
                                    </p>
                                    <div class="d-flex">
                                        <img class="img-sm rounded-10" src="{{ asset('storage/' . $pro->user->image) }}"
                                            alt="profile">
                                        <div class="wrapper ms-3">
                                            <p class="mb-1 font-weight-medium">{{ $pro->user->name }}</p>
                                            <p class="mb-1 font-weight-medium text-muted">
                                                {{ $pro->user->getRoleNames()->first() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                        Project Name
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 text-small text-muted">
                                                {{ $pro->project_name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                        Technology
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 text-small text-muted">
                                                {{ $pro->technology }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list align-items-center pt-3">
                                <div class="wrapper w-100">
                                    <p class="mb-0">
                                        <a href="/dashboard/admin/detail_projects/createbyid/{{ $pro->id }}"
                                            class="fw-bold text-primary">
                                            Tambah Detail</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="d-flex justify-content-end">
                {{ $detail_project[0]->links() }}
            </div> --}}
        </div>
    </div>
@endsection
