@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ $category->description }}</textarea>
            </div>
            <button type="submit">Update Category</button>
        </form>
    </div>
@endsection