@extends('dashboard.layouts.main')
@section('title', 'Dashboard')
@section('container')
    <div class="contain-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-3 card-rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                    <div class="circle-progress-width">
                                        <div id="totalPM" class="progressbar-js-circle ps-2"></div>
                                    </div>
                                    <div>
                                        <p class="text-small mb-2 m-3">Total Project Manager</p>
                                        <h4 class="mb-0 fw-bold m-3">{{ $project_manager }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="circle-progress-width">
                                        <div id="totalSE" class="progressbar-js-circle ps-2"></div>
                                    </div>
                                    <div>
                                        <p class="text-small mb-2 m-3">Total Software Engineer</p>
                                        <h4 class="mb-0 fw-bold m-3">{{ $software_engineer }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="circle-progress-width">
                                        <div id="totalRole" class="progressbar-js-circle p-2"></div>
                                    </div>
                                    <div>
                                        <p class="text-small mb-2 m-3">Total Role</p>
                                        <h4 class="mb-0 fw-bold m-3">{{ $roles }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="circle-progress-width">
                                        <div id="totalProduct" class="progressbar-js-circle ps-2"></div>
                                    </div>
                                    <div>
                                        <p class="text-small mb-2 m-3">Total Produk</p>
                                        <h4 class="mb-0 fw-bold m-3">{{ $products }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="circle-progress-width">
                                        <div id="totalProyek" class="progressbar-js-circle ps-2"></div>
                                    </div>
                                    <div>
                                        <p class="text-small mb-2 m-3">Total Proyek</p>
                                        <h4 class="mb-0 fw-bold m-3">{{ $projects }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="circle-progress-width">
                                        <div id="totalDetail" class="progressbar-js-circle ps-2"></div>
                                    </div>
                                    <div>
                                        <p class="text-small mb-2 m-3">Total Detail Proyek</p>
                                        <h4 class="mb-0 fw-bold m-3">{{ $detail_projects }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-3">
            <div class="col-lg-8">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title">Monitoring Proyek</h4>
                            </div>
                        </div>
                        {{-- {{ dd($monitoring_projects) }} --}}
                        <div class="table-responsive  mt-1">
                            <table class="table select-table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Pekerjaan</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($monitoring_projects) }} --}}
                                    @foreach ($monitoring_projects as $monitoring)
                                        <tr>
                                            <td>
                                                <div class="d-flex ">
                                                    <img src="{{ asset('storage/' . $monitoring->image) }}" alt="">
                                                    <div>
                                                        <h6>{{ $monitoring->name }}</h6>
                                                        <p>Software Engineer</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6>{{ $monitoring->jobdesc }}</h6>
                                                <p>{{ $monitoring->desc_progress }}</p>
                                            </td>
                                            <td>
                                                @if ($monitoring->progress == 100)
                                                    <div>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                            <p class="text-success">{{ $monitoring->progress }}%</p>
                                                            <p>{{ $monitoring->progress }}/100</p>
                                                        </div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 100%"
                                                                aria-valuenow="{{ $monitoring->progress }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                @elseif ($monitoring->progress >= 75 && $monitoring->progress < 100)
                                                    <div>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                            <p class="text-success">{{ $monitoring->progress }}%</p>
                                                            <p>{{ $monitoring->progress }}/100</p>
                                                        </div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: {{ $monitoring->progress }}%"
                                                                aria-valuenow="{{ $monitoring->progress }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                @elseif ($monitoring->progress < 75 && $monitoring->progress >= 20)
                                                    <div>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                            <p class="text-warning">{{ $monitoring->progress }}%</p>
                                                            <p>{{ $monitoring->progress }}/100</p>
                                                        </div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: {{ $monitoring->progress }}%"
                                                                aria-valuenow="{{ $monitoring->progress }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                @elseif ($monitoring->progress < 20)
                                                    <div>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                            <p class="text-danger">{{ $monitoring->progress }}%</p>
                                                            <p>{{ $monitoring->progress }}/100</p>
                                                        </div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: {{ $monitoring->progress }}%"
                                                                aria-valuenow="{{ $monitoring->progress }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($monitoring->progress == 100 && $monitoring->status == 100)
                                                    <div class="badge badge-opacity-success">Completed</div>
                                                @else
                                                    <div class="badge badge-opacity-warning">In progress</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- {{ dd($top_software_engineer) }} --}}
            <div class="col-lg-4">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h4 class="card-title">Top Detail Pekerjaan</h4>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    @foreach ($top_pekerjaan as $top)
                                        <div
                                            class="wrapper d-flex align-items-center justify-content-start py-2 border-bottom">
                                            <div>{{ $loop->iteration }}</div>
                                            <div class="d-flex">
                                                <div class="wrapper ms-4">
                                                    <p class="ms-1 mb-1 fw-bold">{{ $top->jobdesc }}</p>
                                                    <small class="text-muted mb-0">{{ $top->preferensi }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
            <div class="col-sm-12">
                <div class="statistics-details d-flex align-items-center justify-content-start m-4">
                    <div class="card p-3">
                        <div>
                            <p class="statistics-title text-center">Total Users</p>
                            <h3 class="rate-percentage justify-content-center text-dark"><i
                                    class="mdi mdi-account-multiple"></i> {{ Auth::user()->count() }}
                            </h3>
                        </div>
                    </div>
                    <div class="card p-3 m-3">
                        <div>
                            <p class="statistics-title text-center">Total Roles</p>
                            <h3 class="rate-percentage justify-content-center text-dark"><i class="mdi mdi-account-key"></i>
                                {{ $roles }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    {{-- </div> --}}
@endsection
