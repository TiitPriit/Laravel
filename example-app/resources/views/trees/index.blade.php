@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of Trees</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trees as $tree)
                    <tr>
                        <td>{{ $tree->id }}</td>
                        <td>{{ $tree->name }}</td>
                        <td>{{ $tree->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection