@extends('layouts.app')
@section('title', 'Category List')

@section('content')

    <div class="page-container mx-auto mt-5 p-4 rounded shadow">

        <h2 class="mb-3">Categories</h2>

        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if (session('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif

        <div class="d-flex justify-content-end gap-2 mb-3">
            <a class="btn btn-primary" href="{{ route('categories.create') }}">
                + Add Category
            </a>

            <a class="btn btn-secondary" href="{{ route('products.index') }}">
                Back to Products
            </a>
        </div>

        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">

                    <span>{{ $category->category_name }}</span>

                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this category?')">
                            Delete
                        </button>
                    </form>

                </li>
            @endforeach
        </ul>
    </div>

@endsection
