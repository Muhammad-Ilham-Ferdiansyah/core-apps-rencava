@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Create Role</h4>
                <p class="card-description">
                    Create role here.
                </p>
                <form class="forms-sample" method="POST" action="/dashboard/admin/roles">
                    @csrf
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Role Name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="guard_name">Guard Name</label>
                        <select name="guard_name" class="form-control @error('guard_name') is-invalid @enderror">
                            <option value="web">
                                Web
                            </option>
                            <option value="api">
                                Api
                            </option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/roles/store'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Create
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
