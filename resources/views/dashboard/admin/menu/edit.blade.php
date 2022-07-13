@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Edit Menu</h4>
                <p class="card-description">
                    Edit menu here.
                </p>
                <form class="forms-sample" method="POST" action="/dashboard/admin/menu/{{ $menu->id }}">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="menu_name" class="col-sm-3 mt-1">Menu Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('menu_name') is-invalid @enderror"
                                        id="menu_name" name="menu_name" placeholder="Menu Name"
                                        value="{{ old('menu_name', $menu->menu_name) }}">
                                    @error('menu_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="main_id" class="col-sm-3">Menu Induk</label>
                                <div class="col-sm-9">
                                    <select name="main_id" class="form-control @error('main_id') is-invalid @enderror">
                                        <option value="">Pilih Menu Induk</option>
                                        @foreach ($menu_name as $m)
                                            <option value="{{ $m->id }}"
                                                {{ $menu->main_id == $m->id ? 'selected' : '' }}>
                                                {{ $m->menu_name }}</option>
                                        @endforeach
                                        @error('main_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="link" class="col-sm-3 mt-1">Link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('link') is-invalid @enderror"
                                        id="link" name="link" placeholder="Link"
                                        value="{{ old('link', $menu->link) }}">
                                    @error('link')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="orderno" class="col-sm-3 mt-1">Nomor Urut</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('orderno') is-invalid @enderror"
                                        id="orderno" name="orderno" placeholder="Nomor Urut"
                                        value="{{ old('orderno', $menu->orderno) }}">
                                    @error('orderno')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="icon" class="col-sm-3 mt-1">Icon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                        id="icon" name="icon" placeholder="Icon"
                                        value="{{ old('icon', $menu->icon) }}">
                                    @error('icon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="published" class="col-sm-3 mt-1">Published</label>
                                <div class="col-sm-9">
                                    <div class="form-check mx-sm-2">
                                        <label class="form-check-label">
                                            @if ($menu->published == 1)
                                                <input type="checkbox" class="form-check-input" name="published" checked>
                                                Yes
                                            @else
                                                <input type="checkbox" class="form-check-input" name="published">
                                                Yes
                                            @endif
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- {{ dd($menu->menu_desc) }} --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="menu_desc" class="col-sm-3">Menu Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('menu_desc') is-invalid @enderror"
                                        id="menu_desc" name="menu_desc" placeholder="Menu Description"
                                        value="{{ old('menu_desc', $menu->menu_desc) }}">
                                    @error('menu_desc')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/menu/update'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Update
                            </button>
                        </a>
                        <a href="/dashboard/admin/menu" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
