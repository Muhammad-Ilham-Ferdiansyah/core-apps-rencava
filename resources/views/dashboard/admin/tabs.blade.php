@extends('dashboard.layouts.main')
@section('title', 'Perhitungan Matriks')
@section('container')
    <?php use App\Models\DetailProject; ?>
    <?php use App\Models\Reference; ?>
    <?php use App\Models\Preference; ?>
    <div class="contain-wrapper">
        {{-- <hr class="m-4"> --}}
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
                    <a class="nav-link {{ request()->is('dashboard/admin/tab6') ? 'active text-bg-primary' : '' }}"
                        href="{{ url('dashboard/admin/tab6') }}" role="tab">Langkah 7</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/admin/tab7') ? 'active text-bg-primary' : '' }}"
                        href="{{ url('dashboard/admin/tab7') }}" role="tab">Lihat Peringkat</a>
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
                                                    <td>{{ min($arrRev) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>MIN</td>
                                                    <td>{{ min($arrComp) }}</td>
                                                    <td>{{ min($arrEv) }}</td>
                                                    <td>{{ max($arrRev) }}</td>
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
                                                <th scope="col">Ideal Positif <span
                                                        class="badge badge-warning">D+</span>
                                                </th>
                                                <th scope="col">Ideal Negatif <span
                                                        class="badge badge-danger">D-</span>
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

                                            {{-- Start Nyari Nilai Max --}}
                                            @foreach ($revision as $r)
                                                <?php $alternative = DetailProject::where('id', $r->detail_project_id)->get();
                                                $reference = Reference::all();
                                                
                                                $complexity = $r->complexity_id / sqrt($divider);
                                                $ev_time = $r->evaluasi / sqrt($divider_time);
                                                $comp = $complexity * $reference[0]->bobot;
                                                $ev = $ev_time * $reference[1]->bobot;
                                                ?>
                                                <?php $rev = DB::table('monitoring_projects')
                                                    ->select('revision')
                                                    ->where('detail_project_id', '=', $r->detail_project_id)
                                                    ->get(); ?>
                                                <?php $i = 0; ?>
                                                @foreach ($rev as $d)
                                                    @if ($d->revision != null)
                                                        <?php $i = $i + 1; ?>
                                                    @endif
                                                @endforeach

                                                @if ($i > 4)
                                                    <?php $revisionIf = 5 / sqrt($pembagiRevisi);
                                                    $revisionBobot = $revisionIf * $reference[2]->bobot;
                                                    ?>
                                                    <?php $arrRev[$indRev] = $revisionBobot; ?>
                                                    <?php $indRev++; ?>
                                                    <?php $maxRev = max($arrRev); ?>
                                                    <?php $minRev = min($arrRev); ?>
                                                @elseif ($i <= 4)
                                                    <?php $revisionIf = ($i + 1) / sqrt($pembagiRevisi);
                                                    $revisionBobot = $revisionIf * $reference[2]->bobot;
                                                    ?>
                                                    <?php $arrRev[$indRev] = $revisionBobot; ?>
                                                    <?php $indRev++; ?>
                                                    <?php $maxRev = max($arrRev); ?>
                                                    <?php $minRev = min($arrRev); ?>
                                                @endif
                                                <?php $arrComp[$indComp] = $comp; ?>
                                                <?php $indComp++; ?>
                                                <?php $maxComp = max($arrComp); ?>
                                                <?php $minComp = min($arrComp); ?>
                                                <?php $arrEv[$indEv] = $ev; ?>
                                                <?php $indEv++; ?>
                                                <?php $maxEv = max($arrEv); ?>
                                                <?php $minEv = min($arrEv); ?>
                                            @endforeach
                                            {{-- End Nyari Nilai Max --}}

                                            @foreach ($revision as $rev3)
                                                <?php $alternative = DetailProject::where('id', $rev3->detail_project_id)->get();
                                                $reference = Reference::all();
                                                
                                                $complexity = $rev3->complexity_id / sqrt($divider);
                                                $ev_time = $rev3->evaluasi / sqrt($divider_time);
                                                $comp = $complexity * $reference[0]->bobot;
                                                $ev = $ev_time * $reference[1]->bobot;
                                                ?>
                                                <?php $rev = DB::table('monitoring_projects')
                                                    ->select('revision')
                                                    ->where('detail_project_id', '=', $rev3->detail_project_id)
                                                    ->get(); ?>
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
                                                @elseif ($i <= 4)
                                                    <?php $revision = ($i + 1) / sqrt($pembagiRevisi);
                                                    $revision2 = $revision * $reference[2]->bobot;
                                                    ?>
                                                @endif
                                                <!-- menentukan ideal positif D+ -->
                                                <?php $d1Pos = $maxComp - $comp; ?>
                                                <?php $d2Pos = $maxEv - $ev; ?>
                                                <?php $d3Pos = $minRev - $revision2; ?>
                                                <?php
                                                $dPlus1 = pow($d1Pos, 2);
                                                $dPlus2 = pow($d2Pos, 2);
                                                $dPlus3 = pow($d3Pos, 2);
                                                $sumDplus = sqrt($dPlus1 + $dPlus2 + $dPlus3);
                                                ?>
                                                <!-- menentukan ideal negatif D- -->
                                                <?php $d1Neg = $minComp - $comp; ?>
                                                <?php $d2Neg = $minEv - $ev; ?>
                                                <?php $d3Neg = $maxRev - $revision2; ?>
                                                <?php
                                                $dMin1 = pow($d1Neg, 2);
                                                $dMin2 = pow($d2Neg, 2);
                                                $dMin3 = pow($d3Neg, 2);
                                                $sumDmin = sqrt($dMin1 + $dMin2 + $dMin3);
                                                ?>
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $alternative[0]->jobdesc }}</td>
                                                    <td>{{ $sumDplus }}</td>
                                                    <td>{{ $sumDmin }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (request()->is('dashboard/admin/tab6'))
                    <div class="tab-pane {{ request()->is('dashboard/admin/tab6') ? 'active' : '' }}"
                        id="{{ url('dashboard/admin/tab6') }}" role="tabpanel">
                        <div class="tab-pane {{ request()->is('dashboard/admin/tab6') ? 'active' : '' }}"
                            id="{{ url('dashboard/admin/tab6') }}" role="tabpanel">
                            <h2 class="m-3">Langkah 7 Nilai Preferensi</h2>
                            <div class="card m-3">
                                <?php $arrRev = [];
                                $indRev = 0; ?>
                                <?php Preference::truncate(); ?>
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
                                                    <th scope="col">ID Detail</th>
                                                    <th scope="col">Detail Pekerjaan <span
                                                            class="badge badge-success">Alternatif</span></th>
                                                    <th scope="col">Nilai Preferensi
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

                                                {{-- Start Nyari Nilai Max --}}
                                                @foreach ($revision as $r)
                                                    <?php $alternative = DetailProject::where('id', $r->detail_project_id)->get();
                                                    $reference = Reference::all();
                                                    
                                                    $complexity = $r->complexity_id / sqrt($divider);
                                                    $ev_time = $r->evaluasi / sqrt($divider_time);
                                                    $comp = $complexity * $reference[0]->bobot;
                                                    $ev = $ev_time * $reference[1]->bobot;
                                                    ?>
                                                    <?php $rev = DB::table('monitoring_projects')
                                                        ->select('revision')
                                                        ->where('detail_project_id', '=', $r->detail_project_id)
                                                        ->get(); ?>
                                                    <?php $i = 0; ?>
                                                    @foreach ($rev as $d)
                                                        @if ($d->revision != null)
                                                            <?php $i = $i + 1; ?>
                                                        @endif
                                                    @endforeach

                                                    @if ($i > 4)
                                                        <?php $revisionIf = 5 / sqrt($pembagiRevisi);
                                                        $revisionBobot = $revisionIf * $reference[2]->bobot;
                                                        ?>
                                                        <?php $arrRev[$indRev] = $revisionBobot; ?>
                                                        <?php $indRev++; ?>
                                                        <?php $maxRev = max($arrRev); ?>
                                                        <?php $minRev = min($arrRev); ?>
                                                    @elseif ($i <= 4)
                                                        <?php $revisionIf = ($i + 1) / sqrt($pembagiRevisi);
                                                        $revisionBobot = $revisionIf * $reference[2]->bobot;
                                                        ?>
                                                        <?php $arrRev[$indRev] = $revisionBobot; ?>
                                                        <?php $indRev++; ?>
                                                        <?php $maxRev = max($arrRev); ?>
                                                        <?php $minRev = min($arrRev); ?>
                                                    @endif
                                                    <?php $arrComp[$indComp] = $comp; ?>
                                                    <?php $indComp++; ?>
                                                    <?php $maxComp = max($arrComp); ?>
                                                    <?php $minComp = min($arrComp); ?>
                                                    <?php $arrEv[$indEv] = $ev; ?>
                                                    <?php $indEv++; ?>
                                                    <?php $maxEv = max($arrEv); ?>
                                                    <?php $minEv = min($arrEv); ?>
                                                @endforeach
                                                {{-- End Nyari Nilai Max --}}
                                                @foreach ($revision as $rev3)
                                                    <?php $alternative = DetailProject::where('id', $rev3->detail_project_id)->get();
                                                    $reference = Reference::all();
                                                    
                                                    $complexity = $rev3->complexity_id / sqrt($divider);
                                                    $ev_time = $rev3->evaluasi / sqrt($divider_time);
                                                    $comp = $complexity * $reference[0]->bobot;
                                                    $ev = $ev_time * $reference[1]->bobot;
                                                    ?>
                                                    <?php $rev = DB::table('monitoring_projects')
                                                        ->select('revision')
                                                        ->where('detail_project_id', '=', $rev3->detail_project_id)
                                                        ->get(); ?>
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
                                                    @elseif ($i <= 4)
                                                        <?php $revision = ($i + 1) / sqrt($pembagiRevisi);
                                                        $revision2 = $revision * $reference[2]->bobot;
                                                        ?>
                                                    @endif
                                                    <!-- menentukan ideal positif D+ -->
                                                    <?php $d1Pos = $maxComp - $comp; ?>
                                                    <?php $d2Pos = $maxEv - $ev; ?>
                                                    <?php $d3Pos = $minRev - $revision2; ?>
                                                    <?php
                                                    $dPlus1 = pow($d1Pos, 2);
                                                    $dPlus2 = pow($d2Pos, 2);
                                                    $dPlus3 = pow($d3Pos, 2);
                                                    $sumDplus = sqrt($dPlus1 + $dPlus2 + $dPlus3);
                                                    ?>
                                                    <!-- menentukan ideal negatif D- -->
                                                    <?php $d1Neg = $minComp - $comp; ?>
                                                    <?php $d2Neg = $minEv - $ev; ?>
                                                    <?php $d3Neg = $maxRev - $revision2; ?>
                                                    <?php
                                                    $dMin1 = pow($d1Neg, 2);
                                                    $dMin2 = pow($d2Neg, 2);
                                                    $dMin3 = pow($d3Neg, 2);
                                                    $sumDmin = sqrt($dMin1 + $dMin2 + $dMin3);
                                                    $pembagiPref = $sumDmin + $sumDplus;
                                                    $preferensi = $sumDmin / $pembagiPref;
                                                    // $collect = collect($preferensi);
                                                    // $sorted = $collect->sortDesc();
                                                    //insert to database
                                                    $preferensiInsert = Preference::create([
                                                        'detail_project_id' => $alternative[0]->id,
                                                        'user_id' => $alternative[0]->user_id,
                                                        'preferensi' => $preferensi,
                                                    ]);
                                                    ?>
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $alternative[0]->id }}</td>
                                                        <td>{{ $alternative[0]->jobdesc }}</td>
                                                        <td>{{ $preferensi }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (request()->is('dashboard/admin/tab7'))
                    <div class="tab-pane {{ request()->is('dashboard/admin/tab7') ? 'active' : '' }}"
                        id="{{ url('dashboard/admin/tab7') }}" role="tabpanel">
                        <h2 class="m-3">Peringkat Detail Pekerjaan</h2>
                        {{-- {{ dd($reference) }} --}}
                        <div class="card m-3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Peringkat</th>
                                                <th scope="col">Detail Pekerjaan <span
                                                        class="badge badge-success">Alternatif</span></th>
                                                <th scope="col">Nilai Preferensi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{ dd($preferensi) }} --}}
                                            @foreach ($preferensi as $pref)
                                                <tr>
                                                    @if ($loop->first)
                                                        <td><span class="badge badge-success">Peringkat
                                                                {{ $loop->iteration }}</span></td>
                                                        <td>{{ $pref->detail_projects->jobdesc }}</td>
                                                        <td>{{ $pref->preferensi }}</td>
                                                    @else
                                                        <td><span class="badge badge-warning">Peringkat
                                                                {{ $loop->iteration }}</span></td>
                                                        <td>{{ $pref->detail_projects->jobdesc }}</td>
                                                        <td>{{ $pref->preferensi }}</td>
                                                    @endif

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <h1>not found.</h1>
                @endif

            </div>
        </div>
    </div>
@endsection
