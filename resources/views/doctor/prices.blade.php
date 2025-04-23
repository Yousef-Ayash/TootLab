@extends('layouts.app')
@section('title', 'Price List')
@section('content')
    <div class="page">
        <h1 class="page-title">Price List</h1>
        @foreach ($procedures as $p)
            <div class="card flex justify-between">
                <div>
                    <strong>{{ $p->name }}</strong>
                    <p>{{ $p->description }}</p>
                </div>
                <p>{{ number_format($p->cost, 2) }} €</p>
            </div>
        @endforeach
    </div>
@endsection
