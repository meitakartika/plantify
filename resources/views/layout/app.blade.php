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

    <script>
        function updateCartBadge() {
            const badge = document.getElementById('cartBadge');
            if (!badge) return;

            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);

            badge.textContent = totalQty;
            badge.style.display = totalQty > 0 ? 'flex' : 'none';
        }

        document.addEventListener("DOMContentLoaded", updateCartBadge);

        window.addEventListener("storage", updateCartBadge);
    </script>

    @stack('scripts')
</body>

</html>
