@extends('dashboard.layouts.main')
@section('container')
    <div class="contain-wrapper">
        <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/admin/users/create" class="btn btn-primary text-white me-0"><i
                        class="icon-plus me-2"></i>Create User</a>
            </div>
        </div>
        {{-- {{ dd($users) }} --}}
        <hr class="m-4">
        <div class="card m-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <div class="d-flex">
                                            <img src="{{ asset('storage/' . $user->image) }}" alt="profile"
                                                class="me-3">
                                            <div>
                                                <h6 class="text-dark">{{ $user->name }}</h6>
                                                <p>
                                                    @if ($user->getRoleNames()->first() == 'Admin')
                                                        {{ $user->getRoleNames()->first() }}
                                                    @elseif ($user->getRoleNames()->first() == 'Project Manager')
                                                        {{ $user->getRoleNames()->first() }}
                                                    @elseif ($user->getRoleNames()->first() == 'Software Engineer')
                                                        {{ $user->getRoleNames()->first() }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
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
