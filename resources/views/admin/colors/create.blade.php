@extends('layouts.app')
@section('title', 'Edit Color')
@section('content')
    <div class="page">
        <h1 class="page-title">Edit Color</h1>
        <form method="POST" action="{{ route('admin.colors.update', $color) }}">
            @method('PUT')
            @include('admin.colors._form')
        </form>
    </div>
@endsection
