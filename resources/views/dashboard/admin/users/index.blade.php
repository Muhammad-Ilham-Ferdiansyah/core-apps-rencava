@extends('dashboard.layouts.main')
@section('title', 'Data User')
@section('container')
    <div class="contain-wrapper">
        <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/admin/users/create" class="btn btn-primary text-white me-0"><i
                        class="mdi mdi-plus me-2"></i>Create User</a>
            </div>
        </div>
        <hr class="m-4">
        <div class="card m-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <div class="d-flex">
                                            <img src="{{ asset('storage/' . $user->image) }}" alt="profile" class="me-3">
                                            <div>
                                                <h6 class="text-dark">{{ $user->name }}</h6>
                                                <p>
                                                    @if ($user->roles->first()->id == 1)
                                                        <div class="badge badge-opacity-success">
                                                            {{ $user->getRoleNames()->first() }}
                                                        </div>
                                                    @elseif ($user->roles->first()->id == 2)
                                                        <div class="badge badge-opacity-warning">
                                                            {{ $user->getRoleNames()->first() }}
                                                        </div>
                                                    @elseif ($user->roles->first()->id == 3)
                                                        <div class="badge badge-opacity-primary">
                                                            {{ $user->getRoleNames()->first() }}
                                                        </div>
                                                    @else
                                                        <div class="badge badge-opacity-info">
                                                            {{ $user->getRoleNames()->first() }}
                                                        </div>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    @if ($user->is_banned == 0)
                                        <td>
                                            <div class="badge badge-opacity-success">Active</div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="badge badge-opacity-danger">Deactive</div>
                                        </td>
                                    @endif
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="location.href='/dashboard/admin/users/{{ $user->id }}/edit'"><i
                                                        class="mdi mdi-pencil me-2"></i>Update</a>
                                                <div class="dropdown-divider"></div>
                                                <button
                                                    class="dropdown-item {{ $user->is_banned == 0 ? 'text-danger' : 'text-success' }} deactive"
                                                    data-id="{{ $user->id }}" href="#" name="deactive-user"><i
                                                        class="{{ $user->is_banned == 0 ? 'mdi mdi-account-off me-2' : 'mdi mdi-account-check me-2' }}"></i>
                                                    {{ $user->is_banned == 0 ? 'Deactivate User' : 'Activate User' }}</button>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{-- <div class="d-flex justify-content-end">
                    {{ $users->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
