@extends('layouts.app')
@section('title', $product->product_name)

@section('content')

<div class="page-container mx-auto mt-5 p-4 rounded shadow" style="max-width: 32rem;">
    <h2 class="mb-3">{{ $product->product_name }}</h2>

    <dl class="row mb-0">
        <dt class="col-sm-4">Price</dt>
        <dd class="col-sm-8">₱ {{ number_format($product->product_price, 2) }}</dd>
        <dt class="col-sm-4">Quantity</dt>
        <dd class="col-sm-8">{{ $product->product_quantity }}</dd>
        <dt class="col-sm-4">Category</dt>
        <dd class="col-sm-8">{{ $product->category->category_name ?? 'N/A' }}</dd>
    </dl>

    <div class="d-flex gap-2 mt-4">
        <a class="btn btn-secondary" href="{{ route('products.index') }}">Back</a>
        <a class="btn btn-edit" href="{{ route('products.edit', $product) }}">Edit</a>
    </div>
</div>

@endsection
