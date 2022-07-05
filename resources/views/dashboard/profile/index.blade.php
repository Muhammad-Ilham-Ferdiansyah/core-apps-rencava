@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3" style="max-width: 640px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src=" {{ asset('storage/' . $users[0]->image) }}" class="img-fluid rounded-start"
                        style="min-height: 215px;" alt="Profile Image">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $users[0]->name }}</h5>
                        <p class="card-text">{{ $users[0]->username }}</p>
                        <p class="card-text">{{ $users[0]->email }}</p>
                        @role('Admin')
                            <h5 class="card-title badge text-bg-primary">Administrator</h5>
                        @else
                            <h5 class="card-title badge text-bg-warning">User</h5>
                        @endrole
                        <p class="card-text"><small
                                class="text-muted">{{ $users[0]->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-0 m-3">
            <div class="col-md-4">
                <a href="/dashboard/profile/edit" class="btn btn-primary">
                    <div class="d-flex align-self-center">
                        <i class="mdi mdi-border-color">&nbsp;</i>
                        Edit Profile
                    </div>
                </a>
                <a href="/dashboard/password/edit" class="btn btn-outline-dark">
                    <div class="d-flex align-self-center">
                        <i class="mdi mdi-key-variant">&nbsp;</i>
                        Change Password
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
