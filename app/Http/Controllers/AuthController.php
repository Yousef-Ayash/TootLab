<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the role‑selection screen.
     * GET  /login
     */
    public function index()
    {
        //
    }

    /**
     * Show the username/password form for a given role.
     * GET  /login/create?role={role}
     */
    public function create(Request $request)
    {
        $role = $request->query('role');
        if (! in_array($role, ['doctor', 'employee', 'admin'], true)) {
            return redirect('/');
        }
        return view('auth.login', compact('role'));
    }

    /**
     * Handle the login submission.
     * POST /login
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'role'     => ['required', 'in:doctor,employee,admin'],
        ]);

        if (Auth::attempt([
            'username' => $credentials['username'],
            'password' => $credentials['password'],
            'role'     => $credentials['role'],
        ])) {
            $request->session()->regenerate();

            return match ($credentials['role']) {
                'doctor'   => redirect()->route('doctor.dashboard'),
                'employee' => redirect()->route('employee.dashboard'),
                'admin' => redirect()->route('admin.dashboard'),
            };
        }

        return back()
            ->withErrors(['login' => 'Invalid credentials or role mismatch'])
            ->onlyInput('username');
    }

    /**
     * Log the user out.
     * DELETE /login
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
