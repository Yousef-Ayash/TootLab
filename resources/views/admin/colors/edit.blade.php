@extends('layouts.app')

@section('title', 'Edit Procedure')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Edit Procedure</h1>
        <form method="POST" action="{{ route('admin.procedures.update', $procedure) }}">
            @method('PUT')
            @include('admin.procedures._form', ['procedure' => $procedure])
        </form>
    </div>
@endsection
