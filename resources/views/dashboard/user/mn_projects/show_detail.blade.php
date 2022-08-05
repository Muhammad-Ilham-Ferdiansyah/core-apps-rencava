@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        @if ($monitoring_projects->count())
            <div class="m-3">
                <a href="/dashboard/user/mn_projects/assessment/{{ $monitoring_projects[0]->id }}"
                    class="btn btn-primary text-decoration-none">
                    <i class="ti-arrow-left btn-icon-prepend"></i> Back</a>

            </div>
            <div class="row m-3">
                @foreach ($monitoring_projects as $mproject)
                    <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                            <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title ">Progress
                                                    {{ date('d/m/Y', strtotime($mproject->date_progress)) }} -
                                                    {{ $mproject->detail_project->jobdesc }}
                                                    ({{ $mproject->detail_project->user->name }})
                                                </h4>
                                                <h5 class="card-subtitle">{{ $mproject->progress }}</h5>
                                            </div>
                                            {{-- {{ dd($monitoring_projects) }} --}}
                                        </div>
                                        <div class="img-fluid">
                                            <img src="{{ asset('storage/' . $mproject->evidence) }}" class="card-img-top"
                                                alt="{{ $mproject->jobdesc }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h2>Not Found</h2>
        @endif

    </div>
@endsection
