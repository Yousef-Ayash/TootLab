<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderProcedureStep;

class StepController extends Controller
{
    public function index()
    {
        // show all un‑done steps that are either unclaimed or already claimed by me
        $steps = OrderProcedureStep::with(['order.procedures', 'procedure', 'step'])
            ->where('is_done', false)
            ->where(function ($q) {
                $q->whereNull('user_id')
                    ->orWhere('user_id', auth()->id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('employee.steps.index', compact('steps'));
    }

    public function update(Request $request, OrderProcedureStep $step)
    {
        // “Claim” vs. “Done”
        if ($request->has('claim')) {
            $step->update(['user_id' => auth()->id()]);
        }
        if ($request->has('done')) {
            $step->update(['is_done' => true]);

            $order = $step->order;  // the parent Order

            // check if *any* steps remain undone on this order
            $anyLeft = $order
                ->procedureSteps()
                ->where('is_done', false)
                ->exists();

            if (! $anyLeft) {
                // all steps across all procedures are done → complete the order
                $order->update(['status' => 'completed']);
            }
        }

        return redirect()->route('employee.steps.index');
    }
}
