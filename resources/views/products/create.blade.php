@extends('layouts.app')
@section('title', 'Add Product')

@section('content')

<div class="form-container">

    <h2 class="text-center mb-4">Add Product</h2>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <input class="form-control mb-3" type="text" name="product_name" placeholder="Product Name" value="{{ old('product_name') }}">
        <input class="form-control mb-3" type="text" name="product_price" placeholder="Price" value="{{ old('product_price') }}">

        <select class="form-select mb-3" name="category_id">
            <option value="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
            @endforeach
        </select>

        <button class="btn btn-primary w-100" type="submit">Save</button>
    </form>
</div>

@endsection