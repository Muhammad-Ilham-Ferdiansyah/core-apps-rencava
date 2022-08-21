@extends('dashboard.layouts.main')
@section('title', 'Dashboard')
@section('container')
    <div class="contain-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="statistics-details d-flex align-items-center justify-content-start m-4">
                    <div class="card p-3">
                        <div>
                            <p class="statistics-title text-center">Total Users</p>
                            <h3 class="rate-percentage justify-content-center text-dark"><i
                                    class="mdi mdi-account-multiple"></i> {{ Auth::user()->count() }}
                            </h3>
                        </div>
                    </div>
                    <div class="card p-3 m-3">
                        <div>
                            <p class="statistics-title text-center">Total Roles</p>
                            <h3 class="rate-percentage justify-content-center text-dark"><i class="mdi mdi-account-key"></i>
                                {{ $roles }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
