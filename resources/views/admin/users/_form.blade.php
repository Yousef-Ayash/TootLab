@csrf

<div class="mb-4">
    <label class="block font-medium">Username</label>
    <input type="text" name="username" value="{{ old('username', $user->username ?? '') }}" class="input" required>
</div>

<div class="mb-4">
    <label class="block font-medium">Role</label>
    <select name="role" class="input" required>
        <option value="doctor" @selected(old('role', $user->role ?? '') === 'doctor')>Doctor</option>
        <option value="admin" @selected(old('role', $user->role ?? '') === 'admin')>Admin</option>
        <option value="employee" @selected(old('role', $user->role ?? '') === 'employee')>Employee</option>
    </select>
</div>

@if (!isset($user))
    <div class="mb-4">
        <label class="block font-medium">Password</label>
        <input type="password" name="password" class="input" required>
    </div>
@endif

<button type="submit" class="btn-primary">
    {{ isset($user) ? 'Update User' : 'Create User' }}
</button>
