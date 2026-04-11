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
        <li class="list-group-item d-flex justify-content-between align-items-center text-center">
            {{ $category->cat_name }}
            <span class="badge category-color"
                  style="background-color: {{ $category->cat_color }};
                         color: {{ in_array(strtolower($category->cat_color), ['#ffffff','white','rgb(255,255,255)']) ? '#000' : '#fff' }};">
                {{ $category->cat_color }}
            </span>
        </li>
        @endforeach
    </ul>
</div>

@endsection