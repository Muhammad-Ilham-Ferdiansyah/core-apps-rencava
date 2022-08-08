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
                                <th scope="col">ID Detail <span class="badge badge-success">Alternatif</span></th>
                                <th scope="col">Kompleksitas <span class="badge badge-warning">Kriteria</span></th>
                                <th scope="col">Waktu <span class="badge badge-warning">Kriteria</span></th>
                                <th scope="col">Revisi <span class="badge badge-warning">Kriteria</span></th>
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
                                        <?php $rev = DB::table('monitoring_projects')
                                            ->select('revision')
                                            ->where('detail_project_id', '=', $md->detail_project_id)
                                            ->get(); ?>
                                        <?php $i = 0; ?>
                                        @foreach ($rev as $r)
                                            @if ($r->revision != null)
                                                <?php $i = $i + 1; ?>
                                            @endif
                                        @endforeach

                                        @if ($i > 4)
                                            {{ 5 }}
                                        @elseif ($i < 4)
                                            {{ $i + 1 }}
                                        @endif
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
