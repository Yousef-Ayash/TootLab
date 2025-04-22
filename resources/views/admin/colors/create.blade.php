@extends('layouts.app')

@section('title', 'Create Color')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Create New Color</h1>

        <form method="POST" action="{{ route('admin.colors.store') }}">
            @include('admin.colors._form')
        </form>
    </div>
@endsection
