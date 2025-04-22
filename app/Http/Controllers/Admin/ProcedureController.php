<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Procedure;
use App\Models\Color;
use Illuminate\Support\Arr;

class ProcedureController extends Controller
{
    public function index()
    {
        $procedures = Procedure::with('color')->paginate(15);
        return view('admin.procedures.index', compact('procedures'));
    }

    public function create()
    {
        $colors = Color::all();
        return view('admin.procedures.create', compact('colors'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            'name'        => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'cost'        => ['required', 'numeric'],
            'color_id'    => ['required', 'exists:colors,id'],
            'steps'       => ['nullable', 'array'],
            'steps.*.name'        => ['required_with:steps', 'string'],
            'steps.*.description' => ['nullable', 'string'],
            'steps.*.sort_order'  => ['required_with:steps', 'integer'],
        ]);


        // 1) Create the procedure
        $procedure = Procedure::create(Arr::only($data, ['name', 'description', 'cost', 'color_id']));
        // 2) Create each step
        foreach ($data['steps'] ?? [] as $step) {
            $procedure->steps()->create($step);
        }

        // dd($procedure);

        return redirect()
            ->route('admin.procedures.index')
            ->with('success', 'Procedure created with steps.');
    }


    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'name'        => ['required', 'string'],
    //         'description' => ['nullable', 'string'],
    //         'cost'        => ['required', 'numeric'],
    //         'color_id'    => ['required', 'exists:colors,id'],
    //     ]);

    //     Procedure::create($data);

    //     return redirect()->route('admin.procedures.index')
    //         ->with('success', 'Procedure added');
    // }

    public function edit(Procedure $procedure)
    {
        $colors = Color::all();
        return view('admin.procedures.edit', compact('procedure', 'colors'));
    }

    public function update(Request $request, Procedure $procedure)
    {
        $data = $request->validate([
            'name'        => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'cost'        => ['required', 'numeric'],
            'color_id'    => ['required', 'exists:colors,id'],
            'steps'       => ['nullable', 'array'],
            'steps.*.id'         => ['sometimes', 'exists:procedure_steps,id'],
            'steps.*.name'       => ['required_with:steps', 'string'],
            'steps.*.description' => ['nullable', 'string'],
            'steps.*.sort_order' => ['required_with:steps', 'integer'],
        ]);

        // 1) Update core procedure fields
        $procedure->update(Arr::only($data, ['name', 'description', 'cost', 'color_id']));

        // 2) Track which step IDs we see
        $submittedIds = [];

        foreach ($data['steps'] ?? [] as $stepData) {
            if (isset($stepData['id'])) {
                // Existing step → update
                $step = $procedure->steps()->findOrFail($stepData['id']);
                $step->update(Arr::only($stepData, ['name', 'description', 'sort_order']));
                $submittedIds[] = $step->id;
            } else {
                // New step → create
                $new = $procedure->steps()->create(Arr::only($stepData, ['name', 'description', 'sort_order']));
                $submittedIds[] = $new->id;
            }
        }

        // 3) Delete any steps removed in the form
        $procedure->steps()
            ->whereNotIn('id', $submittedIds)
            ->delete();

        return back()->with('success', 'Procedure and steps updated.');
    }


    // public function update(Request $request, Procedure $procedure)
    // {
    //     $data = $request->validate([
    //         'name'        => ['required', 'string'],
    //         'description' => ['nullable', 'string'],
    //         'cost'        => ['required', 'numeric'],
    //         'color_id'    => ['required', 'exists:colors,id'],
    //     ]);

    //     $procedure->update($data);

    //     return back()->with('success', 'Procedure updated');
    // }

    public function destroy(Procedure $procedure)
    {
        $procedure->delete();
        return back()->with('success', 'Procedure deleted');
    }
}
