@extends('dashboard.layouts.main')

@section('container')
    <div class="contain-wrapper">
        <div class="card m-3">
            <div class="card-body">
                <h4 class="card-title">Create Product</h4>
                <p class="card-description">
                    Create product here.
                </p>
                <form class="forms-sample" method="POST" action="/dashboard/admin/products">
                    @csrf
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                            id="product_name" name="product_name" placeholder="Product Name"
                            value="{{ old('product_name') }}">
                        @error('product_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_desc">Product Description</label>
                        <input type="text" class="form-control @error('product_desc') is-invalid @enderror"
                            id="product_desc" name="product_desc" placeholder="Product Description"
                            value="{{ old('product_desc') }}">
                        @error('product_desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <a href="javascript:void(0);" onclick="location.href='/dashboard/admin/products/store'"
                            class="text-decoration-none">
                            <button class="btn btn-primary">Create
                            </button>
                        </a>
                        <a href="/dashboard/admin/products" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
