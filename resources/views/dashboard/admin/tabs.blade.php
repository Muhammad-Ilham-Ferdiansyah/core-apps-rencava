@extends('dashboard.layouts.main')

@section('container')
    <?php use App\Models\DetailProject; ?>
    <?php use App\Models\Reference; ?>
    <div class="contain-wrapper">
        <hr class="m-4">
        <div class="m-3">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/admin/tab1') ? 'active text-bg-primary' : '' }}"
                        href="{{ url('dashboard/admin/tab1') }}" role="tab">Langkah 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/admin/tab2') ? 'active text-bg-primary' : '' }}"
                        href="{{ url('dashboard/admin/tab2') }}" role="tab">Langkah 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/admin/tab3') ? 'active text-bg-primary' : '' }}"
                        href="{{ url('dashboard/admin/tab3') }}" role="tab">Langkah 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/admin/tab4') ? 'active text-bg-primary' : '' }}"
                        href="{{ url('dashboard/admin/tab4') }}" role="tab">Langkah 4 dan 5</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/admin/tab5') ? 'active text-bg-primary' : '' }}"
                        href="{{ url('dashboard/admin/tab5') }}" role="tab">Langkah 6</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Langkah 7</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Langkah 8</a>
                </li>
            </ul>
            <div class="tab-content">
                @if (request()->is('dashboard/admin/tab1'))
                    <div class="tab-pane {{ request()->is('dashboard/admin/tab1') ? 'active' : '' }}"
                        id="{{ url('dashboard/admin/tab1') }}" role="tabpanel">
                        <h2 class="m-3">Langkah 1 Menentukan Bobot Referensi</h2>
                        {{-- {{ dd($reference) }} --}}
                        <div class="card m-3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Bobot</th>
                                                <th scope="col">Bobot</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reference as $ref)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $ref->reference_name }}</td>
                                                    <td>{{ $ref->bobot }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (request()->is('dashboard/admin/tab2'))
                    <div class="tab-pane {{ request()->is('dashboard/admin/tab2') ? 'active' : '' }}"
                        id="{{ url('dashboard/admin/tab2') }}" role="tabpanel">
                        <div class="contain-wrapper">
                            <h2 class="m-3">Langkah 2 Matriks Perbandingan</h2>
                            <div class="card m-3">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Detail Pekerjaan <span
                                                            class="badge badge-success">Alternatif</span></th>
                                                    <th scope="col">Kompleksitas <span
                                                            class="badge badge-warning">Kriteria</span></th>
                                                    <th scope="col">Waktu <span
                                                            class="badge badge-warning">Kriteria</span>
                                                    </th>
                                                    <th scope="col">Revisi <span
                                                            class="badge badge-warning">Kriteria</span>
                                                    </th>
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
                                                            {{-- {{ dd($rev) }} --}}
                                                            <?php $i = 0; ?>
                                                            @foreach ($rev as $r)
                                                                @if ($r->revision != null)
                                                                    <?php $i = $i + 1; ?>
                                                                @endif
                                                            @endforeach
                                                            @if ($i > 4)
                                                                {{ 5 }}
                                                            @elseif ($i <= 4)
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
                    </div>
                @elseif (request()->is('dashboard/admin/tab3'))
                    <div class="tab-pane {{ request()->is('dashboard/admin/tab3') ? 'active' : '' }}"
                        id="{{ url('dashboard/admin/tab3') }}" role="tabpanel">
                        <h2 class="m-3">Langkah 3 Matriks Ternormalisasi</h2>
                        <div class="card m-3">
                            <div class="card-body">
                                <h6 class="m-3">Pembagi</h6>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kompleksitas</th>
                                                <th scope="col">Waktu</th>
                                                <th scope="col">Revisi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $arrRev = [];
                                            $indRev = 0; ?>
                                            @foreach ($revision as $p)
                                                <?php $rev2 = DB::table('monitoring_projects')
                                                    ->select('revision')
                                                    ->where('detail_project_id', '=', $p->detail_project_id)
                                                    ->get(); ?>
                                                {{-- {{ dd($rev2) }} --}}
                                                <?php $i = 0;
                                                ?>
                                                @foreach ($rev2 as $r2)
                                                    @if ($r2->revision != null)
                                                        <?php $i = $i + 1; ?>
                                                    @endif
                                                @endforeach

                                                @if ($i > 4)
                                                    <?php $doubleRev = pow(5, 2); ?>
                                                @elseif ($i <= 4)
                                                    <?php $inc = $i + 1;
                                                    $doubleRev = pow($inc, 2); ?>
                                                @endif
                                                {{-- {{ dd($doubleRev) }} --}}
                                                <?php $arrRev[$indRev] = $doubleRev;
                                                $indRev++; ?>
                                            @endforeach
                                            <?php $pembagiRevisi = array_sum($arrRev); ?>
                                            {{-- {{ dd($pembagiRevisi) }} --}}
                                            <tr>
                                                <td>{{ sqrt($divider) }}</td>
                                                <td>{{ sqrt($divider_time) }}</td>
                                                <td>{{ sqrt($pembagiRevisi) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card m-3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Detail Pekerjaan <span
                                                        class="badge badge-success">Alternatif</span></th>
                                                <th scope="col">Kompleksitas <span
                                                        class="badge badge-warning">Kriteria</span></th>
                                                <th scope="col">Waktu <span class="badge badge-warning">Kriteria</span>
                                                </th>
                                                <th scope="col">Revisi <span class="badge badge-warning">Kriteria</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($revision as $rev3)
                                                <?php $alternative = DetailProject::where('id', $rev3->detail_project_id)->get(); ?>
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $alternative[0]->jobdesc }}</td>
                                                    <td>{{ $rev3->complexity_id / sqrt($divider) }}</td>
                                                    <td>{{ $rev3->evaluasi / sqrt($divider_time) }}</td>
                                                    <td>
                                                        <?php $rev = DB::table('monitoring_projects')
                                                            ->select('revision')
                                                            ->where('detail_project_id', '=', $rev3->detail_project_id)
                                                            ->get(); ?>
                                                        {{-- {{ dd($rev) }} --}}
                                                        <?php $i = 0; ?>
                                                        @foreach ($rev as $r)
                                                            @if ($r->revision != null)
                                                                <?php $i = $i + 1; ?>
                                                            @endif
                                                        @endforeach

                                                        @if ($i > 4)
                                                            {{ 5 / sqrt($pembagiRevisi) }}
                                                        @elseif ($i <= 4)
                                                            {{ ($i + 1) / sqrt($pembagiRevisi) }}
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
                @elseif (request()->is('dashboard/admin/tab4'))
                    <div class="tab-pane {{ request()->is('dashboard/admin/tab4') ? 'active' : '' }}"
                        id="{{ url('dashboard/admin/tab4') }}" role="tabpanel">
                        <div class="contain-wrapper">
                            <h2 class="m-3">Langkah 4 Matriks Keputusan Ternormalisasi dan Terbobot</h2>
                            <div class="card m-3">
                                <?php $arrRev = [];
                                $indRev = 0; ?>
                                @foreach ($revision as $p)
                                    <?php $rev2 = DB::table('monitoring_projects')
                                        ->select('revision')
                                        ->where('detail_project_id', '=', $p->detail_project_id)
                                        ->get(); ?>
                                    {{-- {{ dd($rev2) }} --}}
                                    <?php $i = 0;
                                    ?>
                                    @foreach ($rev2 as $r2)
                                        @if ($r2->revision != null)
                                            <?php $i = $i + 1; ?>
                                        @endif
                                    @endforeach

                                    @if ($i > 4)
                                        <?php $doubleRev = pow(5, 2); ?>
                                    @elseif ($i <= 4)
                                        <?php $inc = $i + 1;
                                        $doubleRev = pow($inc, 2); ?>
                                    @endif
                                    {{-- {{ dd($doubleRev) }} --}}
                                    <?php $arrRev[$indRev] = $doubleRev;
                                    $indRev++; ?>
                                @endforeach
                                <?php $pembagiRevisi = array_sum($arrRev); ?>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Detail Pekerjaan <span
                                                            class="badge badge-success">Alternatif</span></th>
                                                    <th scope="col">Kompleksitas <span
                                                            class="badge badge-warning">Kriteria</span></th>
                                                    <th scope="col">Waktu <span
                                                            class="badge badge-warning">Kriteria</span>
                                                    </th>
                                                    <th scope="col">Revisi <span
                                                            class="badge badge-warning">Kriteria</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                //complexity
                                                $arrComp = [];
                                                $indComp = 0;
                                                //evaluasi
                                                $arrEv = [];
                                                $indEv = 0;
                                                //revisi
                                                $arrRev = [];
                                                $inRev = 0;
                                                ?>
                                                @foreach ($revision as $rev3)
                                                    <?php $alternative = DetailProject::where('id', $rev3->detail_project_id)->get();
                                                    $reference = Reference::all();
                                                    
                                                    $complexity = $rev3->complexity_id / sqrt($divider);
                                                    $ev_time = $rev3->evaluasi / sqrt($divider_time);
                                                    $comp = $complexity * $reference[0]->bobot;
                                                    $ev = $ev_time * $reference[1]->bobot;
                                                    ?>
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $alternative[0]->jobdesc }}</td>
                                                        <!-- Buat cari nilai max compleksity --->
                                                        <td>{{ $comp }}</td>
                                                        <?php $arrComp[$indComp] = $comp; ?>
                                                        <?php $indComp++; ?>
                                                        <!-- Buat cari nilai max evaluasi waktu --->
                                                        <td>{{ $ev }}</td>
                                                        <?php $arrEv[$indEv] = $ev; ?>
                                                        <?php $indEv++; ?>
                                                        <td>
                                                            <?php $rev = DB::table('monitoring_projects')
                                                                ->select('revision')
                                                                ->where('detail_project_id', '=', $rev3->detail_project_id)
                                                                ->get(); ?>
                                                            {{-- {{ dd($rev) }} --}}
                                                            <?php $i = 0; ?>
                                                            @foreach ($rev as $r)
                                                                @if ($r->revision != null)
                                                                    <?php $i = $i + 1; ?>
                                                                @endif
                                                            @endforeach
                                                            @if ($i > 4)
                                                                <?php $revision = 5 / sqrt($pembagiRevisi);
                                                                $revision2 = $revision * $reference[2]->bobot;
                                                                ?>
                                                                {{ $revision2 }}
                                                                <?php $arrRev[$indRev] = $revision2; ?>
                                                                <?php $indRev++; ?>
                                                            @elseif ($i <= 4)
                                                                <?php $revision = ($i + 1) / sqrt($pembagiRevisi);
                                                                $revision2 = $revision * $reference[2]->bobot;
                                                                ?>
                                                                {{ $revision2 }}
                                                                <?php $arrRev[$indRev] = $revision2; ?>
                                                                <?php $indRev++; ?>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <h2 class="m-3">Langkah 5 Nilai Ideal Positif dan Negatif</h2>
                            <div class="card m-3">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nilai</th>
                                                    <th scope="col">Kompleksitas</th>
                                                    <th scope="col">Waktu</th>
                                                    <th scope="col">Revisi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- {{ dd($pembagiRevisi) }} --}}
                                                <tr>
                                                    <td>MAX</td>
                                                    <td>{{ max($arrComp) }}</td>
                                                    <td>{{ max($arrEv) }}</td>
                                                    <td>{{ max($arrRev) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>MIN</td>
                                                    <td>{{ min($arrComp) }}</td>
                                                    <td>{{ min($arrEv) }}</td>
                                                    <td>{{ min($arrRev) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (request()->is('dashboard/admin/tab5'))
                    <div class="tab-pane {{ request()->is('dashboard/admin/tab5') ? 'active' : '' }}"
                        id="{{ url('dashboard/admin/tab5') }}" role="tabpanel">
                        <h2 class="m-3">Langkah 6 Jarak Nilai Alternatif dengan Matriks Solusi Ideal Positif dan
                            Negatif</h2>
                        <div class="card m-3">
                            <?php $arrRev = [];
                            $indRev = 0; ?>
                            @foreach ($revision as $p)
                                <?php $rev2 = DB::table('monitoring_projects')
                                    ->select('revision')
                                    ->where('detail_project_id', '=', $p->detail_project_id)
                                    ->get(); ?>
                                {{-- {{ dd($rev2) }} --}}
                                <?php $i = 0;
                                ?>
                                @foreach ($rev2 as $r2)
                                    @if ($r2->revision != null)
                                        <?php $i = $i + 1; ?>
                                    @endif
                                @endforeach

                                @if ($i > 4)
                                    <?php $doubleRev = pow(5, 2); ?>
                                @elseif ($i <= 4)
                                    <?php $inc = $i + 1;
                                    $doubleRev = pow($inc, 2); ?>
                                @endif
                                {{-- {{ dd($doubleRev) }} --}}
                                <?php $arrRev[$indRev] = $doubleRev;
                                $indRev++; ?>
                            @endforeach
                            <?php $pembagiRevisi = array_sum($arrRev); ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Detail Pekerjaan <span
                                                        class="badge badge-success">Alternatif</span></th>
                                                <th scope="col">Kompleksitas <span
                                                        class="badge badge-warning">Kriteria</span></th>
                                                <th scope="col">Waktu <span class="badge badge-warning">Kriteria</span>
                                                </th>
                                                <th scope="col">Revisi <span
                                                        class="badge badge-warning">Kriteria</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //complexity
                                            $arrComp = [];
                                            $indComp = 0;
                                            //evaluasi
                                            $arrEv = [];
                                            $indEv = 0;
                                            //revisi
                                            $arrRev = [];
                                            $inRev = 0;
                                            ?>
                                            @foreach ($revision as $rev3)
                                                <?php $alternative = DetailProject::where('id', $rev3->detail_project_id)->get();
                                                $reference = Reference::all();
                                                
                                                $complexity = $rev3->complexity_id / sqrt($divider);
                                                $ev_time = $rev3->evaluasi / sqrt($divider_time);
                                                $comp = $complexity * $reference[0]->bobot;
                                                $ev = $ev_time * $reference[1]->bobot;
                                                ?>
                                                <tr>
                                                    <?php $rev = DB::table('monitoring_projects')
                                                        ->select('revision')
                                                        ->where('detail_project_id', '=', $rev3->detail_project_id)
                                                        ->get(); ?>
                                                    {{-- {{ dd($rev) }} --}}
                                                    <?php $i = 0; ?>
                                                    @foreach ($rev as $r)
                                                        @if ($r->revision != null)
                                                            <?php $i = $i + 1; ?>
                                                        @endif
                                                    @endforeach
                                                    @if ($i > 4)
                                                        <?php $revision = 5 / sqrt($pembagiRevisi);
                                                        $revision2 = $revision * $reference[2]->bobot;
                                                        ?>
                                                        <?php $arrRev[$indRev] = $revision2; ?>
                                                        <?php $indRev++; ?>
                                                        <?php $maxRev = max($arrRev); ?>
                                                    @elseif ($i <= 4)
                                                        <?php $revision = ($i + 1) / sqrt($pembagiRevisi);
                                                        $revision2 = $revision * $reference[2]->bobot;
                                                        ?>
                                                        <?php $arrRev[$indRev] = $revision2; ?>
                                                        <?php $indRev++; ?>
                                                        <?php $maxRev = max($arrRev); ?>
                                                    @endif
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $alternative[0]->jobdesc }}</td>

                                                    <!-- Buat cari nilai max compleksity --->
                                                    <?php $arrComp[$indComp] = $comp; ?>
                                                    <?php $indComp++; ?>
                                                    <?php $maxComp = max($arrComp); ?>
                                                    <?php $arrEv[$indEv] = $ev; ?>
                                                    <?php $indEv++; ?>
                                                    <?php $maxEv = max($arrEv); ?>
                                                    <?php $d1 = $maxComp - $comp; ?>
                                                    <?php $d2 = $maxEv - $ev; ?>
                                                    <?php $d3 = $maxRev - $revision2; ?>
                                                    {{-- {{ var_dump($maxComp) }} --}}
                                                    {{-- {{ var_dump($d1) }} --}}
                                                    <?php
                                                    $dPlus1 = pow($d1, 2);
                                                    $dPlus2 = pow($d2, 2);
                                                    $dPlus3 = pow($d3, 2);
                                                    var_dump($d1);
                                                    
                                                    // $a = [$dPlus1, $dPlus2, $dPlus3];
                                                    // echo array_sum($a);
                                                    // var_dump($d1);
                                                    
                                                    // $sum = $dPlus1 + $dPlus2 + $dPlus3;
                                                    
                                                    ?>
                                                    {{-- {{ var_dump($sum) }} --}}
                                                    <td>{{ $d1 }}</td>
                                                    <!-- Buat cari nilai max evaluasi waktu --->
                                                    <td>{{ $ev }}</td>
                                                    <td>{{ $ev }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="tab-pane {{ request()->is('dashboard/admin/tab2') ? 'active' : '' }}"
                        id="{{ url('dashboard/admin/tab2') }}" role="tabpanel">
                        <h2 class="m-3">Langkah 1 Menentukan Bobot Referensi</h2>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
