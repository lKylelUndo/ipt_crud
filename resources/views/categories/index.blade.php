@extends('layouts.app')
@section('title', 'Category List')

@section('content')

<div class="page-container mx-auto mt-5 p-4 rounded shadow">

    <h2 class="mb-3">Categories</h2>

    <div class="d-flex justify-content-end gap-2 mb-3">
        <a class="btn btn-primary" href="{{ route('categories.create') }}">
            + Add Category
        </a>

        <a class="btn btn-secondary" href="{{ route('products.index') }}">
            Back to Products
        </a>
    </div>

    <ul class="list-group">
        @foreach($categories as $category)
        <li class="list-group-item text-center">
            {{ $category->category_name }}
        </li>
        @endforeach
    </ul>
</div>

@endsection
