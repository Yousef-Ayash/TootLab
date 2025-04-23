@extends('layouts.app')
@section('title', 'Create Step')
@section('content')
    <div class="page">
        <h1 class="page-title">New Step</h1>
        <form method="POST" action="{{ route('admin.steps.store') }}">
            @include('admin.steps._form')
        </form>
    </div>
@endsection
