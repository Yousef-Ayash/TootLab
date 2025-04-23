@extends('layouts.app')
@section('title', 'Create Procedure')
@section('content')
    <div class="page">
        <h1 class="page-title">New Procedure</h1>
        <template id="step-template">
            @include('admin.procedures._form', ['procedure' => null])
        </template>
        <form method="POST" action="{{ route('admin.procedures.store') }}">
            @include('admin.procedures._form')
        </form>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const cont = document.getElementById('steps-container');
                const btn = document.getElementById('add-step');
                const tmpl = document.getElementById('step-template').content;
                btn.onclick = () => {
                    const idx = cont.querySelectorAll('.step-row').length;
                    const clone = tmpl.cloneNode(true);
                    clone.querySelectorAll('[name]').forEach(f => {
                        f.name = f.name.replace(/steps\[\d+\]/, `steps[${idx}]`);
                        if (f.tagName === 'INPUT') f.value = '';
                        if (f.tagName === 'TEXTAREA') f.value = '';
                    });
                    cont.appendChild(clone);
                    cont.querySelectorAll('.remove-step').forEach(b => b.onclick = () => b.closest('.step-row')
                        .remove());
                };
                cont.querySelectorAll('.remove-step').forEach(b => b.onclick = () => b.closest('.step-row').remove());
            });
        </script>
    @endpush
@endsection
