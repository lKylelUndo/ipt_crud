@extends('layouts.app')
@section('title', 'Add Product')

@section('content')

<div class="form-container">

    <h2 class="text-center mb-4">Add Product</h2>

    <form method="POST" action="{{ route('products.store') }}" novalidate>
        @csrf

        <div class="mb-3">
            <label class="form-label" for="product_name">Product name</label>
            <input
                id="product_name"
                class="form-control @error('product_name') is-invalid @enderror"
                type="text"
                name="product_name"
                placeholder="Product name"
                value="{{ old('product_name') }}"
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
                placeholder="0.00"
                value="{{ old('product_price') }}"
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
                placeholder="0"
                value="{{ old('product_quantity') }}"
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
                    <option value="{{ $category->id }}" @selected((string) old('category_id') === (string) $category->id)>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary w-100" type="submit">Save</button>
    </form>
</div>

@endsection
