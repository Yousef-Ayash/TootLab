@extends('layouts.app')
@section('title', 'Employee Dashboard')
@section('content')
    <div class="page">
        <h1 class="page-title">Welcome, {{ auth()->user()->username }}</h1>
        <a href="{{ route('employee.steps.index') }}" class="btn btn--primary btn--block">
            View Assigned Steps
        </a>
    </div>
@endsection
