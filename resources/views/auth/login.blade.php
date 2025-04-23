@extends('layouts.app')

@section('title', 'Login')

@section('content')
    {{-- <div class="flex items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-sm bg-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-semibold mb-4 text-center">Login as {{ ucfirst($role) }}</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="hidden" name="role" value="{{ $role }}">

                <div class="mb-4">
                    <label for="username" class="block mb-1 font-medium text-sm">Username</label>
                    <input id="username" name="username" type="text" value="{{ old('username') }}" required autofocus
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    @error('username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-1 font-medium text-sm">Password</label>
                    <input id="password" name="password" type="password" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                @error('login')
                    <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
                @enderror

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    Login
                </button>
            </form> --}}

    <!-- Login -->
    {{-- <div class="stripes-placeholder"></div> --}}

    <div class="main-container">
        <div class="logo-placeholder">
            <span>Logo Placeholder</span>
        </div>

        <div class="title-section">
            <h1>Brown Dental Lab</h1>
            <p>BY BROWN DENTAL GROUP</p>
        </div>

        <form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf

            <input type="hidden" name="role" value="{{ $role }}">

            <div class="form-group">
                <label for="username" dir="rtl">اسم المستخدم</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" class="input-field"
                    dir="rtl" />
            </div>
            @error('username')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="password" dir="rtl">كلمة السر</label>
                <input type="password" id="password" name="password" class="input-field" dir="rtl" />
            </div>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <button type="submit" class="submit-button" dir="rtl">
                موافق
            </button>
        </form>

        @include('partials.footer')
    </div>

    {{-- Logout form (example usage elsewhere) --}}
    {{-- 
        <form method="POST" action="{{ route('logout') }}" class="mt-4 text-center">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-sm text-gray-600 hover:underline">
                Logout
            </button>
        </form>
        --}}
    </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Basic Reset and Body Styling */
        body {
            margin: 0;
            padding: 0;
            background-color: #f7f5ec;
            /* Light beige background */
            color: #333333;
            /* Default dark text color */
            font-family: "Cairo", "Arial", sans-serif;
            display: flex;
            flex-direction: column;
            /* Stack nav and main */
            align-items: center;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* ### START NAVBAR STYLES ### */


        /* ### END NAVBAR STYLES ### */

        /* Stripes Placeholder Styling */
        .stripes-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            /* border: 1px dashed #ccc; */
        }

        /* Main Content Container */
        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 90%;
            max-width: 400px;
            padding: 20px;
            box-sizing: border-box;
            position: relative;
            z-index: 1;
            text-align: center;
            flex-grow: 1;
            /* Allow container to grow */
        }

        /* Logo Placeholder Styling */
        .logo-placeholder {
            width: 180px;
            height: 120px;
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px dashed #cccccc;
            color: #aaaaaa;
            font-size: 14px;
        }

        /* Title Section Styling */
        .title-section {
            margin-bottom: 40px;
            color: #333333;
        }

        .title-section h1 {
            font-size: 26px;
            font-weight: 700;
            margin: 0 0 5px 0;
            color: inherit;
        }

        .title-section p {
            font-size: 14px;
            font-weight: 400;
            margin: 0;
            color: #555555;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Login Form Styling */
        .login-form {
            width: 100%;
            max-width: 350px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 40px;
            /* Reduced margin */
        }

        .form-group {
            width: 100%;
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group label {
            margin-bottom: 8px;
            font-size: 20px;
            font-weight: 700;
            color: #333333;
            width: 100%;
            text-align: right;
            padding-right: 20px;
            box-sizing: border-box;
        }

        .input-field {
            width: 100%;
            padding: 14px 25px;
            border: 2px solid #000000;
            border-radius: 50px;
            background-color: #ffffff;
            font-size: 16px;
            color: #333;
            box-sizing: border-box;
            text-align: right;
            font-family: inherit;
        }

        .input-field:focus {
            outline: none;
            border-color: #555;
            box-shadow: 0 0 5px rgba(85, 85, 85, 0.3);
        }

        .submit-button {
            background-color: #70a963;
            color: #ffffff;
            border: none;
            border-radius: 30px;
            padding: 12px 45px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.2s ease, transform 0.1s ease;
            font-family: inherit;
        }

        .submit-button:hover {
            background-color: #5f9454;
        }

        .submit-button:active {
            transform: scale(0.98);
        }

        /* Footer Styling */

        /* RTL direction utilities */
        [dir="rtl"] {
            direction: rtl;
        }
    </style>
@endsection
