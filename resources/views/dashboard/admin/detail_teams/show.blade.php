@extends('dashboard.layouts.main')
@section('container')
    <div class="contain-wrapper">
        <div class="form-group row mt-3 ms-2 me-2">
            <div class="col-md-12 col-lg-12 stretch-card">
                <div class="card card-rounded">
                    <div class="card-body card-rounded">
                        <h4 class="card-title lh-base">{{ $detail_teams->detail_project->project->project_name }}</h4>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 font-weight-medium">
                                    Product Name
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-cube-outline me-1"></i>
                                        <p class="mb-0 text-small text-muted">
                                            {{ $detail_teams->detail_project->product->product_name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 font-weight-medium">
                                    Person In Charge
                                </p>
                                <div class="d-flex">
                                    <img class="img-sm rounded-10"
                                        src="{{ asset('storage/' . $detail_teams->user->image) }}" alt="profile">
                                    <div class="wrapper ms-3">
                                        <p class="mb-1 font-weight-medium">{{ $detail_teams->user->name }}</p>
                                        <p class="mb-1 font-weight-medium text-muted">
                                            {{ $detail_teams->user->getRoleNames()->first() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 font-weight-medium">
                                    Job Description
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-folder-multiple-outline me-2 ms-2"></i>
                                        <p class="mb-0 text-medium text-justify">{{ $detail_teams->jobdesc }}</p>
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
                                            {{ date('d M Y', strtotime($detail_teams->startdate)) }}</p>
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
                                            {{ date('d M Y', strtotime($detail_teams->enddate)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list align-items-center pt-3">
                            <div class="wrapper w-100">
                                <p class="mb-0">
                                    <a href="/dashboard/admin/detail_teams" class="fw-bold text-primary"><i
                                            class="mdi mdi-arrow-left ms-2"></i>
                                        Back</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
