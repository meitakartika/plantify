<!doctype html>
<html lang="en" class="font-sans">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Plantify')</title>

    <!-- Tailwind + CSS -->
    @vite('resources/css/app.css')

    @stack('styles')
</head>

<body>

    <!-- ===== NAVBAR ===== -->
    @include('partials.navbar')

    <!-- ===== PAGE CONTENT ===== -->
    <main>
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    @include('partials.footer')

    <!-- JS -->
     @vite('resources/js/app.js')

    @stack('scripts')
</body>
</html>
