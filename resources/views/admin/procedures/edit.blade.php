@extends('layouts.app')
@section('title', 'Edit Procedure')
@section('content')
    <div class="page">
        <h1 class="page-title">Edit Procedure</h1>
        <template id="step-template">
            @include('admin.procedures._form', ['procedure' => null])
        </template>
        <form method="POST" action="{{ route('admin.procedures.update', $procedure) }}">
            @method('PUT')
            @include('admin.procedures._form')
        </form>
    </div>
    @push('scripts')
        <script>
            // same JS as create
        </script>
    @endpush
@endsection
