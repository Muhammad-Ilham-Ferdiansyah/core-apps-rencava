@extends('dashboard.layouts.main')
@section('title', 'Laporan Detail Pekerjaan')
@section('container')
    <div class="card m-3">
        <div class="card-body">
            <div class="table-responsive">
                <table id="myReport" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Detail Pekerjaan</th>
                            <th scope="col">Nama Software Engineer</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ dd($report_details) }} --}}
                        @foreach ($report_details as $report)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $report->jobdesc }}
                                </td>
                                <td>
                                    {{ $report->name }}
                                </td>
                                <td>
                                    {{ date('d/m/Y', strtotime($report->startdate)) }}
                                </td>
                                @if ($report->date_selesai == null)
                                    <td>-</td>
                                @else
                                    <td>
                                        {{ date('d/m/Y', strtotime($report->date_selesai)) }}
                                    </td>
                                @endif
                                <td>
                                    {{ $report->progress . '%' }}
                                </td>
                                @if ($report->status == 100)
                                    <td>
                                        <div class="badge badge-opacity-success">Completed</div>
                                    </td>
                                @else
                                    <td>
                                        <div class="badge badge-opacity-warning">On Going</div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal -->
            </div>
        </div>
    </div>
@endsection
