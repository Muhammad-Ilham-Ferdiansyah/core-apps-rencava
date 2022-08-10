@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        {{-- {{ dd($detail_projects) }} --}}
        <div class="m-3">
            <a href="/dashboard/user/mn_projects" class="btn btn-primary text-decoration-none">
                <i class="ti-arrow-left btn-icon-prepend"></i> Back</a>

        </div>
        <div class="card m-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pekerjaan</th>
                                <th scope="col">Nama Software Engineer</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_projects as $dp)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $dp->jobdesc }}
                                    </td>
                                    <td>
                                        {{ $dp->user->name }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-icon-text p-2"
                                            onclick="location.href='/dashboard/user/mn_projects/show_details/{{ $dp->id }}'">
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
    </div>
@endsection
