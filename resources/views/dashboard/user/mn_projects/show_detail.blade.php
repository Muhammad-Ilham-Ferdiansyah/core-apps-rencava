@extends('dashboard.layouts.main')
@section('title', 'Detail Pekerjaan')
@section('container')
    <div class="contain-wrapper">
        {{-- {{ dd($monitoring_projects) }} --}}
        @if ($monitoring_projects->count())
            <div class="m-3">
                <a href="/dashboard/user/mn_projects/assessment/{{ $monitoring_projects[0]->detail_project->project_id }}"
                    class="btn btn-primary text-decoration-none">
                    <i class="ti-arrow-left btn-icon-prepend"></i> Back</a>

            </div>
            <div class="row mt-3 ms-1">
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
                                                <h5 class="card-subtitle">{{ $mproject->desc_progress }}</h5>
                                            </div>
                                            {{-- {{ dd($monitoring_projects) }} --}}
                                        </div>
                                        <div class="img-fluid">
                                            <img src="{{ asset('storage/' . $mproject->evidence) }}" class="card-img-top"
                                                alt="{{ $mproject->jobdesc }}">
                                        </div>
                                        <div class="mt-3">
                                            @if ($mproject->status == null)
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#revisionModal-{{ $mproject->id }}"> <i
                                                        class="ti-comment-alt btn-icon-prepend"></i>
                                                    Tambah Revisi
                                                </button>
                                            @endif
                                            @if ($mproject->revision == null)
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#approvalModal-{{ $mproject->id }}"
                                                    {{ $mproject->status != null ? 'disabled' : '' }}> <i
                                                        class="ti-check btn-icon-prepend"></i>
                                                    {{ $mproject->status != null ? 'Approved' : 'Approval' }}
                                                </button>
                                            @endif
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
    {{-- MODAL --}}
    @foreach ($monitoring_projects as $mproject)
        <div class="modal fade" id="revisionModal-{{ $mproject->id }}" tabindex="-1" aria-labelledby="revisionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Revisi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/dashboard/user/mn_projects/add_revision/{{ $mproject->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="form-floating">
                                    <textarea class="form-control @error('revision') is-invalid @enderror" placeholder="Revision" id="revision"
                                        name="revision" style="height: 100px">{{ Request::old('revision') }}</textarea>
                                    <label for="revision">Menambahkan Revisi disini..</label>
                                    @error('revision')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"
                            onclick="location.href='/dashboard/user/mn_projects/add_revision'">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($monitoring_projects as $mproject)
        <div class="modal fade" id="approvalModal-{{ $mproject->id }}" tabindex="-1" aria-labelledby="revisionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Proses Approval</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/dashboard/user/mn_projects/approved/{{ $mproject->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                Apakah yakin untuk proses approval?
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary"
                            onclick="location.href='/dashboard/user/mn_projects/approved'">Ya</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection
