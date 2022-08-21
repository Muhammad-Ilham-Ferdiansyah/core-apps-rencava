@extends('dashboard.layouts.main')
@section('title', 'Data Roles')
@section('container')
    <div class="contain-wrapper">
        {{-- {{ dd($roles) }} --}}
        <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/admin/roles/create" class="btn btn-primary text-white me-0"><i
                        class="mdi mdi-plus me-2"></i>Create Role</a>
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
                                <th scope="col">Nama Role</th>
                                <th scope="col">Jumlah User</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    {{-- nama role --}}
                                    @if ($role->id == 1)
                                        <td>
                                            <div class="badge badge-opacity-success">
                                                {{ $role->name }}
                                            </div>
                                        </td>
                                    @elseif ($role->id == 2)
                                        <td>
                                            <div class="badge badge-opacity-warning">
                                                {{ $role->name }}
                                            </div>
                                        </td>
                                    @elseif ($role->id == 3)
                                        <td>
                                            <div class="badge badge-opacity-primary">
                                                {{ $role->name }}
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="badge badge-opacity-info">
                                                {{ $role->name }}
                                            </div>
                                        </td>
                                    @endif
                                    {{-- jumlah user --}}
                                    <td>
                                        {{ $role->users_count }}
                                    </td>
                                    <td>
                                        {{ $role->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="location.href='/dashboard/admin/roles/{{ $role->id }}/edit'"><i
                                                        class="mdi mdi-pencil me-2"></i>Update</a>
                                                <div class="dropdown-divider"></div>
                                                <button class="dropdown-item text-danger delete-role"
                                                    data-id="{{ $role->id }}" data-name="{{ $role->name }}"
                                                    href="#" name="delete-role"><i class="mdi mdi-delete me-2"></i>
                                                    Delete</button>
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
