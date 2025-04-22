@extends('layouts.app')

@section('title', 'Create Procedure')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Create Procedure</h1>

        {{-- Template for new steps (outside the form to avoid hidden-required errors) --}}
        <template id="step-template">
            <div class="step-row bg-gray-50 p-4 rounded-lg border relative">
                <div class="mb-2">
                    <label class="block font-medium">Step Name</label>
                    <input type="text" name="steps[0][name]" class="input w-full" required>
                </div>
                <div class="mb-2">
                    <label class="block font-medium">Description</label>
                    <textarea name="steps[0][description]" class="input w-full" rows="2"></textarea>
                </div>
                <div class="mb-2">
                    <label class="block font-medium">Sort Order</label>
                    <input type="number" name="steps[0][sort_order]" value="1" class="input w-full" required>
                </div>
                <button type="button" class="remove-step absolute top-2 right-2 text-red-500 hover:text-red-700">
                    &times;
                </button>
            </div>
        </template>

        <form method="POST" action="{{ route('admin.procedures.store') }}">
            @include('admin.procedures._form')
        </form>
    </div>

    {{-- JS to clone/remove steps --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('steps-container');
            const btnAdd = document.getElementById('add-step');
            const tmpl = document.getElementById('step-template');

            function bindRemove(btn) {
                btn.addEventListener('click', () => {
                    btn.closest('.step-row').remove();
                });
            }

            container.querySelectorAll('.step-row .remove-step').forEach(bindRemove);

            btnAdd.addEventListener('click', () => {
                const newIndex = container.querySelectorAll('.step-row').length;
                const fragment = tmpl.content.cloneNode(true);
                const row = fragment.querySelector('.step-row');

                row.querySelectorAll('input, textarea').forEach(field => {
                    field.name = field.name.replace(/steps\[\d+\]/, `steps[${newIndex}]`);
                    field.value = '';
                });

                container.appendChild(row);
                bindRemove(row.querySelector('.remove-step'));
            });
        });
    </script>
@endsection
