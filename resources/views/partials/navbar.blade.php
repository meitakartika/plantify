<style>
        .navbar {
            background: #fff;
            border-bottom: 1px solid #eee;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .logo img {
            width: 132px;
            height: 36px;
        }

        .nav-menu {
            display: flex;
            gap: 48px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #1D2F33;
            font-size: 16px;
            position: relative;
        }

        .nav-menu a.active {
            color: #258075;
        }

        .nav-menu a.active::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -24px;
            width: 100%;
            height: 2px;
            background: #258075;
            border-radius: 2px;
        }

        .nav-icons {
            display: flex;
            gap: 36px;
        }

        .nav-icons a {
            color: #1D2F33;
            font-size: 22px;
            transition: color 0.2s ease;
        }

        .nav-icons a:hover {
            color: #258075;
        }
    </style>

<body>
<header class="navbar">
    <div class="container">
        <a href="/" class="logo">
            <img src="/images/logo-plantify1.png" alt="Plantify Logo">
        </a>

        <nav class="nav-menu">
            <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('products') }}" class="{{ Route::is('products') ? 'active' : '' }}">Product</a>
            <a href="{{ route('about') }}" class="{{ Route::is('about') ? 'active' : '' }}">About Us</a>
        </nav>

        <div class="nav-icons">
            <a href="/cart"><i class="bi bi-cart3"></i></a>
            <a href="/profile"><i class="bi bi-person"></i></a>
        </div>
    </div>
</header>
</body>