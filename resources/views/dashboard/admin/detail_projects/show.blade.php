@extends('dashboard.layouts.main')
@section('container')
    <div class="contain-wrapper">
        <div class="m-3">
            <button type="button" class="btn btn-sm btn-primary btn-icon-text"
                onclick="location.href='/dashboard/admin/detail_projects'">
                <i class="ti-arrow-left btn-icon-prepend"></i>
                Back
            </button>
        </div>
        {{-- <div class="card m-3"> --}}

        {{-- <nav class="nav nav-pills flex-column flex-sm-row">
                @foreach ($detail_project as $dp)
                    <a class="flex-sm-fill text-sm-center nav-link {{ $loop->first ? 'active' : '' }}" aria-current="page"
                        href="#tab-{{ $dp->id }}">{{ $dp->module_name }}</a>
                @endforeach
            </nav>
            <div class="tab-content">
                @foreach ($detail_project as $dp)
                    <div role="tabpanel" class="tab-pane active" class="tab-pane" id="tab-{{ $dp->id }}">
                        <h2>{{ $dp->modul_name }}</h2>
                        <p>{{ $dp->jobdesc }}</p>
                    </div>
                @endforeach
            </div> --}}
        {{-- </div> --}}
        <div class="row row-cols-1 row-cols-md-3 g-4 mx-2">
            @foreach ($detail_project as $dp)
                <div class="col stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body card-rounded">
                            <h4 class="card-title lh-base">{{ $dp->module_name }}</h4>
                            <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                        Project Name
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 text-small text-muted">
                                                {{ $dp->project->project_name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                        Project Manager
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-opacity-warning">
                                                <i class="mdi mdi-account-star me-1"></i>
                                                {{ $dp->project->user->name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                        Estimasi Orang
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            @if ($dp->estimasi_orang == null)
                                                <div class="badge badge-opacity-warning me-3">Lengkapi data</div>
                                            @else
                                                <i class="mdi mdi-account-multiple me-1"></i>
                                                <p class="mb-0 text-medium text-justify">
                                                    {{ $dp->estimasi_orang . ' orang' }}
                                                </p>
                                            @endif
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
                                            @if ($dp->startdate == null)
                                                <div class="badge badge-opacity-warning me-3">Lengkapi data</div>
                                            @else
                                                <i class="mdi mdi-calendar me-1"></i>
                                                <p class="mb-0 text-small">
                                                    {{ date('d M Y', strtotime($dp->startdate)) }}</p>
                                            @endif
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
                                            @if ($dp->enddate == null)
                                                <div class="badge badge-opacity-warning me-3">Lengkapi data</div>
                                            @else
                                                <i class="mdi mdi-calendar me-1"></i>
                                                <p class="mb-0 text-small">
                                                    {{ date('d M Y', strtotime($dp->enddate)) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="card-body">
                                <a class="badge btn-success text-decoration-none"
                                    href="/dashboard/admin/detail_projects/{{ $dp->id }}/edit" role="button">Edit</a>
                                <a class="badge btn-danger text-decoration-none" href="/dashboard/admin/detail_projects"
                                    role="button">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
