@extends('layouts.app')

@section('title', 'Choose Role')

@section('content')
    <div class="role-select">
        <h1 class="page-title">Login As</h1>
        <a href="{{ route('login', ['role' => 'doctor']) }}" class="btn btn--role btn--doctor">
            Doctor
        </a>
        <a href="{{ route('login', ['role' => 'employee']) }}" class="btn btn--role btn--employee">
            Employee / Admin
        </a>
    </div>
@endsection
