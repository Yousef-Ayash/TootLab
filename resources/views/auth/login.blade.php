@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="page">
        <h1 class="page-title">Login as {{ ucfirst($role) }}</h1>
        <form method="POST" action="{{ route('login') }}" class="form">
            @csrf
            <input type="hidden" name="role" value="{{ $role }}">

            <label class="form-label" for="username">Username</label>
            <input id="username" name="username" type="text" value="{{ old('username') }}" class="form-input" required
                autofocus>
            @error('username')
                <p class="form-error">{{ $message }}</p>
            @enderror

            <label class="form-label" for="password">Password</label>
            <input id="password" name="password" type="password" class="form-input" required>
            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror

            @error('login')
                <p class="form-error">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn--primary btn--block">Login</button>
        </form>
    </div>
@endsection
