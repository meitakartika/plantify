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

    .person-icon {
        color: #1D2F33;
        font-size: 24px;
        transition: color 0.2s ease;
        margin-top: 4px;
    }

    .person-icon:hover {
        color: #258075;
    }

    .cart-icon {
        position: relative;
        display: inline-flex;
        align-items: center;
        font-size: 22px;
        color: #1D2F33;
        text-decoration: none;
    }

    .cart-icon:hover {
        color: #258075;
    }

    .cart-badge {
        position: absolute;
        top: -6px;
        right: -10px;
        min-width: 16px;
        height: 16px;
        padding: 0 5px;
        background: #258075;
        color: #fff;
        font-size: 10px;
        font-weight: 600;
        border-radius: 999px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        pointer-events: none;
    }

    /* BURGER MENU */
    .burger {
        display: none;
        background: none;
        border: none;
        font-size: 28px;
        cursor: pointer;
        color: #1D2F33;
    }

    /* MOBILE */
    @media (max-width: 768px) {
        .burger {
            display: block;
        }

        .nav-menu {
            position: absolute;
            top: 72px;
            left: 0;
            width: 100%;
            background: #fff;
            flex-direction: column;
            align-items: center;
            gap: 24px;
            padding: 32px 0;
            display: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .nav-menu.show {
            display: flex;
        }

        .nav-icons {
            gap: 20px;
        }

        .nav-menu a.active::after {
            display: none;
        }
    }
</style>

<body>
    <header class="navbar">
        <div class="container">

            <button class="burger" id="burger">
                <i class="bi bi-list"></i>
            </button>

            <a href="/" class="logo">
                <img src="/images/logo-plantify1.png" alt="Plantify Logo">
            </a>

            <nav class="nav-menu" id="navMenu">
                <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('products') }}" class="{{ Route::is('products') ? 'active' : '' }}">Product</a>
                <a href="{{ route('about') }}" class="{{ Route::is('about') ? 'active' : '' }}">About Us</a>
            </nav>

            <div class="nav-icons">
                <a href="{{ route('cart') }}" class="cart-icon" id="cartBtn">
                    <i class="bi bi-cart3"></i>
                    <span class="cart-badge" id="cartBadge">0</span>
                </a>
                <a href="{{ route('login') }}" class="person-icon"><i class="bi bi-person"></i></a>
            </div>
        </div>
    </header>
</body>

<script>
    const burger = document.getElementById('burger');
    const navMenu = document.getElementById('navMenu');

    burger.addEventListener('click', () => {
        navMenu.classList.toggle('show');
    });
</script>
