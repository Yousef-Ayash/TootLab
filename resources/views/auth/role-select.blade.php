@extends('layouts.app')

@section('title', 'Login - Choose Role')

@section('content')
    {{-- <div class="flex flex-col items-center justify-center min-h-screen p-4">
        <h1 class="text-2xl font-bold mb-6">Login As</h1>
        <div class="space-y-4 w-full max-w-sm">
            <a href="{{ route('login', ['role' => 'doctor']) }}"
                class="block text-center bg-blue-500 text-white py-3 rounded-lg shadow">
                Doctor
            </a>
            <a href="{{ route('login', ['role' => 'employee']) }}"
                class="block text-center bg-green-500 text-white py-3 rounded-lg shadow">
                Employee
            </a>
        </div>
    </div> --}}
    {{-- <div class="stripes-placeholder"></div> --}}

    <div class="main-container">
        <div class="logo-placeholder">
            <span>Logo Placeholder</span>
        </div>

        <div class="title-section">
            <h1>Brown Dental Lab</h1>
            <p>BY BROWN DENTAL GROUP</p>
        </div>

        <div class="button-container">
            <a href="{{ route('login', ['role' => 'doctor']) }}" class="button-link">
                <span class="button-icon icon-doctor">
                    <i>🦷</i>
                </span>
                <span class="button-text" dir="rtl">طبيب</span>
            </a>
            <a href="{{ route('login', ['role' => 'employee']) }}" class="button-link">
                <span class="button-icon icon-person">
                    <i>👤</i>
                </span>
                <span class="button-text" dir="rtl">موظف</span>
            </a>
        </div>

        <footer class="footer">
            <div class="social-icons">
                <span class="icon-placeholder">f</span>
                <span class="icon-placeholder">▶</span>
                <span class="icon-placeholder">📷</span>
                <span class="icon-placeholder">@</span>
            </div>
            <p class="footer-handle">@browndentallab</p>
        </footer>
    </div>
@endsection

@section('styles')
    <style>
        /* Basic Reset and Body Styling */
        body {
            margin: 0;
            padding: 0;
            background-color: #000000;
            /* Strict black background */
            color: #ffffff;
            /* Default text color white */
            font-family: "Cairo", "Arial", sans-serif;
            display: flex;
            /* Changed to flex-direction column to stack nav and main content */
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            /* Prevent horizontal scroll */
        }


        /* Stripes Placeholder Styling */
        .stripes-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            /* border: 1px dashed #333; */
        }

        /* Main Content Container */
        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 90%;
            max-width: 400px;
            /* Added padding-top to avoid overlap if navbar was fixed/absolute */
            /* Not strictly necessary here but good practice */
            padding: 20px 20px 20px 20px;
            box-sizing: border-box;
            position: relative;
            z-index: 1;
            text-align: center;
            /* Allow container to grow and push footer down */
            flex-grow: 1;
        }

        /* Logo Placeholder Styling */
        .logo-placeholder {
            width: 180px;
            height: 120px;
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px dashed #444;
            color: #666;
            font-size: 14px;
        }

        /* Title Section Styling */
        .title-section {
            margin-bottom: 50px;
        }

        .title-section h1 {
            font-size: 26px;
            font-weight: 700;
            margin: 0 0 5px 0;
            color: #ffffff;
        }

        .title-section p {
            font-size: 14px;
            font-weight: 400;
            margin: 0;
            color: #cccccc;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Button Container */
        .button-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Reduced margin-bottom slightly */
            margin-bottom: 40px;
        }

        /* Button Styling */
        .button-link {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #e0e0e0;
            border-radius: 50px;
            padding: 12px 25px;
            margin-bottom: 20px;
            text-decoration: none;
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
            max-width: 300px;
            box-sizing: border-box;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .button-link:last-child {
            margin-bottom: 0;
        }

        .button-link:hover {
            background-color: #f5f5f5;
        }

        .button-link:active {
            transform: scale(0.98);
        }

        /* Button Icon Placeholder Styling */
        .button-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin-right: 15px;
            font-size: 18px;
        }

        .icon-doctor {
            background-color: #2a9d8f;
            color: white;
        }

        .icon-person {
            background-color: #2a9d8f;
            color: white;
            font-size: 20px;
        }

        .button-icon i {
            font-style: normal;
        }

        /* Button Text Styling */
        .button-text {
            flex-grow: 1;
            text-align: center;
            margin-right: -50px;
            padding-left: 15px;
        }

        /* Footer Styling */


        /* RTL direction utilities */
        [dir="rtl"] {
            direction: rtl;
        }
    </style>
@endsection
