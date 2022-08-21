@extends('dashboard.layouts.main')
@section('title', 'Data Proyek')
@section('container')
    <div class="contain-wrapper">
        {{-- {{ dd($roles) }} --}}
        <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/admin/projects/create" class="btn btn-primary text-white me-0"><i
                        class="mdi mdi-plus me-2"></i>Add Project</a>
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
                                <th scope="col">Nama Client</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $project->project_name . ' - ' . $project->product->product_name }}
                                    </td>
                                    <td>
                                        {{ $project->client->client_name }}
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
                                                    data-bs-target="#details-modal-{{ $project->id }}"><i
                                                        class="mdi mdi-eye me-2"></i>Details</button>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="location.href='/dashboard/admin/projects/{{ $project->id }}/edit'"><i
                                                        class="mdi mdi-pencil me-2"></i>Update</a>
                                                <div class="dropdown-divider"></div>
                                                <button class="dropdown-item text-danger delete-project"
                                                    data-id="{{ $project->id }}" data-name="{{ $project->project_name }}"
                                                    href="#" name="delete-project"><i class="mdi mdi-delete me-2"></i>
                                                    Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="details-modal-{{ $project->id }}" tabindex="-1"
                                    aria-labelledby="#details-modal-{{ $project->id }}" aria-hidden="true"
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
                                                    <img src="{{ asset('storage/' . $project->client->client_image) }}"
                                                        class="card-img-top rounded mx-auto d-block m-2"
                                                        alt="{{ $project->client->client_name }}" style="width: 15rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title lh-base">{{ $project->project_name }}</h5>
                                                        <p class="card-text">{{ $project->client->client_name }}</p>
                                                    </div>
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item"><b>Teknologi :</b>
                                                            {{ $project->technology }}</li>
                                                        <li class="list-group-item"><b>Budget :</b>
                                                            Rp. {{ $project->budget }}</li>
                                                        <li class="list-group-item"><b>Tanggal Mulai :</b>
                                                            {{ date('d M Y', strtotime($project->startdate)) }}
                                                        </li>
                                                        <li class="list-group-item"><b>Tanggal Selesai :</b>
                                                            {{ date('d M Y', strtotime($project->enddate)) }}
                                                        </li>
                                                    </ul>
                                                    <div class="card-body">
                                                        <p class="card-text"><small class="text-muted">Last updated
                                                                {{ $project->updated_at->diffForHumans() }}</small>
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
