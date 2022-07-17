@extends('dashboard.layouts.main')
@section('container')
    <div class="contain-wrapper">
        {{-- {{ dd($roles) }} --}}
        <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/admin/detail_projects/create" class="btn btn-primary text-white me-0"><i
                        class="mdi mdi-plus me-2"></i>Add Detail Project</a>
            </div>
        </div>
        <hr class="m-4">
        <div class="card m-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Proyek</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Estimasi Orang</th>
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
                                        {{ $dp->project->project_name }}
                                    </td>
                                    <td>
                                        {{ $dp->product->product_name }}
                                    </td>
                                    <td>
                                        {{ $dp->estimasi_orang . ' orang' }}
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
                                                    data-name="{{ $dp->project->project_name }}" href="#"
                                                    name="delete-project"><i class="mdi mdi-delete me-2"></i>
                                                    Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="details_project-modal-{{ $dp->id }}" tabindex="-1"
                                    aria-labelledby="#details_project-modal-{{ $dp->id }}" aria-hidden="true"
                                    style="
                                                    top:-10%;
                                                    right:50%;
                                                    outline: none;
                                                    ">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Details Project</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title lh-base">{{ $dp->project->project_name }}
                                                        </h5>
                                                        <p class="card-text">{{ $dp->product->product_name }}</p>
                                                    </div>
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item"><b>Teknologi :</b>
                                                            {{ $dp->project->technology }}</li>
                                                        <li class="list-group-item"><b>Budget :</b>
                                                            Rp. {{ $dp->project->budget }}</li>
                                                        <li class="list-group-item"><b>Estimasi Orang :</b>
                                                            {{ $dp->estimasi_orang . ' orang' }}</li>
                                                        <li class="list-group-item"><b>Kontrak :</b>
                                                            {{ date('d M Y', strtotime($dp->project->contract)) }}
                                                        </li>
                                                        <li class="list-group-item"><b>Tanggal Mulai :</b>
                                                            {{ date('d M Y', strtotime($dp->startdate)) }}
                                                        </li>
                                                        <li class="list-group-item"><b>Kontrak :</b>
                                                            {{ date('d M Y', strtotime($dp->enddate)) }}
                                                        </li>
                                                    </ul>
                                                    <div class="card-body">
                                                        <p class="card-text"><small class="text-muted">Last updated
                                                                {{ $dp->updated_at->diffForHumans() }}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal -->
                </div>
            </div>
        </div>
    </div>
@endsection
