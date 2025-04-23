@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    {{-- <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Contact Us</h1>

        <ul class="space-y-3">
            @foreach ($social as $platform => $url)
                <li>
                    <a href="{{ $url }}" target="_blank"
                        class="flex items-center space-x-2 bg-white p-4 rounded-lg shadow hover:shadow-md">
                        <span class="font-medium capitalize">{{ $platform }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 3l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </div> --}}
    <div class="container">
        <div class="logo-placeholder"></div>

        <div class="main-title">Brown Dental Lab</div>

        <div class="subtitle">BY BROWN DENTAL GROUP</div>

        <div class="contact-list">
            <a href="#" class="contact-item">
                <div class="contact-icon icon-facebook">f</div>
                <span class="contact-text">brown dental lab</span>
            </a>

            <a href="#" class="contact-item">
                <div class="contact-icon icon-instagram">📷</div>
                <span class="contact-text">brown dental lab</span>
            </a>

            <a href="tel:+963982072746" class="contact-item">
                <div class="contact-icon icon-telegram">➤</div>
                <span class="contact-text">+963 982 072 746</span>
            </a>

            <a href="https://wa.me/963936153111" class="contact-item">
                <div class="contact-icon icon-whatsapp">✆</div>
                <span class="contact-text">+963 936 153 111</span>
            </a>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f5f1e8;
            /* Approximation of the background color */
            color: #333333;
            /* Default dark text color */
            font-family: "Montserrat", sans-serif;
            /* Default font */
            display: flex;
            flex-direction: column;
            /* Stack nav and main */
            align-items: center;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .container {
            text-align: center;
            padding: 20px;
            max-width: 350px;
            /* Adjust as needed */
            width: 90%;
        }

        .logo-placeholder {
            width: 100px;
            /* Adjust width based on logo size */
            height: 90px;
            /* Adjust height based on logo size */
            margin: 0 auto 20px auto;
            /* Center and space below */
            /* border: 1px dashed #302a28; /* Optional: to visualize */
        }

        /* You can add an <img> tag inside the logo-placeholder div */
        .logo-placeholder img {
            max-width: 100%;
            max-height: 100%;
        }

        .main-title {
            font-size: 1.5em;
            /* Adjust size */
            font-weight: 700;
            /* Bold */
            letter-spacing: 0.5px;
            margin-bottom: 3px;
            /* Space below main title */
        }

        .subtitle {
            font-size: 0.6em;
            /* Adjust size */
            font-weight: 500;
            /* Medium weight */
            letter-spacing: 1.5px;
            /* Wide spacing */
            text-transform: uppercase;
            margin-bottom: 35px;
            /* Space below subtitle */
            color: #443d3a;
            /* Slightly lighter shade if needed */
        }

        .contact-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .contact-item {
            background-color: #ffffff;
            border: 1.5px solid #000000;
            border-radius: 50px;
            /* Makes it pill-shaped */
            padding: 8px 15px 8px 10px;
            /* Adjust padding */
            margin-bottom: 15px;
            /* Space between items */
            display: flex;
            align-items: center;
            text-decoration: none;
            /* Remove underline if it's a link */
            color: #302a28;
            /* Text color inside the item */
            transition: background-color 0.3s ease;
            /* Smooth hover effect */
        }

        .contact-item:hover {
            background-color: #f0f0f0;
            /* Slight background change on hover */
        }

        .contact-icon {
            width: 35px;
            /* Icon size */
            height: 35px;
            /* Icon size */
            border-radius: 50%;
            /* Make icon container circular */
            margin-right: 15px;
            /* Space between icon and text */
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            /* Adjust icon font size if using icon fonts */
            color: #ffffff;
            /* Default icon color (often white) */
            flex-shrink: 0;
            /* Prevent icon from shrinking */
        }

        /* Specific icon styles (using background colors as placeholders) */
        .icon-facebook {
            background-color: #1877f2;
        }

        .icon-instagram {
            background: radial-gradient(circle at 30% 107%,
                    #fdf497 0%,
                    #fdf497 5%,
                    #fd5949 45%,
                    #d6249f 60%,
                    #285aeb 90%);
        }

        .icon-telegram {
            background-color: #24a1de;
        }

        .icon-whatsapp {
            background-color: #25d366;
        }

        .contact-text {
            font-size: 1.1em;
            /* Adjust text size */
            font-weight: 500;
            white-space: nowrap;
            /* Prevent text wrapping */
            overflow: hidden;
            /* Hide overflow */
            text-overflow: ellipsis;
            /* Add ellipsis if text is too long */
        }
    </style>
@endsection
