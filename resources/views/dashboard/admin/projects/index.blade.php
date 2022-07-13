@extends('dashboard.layouts.main')
@section('container')
    <div class="contain-wrapper">
        {{-- {{ dd($roles) }} --}}
        <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/admin/products/create" class="btn btn-primary text-white me-0"><i
                        class="mdi mdi-plus me-2"></i>Create Project</a>
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
                                <th scope="col">Nama Client</th>
                                <th scope="col">Nama Proyek</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $project->client->client_name }}
                                    </td>
                                    <td>
                                        {{ $project->project_name }}
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
                                                    onclick="location.href='/dashboard/admin/products/{{ $project->id }}/edit'"><i
                                                        class="mdi mdi-pencil me-2"></i>Update</a>
                                                <div class="dropdown-divider"></div>
                                                <button class="dropdown-item text-danger delete-product"
                                                    data-id="{{ $project->id }}"
                                                    data-name="{{ $project->project_name }}" href="#"
                                                    name="delete-product"><i class="mdi mdi-delete me-2"></i>
                                                    Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal -->
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
                                                <h5 class="modal-title" id="exampleModalLabel">Details Project</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card mb-3" style="max-width: 540px;">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <img src="..." class="img-fluid rounded-start"
                                                                alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title lh-base">
                                                                    {{ $project->project_name }}
                                                                </h5>
                                                                <p class="card-text"><b>Nama Klien :</b>
                                                                    {{ $project->client->client_name }}</p>
                                                                <p class="card-text"><b>Teknologi :</b>
                                                                    {{ $project->technology }}</p>
                                                                <p class="card-text"><b>Budget :</b>
                                                                    Rp. {{ number_format($project->budget, 2) }}</p>
                                                                <p class="card-text"><b>Kontrak :</b>
                                                                    {{ date('d M Y', strtotime($project->contract)) }}
                                                                </p>
                                                                <p class="card-text"><small class="text-muted">Last updated
                                                                        {{ $project->updated_at->diffForHumans() }}</small>
                                                                </p>
                                                            </div>
                                                        </div>
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
                </div>
                {{-- <div class="d-flex justify-content-end">
                    {{ $users->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
