@extends('layout.app')

@section('title', $product['name'] . ' | Plantify')

<style>
    /* DETAIL PAGE */
    .product-detail {
        max-width: 1200px;
        margin: 80px auto;
        padding: 0 16px;
    }

    .detail-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 64px;
        align-items: center;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 24px;
        font-size: 18px;
        font-weight: 600;
        color: #258075;
        text-decoration: none;
        text-align: center;
    }

    .back-btn i {
        font-size: 24px;
    }

    .back-btn:hover {
        opacity: 0.8;
    }

    /* IMAGE */
    .detail-image img {
        width: 100%;
        border-radius: 20px;
        background: #f3f3f3;
    }

    /* INFO */
    .detail-info .category {
        color: #4CBA9B;
        font-weight: 600;
        font-size: 18px;
    }

    .detail-info h1 {
        font-size: 32px;
        font-weight: 700;
        margin: 12px 0 20px;
    }

    .detail-desc {
        font-size: 16px;
        line-height: 1.6;
        color: rgba(29, 47, 51, 0.8);
        margin-bottom: 24px;
        color: #4A4A4A;
    }

    .long-desc {
        display: none;
        margin-top: 12px;
    }

    .read-more-btn {
        background: none;
        border: none;
        color: #236A55;
        font-weight: 600;
        cursor: pointer;
        padding: 0;
        margin-left: 6px;
    }

    /* PRICE */
    .detail-price {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 32px;
    }

    .detail-price .current {
        font-size: 28px;
        font-weight: 700;
    }

    .detail-price del {
        font-size: 24px;
        color: rgba(0, 0, 0, .4);
    }

    /* ACTIONS */
    .detail-actions {
        display: flex;
        gap: 16px;
        width: 100%;
    }

    .btn-primary {
        background: #C1DCDC;
        color: #1D2F33;
    }

    .btn-outline {
        border: 1.5px solid #E3ECEA;
        color: #1D2F33;
    }

    .btn-primary,
    .btn-outline {
        flex: 1;
        padding: 16px 0;
        text-align: center;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
    }

    .btn-primary:hover {
        background: #EBF5F3;
    }

    .btn-outline:hover {
        border-color: #4CBA9B;
    }

    /* RELATED */
    .related {
        margin-top: 100px;
    }

    .related h3 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 32px;
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
        transition: all 0.3s ease;
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
        object-fit: cover;
    }

    .product-card .category {
        margin-top: 4px;
        margin-left: 8px;
        font-size: 14px;
        color: #4CBA9B;
    }

    .product-card h4 {
        font-size: 20px;
        margin: 4px 8px 6px;
        font-weight: 600;
    }

    .product-card .price {
        font-size: 16px;
        margin: 0 8px 8px;
    }

    .product-card .price del {
        margin-left: 4px;
        color: rgba(0, 0, 0, .4);
    }

    .product-card .desc {
        font-size: 14px;
        margin: 0 8px 10px;
        color: #4A4A4A;
    }

    .no-related {
        border: 1.5px dashed #E3ECEA;
        border-radius: 16px;
        padding: 48px;
        text-align: center;
        color: #4A4A4A;
    }

    .no-related p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .no-related .btn-outline {
        display: inline-block;
        padding: 12px 32px;
        border-radius: 12px;
    }

    /* TABLET */
    @media (max-width: 1023px) {

        .product-detail {
            margin: 60px auto;
        }

        .detail-wrapper {
            grid-template-columns: 1fr;
            gap: 48px;
        }

        .detail-image img {
            max-height: 420px;
            object-fit: cover;
        }

        .detail-info h1 {
            font-size: 28px;
        }

        .detail-desc {
            font-size: 15px;
        }

        .detail-price .current {
            font-size: 24px;
        }

        .detail-price del {
            font-size: 20px;
        }

        /* RELATED */
        .product-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* MOBILE */
    @media (max-width: 767px) {

        .product-detail {
            margin: 40px auto;
        }

        .back-btn {
            font-size: 16px;
            gap: 6px;
        }

        .back-btn i {
            font-size: 20px;
        }

        .detail-image img {
            max-height: 320px;
        }

        .detail-info .category {
            font-size: 16px;
        }

        .detail-info h1 {
            font-size: 24px;
            margin-bottom: 16px;
        }

        .detail-desc {
            font-size: 14px;
        }

        .read-more-btn {
            display: inline-block;
            margin-top: 8px;
        }

        .detail-price {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .detail-price .current {
            font-size: 22px;
        }

        .detail-actions {
            flex-direction: column;
            gap: 12px;
        }

        .btn-primary,
        .btn-outline {
            padding: 14px 0;
            font-size: 15px;
        }

        /* RELATED */
        .related {
            margin-top: 64px;
        }

        .related h3 {
            font-size: 22px;
            margin-bottom: 24px;
        }

        .product-grid {
            grid-template-columns: 1fr;
        }

        .product-card img {
            height: 220px;
        }

        .no-related {
            padding: 32px 20px;
        }

        .no-related p {
            font-size: 16px;
        }
    }
</style>

@section('content')
    <section class="product-detail">

        <a href="{{ route('products') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>

        <!-- DETAIL -->
        <div class="detail-wrapper">
            <div class="detail-image">
                <img src="{{ $product['img'] }}" alt="{{ $product['name'] }}">
            </div>

            <div class="detail-info">
                <span class="category">{{ $product['category'] }}</span>
                <h1>{{ $product['name'] }}</h1>

                <div class="detail-desc">

                    <p class="short-desc">
                        {{ $product['desc'] }}
                        <button class="read-more-btn read-more" onclick="toggleDesc(this)">
                            Read More
                        </button>
                    </p>

                    <div class="long-desc">
                        <p>{!! nl2br($product['long_desc']) !!}</p>
                        <button class="read-more-btn read-less" onclick="toggleDesc(this)">
                            Read Less
                        </button>
                    </div>
                </div>

                <div class="detail-price">
                    <span class="current">{{ $product['price'] }}</span>

                    @if (!empty($product['old_price']))
                        <del>{{ $product['old_price'] }}</del>
                    @endif
                </div>

                <div class="detail-actions">
                    <a href="/checkout" class="btn-primary">Buy Now</a>
                    <a href="/cart" class="btn-outline">Add to Cart</a>
                </div>
            </div>
        </div>

        <!-- RELATED -->
        <div class="related">
            <h3>Related Plants</h3>

            @if ($related->count() > 0)
                <div class="product-grid">
                    @foreach ($related as $id => $item)
                        <a href="/products/{{ $id }}" class="product-card">
                            <img src="{{ $item['img'] }}" alt="{{ $item['name'] }}">
                            <span class="category">{{ $item['category'] }}</span>
                            <h4>{{ $item['name'] }}</h4>
                            <p class="price">
                                {{ $item['price'] }}
                                @if (!empty($item['old_price']))
                                    <del>{{ $item['old_price'] }}</del>
                                @endif
                            </p>
                            <p class="desc">{{ $item['desc'] }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="no-related">
                    <p>No related plants available in this category 🌱</p>
                    <a href="{{ route('products') }}" class="btn-outline">
                        Browse All Plants
                    </a>
                </div>
            @endif
        </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
    function toggleDesc(btn) {
        const wrapper = btn.closest('.detail-desc');
        const longDesc = wrapper.querySelector('.long-desc');
        const readMoreBtn = wrapper.querySelector('.read-more');

        if (longDesc.style.display === 'block') {
            longDesc.style.display = 'none';
            readMoreBtn.style.display = 'inline';
        } else {
            longDesc.style.display = 'block';
            readMoreBtn.style.display = 'none';
        }
    }
</script>
@endpush
