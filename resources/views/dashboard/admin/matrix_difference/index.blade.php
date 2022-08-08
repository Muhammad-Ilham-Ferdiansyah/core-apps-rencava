@extends('dashboard.layouts.main')
@section('container')
    <div class="contain-wrapper">
        {{-- {{ dd($detail_project) }} --}}
        <hr class="m-4">
        <div class="card m-3">
            <div class="card-body">
                {{-- {{ dd($matrix_differences) }} --}}
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Detail</th>
                                <th scope="col">Kompleksitas</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Revisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($revision as $md)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $md->detail_project_id }}
                                    </td>
                                    <td>
                                        {{ $md->complexity_id }}
                                    </td>
                                    <td>
                                        {{ $md->evaluasi }}
                                    </td>
                                    <td>
                                        {{ $md->total_rev }}
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
