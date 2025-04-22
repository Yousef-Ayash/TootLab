<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // GET /doctor
    public function index()
    {
        // Could show summary stats: pending orders, revenue, etc.
        return view('doctor.dashboard');
    }
}
