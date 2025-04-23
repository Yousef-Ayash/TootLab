@extends('layouts.app')

@section('title', 'Doctor Dashboard')

@section('content')
    {{-- <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Welcome, Dr. {{ auth()->user()->username }}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('doctor.orders.index') }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                <h2 class="font-semibold">My Work</h2>
            </a>
            <a href="{{ route('doctor.orders.create') }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                <h2 class="font-semibold">New Order</h2>
            </a>
            <a href="{{ route('doctor.finance') }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                <h2 class="font-semibold">Finance Record</h2>
            </a>
            <a href="{{ route('doctor.prices') }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                <h2 class="font-semibold">Prices List</h2>
            </a>
            <a href="{{ route('doctor.contact') }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                <h2 class="font-semibold">Contact Us</h2>
            </a>
        </div>
    </div> --}}

    <!-- Doctor Dashboard -->
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
            <a href="{{ route('doctor.orders.index') }}" class="button-link">
                <span class="button-icon">
                    <i>📄</i>
                </span>
                <span class="button-text" dir="rtl">اعمالي</span>
            </a>
            <a href="{{ route('doctor.orders.create') }}" class="button-link">
                <span class="button-icon">
                    <i>🎯</i>
                </span>
                <span class="button-text" dir="rtl">طلب جديد</span>
            </a>
            <a href="{{ route('doctor.finance') }}" class="button-link">
                <span class="button-icon">
                    <i>💰</i>
                </span>
                <span class="button-text" dir="rtl">السجل المالي</span>
            </a>
            <a href="{{ route('doctor.prices') }}" class="button-link">
                <span class="button-icon">
                    <i>🔎</i>
                </span>
                <span class="button-text" dir="rtl">لائحة الاسعار</span>
            </a>
            <a href="{{ route('doctor.contact') }}" class="button-link">
                <span class="button-icon">
                    <i>🔗</i>
                </span>
                <span class="button-text" dir="rtl">تواصل معنا</span>
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

        /* Button Container */
        .button-container {
            width: 100%;
            max-width: 350px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
            /* Reduced margin */
        }

        /* General Button Styling */
        .button-link {
            background-color: #ffffff;
            color: #333333;
            border: 2px solid #000000;
            border-radius: 50px;
            padding: 10px 20px;
            margin-bottom: 18px;
            text-decoration: none;
            font-size: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
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
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 15px;
            flex-shrink: 0;
            background-color: #e0e0e0;
            color: #555;
            font-size: 20px;
        }

        .button-icon i {
            font-style: normal;
        }

        /* Button Text Styling */
        .button-text {
            flex-grow: 1;
            text-align: center;
            margin-right: -55px;
            padding-left: 10px;
        }

        /* Footer Styling */
        .footer {
            padding-bottom: 20px;
            width: 100%;
            color: #333333;
            text-align: center;
            /* Center footer text */
            margin-top: 20px;
            /* Add space above footer */
        }

        .social-icons {
            margin-bottom: 10px;
        }

        /* Social Icon Placeholder Styling */
        .icon-placeholder {
            display: inline-block;
            width: 24px;
            height: 24px;
            background-color: #cccccc;
            color: #333333;
            border-radius: 4px;
            margin: 0 6px;
            text-align: center;
            line-height: 24px;
            font-size: 12px;
            font-weight: bold;
            font-family: Arial, sans-serif;
        }

        .footer-handle {
            font-size: 14px;
            color: #555555;
            margin: 0;
            letter-spacing: 0.5px;
        }

        /* RTL direction utilities */
        [dir="rtl"] {
            direction: rtl;
        }
    </style>
@endsection
