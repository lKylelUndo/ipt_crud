@extends('layouts.app')
@section('title', 'Products List')

@section('content')

<div class="page-container mx-auto mt-5 p-4 rounded shadow">

    <h2 class="mb-3">Products</h2>

    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-primary" href="{{ route('products.create') }}">
            + Add Product
        </a>
    </div>
    <table class="table table-hover text-center align-middle">
        <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Price</th>
                <th class="text-center">Category</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="text-center">{{ $product->product_name }}</td>
                <td class="text-center">₱ {{ $product->product_price }}</td>
                <td class="text-center">
                    <span class="category-badge" style="background-color: {{ $product->category->cat_color ?? '#000' }}">
                        {{ $product->category->cat_name ?? 'N/A' }}
                    </span>
                </td>
                <td>
                    <a class="btn btn-edit btn-sm" href="{{ route('products.edit', $product->id) }}">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection