@extends('layouts.app')
@section('title', 'Doctor Dashboard')
@section('content')
    <div class="page">
        <div class="hero"></div>
        <h1 class="page-title">Welcome, Dr. {{ auth()->user()->username }}</h1>
        <div class="grid grid--2">
            <a href="{{ route('doctor.orders.index') }}" class="card">My Work</a>
            <a href="{{ route('doctor.orders.create') }}" class="card">New Order</a>
            <a href="{{ route('doctor.finance') }}" class="card">Finance</a>
            <a href="{{ route('doctor.prices') }}" class="card">Price List</a>
            <a href="{{ route('doctor.contact') }}" class="card card--full">Contact Us</a>
        </div>
    </div>
@endsection
