@csrf
<div class="form-group">
    <label class="form-label">Username</label>
    <input name="username" type="text" value="{{ old('username', $user->username ?? '') }}" class="form-input" required>
    @error('username')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Role</label>
    <select name="role" class="form-input" required>
        <option value="doctor" @selected(old('role', $user->role ?? '') == 'doctor')>Doctor</option>
        <option value="admin" @selected(old('role', $user->role ?? '') == 'admin')>Admin</option>
        <option value="employee" @selected(old('role', $user->role ?? '') == 'employee')>Employee</option>
    </select>
    @error('role')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
@if (!isset($user))
    <div class="form-group">
        <label class="form-label">Password</label>
        <input name="password" type="password" class="form-input" required>
        @error('password')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>
@endif
<button type="submit" class="btn btn--primary btn--block">
    {{ isset($user) ? 'Update User' : 'Create User' }}
</button>
