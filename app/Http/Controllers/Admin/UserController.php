<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // GET /admin/users
    public function index()
    {
        $users = User::whereIn('role', ['doctor', 'employee'])->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    // GET /admin/users/create
    public function create()
    {
        return view('admin.users.create');
    }

    // POST /admin/users
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'role'     => ['required', 'in:doctor,employee'],
        ]);

        User::create([
            'name'     => $data['name'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'role'     => $data['role'],
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created');
    }

    // GET /admin/users/{user}/edit
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // PUT /admin/users/{user}
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'     => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users,username,' . $user->id],
            'password' => ['nullable', 'string', 'confirmed'],
            'role'     => ['required', 'in:doctor,employee'],
        ]);

        $user->update([
            'name'     => $data['name'],
            'username' => $data['username'],
            'role'     => $data['role'],
            'password' => $data['password'] ? bcrypt($data['password']) : $user->password,
        ]);

        return back()->with('success', 'User updated');
    }

    // DELETE /admin/users/{user}
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User deleted');
    }
}
