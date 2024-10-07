@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ $product->description }}</textarea>
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" step="0.01" id="price" name="price" value="{{ $product->price }}" required>
            </div>
            <div>
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Update Product</button>
        </form>
    </div>
@endsection