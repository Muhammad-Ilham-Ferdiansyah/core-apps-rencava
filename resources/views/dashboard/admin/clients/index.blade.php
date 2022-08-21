@extends('dashboard.layouts.main')
@section('title', 'Data Klien')
@section('container')
    <div class="contain-wrapper">
        {{-- {{ dd($roles) }} --}}
        <div class="row m-3">
            <div class="col-lg-6">
                <a href="/dashboard/admin/clients/create" class="btn btn-primary text-white me-0"><i
                        class="mdi mdi-plus me-2"></i>Add Client</a>
            </div>
        </div>
        <hr class="me-4 ms-4">
        <div class="row row-cols-1 row-cols-md-4 g-4 me-2 ms-2">
            @foreach ($clients as $client)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $client->client_image) }}" class="card-img-top"
                            alt="{{ $client->client_name }}">
                        <div class="card-body">
                            <h5 class="card-title lh-base">{{ $client->client_name }}</h5>
                            <p class="card-text">{{ $client->address }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="/dashboard/admin/clients/{{ $client->id }}/edit"
                                class="badge btn-primary text-decoration-none"><i class="mdi mdi-pencil me-2"></i>Update</a>
                            <a href="#" class="badge btn-danger text-decoration-none delete-client"
                                data-id="{{ $client->id }}" data-name="{{ $client->client_name }}"><i
                                    class="mdi mdi-delete me-2"></i>Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        {{-- <div class="d-flex justify-content-end">
                    {{ $users->links() }}
                </div> --}}
    </div>
@endsection
