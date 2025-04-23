{{-- <nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        {{-- <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">ToothLab</a>
        <div class="flex space-x-4 items-center">
            @guest
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
            @else
                @php $role = auth()->user()->role; @endphp
                @if ($role === 'admin')
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <a href="{{ route('admin.users.index') }}">Users</a>
                    <a href="{{ route('admin.procedures.index') }}">Procedures</a>
                    <a href="{{ route('admin.colors.index') }}">Colors</a>
                @elseif($role === 'employee')
                    <a href="{{ route('employee.steps.index') }}">My Steps</a>
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
</nav> --}}

<nav class="top-navbar">
    @php $role = auth()->user()->role; @endphp
    @guest
        <a href="{{ route('login') }}" class="nav-button">Login</a>
    @else
        @if (!in_array(request()->route()->getName(), ['admin.dashboard', 'doctor.dashboard', 'employee.steps.index']))
            <a href="{{ route(in_array($role, ['admin', 'doctor']) ? $role . '.dashboard' : 'employee.steps.index') }}"
                class="nav-button">Home</a>
        @endif
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="nav-button">
                Logout
            </button>
        </form>
    @endguest
</nav>

@if (request()->route()->getName() == 'role-select')
    <style>
        .top-navbar {
            width: 100%;
            padding: 10px 20px;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            /* Center buttons */
            align-items: center;
            background-color: #1a1a1a;
            /* Slightly lighter black for navbar */
            border-bottom: 1px solid #333;
            /* Subtle separator */
            z-index: 10;
            /* Ensure navbar is above stripes */
            position: relative;
            /* Needed for z-index */
        }

        .nav-button {
            color: #ffffff;
            background-color: #333333;
            /* Dark grey buttons */
            border: 1px solid #555;
            padding: 8px 15px;
            margin: 0 10px;
            /* Space between buttons */
            text-decoration: none;
            border-radius: 20px;
            /* Rounded corners */
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.2s ease;
        }

        .nav-button:hover {
            background-color: #444444;
        }
    </style>
@elseif (request()->route()->getName() == 'login')
    <style>
        .top-navbar {
            width: 100%;
            padding: 10px 20px;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            /* Center buttons */
            align-items: center;
            background-color: #ffffff;
            /* White navbar */
            border-bottom: 1px solid #e0e0e0;
            /* Light separator */
            z-index: 10;
            position: relative;
        }

        .nav-button {
            color: #333333;
            /* Dark text */
            background-color: #f0f0f0;
            /* Light grey buttons */
            border: 1px solid #cccccc;
            padding: 8px 15px;
            margin: 0 10px;
            /* Space between buttons */
            text-decoration: none;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.2s ease;
        }

        .nav-button:hover {
            background-color: #e5e5e5;
        }
    </style>
@elseif(request()->route()->getName() == 'doctor.dashboard')
    <style>
        .top-navbar {
            width: 100%;
            padding: 10px 20px;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            /* Center buttons */
            align-items: center;
            background-color: #ffffff;
            /* White navbar */
            border-bottom: 1px solid #e0e0e0;
            /* Light separator */
            z-index: 10;
            position: relative;
        }

        .nav-button {
            color: #333333;
            /* Dark text */
            background-color: #f0f0f0;
            /* Light grey buttons */
            border: 1px solid #cccccc;
            padding: 8px 15px;
            margin: 0 10px;
            /* Space between buttons */
            text-decoration: none;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.2s ease;
        }

        .nav-button:hover {
            background-color: #e5e5e5;
        }
    </style>
@elseif(request()->route()->getName() == 'doctor.contact')
    <style>
        .top-navbar {
            width: 100%;
            padding: 10px 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            /* Center buttons */
            align-items: center;
            background-color: #ffffff;
            /* White navbar */
            border-bottom: 1px solid #e0e0e0;
            /* Light separator */
            z-index: 10;
            position: relative;
        }

        .nav-button {
            color: #333333;
            /* Dark text */
            background-color: #f0f0f0;
            /* Light grey buttons */
            border: 1px solid #cccccc;
            padding: 8px 15px;
            margin: 0 10px;
            /* Space between buttons */
            text-decoration: none;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.2s ease;
        }

        .nav-button:hover {
            background-color: #e5e5e5;
        }
    </style>
@elseif (request()->route()->getName() == 'doctor.prices')
    <style>
        .top-navbar {
            background-color: #e0e0e0;
            /* Keeping this grey */
            padding: 8px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .nav-button {
            display: flex;
            gap: 10px;
            color: #333333;
            /* Dark text */
            background-color: #f0f0f0;
            /* Light grey buttons */
            border: 1px solid #cccccc;
            padding: 8px 15px;
            margin: 0 10px;
            /* Space between buttons */
            text-decoration: none;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.2s ease;
        }

        .nav-button:hover {
            background-color: #e5e5e5;
        }

        /* .top-navbar button,
        .top-navbar a {
            padding: 5px 12px;
            font-size: 0.85em;
            background-color: var(--text-color-dark);
            color: var(--bg-color);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: var(--font-arabic);
        } */

        /* .navbar button:hover {
            background-color: var(--text-color-medium);
        } */
    </style>
@endif
