<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Procedure;
use App\Models\ProcedureStep;

class StepController extends Controller
{
    // List all steps, optionally filtered by procedure
    public function index(Request $request)
    {
        $procedure = Procedure::find($request->query('procedure_id'));
        $steps = $procedure
            ? $procedure->steps()->orderBy('sort_order')->get()
            : ProcedureStep::with('procedure')->orderBy('sort_order')->get();

        $procedures = Procedure::all();
        return view('admin.steps.index', compact('steps', 'procedures', 'procedure'));
    }

    public function create()
    {
        $procedures = Procedure::all();
        return view('admin.steps.create', compact('procedures'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'procedure_id' => ['required', 'exists:procedures,id'],
            'name'         => ['required', 'string'],
            'description'  => ['nullable', 'string'],
            'sort_order'   => ['required', 'integer'],
        ]);

        ProcedureStep::create($data);

        return redirect()->route('admin.steps.index')
            ->with('success', 'Step created');
    }

    public function edit(ProcedureStep $step)
    {
        $procedures = Procedure::all();
        return view('admin.steps.edit', compact('step', 'procedures'));
    }

    public function update(Request $request, ProcedureStep $step)
    {
        $data = $request->validate([
            'procedure_id' => ['required', 'exists:procedures,id'],
            'name'         => ['required', 'string'],
            'description'  => ['nullable', 'string'],
            'sort_order'   => ['required', 'integer'],
        ]);

        $step->update($data);

        return back()->with('success', 'Step updated');
    }

    public function destroy(ProcedureStep $step)
    {
        $step->delete();
        return back()->with('success', 'Step deleted');
    }
}
