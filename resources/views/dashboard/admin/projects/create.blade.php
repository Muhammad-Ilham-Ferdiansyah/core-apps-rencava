@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Add Project</h4>
                <p class="card-description">
                    Add project here.
                </p>
                <form class="forms-sample" method="POST" action="/dashboard/admin/projects">
                    @csrf
                    <div class="form-group">
                        <label for="project_name">Nama Proyek</label>
                        <input type="text" class="form-control @error('project_name') is-invalid @enderror"
                            id="project_name" name="project_name" placeholder="Project Name"
                            value="{{ old('project_name') }}">
                        @error('project_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="client_id" class="col-sm-3">Nama Klien</label>
                        <select name="client_id" class="form-control text-dark @error('client_id') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Klien</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}"
                                    {{ Request::old('client_id') == $client->id ? 'selected' : '' }}>
                                    {{ $client->client_name }}</option>
                            @endforeach
                            @error('client_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-floating">
                            <textarea class="form-control @error('technology') is-invalid @enderror" placeholder="Technology" id="technology"
                                name="technology" style="height: 100px">{{ Request::old('technology') }}</textarea>
                            <label for="technology">Technology</label>
                            @error('technology')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="budget">Budget</label>
                        <input type="text" class="form-control @error('budget') is-invalid @enderror" id="budget"
                            name="budget" placeholder="Budget Project" value="{{ old('budget') }}">
                        @error('budget')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="contract">Contract</label>
                            <input type="date" class="form-control @error('contract') is-invalid @enderror"
                                id="contract" name="contract" placeholder="Contract Start"
                                value="{{ old('contract') }}">
                            @error('contract')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/projects/store'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Add
                            </button>
                        </a>
                        <a href="/dashboard/admin/projects" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
