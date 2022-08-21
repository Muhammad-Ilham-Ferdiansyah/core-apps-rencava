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
                            <th scope="col">Status</th>
                            <th scope="col">Nilai Preferensi</th>
                            {{-- <th scope="col">Peringkat</th> --}}
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
                                    {{ date('d M Y', strtotime($report->startdate)) }}
                                </td>
                                <td>
                                    {{ date('d M Y', strtotime($report->date_selesai)) }}
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
                                <td>
                                    {{ $report->preferensi }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal -->
            </div>
        </div>
    </div>
@endsection
