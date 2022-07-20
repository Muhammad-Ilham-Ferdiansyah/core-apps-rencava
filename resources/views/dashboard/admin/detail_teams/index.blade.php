@extends('dashboard.layouts.main')
@section('container')
    <div class="contain-wrapper">
        {{-- {{ dd($roles) }} --}}
        <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/admin/detail_projects/create" class="btn btn-primary text-white me-0"><i
                        class="mdi mdi-plus me-2"></i>Add Detail Team</a>
            </div>
        </div>
        <hr class="m-4">
        <div class="row row-cols-1 row-cols-md-2 g-4 me-2 ms-2">
            @foreach ($detail_teams as $dt)
                <div class="col stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body card-rounded">
                            <h4 class="card-title">Recent Details</h4>
                            <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                        {{ $dt->detail_project->project->project_name }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-cube-outline me-1"></i>
                                            <p class="mb-0 text-small">{{ $dt->detail_project->product->product_name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                        Person In Charge
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-account me-1"></i>
                                            <p class="mb-0 text-small">{{ $dt->user->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                        Start Date
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-calendar me-1"></i>
                                            <p class="mb-0 text-small">
                                                {{ date('d M Y', strtotime($dt->startdate)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                        End Date
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-calendar me-1"></i>
                                            <p class="mb-0 text-small">
                                                {{ date('d M Y', strtotime($dt->enddate)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list align-items-center pt-3">
                                <div class="wrapper w-100">
                                    <p class="mb-0">
                                        <a href="/dashboard/admin/detail_teams/{{ $dt->id }}"
                                            class="fw-bold text-primary">Show
                                            details <i class="mdi mdi-arrow-right ms-2"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Proyek</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">PIC</th>
                                <th scope="col">Jobdesc</th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_teams as $dp)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $dp->detail_project->project->project_name }}
                                    </td>
                                    <td>
                                        {{ $dp->detail_project->product->product_name }}
                                    </td>
                                    <td>
                                        {{ $dp->user->name }}
                                    </td>
                                    <td>
                                        {{ $dp->jobdesc }}
                                    </td>
                                    <td>
                                        {{ date('d M Y', strtotime($dp->startdate)) }}
                                    </td>
                                    <td>
                                        {{ date('d M Y', strtotime($dp->enddate)) }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#details_project-modal-{{ $dp->id }}"><i
                                                        class="mdi mdi-eye me-2"></i>Details</button>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="location.href='/dashboard/admin/detail_projects/{{ $dp->id }}/edit'"><i
                                                        class="mdi mdi-pencil me-2"></i>Update</a>
                                                <div class="dropdown-divider"></div>
                                                <button class="dropdown-item text-danger delete-project"
                                                    data-id="{{ $dp->id }}"
                                                    data-name="{{ $dp->detail_project->project->project_name }}"
                                                    href="#" name="delete-project"><i class="mdi mdi-delete me-2"></i>
                                                    Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal -->
                </div> --}}
    </div>
@endsection
