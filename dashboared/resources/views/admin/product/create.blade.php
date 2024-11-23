@extends('layouts.master')

@section('title', 'Category')
@section('name', 'Add Category')

@section('content')
<div class="container-fuild px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Add Product</h1>
        </div>

        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ( $errors->all() as $error )
                    <div>{{ $errors }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/add-product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Product Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Product Description</label>
                    <input type="text" name="description" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Product Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Product Price</label>
                    <input type="text" name="price" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Product Category</label>
                    <input type="text" name="category_id" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Product Quantity</label>
                    <input type="text" name="quantity" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Product Size</label>
                    <input type="text" name="size" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Product color</label>
                    <input type="text" name="color" class="form-control">
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary ">Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection