@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Add Detail Project</h4>
                <p class="card-description">
                    Add detail project here.
                </p>
                <form class="forms-sample" method="POST" action="/dashboard/admin/detail_projects">
                    @csrf
                    <div class="form-group">
                        <label for="project_id" class="col-sm-3">Nama Project</label>
                        <select name="project_id" class="form-control text-dark @error('project_id') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    {{ Request::old('project_id') == $project->id ? 'selected' : '' }}>
                                    {{ $project->project_name }}</option>
                            @endforeach
                            @error('project_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_id" class="col-sm-3 mt-1">Product Name</label>
                        @foreach ($products as $product)
                            <div class="form-check mx-sm-2">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="product_id[]"
                                        value="{{ $product->id }}">
                                    {{ $product->product_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/detail_projects/store'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Add
                            </button>
                        </a>
                        <a href="/dashboard/admin/detail_projects" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
