<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Procedure;

class PriceController extends Controller
{
    // GET /doctor/prices
    public function index()
    {
        $procedures = Procedure::with('color')->get();
        return view('doctor.prices.index', compact('procedures'));
    }
}
