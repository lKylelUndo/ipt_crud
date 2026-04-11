@extends('layouts.app')
@section('title', 'Add Category')

@section('content')

<div class="form-container">
    <h2 class="text-center mb-4">Add Category</h2>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label" for="category_name">Category name</label>
            <input
                id="category_name"
                class="form-control @error('category_name') is-invalid @enderror"
                type="text"
                name="category_name"
                placeholder="Category name"
                value="{{ old('category_name') }}"
                maxlength="100"
                required
            >
            @error('category_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary w-100" type="submit">Save</button>
    </form>
</div>

@endsection
