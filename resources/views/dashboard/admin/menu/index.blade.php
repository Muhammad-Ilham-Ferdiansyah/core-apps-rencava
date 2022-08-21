@extends('dashboard.layouts.main')
@section('title', 'Data Menu')
@section('container')
    <div class="contain-wrapper">
        <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/admin/menu/create" class="btn btn-primary text-white me-0"><i
                        class="mdi mdi-plus me-2"></i>Create Menu</a>
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
                                <th scope="col">Nama Menu</th>
                                <th scope="col">Link</th>
                                <th scope="col">Published</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($app_menus as $menu)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $menu->menu_name }}
                                    </td>
                                    <td>
                                        {{ $menu->link }}
                                    </td>
                                    <td>
                                        @if ($menu->published == 1)
                                            <div class="badge badge-opacity-success">
                                                Yes
                                            </div>
                                        @else
                                            <div class="badge badge-opacity-danger">
                                                No
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $menu->created_at->diffForHumans() }}
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
                                                    onclick="location.href='/dashboard/admin/menu/{{ $menu->id }}/edit'"><i
                                                        class="mdi mdi-pencil me-2"></i>Update</a>
                                                <div class="dropdown-divider"></div>
                                                <button class="dropdown-item text-danger delete-menu"
                                                    data-id="{{ $menu->id }}" data-name="{{ $menu->menu_name }}"
                                                    href="#" name="delete-menu"><i class="mdi mdi-delete me-2"></i>
                                                    Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
