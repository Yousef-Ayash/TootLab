<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the role‑selection screen.
     * GET  /login
     */
    public function index()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('auth.role-select');
    }

    /**
     * Show the username/password form for a given role.
     * GET  /login/create?role={role}
     */
    public function create(Request $request)
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }

        $role = $request->query('role');
        if (! in_array($role, ['doctor', 'employee', 'admin'], true)) {
            return redirect('/');
        }

        return view('auth.login', compact('role'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'role'     => ['required', 'in:doctor,employee'],
        ]);

        // First, attempt authentication without role constraint:
        if (! Auth::attempt([
            'username' => $data['username'],
            'password' => $data['password'],
        ])) {
            return back()
                ->withErrors(['login' => 'Invalid credentials'])
                ->onlyInput('username');
        }

        $user = Auth::user();

        // Now enforce role logic:
        if ($data['role'] === 'doctor') {
            if ($user->role !== 'doctor') {
                Auth::logout();
                return back()
                    ->withErrors(['login' => 'You must log in as a doctor here.'])
                    ->onlyInput('username');
            }
            $redirect = route('doctor.dashboard');
        } else {
            // role === 'employee' login page; allow both employee AND admin
            if (! in_array($user->role, ['employee', 'admin'], true)) {
                Auth::logout();
                return back()
                    ->withErrors(['login' => 'You must log in as an employee or admin here.'])
                    ->onlyInput('username');
            }
            // if admin, send to admin dashboard; if employee, to employee dashboard
            $redirect = $user->role === 'admin'
                ? route('admin.dashboard')
                : route('employee.dashboard');
        }

        $request->session()->regenerate();
        return redirect()->intended($redirect);
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

    protected function redirectBasedOnRole()
    {
        $user = Auth::user();

        return match ($user->role) {
            'doctor'   => redirect()->route('doctor.dashboard'),
            'admin'    => redirect()->route('admin.dashboard'),
            'employee' => redirect()->route('employee.dashboard'),
            default    => redirect()->route('login'),
        };
    }
}
