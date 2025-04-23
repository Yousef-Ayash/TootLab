<footer class="bg-white border-t py-4">
    <div class="container mx-auto text-center text-gray-600 text-sm">
        &copy; {{ date('Y') }} ToothLab Dental Lab. All Rights Reserved.
    </div>
</footer>

@if (request()->route()->getName() == 'login')
    <style>
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
    </style>
@elseif(request()->route()->getName() == 'role-select')
    <style>
        .footer {
            /* Removed margin-top: auto; as flex-grow on main-container handles it */
            padding-bottom: 20px;
            width: 100%;
            text-align: center;
            /* Ensure footer text is centered */
            margin-top: 20px;
            /* Add some space above footer */
        }

        .social-icons {
            margin-bottom: 10px;
        }

        /* Social Icon Placeholder Styling */
        .icon-placeholder {
            display: inline-block;
            width: 24px;
            height: 24px;
            background-color: #444;
            color: #ccc;
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
            color: #aaaaaa;
            margin: 0;
            letter-spacing: 0.5px;
        }
    </style>
@endif
