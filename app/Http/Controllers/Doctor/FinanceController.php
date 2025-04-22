<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    // GET /doctor/finance
    public function index()
    {
        $orders = Auth::user()
            ->orders()
            ->withCount(['procedures'])
            ->get();

        // Calculate totals
        $paid   = $orders->where('is_paid', true)->sum('final_cost');
        $owed   = $orders->where('is_paid', false)->sum('final_cost');

        return view('doctor.finance', compact('orders', 'paid', 'owed'));
    }
}
