<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Procedure;
use App\Models\ProcedureStep;
use App\Models\User;

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
        $employees  = User::role('employee')->get();
        return view('admin.steps.create', compact('procedures', 'employees'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'procedure_id' => 'required|exists:procedures,id',
            'name'         => 'required|string',
            'sort_order'   => 'required|integer',
            'description'  => 'nullable|string',
            'users'        => 'nullable|array',
            'users.*'      => 'exists:users,id',
        ]);

        $step = ProcedureStep::create($data);
        if (!empty($data['users'])) {
            $step->users()->sync($data['users']);
        }

        return redirect()->route('admin.steps.index');
    }

    public function show(ProcedureStep $step)
    {
        return view('admin.steps.show', compact('step'));
    }

    public function edit(ProcedureStep $step)
    {
        // dd(User::where('role', 'employee')->get());
        $procedures = Procedure::all();
        // $employees  = User::role('employee')->get();
        $employees = User::where('role', 'employee')->get();
        $assigned   = $step->users->pluck('id')->toArray();
        return view('admin.steps.edit', compact('step', 'procedures', 'employees', 'assigned'));
    }

    public function update(Request $request, ProcedureStep $step)
    {
        $data = $request->validate([
            'procedure_id' => 'required|exists:procedures,id',
            'name'         => 'required|string',
            'sort_order'   => 'required|integer',
            'description'  => 'nullable|string',
            'users'        => 'nullable|array',
            'users.*'      => 'exists:users,id',
        ]);

        $step->update($data);
        $step->users()->sync($data['users'] ?? []);

        return redirect()->route('admin.steps.index');
    }

    public function destroy(ProcedureStep $step)
    {
        $step->delete();
        return back()->with('success', 'Step deleted');
    }
}
