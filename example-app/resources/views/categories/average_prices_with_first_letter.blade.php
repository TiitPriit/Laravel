@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Category Average Prices</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Average Price</th>
                    <th>Product Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ number_format($category->average_price, 2) }}</td>
                        <td>{{ $category->product_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h1 class="mt-5">Products Count by First Letter within Each Category</h1>
        @foreach ($categories as $category)
            <h2>{{ $category->name }}</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>First Letter</th>
                        <th>Product Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->products as $product)
                        <tr>
                            <td>{{ $product->first_letter }}</td>
                            <td>{{ $product->product_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
@endsection