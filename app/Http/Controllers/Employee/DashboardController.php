<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // GET /employee
    public function index()
    {
        // Maybe redirect to steps list
        return redirect()->route('employee.dashboard');
    }
}
