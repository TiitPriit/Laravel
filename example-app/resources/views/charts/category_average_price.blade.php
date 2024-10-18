@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Category Average Prices</h1>
        <div>{!! $chart->container() !!}</div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        {!! $chart->script() !!}
    </div>
@endsection