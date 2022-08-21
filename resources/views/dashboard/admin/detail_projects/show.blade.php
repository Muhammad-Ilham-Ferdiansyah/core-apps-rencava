@extends('dashboard.layouts.main')
@section('title', 'Detail Proyek')
@section('container')
    <div class="contain-wrapper">
        <div class="m-3">
            <button type="button" class="btn btn-sm btn-primary btn-icon-text"
                onclick="location.href='/dashboard/admin/detail_projects'">
                <i class="ti-arrow-left btn-icon-prepend"></i>
                Back
            </button>
        </div>
        <div class="form-group row mt-3 ms-2 me-2">
            @foreach ($detail_project as $dp)
                <div class="col-md-4 col-lg-4 stretch-card mt-3">
                    <div class="card card-rounded">
                        <div class="card-body card-rounded">
                            <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                        Person In Charge
                                    </p>
                                    <div class="d-flex">
                                        <img class="img-sm rounded-10" src="{{ asset('storage/' . $dp->user->image) }}"
                                            alt="profile">
                                        <div class="wrapper ms-3">
                                            <p class="mb-1 font-weight-medium">{{ $dp->user->name }}</p>
                                            <p class="mb-1 font-weight-medium text-muted">
                                                {{ $dp->user->getRoleNames()->first() }}</p>
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
                                                {{ $dp->project->project_name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list align-items-center pt-3">
                                <div class="wrapper w-100">
                                    <p class="mb-0">
                                        <a href="/dashboard/admin/detail_projects/show_detail/{{ $dp->user_id }}"
                                            class="fw-bold text-primary">
                                            Show more</a>
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
