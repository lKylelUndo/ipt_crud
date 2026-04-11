@extends('layouts.app')
@section('title', 'Add Category')

@section('content')

<div class="form-container">
    <h2 class="text-center mb-4">Add Category</h2>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <input class="form-control mb-3" type="text" name="cat_name" placeholder="Category Name" value="{{ old('cat_name') }}">
        <input class="form-control mb-3" type="text" name="cat_color" placeholder="Category Color" value="{{ old('cat_color') }}">

        <button class="btn btn-primary w-100" type="submit">Save</button>
    </form>
</div>

@endsection