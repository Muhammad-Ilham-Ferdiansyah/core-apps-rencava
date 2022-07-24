@extends('dashboard.layouts.main')
@section('container')
    <div class="contain-wrapper">
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title card-title-dash">Pending Requests</h4>
                                <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p>
                            </div>
                        </div>
                        <div class="table-responsive mt-1">
                            <table class="table select-table text-dark" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Proyek</th>
                                        <th>Klien</th>
                                        <th>Deskripsi Pekerjaan</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail_projects as $dt_project)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $dt_project->project->project_name }}
                                            </td>
                                            <td>
                                                {{ $dt_project->project->client->client_name }}
                                            </td>
                                            <td>
                                                {{ $dt_project->jobdesc }}
                                            </td>
                                            <td>
                                                {{ date('d M Y', strtotime($dt_project->startdate)) }}
                                            </td>
                                            <td>
                                                {{ date('d M Y', strtotime($dt_project->enddate)) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
