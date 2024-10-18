<!-- resources/views/categories/products_by_first_letter.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Products Count by First Letter</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Letter</th>
                    <th>Product Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->first_letter }}</td>
                        <td>{{ $product->product_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection