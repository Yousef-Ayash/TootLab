@extends('layouts.app')

@section('title', 'New Order')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">New Order</h1>

        {{-- Hidden template for JS cloning (outside form) --}}
        <template id="item-template">
            <div class="item-row bg-gray-50 p-4 rounded-lg border relative">
                <div class="mb-2">
                    <label class="block font-medium">Tooth Number</label>
                    <select name="items[0][tooth_number]" class="input w-full" required>
                        <option value="">Select tooth</option>
                        @for ($t = 11; $t <= 48; $t++)
                            <option value="{{ $t }}">{{ $t }}</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-2">
                    <label class="block font-medium">Procedure</label>
                    <select name="items[0][procedure_id]" class="input w-full" required>
                        <option value="">Select procedure</option>
                        @foreach ($procedures as $proc)
                            <option value="{{ $proc->id }}">{{ $proc->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label class="block font-medium">Tooth Color</label>
                    <select name="items[0][color_id]" class="input w-full" required>
                        <option value="">Select color</option>
                        @foreach ($colors as $col)
                            <option value="{{ $col->id }}">{{ $col->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label class="block font-medium">Notes (optional)</label>
                    <textarea name="items[0][notes]" class="input w-full" rows="2"></textarea>
                </div>
                <button type="button" class="remove-item absolute top-2 right-2 text-red-500 hover:text-red-700">
                    &times;
                </button>
            </div>
        </template>

        <form method="POST" action="{{ route('doctor.orders.store') }}">
            @include('doctor.orders._form')
        </form>
    </div>

    {{-- JS to clone/remove items --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('items-container');
            const btnAdd = document.getElementById('add-item');
            const tmpl = document.getElementById('item-template');

            function bindRemove(btn) {
                btn.addEventListener('click', () => {
                    btn.closest('.item-row').remove();
                });
            }

            container.querySelectorAll('.item-row .remove-item')
                .forEach(bindRemove);

            btnAdd.addEventListener('click', () => {
                const index = container.querySelectorAll('.item-row').length;
                const fragment = tmpl.content.cloneNode(true);
                const row = fragment.querySelector('.item-row');

                row.querySelectorAll('select, textarea').forEach(field => {
                    field.name = field.name.replace(/items\[\d+\]/, `items[${index}]`);
                    if (field.tagName === 'TEXTAREA') field.textContent = '';
                    else field.selectedIndex = 0;
                });

                container.appendChild(row);
                bindRemove(row.querySelector('.remove-item'));
            });
        });
    </script>
@endsection
