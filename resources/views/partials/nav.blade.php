<nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">ToothLab</a>
        <div class="flex space-x-4 items-center">
            @guest
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
            @else
                @php $role = auth()->user()->role; @endphp
                @if ($role === 'doctor')
                    <a href="{{ route('doctor.dashboard') }}">Dashboard</a>
                    <a href="{{ route('doctor.orders.create') }}">New Order</a>
                    <a href="{{ route('doctor.orders.index') }}">My Work</a>
                    <a href="{{ route('doctor.finance') }}">Finance</a>
                    <a href="{{ route('doctor.prices') }}">Prices</a>
                    <a href="{{ route('doctor.contact') }}">Contact</a>
                @elseif($role === 'admin')
                    <a href="{{ route('admin.users.index') }}">Users</a>
                    <a href="{{ route('admin.procedures.index') }}">Procedures</a>
                    <a href="{{ route('admin.colors.index') }}">Colors</a>
                @elseif($role === 'employee')
                    <a href="{{ route('employee.orders') }}">My Steps</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-gray-600 hover:text-gray-800 px-3 py-1">
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>
