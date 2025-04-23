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

@section('styles')
    <style>
        body {
            background: #f5f0de;
            font-family: Arial, sans-serif;
            color: #333;
            padding: 20px;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 560px;
            margin: auto;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .field {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 48%;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .input-field {
            width: 100%;
            height: 42px;
            padding: 0 16px;
            font-size: 16px;
            line-height: 42px;
            border: 1px solid #bbb;
            border-radius: 21px;
            background: #fff;
            box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.15);
        }

        /* Teeth list grid */
        .teeth-list {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: 8px;
            list-style: none;
            margin: 32px 0;
            padding: 0;
        }

        .teeth-list li {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: #e3d7c1;
            border-radius: 50%;
            box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            font-size: 14px;
            transition: background 0.2s;
        }

        .teeth-list li:hover {
            background: #d1bfa6;
        }

        /* Bottom fields */
        .bottom-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 32px;
        }

        .field.full {
            width: 48%;
        }

        /* Buttons */
        .buttons {
            display: flex;
            justify-content: space-between;
        }

        .buttons button {
            flex: 1;
            height: 48px;
            font-size: 16px;
            border: none;
            border-radius: 24px;
            color: #fff;
            cursor: pointer;
            box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.15);
            transition: opacity 0.2s;
            margin: 0 8px;
        }

        .buttons button:first-child {
            background: #4caf50;
        }

        .buttons button:last-child {
            background: #f44336;
        }

        .buttons button:hover {
            opacity: 0.9;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: #fff;
            border-radius: 12px;
            padding: 24px 32px;
            text-align: center;
            width: 320px;
        }

        .modal-content h2 {
            font-size: 20px;
            margin-bottom: 16px;
        }

        .modal-content select {
            width: 100%;
            height: 40px;
            padding: 0 12px;
            font-size: 16px;
            border: 1px solid #bbb;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .modal-content button {
            height: 36px;
            padding: 0 16px;
            font-size: 14px;
            border: none;
            border-radius: 18px;
            background: #888;
            color: #fff;
            cursor: pointer;
        }
    </style>
@endsection
