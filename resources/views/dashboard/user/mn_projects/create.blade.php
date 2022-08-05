@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Add Detail Project</h4>
                <form class="forms-sample" method="POST" action="/dashboard/user/mn_projects" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="detail_project_id" class="col-sm-3">Nama Proyek</label>
                        <select name="detail_project_id"
                            class="form-control text-dark @error('detail_project_id') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Project</option>
                            @foreach ($detail_projects as $dt_project)
                                <option value="{{ $dt_project->id }}"
                                    {{ Request::old('detail_project_id') == $dt_project->id ? 'selected' : '' }}>
                                    {{ $dt_project->project->project_name . ' - ' . $dt_project->jobdesc }}</option>
                            @endforeach
                            @error('detail_project_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_progress">Tanggal</label>
                        <input type="date" class="form-control @error('date_progress') is-invalid @enderror"
                            id="date_progress" name="date_progress" placeholder="Tanggal"
                            value="{{ old('date_progress') }}">
                        @error('date_progress')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc_progress">Deskripsi Progress</label>
                        <input type="text" class="form-control @error('desc_progress') is-invalid @enderror"
                            id="desc_progress" name="desc_progress" placeholder="Deskripsi Progress"
                            value="{{ old('desc_progress') }}">
                        @error('desc_progress')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="progress">Persentase Progress</label>
                                <div class="input-group">
                                    <input type="text" id="progress"
                                        name="progress"class="form-control @error('progress') is-invalid @enderror"
                                        aria-label="Percentage" placeholder="Persentase Progress">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white">%</span>
                                    </div>
                                    @error('progress')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="evidence" class="form-label">Evidence</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5 rounded-xl">
                        <input type="file" class="form-control pb-4 @error('evidence') is-invalid @enderror"
                            id="evidence" name="evidence" onchange="previewImage()">
                        @error('evidence')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/user/mn_projects/store'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Add
                            </button>
                        </a>
                        <a href="/dashboard/user/mn_projects/" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
        //preview image
        function previewImage() {
            const image = document.querySelector('#evidence');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
