@extends('layouts.app')
@section('title', 'New Order')
@section('content')
    <div class="page">
        <h1 class="page-title">New Order</h1>
        {{-- template --}}
        <template id="item-template">
            @include('doctor.orders._form', ['order' => null])
        </template>
        <form method="POST" action="{{ route('doctor.orders.store') }}">
            @include('doctor.orders._form')
        </form>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const container = document.getElementById('items-container');
                const btn = document.getElementById('add-item');
                const tmpl = document.getElementById('item-template').content;
                btn.onclick = () => {
                    const idx = container.querySelectorAll('.item-row').length;
                    const clone = tmpl.cloneNode(true);
                    clone.querySelectorAll('[name]').forEach(f => {
                        f.name = f.name.replace(/items\[\d+\]/, `items[${idx}]`);
                        if (f.tagName === 'SELECT') f.selectedIndex = 0;
                        if (f.tagName === 'TEXTAREA') f.value = '';
                    });
                    container.appendChild(clone);
                    container.querySelectorAll('.remove-item').forEach(b => {
                        b.onclick = () => b.closest('.item-row').remove();
                    });
                };
                container.querySelectorAll('.remove-item').forEach(b => b.onclick = () => b.closest('.item-row')
                .remove());
            });
        </script>
    @endpush
@endsection
