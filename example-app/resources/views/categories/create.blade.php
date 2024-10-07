@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <button type="submit">Add Category</button>
        </form>
    </div>
@endsection