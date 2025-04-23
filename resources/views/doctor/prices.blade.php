@extends('layouts.app')

@section('title', 'Prices List')

@section('content')
    {{-- <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Prices List</h1>

        <div class="space-y-4">
            @foreach ($procedures as $procedure)
                <div class="bg-white p-4 rounded-lg shadow flex justify-between">
                    <div>
                        <p class="font-medium">{{ $procedure->name }}</p>
                        <p class="text-sm text-gray-600">{{ $procedure->description }}</p>
                    </div>
                    <p class="font-semibold">{{ number_format($procedure->cost, 2) }} €</p>
                </div>
            @endforeach
        </div>
    </div> --}}

    <div class="container">
        <header class="header">
            <div class="header-left">
                <div class="logo-placeholder"></div>
                <div class="main-title">Brown Dental Lab</div>
                <div class="subtitle">BY BROWN DENTAL GROUP</div>
            </div>
            <div class="header-right">
                <h1 class="arabic-main-title">
                    مختبر البني<br />للتعويضات السنية
                </h1>
            </div>
        </header>

        {{-- <div class="price-list-header">
            قائمة الأسعار ابتداءاً من تاريخ 15/1/2025
        </div> --}}

        <table class="price-table">
            <thead>
                <tr>
                    <th>نوع العمل</th>
                    <th>السعر</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($procedures as $procedure)
                    <tr>
                        <td data-label="نوع العمل:">
                            <span class="latin-part">{{ $procedure->name }}</span>
                        </td>
                        <td data-label="السعر:">{{ number_format($procedure->cost, 2) }} $</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('styles')
    <style>
        :root {
            --bg-color: #f8f4eb;
            /* More accurate cream */
            --text-color-dark: #3a322f;
            /* Dark brown */
            --text-color-medium: #5c524e;
            /* Lighter brown for subtitle */
            --header-bg-grey: #d8d8d8;
            /* Medium grey */
            --border-color-light: #e0e0e0;
            /* Light grey for borders */
            --font-arabic: "Noto Sans Arabic", sans-serif;
            --font-latin: "Montserrat", sans-serif;
        }

        body {
            background-color: var(--bg-color);
            margin: 0;
            font-family: var(--font-arabic);
            color: var(--text-color-dark);
            line-height: 1.6;
        }


        .container {
            text-align: center;
            padding: 0 10px 25px 10px;
            /* Adjusted padding */
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            padding: 25px 0 15px 0;
            /* Adjusted padding */
        }

        .header-left {
            text-align: center;
            direction: ltr;
            margin-bottom: 25px;
            /* Increased space */
        }

        .header-right {
            text-align: center;
        }

        .logo-placeholder {
            width: 85px;
            /* Slightly larger */
            height: 75px;
            margin: 0 auto 12px auto;
            display: block;
            /* border: 1px dashed var(--text-color-dark); /* Optional */
        }

        .main-title {
            font-size: 1.2em;
            /* Slightly larger */
            font-weight: 700;
            /* Bold */
            letter-spacing: 0.5px;
            margin-bottom: 4px;
            /* More space */
            font-family: var(--font-latin);
            text-align: center;
            color: var(--text-color-dark);
        }

        .subtitle {
            font-size: 0.55em;
            /* Slightly larger */
            font-weight: 500;
            /* Medium weight */
            letter-spacing: 1.5px;
            /* More spacing */
            text-transform: uppercase;
            margin-bottom: 0;
            /* Remove bottom margin as block has margin */
            color: var(--text-color-medium);
            font-family: var(--font-latin);
            text-align: center;
        }

        .arabic-main-title {
            font-size: 2.5em;
            /* Adjusted size */
            font-weight: 700;
            /* Bold Arabic */
            line-height: 1.35;
            margin-bottom: 15px;
            text-align: center;
            color: var(--text-color-dark);
        }

        .price-list-header {
            background-color: var(--header-bg-grey);
            color: var(--text-color-dark);
            padding: 10px 8px;
            /* Adjusted padding */
            font-size: 1.05em;
            /* Adjusted size */
            font-weight: 700;
            /* Bold */
            border-radius: 10px 10px 0 0;
            /* Slightly less radius */
            margin-top: 20px;
            text-align: center;
            font-family: var(--font-arabic);
            /* Ensure Arabic font */
        }

        /* Mobile Table Styling (Card Layout - Accuracy Focused) */
        .price-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 0 0 10px 10px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
        }

        .price-table thead {
            /* Hide table header accessibly */
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .price-table tr {
            display: block;
            border-bottom: 1px solid var(--border-color-light);
            /* Thin separator */
            background-color: #ffffff;
        }

        .price-table tr:last-child {
            border-bottom: none;
        }

        .price-table td {
            display: block;
            padding: 12px 10px;
            /* Consistent padding */
            position: relative;
            min-height: 1.8em;
            /* Ensure min height */
            font-size: 1em;
            /* Base font size for table content */
        }

        /* Separator line *within* a card */
        .price-table td:not(:last-child) {
            border-bottom: 1px dashed #eee;
            /* Very light dashed line */
        }

        /* Label Styling */
        .price-table td::before {
            content: attr(data-label);
            position: absolute;
            top: 12px;
            /* Align with padding top */
            left: 10px;
            width: 35%;
            /* Define label width */
            padding-right: 10px;
            font-weight: 700;
            /* Bold label */
            text-align: left;
            font-size: 0.8em;
            /* Smaller label font */
            color: var(--text-color-medium);
            font-family: var(--font-arabic);
            /* Label in Arabic font */
            white-space: nowrap;
        }

        /* Content Styling - Type of Work */
        .price-table td:first-child {
            text-align: right !important;
            /* Align content to the right */
            padding-left: 40%;
            /* Make space for the label */
            font-family: var(--font-arabic);
            font-weight: 400;
            /* Regular weight */
        }

        .price-table td:first-child .latin-part {
            font-family: var(--font-latin);
            font-size: 0.85em;
            /* Slightly smaller Latin part */
            color: var(--text-color-medium);
            margin-right: 8px;
            /* Space between Arabic and Latin */
            direction: ltr;
            display: inline-block;
            /* Ensure proper spacing */
        }

        /* Content Styling - Price */
        .price-table td:last-child {
            text-align: left !important;
            /* Align price content left */
            padding-left: 40%;
            /* Make space for the label */
            direction: ltr;
            font-family: var(--font-latin);
            font-weight: 700;
            /* Bold price */
            font-size: 1.1em;
            /* Slightly larger price */
        }

        /* Reposition Price Label */
        .price-table td:last-child::before {
            text-align: left;
            /* Keep label text aligned left */
            /* Position remains left: 10px */
        }

        .footer-notes {
            margin-top: 30px;
            /* More space above footer */
            font-size: 0.9em;
            /* Slightly smaller */
            text-align: center;
            padding: 0 15px;
            color: var(--text-color-dark);
            font-weight: 400;
            /* Regular weight */
        }

        .contact-info {
            margin-top: 15px;
            font-size: 0.85em;
            /* Adjusted size */
            text-align: center;
            direction: rtl;
        }

        .contact-info span {
            display: block;
            margin: 8px 0;
            /* Increased vertical space */
            white-space: normal;
            line-height: 1.5;
            /* Ensure readability */
            font-weight: 400;
        }

        .contact-icon {
            display: inline-block;
            width: 18px;
            /* Slightly larger icon */
            height: 18px;
            border-radius: 50%;
            /* Circular */
            vertical-align: middle;
            margin-left: 6px;
            /* Space after icon (RTL) */
            margin-right: -2px;
            /* Fine-tune position */
            background-color: #ccc;
            /* Placeholder */
        }

        .icon-whatsapp-small {
            background-color: #25d366;
        }

        .icon-phone-small {
            background-color: var(--text-color-dark);
        }

        /* Dark icon */
        .icon-location-small {
            background-color: #999;
        }

        /* Location icon color */
    </style>
@endsection
