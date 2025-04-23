@extends('layouts.app')
@section('title', 'Edit Step')
@section('content')
    <div class="page">
        <h1 class="page-title">Edit Step</h1>
        <form method="POST" action="{{ route('admin.steps.update', $step) }}">
            @method('PUT')
            @include('admin.steps._form')
        </form>
    </div>
@endsection
