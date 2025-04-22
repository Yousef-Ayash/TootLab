<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Procedure;
use App\Models\Color;
use App\Models\ProcedureStep;

class DashboardController extends Controller
{
    // GET /admin
    public function index()
    {
        $userCount       = User::whereIn('role', ['doctor', 'employee'])->count();
        $procedureCount  = Procedure::count();
        $colorCount      = Color::count();
        $stepCount       = ProcedureStep::count();

        return view('admin.dashboard', compact(
            'userCount',
            'procedureCount',
            'colorCount',
            'stepCount'
        ));
    }
}
