@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Edit Bobot</h4>
                <form class="forms-sample" method="POST" action="/dashboard/admin/setup_reference/{{ $references[0]->id }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        {{-- {{ dd($references[0]) }} --}}
                        <label for="reference_name">Nama Kriteria</label>
                        <input type="text" class="form-control @error('reference_name') is-invalid @enderror"
                            id="reference_name" name="reference_name" placeholder="{{ $references[0]->reference_name }}"
                            value="{{ $references[0]->reference_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="bobot" class="col-sm-3">Bobot</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label" for="bobot1">
                                        <input type="radio" class="form-check-input" name="bobot" id="bobot1"
                                            value="1" {{ $references[0]->bobot == 1 ? 'checked' : '' }}>
                                        1 - Tidak Penting
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="bobot2">
                                        <input type="radio" class="form-check-input" name="bobot" id="bobot2"
                                            value="2" {{ $references[0]->bobot == 2 ? 'checked' : '' }}>
                                        2 - Kurang Penting
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="bobot3">
                                        <input type="radio" class="form-check-input" name="bobot" id="bobot3"
                                            value="3" {{ $references[0]->bobot == 3 ? 'checked' : '' }}>
                                        3 - Cukup Penting
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="bobot4">
                                        <input type="radio" class="form-check-input" name="bobot" id="bobot4"
                                            value="4" {{ $references[0]->bobot == 4 ? 'checked' : '' }}>
                                        4 - Penting
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="bobot5">
                                        <input type="radio" class="form-check-input" name="bobot" id="bobot5"
                                            value="5" {{ $references[0]->bobot == 5 ? 'checked' : '' }}>
                                        5 - Sangat Penting
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/setup_reference/update'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Update
                            </button>
                        </a>
                        <a href="/dashboard/admin/setup_reference" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
