@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3" style="max-width: 640px;">
            <div class="card-body">
                <h4 class="card-title">Change Password</h4>
                <p class="card-description">
                    Change your password here.
                </p>
                <form action="/dashboard/password/update" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input class="form-control p-4 @error('current_password') is-invalid @enderror" id="current_password"
                            name="current_password" type="password">
                        @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input class="form-control p-4 @error('password') is-invalid @enderror" id="password" name="password"
                            type="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">New Password Confirmation</label>
                        <input class="form-control p-4 @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" type="password">
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='{{ url('dashboard/password/edit') }}'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Update
                                Password</button>
                        </a>
                        <a href="/dashboard/profile" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
