@extends('layouts.app')
@section('title', 'Edit Product')

@section('content')

<div class="form-container mx-auto mt-5 p-4 rounded shadow">

    <h2 class="text-center mb-4">Edit Product</h2>

    <form method="POST" action="{{ route('products.update', $product->id) }}" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label" for="product_name">Product name</label>
            <input
                id="product_name"
                class="form-control @error('product_name') is-invalid @enderror"
                type="text"
                name="product_name"
                value="{{ old('product_name', $product->product_name) }}"
                required
            >
            @error('product_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="product_price">Price</label>
            <input
                id="product_price"
                class="form-control @error('product_price') is-invalid @enderror"
                type="text"
                inputmode="decimal"
                name="product_price"
                value="{{ old('product_price', $product->product_price) }}"
                required
            >
            @error('product_price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="product_quantity">Quantity</label>
            <input
                id="product_quantity"
                class="form-control @error('product_quantity') is-invalid @enderror"
                type="number"
                name="product_quantity"
                min="0"
                step="1"
                value="{{ old('product_quantity', $product->product_quantity) }}"
                required
            >
            @error('product_quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="category_id">Category</label>
            <select
                id="category_id"
                class="form-select @error('category_id') is-invalid @enderror"
                name="category_id"
                required
            >
                <option value="">Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected((string) old('category_id', $product->category_id) === (string) $category->id)>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success w-100" type="submit">Update</button>
    </form>
</div>

@endsection
