<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ToothLab')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        @include('partials.nav')

        <main class="flex-1 container mx-auto px-4 py-6">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>
    @stack('scripts')
</body>

</html>
