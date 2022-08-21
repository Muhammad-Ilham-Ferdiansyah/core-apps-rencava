@extends('dashboard.layouts.main')
@section('title', 'Data Referensi')
@section('container')
    <div class="contain-wrapper">
        {{-- {{ dd($roles) }} --}}
        {{-- <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/admin/setup_reference/create" class="btn btn-primary text-white me-0"><i
                        class="mdi mdi-plus me-2"></i>Tambah Bobot Penilaian</a>
            </div>
        </div> --}}
        <hr class="m-4">
        <div class="card m-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Bobot</th>
                                <th scope="col">Bobot</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($setup_references as $reference)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $reference->reference_name }}
                                    </td>
                                    <td>
                                        {{ $reference->bobot }}
                                    </td>
                                    <td>
                                        {{-- <a class="dropdown-item" href="javascript:void(0);"
                                            onclick="location.href='/dashboard/admin/setup_reference/{{ $reference->id }}/edit'"><i
                                                class="mdi mdi-pencil me-2"></i>Update</a> --}}
                                        <button type="button" class="btn btn-success btn-icon-text p-2"
                                            onclick="location.href='/dashboard/admin/setup_reference/{{ $reference->id }}/edit'">
                                            <i class="mdi mdi-pencil me-2"></i>
                                            Update
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
