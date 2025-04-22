<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderProcedureStep;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSteps   = OrderProcedureStep::count();
        $pendingSteps = OrderProcedureStep::where('is_done', false)->count();
        $myPending    = OrderProcedureStep::where('user_id', auth()->id())
            ->where('is_done', false)
            ->count();

        return view('employee.dashboard', compact('totalSteps', 'pendingSteps', 'myPending'));
    }
}
