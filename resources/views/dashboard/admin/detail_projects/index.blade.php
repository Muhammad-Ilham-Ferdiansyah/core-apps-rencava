@extends('dashboard.layouts.main')
@section('container')
    <div class="contain-wrapper">
        <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/admin/detail_projects/create" class="btn btn-primary text-white me-0"><i
                        class="mdi mdi-plus me-2"></i>Add Detail Project</a>
            </div>
        </div>
        {{-- {{ dd($detail_project) }} --}}
        <hr class="m-4">
        <div class="card m-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Proyek</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_project as $dp)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $dp->project->project_name }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-icon-text p-2"
                                            onclick="location.href='/dashboard/admin/detail_projects/{{ $dp->project_id }}'">
                                            <i class="ti-eye btn-icon-prepend"></i>
                                            Show Details
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal -->
                </div>
            </div>
        </div>
    </div>
@endsection
