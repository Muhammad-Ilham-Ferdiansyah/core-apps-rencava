@extends('dashboard.layouts.main')
@section('container')
    <?php use App\Models\DetailProject; ?>
    <div class="contain-wrapper">
        {{-- {{ dd($detail_project) }} --}}
        <h2 class="m-3">Langkah 1 Menentukan Bobot Referensi</h2>
        <div class="card m-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Detail Pekerjaan <span class="badge badge-success">Alternatif</span></th>
                                <th scope="col">Kompleksitas <span class="badge badge-warning">Kriteria</span></th>
                                <th scope="col">Waktu <span class="badge badge-warning">Kriteria</span></th>
                                <th scope="col">Revisi <span class="badge badge-warning">Kriteria</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($revision as $md)
                                <?php $alternative = DetailProject::where('id', $md->detail_project_id)->get(); ?>
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $alternative[0]->jobdesc }}
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
