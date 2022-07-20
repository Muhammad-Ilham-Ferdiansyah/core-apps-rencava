@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Edit Role</h4>
                <p class="card-description">
                    Edit role here.
                </p>
                <form class="forms-sample" method="POST" action="/dashboard/admin/roles/{{ $role->id }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Fullname" value="{{ old('name', $role->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="guard_name">Guard Name</label>
                        <select name="guard_name" class="form-control text-dark @error('guard_name') is-invalid @enderror">
                            <option value="web" {{ $role->guard_name == 'web' ? 'selected' : '' }}>
                                Web
                            </option>
                            <option value="api" {{ $role->guard_name == 'api' ? 'selected' : '' }}>
                                Api
                            </option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/roles/update'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Update
                            </button>
                        </a>
                        <a href="/dashboard/admin/roles" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
