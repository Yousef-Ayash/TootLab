<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title') — ToothLab</title>
    {{-- @vite('resources/css/app.css') --}}
    @vite('resources/css/app.css')
</head>

<body>
    @include('partials.nav')
    <main class="container">
        @yield('content')
    </main>
    @stack('scripts')
</body>

</html>
