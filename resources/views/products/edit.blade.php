@extends('layouts.app')
@section('title', 'Edit Product')

@section('content')

<div class="form-container mx-auto mt-5 p-4 rounded shadow">

    <h2 class="text-center mb-4">Edit Product</h2>

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <input class="form-control mb-3" type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}">
        <input class="form-control mb-3" type="text" name="product_price" value="{{ old('product_price', $product->product_price) }}">

        <select class="form-select mb-3" name="category_id">
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->cat_name }}
            </option>
            @endforeach
        </select>

        <button class="btn btn-success w-100" type="submit">Update</button>
    </form>
</div>

@endsection