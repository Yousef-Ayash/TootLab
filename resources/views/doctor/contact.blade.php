@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')
    <div class="page">
        <h1 class="page-title">Contact Us</h1>
        <div class="stack">
            @foreach ($social as $k => $url)
                <a href="{{ $url }}" target="_blank" class="card flex justify-between">
                    <span>{{ ucfirst($k) }}</span><span>→</span>
                </a>
            @endforeach
        </div>
    </div>
@endsection
