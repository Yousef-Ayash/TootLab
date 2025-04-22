<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderProcedureStep;

class StepController extends Controller
{
    // GET /employee/steps
    public function index()
    {
        $steps = Auth::user()
            ->assignedSteps()
            ->with('order', 'procedure', 'step')
            ->where('is_done', false)
            ->get();

        return view('employee.orders.index', compact('steps'));
    }

    // POST /employee/steps/{step}/done
    public function markDone(OrderProcedureStep $step)
    {
        $this->authorize('update', $step);

        $step->update(['is_done' => true]);

        // Optionally advance order status or notify next user...

        return back()->with('success', 'Step marked as done.');
    }
}
