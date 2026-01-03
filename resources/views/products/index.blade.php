@extends('layout.app')

@section('title', 'Products | Plantify')

<style>
    .products-page {
        padding: 60px 0;
        max-width: 1200px;
        margin: auto;
    }

    /* HEADER */
    .products-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .products-header h2 {
        font-size: 32px;
        font-weight: 700;
        color: #1E1E1E;
        margin-bottom: 20px;
    }

    .products-header p {
        font-size: 18px;
        max-width: 680px;
        margin: 12px auto 0;
        color: rgba(29, 47, 51, 0.8);
    }

    /* DEALS */
    .deals {
        background: #1D2F33;
        border-radius: 24px;
        padding: 48px;
        color: #fff;
        margin-bottom: 60px;
    }

    .label {
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 16px;
        text-align: center;
    }

    .deals h3 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 40px;
        text-align: center;
    }

    .deals-wrapper {
        display: flex;
        gap: 24px;
        overflow-x: auto;
        scroll-behavior: smooth;
        padding-bottom: 8px;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .deals-wrapper::-webkit-scrollbar {
        display: none;
    }

    .deals-viewport {
        display: flex;
        gap: 24px;
        overflow-x: auto;
        padding-bottom: 10px;
        scrollbar-width: none;
    }

    .deals-track {
        display: flex;
        gap: 24px;
        transition: transform 0.4s ease;
    }

    .deal-card {
        width: 480px;
        min-height: 180px;
        background: #fff;
        color: #1D2F33;
        border-radius: 16px;
        display: flex;
        gap: 20px;
        padding: 20px;
        flex-shrink: 0;
    }

    .deal-card img {
        width: 220px;
        height: 170px;
        border-radius: 12px;
    }

    .category {
        margin-top: 4px;
        font-size: 14px;
        color: #4CBA9B;
    }

    .deal-info h4 {
        font-size: 20px;
        margin-top: 4px;
        margin-bottom: 6px;
        font-weight: 600;
    }

    .price {
        font-size: 16px;
        margin-bottom: 8px;
    }

    .deal-desc {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .deal-info a {
        color: #4CBA9B;
        font-weight: 600;
        font-size: 14px;
    }

    .search-box {
        display: flex;
        align-items: center;
        gap: 16px;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 8px;
        padding: 10px 14px;
        cursor: text;
    }

    .search-box input {
        border: none;
        outline: none;
        width: 100%;
        background: transparent;
    }

    /* PRODUCT GRID */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .product-card {
        background: transparent;
        border: 1.5px solid #E3ECEA;
        border-radius: 16px;
        padding: 12px;
        transition: all 0.3 ease;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .product-card:hover {
        border-color: #4CBA9B;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
    }

    .product-card img {
        width: 100%;
        height: 280px;
        border-radius: 12px;
        margin-bottom: 12px;
    }

    .product-list-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 24px;
        margin-bottom: 24px;
    }

    .product-list-header h4 {
        font-size: 24px;
        font-weight: 600;
        align-items: center;
    }

    .product-list-header h4 span {
        background: #EBF5F3;
        color: #258075;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 16px;
        margin-left: 8px;
        font-weight: 600;
    }

    .product-card .category {
        margin-top: 4px;
        margin-left: 8px;
        font-size: 14px;
        color: #4CBA9B;
    }

    .product-card h4 {
        font-size: 20px;
        margin-top: 4px;
        margin-bottom: 6px;
        margin-left: 8px;
        margin-right: 8px;
        font-weight: 600;
    }

    .product-card .price {
        font-size: 16px;
        margin-bottom: 8px;
        margin-left: 8px;
    }

    .product-card .price del {
        font-size: 16px;
        margin-bottom: 8px;
        margin-left: 4px;
        color: rgba(0, 0, 0, .4);
    }

    .product-card .desc {
        font-size: 14px;
        margin-bottom: 10px;
        margin-left: 8px;
        margin-right: 8px;
    }

    /* PAGINATION */
    .pagination {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 48px;
    }

    .page-btn {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        border: none;
        background: #EBF5F3;
        cursor: pointer;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .page-btn i {
        font-size: 18px;
    }

    .page-btn.active {
        background: #4CBA9B;
        color: #fff;
    }

    .page-btn:hover {
        background: #4CBA9B;
    }

    .page-btn:disabled {
        opacity: 0.4;
        cursor: not-allowed;
        background: #EBF5F3;
    }

    .page-btn:disabled:hover {
        background: #EBF5F3;
    }

    /* TABLET */
    @media (max-width: 1023px) {

        .products-page {
            padding: 40px 16px;
        }

        /* DEALS */
        .deal-card {
            width: 360px;
        }

        .deal-card img {
            width: 160px;
            height: 140px;
        }

        /* PRODUCT GRID */
        .product-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .product-card img {
            height: 240px;
        }

        /* HEADER */
        .products-header h2 {
            font-size: 28px;
        }

        .products-header p {
            font-size: 16px;
        }
    }

    /* MOBILE */
    @media (max-width: 767px) {

        /* HEADER */
        .products-header {
            margin-bottom: 40px;
        }

        .products-header h2 {
            font-size: 24px;
        }

        .products-header p {
            font-size: 15px;
        }

        /* DEALS */
        .deals {
            padding: 32px 20px;
            border-radius: 20px;
        }

        .deals h3 {
            font-size: 24px;
            margin-bottom: 24px;
        }

        .deal-card {
            width: 100%;
            flex-direction: column;
        }

        .deal-card img {
            width: 100%;
            height: 200px;
        }

        /* SEARCH */
        .search-box {
            margin-top: 24px;
            margin-bottom: 16px;
        }

        /* PRODUCT LIST HEADER */
        .product-list-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .product-list-header h4 {
            font-size: 20px;
        }

        /* PRODUCT GRID */
        .product-grid {
            grid-template-columns: 1fr;
        }

        .product-card img {
            height: 220px;
        }

        /* PAGINATION */
        .pagination {
            margin-top: 32px;
        }

        .page-btn {
            width: 34px;
            height: 34px;
        }
    }
</style>

@php
    $products = include app_path('Data/ProductData.php');
@endphp

@section('content')
    <section class="products-page">

        <!-- HEADER -->
        <div class="products-header">
            <h2>Products</h2>
            <p>We display products based on the latest products we have, if you want to see our old products please enter
                the name of the item or filter by category.</p>
        </div>

        <!-- DEALS -->
        <section class="deals">
            <p class="label">TODAY DEALS</p>
            <h3>Deals of the Day</h3>

            <div class="deals-viewport">
    <div class="deals-track" id="dealsTrack">
        @foreach([3,7,9] as $productId) {{-- 3 produk deals --}}
            @php
                $product = $products[$productId];
            @endphp
            <div class="deal-card">
                <img src="{{ $product['img'] }}" alt="{{ $product['name'] }}">
                <div class="deal-info">
                    <span class="category">{{ $product['category'] }}</span>
                    <h4>{{ $product['name'] }}</h4>
                    <p class="price">{{ $product['price'] }}
                        @if(isset($product['old_price']))
                            <del>{{ $product['old_price'] }}</del>
                        @endif
                    </p>
                    <p class="deal-desc">{{ $product['desc'] }}</p>
                    <a href="{{ route('products.show', $productId) }}">Shop Now →</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
        </section>

        <!-- SEARCH -->
        <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text" placeholder="Search plant">
        </div>

        <!-- PRODUCT LIST -->
        <div class="product-list-header">
            <h4>Total Product <span>184</span></h4>
            <button class="icon-btn">
                <i class="bi bi-sort-down"></i> Sort By
            </button>
        </div>

        <div class="product-grid">
            @foreach ($products as $index => $product)
                <a href="{{ route('products.show', $index) }}" class="product-card">
                    <img src="{{ $product['img'] }}" alt="">
                    <span class="category">{{ $product['category'] }}</span>
                    <h4>{{ $product['name'] }}</h4>
                    <p class="price">
                        {{ $product['price'] }}
                        @if (!empty($product['old_price']))
                            <del>{{ $product['old_price'] }}</del>
                        @endif
                    </p>
                    <p class="desc">{{ $product['desc'] }}</p>
                </a>
            @endforeach
        </div>

        <!-- PAGINATION -->
        <div class="pagination">
            <button class="page-btn prev">
                <i class="bi bi-chevron-left"></i>
            </button>

            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>

            <button class="page-btn next">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>

    </section>
@endsection

@push('scripts')
    <script>
        const slider = document.querySelector(".deals-viewport");

        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener("mousedown", (e) => {
            isDown = true;
            slider.classList.add("dragging");
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });

        slider.addEventListener("mouseleave", () => {
            isDown = false;
        });

        slider.addEventListener("mouseup", () => {
            isDown = false;
        });

        slider.addEventListener("mousemove", (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 1.2;
            slider.scrollLeft = scrollLeft - walk;
        });

        // PAGINATION 
        document.addEventListener("DOMContentLoaded", () => {

            const pages = document.querySelectorAll(".page-btn:not(.prev):not(.next)");
            const prev = document.querySelector(".page-btn.prev");
            const next = document.querySelector(".page-btn.next");

            let current = 0;

            function updatePagination() {
                // active page
                pages.forEach(p => p.classList.remove("active"));
                pages[current].classList.add("active");

                // disable logic
                prev.disabled = current === 0;
                next.disabled = current === pages.length - 1;
            }

            pages.forEach((btn, index) => {
                btn.addEventListener("click", () => {
                    current = index;
                    updatePagination();
                });
            });

            next.addEventListener("click", () => {
                if (current < pages.length - 1) {
                    current++;
                    updatePagination();
                }
            });

            prev.addEventListener("click", () => {
                if (current > 0) {
                    current--;
                    updatePagination();
                }
            });

            updatePagination();
        });
    </script>
@endpush
