@extends('layout.app')

@section('title', 'Home | Plantify')

<style>
    /* HERO */
    .hero {
        max-width: 1200px;
        margin: 60px auto;
        background: #C1DCDC;
        border-radius: 20px;
        padding: 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .hero h1 {
        font-size: 48px;
        margin-bottom: 32px;
        font-weight: 700;
        line-height: 1.1;
    }

    .hero-stats {
        display: flex;
        gap: 32px;
        margin-bottom: 24px;
    }

    .hero-stats .stat {
        position: relative;
        padding-right: 36px;
    }

    .hero-stats .stat:first-child::after {
        content: "";
        position: absolute;
        top: 10%;
        right: 0;
        width: 1px;
        height: 80%;
        background-color: #000;
    }

    .hero-stats strong {
        font-size: 24px;
        font-weight: 600;
    }

    .search-box {
        display: flex;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        width: 400px;
    }

    .search-box input {
        border: none;
        padding: 12px;
        flex: 1;
    }

    .search-box button {
        background: #258075;
        color: #fff;
        border: none;
        padding: 0 18px;
    }

    .hero-image {
        display: flex;
        align-items: flex-end;
        gap: 12px;
        margin-bottom: -60px;
    }

    .hero-image img {
        width: 380px;
        height: 400px;
    }

    /* RESPONSIVE HERO */
    @media (max-width: 768px) {
        .hero {
            flex-direction: column;
            text-align: center;
            padding: 40px 24px;
            margin: 24px 16px;
        }

        .hero h1 {
            font-size: 32px;
            margin-bottom: 24px;
        }

        .hero-stats {
            justify-content: center;
            gap: 24px;
        }

        .hero-stats .stat {
            padding-right: 0;
        }

        .hero-stats .stat:first-child::after {
            display: none;
        }

        .search-box {
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
        }

        .hero-image {
            margin-top: 32px;
            margin-bottom: 0;
            justify-content: center;
        }

        .hero-image img {
            width: 260px;
            height: auto;
        }
    }

    /* BEST SELLING */
    .best-selling {
        max-width: 1200px;
        margin: 80px auto;
        display: flex;
        gap: 64px;
        align-items: flex-start;
    }

    .section-header {
        max-width: 320px;
        margin-top: 36px;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
        flex: 1;
    }

    .product-card {
        padding: 24px;
        border-radius: 16px;
        text-align: center;
    }

    .section-header h3 {
        font-size: 28px;
        font-weight: 700;
        line-height: 1.5;
        color: #1E1E1E;
        margin-bottom: 16px;
    }

    .section-header p {
        font-size: 18px;
        line-height: 1.6;
        color: rgba(30, 30, 30, 0.6);
        margin-bottom: 24px;
    }

    .link-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        background: #C1DCDC;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .link-btn::after {
        content: "→";
        font-size: 24px;
        line-height: 1;
        margin-left: 4px;
        display: flex;
        align-items: center;
    }

    .link-btn:hover {
        background: #EBF5F3;
    }

    .product-card h4 {
        margin-top: 20px;
        margin-bottom: 4px;
        font-size: 16px;
        font-weight: 600;
    }

    .product-card span {
        color: rgba(30, 30, 30, 0.6);
        font-size: 14px;
    }

    /* TABLET */
    @media (max-width: 1024px) {
        .best-selling {
            flex-direction: column;
            gap: 48px;
            padding: 0 24px;
        }

        .section-header {
            max-width: 100%;
            margin-top: 0;
        }

        .product-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }
    }

    /* MOBILE */
    @media (max-width: 768px) {
        .best-selling {
            margin: 60px auto;
            gap: 32px;
        }

        .section-header {
            text-align: center;
        }

        .section-header h3 {
            font-size: 24px;
        }

        .section-header p {
            font-size: 14px;
        }

        .link-btn {
            margin: 0 auto;
        }

        .product-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .product-card {
            padding: 16px;
        }

        .product-card h4 {
            font-size: 15px;
        }

        .product-card span {
            font-size: 13px;
        }
    }

    /* WHY US */
    .why-us {
        background: #f1f7f6;
        padding: 80px 0;
        text-align: center;
    }

    .why-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        max-width: 1000px;
        margin: 40px auto 0;
    }

    .why-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

    .why-card i {
        font-size: 28px;
        background: #1D2F33;
        color: #7EC676;
        width: 62px;
        height: 62px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
    }

    .why-us h2 {
        font-size: 32px;
        font-weight: 700;
        color: #1E1E1E;
        margin-bottom: 16px;
    }

    .why-us p {
        font-size: 18px;
        color: rgba(29, 47, 51, 0.8);
        margin-bottom: 24px;
    }

    .why-us h4 {
        margin-top: 20px;
        margin-bottom: 8px;
        font-size: 20px;
        font-weight: 600;
    }

    .why-card p {
        color: rgba(30, 30, 30, 0.6);
        font-size: 16px;
        margin-left: 16px;
        margin-right: 16px;
    }

    /* TABLET */
    @media (max-width: 992px) {
        .why-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 32px;
            padding: 0 24px;
        }

        .why-us h2 {
            font-size: 28px;
        }

        .why-us p {
            font-size: 16px;
        }
    }

    /* MOBILE */
    @media (max-width: 576px) {
        .why-us {
            padding: 60px 0;
        }

        .why-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .why-card i {
            font-size: 24px;
            padding: 14px;
        }

        .why-us h2 {
            font-size: 24px;
        }

        .why-us p {
            font-size: 15px;
            padding: 0 20px;
        }

        .why-us h4 {
            font-size: 18px;
        }

        .why-card p {
            font-size: 14px;
        }
    }

    /* CATEGORY */
    .categories {
        max-width: 1200px;
        margin: 80px auto;
        text-align: center;
    }

    .category-grid {
        display: flex;
        gap: 32px;
        margin-top: 40px;
    }

    .category-wrapper {
        overflow-x: auto;
        padding-bottom: 10px;
        scrollbar-width: none;
    }

    .category-wrapper::-webkit-scrollbar {
        display: none;
    }

    .category-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        flex: 0 0 320px;
        scroll-snap-align: start;
    }

    .category-item img {
        width: 280px;
        height: 280px;
        object-fit: cover;
    }

    .category-item span {
        font-size: 18px;
        color: rgba(29, 47, 51, 0.8);
        margin-top: 24px;
        font-weight: 500;
    }

    .categories p {
        color: #4CBA9B;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 16px;
    }

    .categories h2 {
        font-size: 32px;
        font-weight: 700;
        color: #1E1E1E;
        margin-bottom: 24px;
    }

    /* TABLET */
    @media (max-width: 992px) {
        .category-wrapper {
            overflow-x: auto;
        }

        .category-grid {
            flex-wrap: nowrap;
            padding: 0 24px;
        }

        .category-item {
            flex: 0 0 260px;
        }

        .category-item img {
            width: 240px;
            height: 240px;
        }

        .categories h2 {
            font-size: 28px;
        }
    }

    /* MOBILE */
    @media (max-width: 576px) {
        .categories {
            margin: 60px auto;
        }

        .category-grid {
            gap: 20px;
        }

        .category-item {
            flex: 0 0 220px;
        }

        .category-item img {
            width: 200px;
            height: 200px;
        }

        .category-item span {
            font-size: 15px;
            margin-top: 16px;
        }

        .categories p {
            font-size: 14px;
        }

        .categories h2 {
            font-size: 24px;
        }
    }

    /* PROMO */
    .promo-section {
        background: #1D2F33;
        padding: 80px 0;
    }

    .promo {
        background: #EBF5F3;
        color: #000;
        max-width: 1200px;
        margin: 0 auto;
        border-radius: 20px;
        padding: 60px;
        display: flex;
        justify-content: space-between;
        overflow: hidden;
    }

    .promo-text span {
        color: #4CBA9B;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 20px;
    }

    .promo-text h3 {
        font-size: 28px;
        font-weight: 700;
        color: #1E1E1E;
        margin-top: 12px;
        margin-bottom: 16px;
    }

    .promo-text p {
        font-size: 16px;
        color: rgba(29, 47, 51, 0.8);
        margin-bottom: 24px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        background: #4CBA9B;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .btn::after {
        content: "→";
        font-size: 24px;
        line-height: 1;
        margin-left: 4px;
        display: flex;
        align-items: center;
    }

    .btn:hover {
        background: #EBF5F3;
    }

    .promo img {
        width: 620px;
        height: auto;
        object-fit: contain;
        margin-top: -60px;
        margin-bottom: -60px;
    }

    /* TABLET */
    @media (max-width: 992px) {
        .promo {
            padding: 40px;
            gap: 24px;
        }

        .promo img {
            width: 420px;
            margin-top: -40px;
            margin-bottom: -40px;
        }

        .promo-text h3 {
            font-size: 24px;
        }
    }

    /* MOBILE */
    @media (max-width: 576px) {
        .promo-section {
            padding: 60px 0;
        }

        .promo {
            flex-direction: column;
            text-align: center;
            padding: 32px 24px;
        }

        .promo-text span {
            font-size: 14px;
        }

        .promo-text h3 {
            font-size: 22px;
            line-height: 1.3;
        }

        .promo-text p {
            font-size: 15px;
        }

        .btn {
            justify-content: center;
        }

        .promo img {
            width: 100%;
            max-width: 320px;
            margin: 24px auto 0;
        }
    }

    /* TESTIMONIAL */
    .testimonial {
        max-width: 1200px;
        margin: 80px auto;
    }

    .testimonial-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 32px;
    }

    .indicator {
        display: flex;
        gap: 6px;
    }

    .indicator span {
        width: 20px;
        height: 4px;
        background: #E0E0E0;
        border-radius: 4px;
    }

    .indicator span.active {
        background: #8FBFB8;
    }

    .testimonial h3 {
        font-size: 28px;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 32px;
        color: #1E1E1E;
    }

    .testimonial-wrapper {
        overflow: hidden;
    }

    .testimonial-grid {
        display: flex;
        gap: 32px;
        transition: transform 0.6s
    }

    .testimonial-card {
        flex: 0 0 584px;
        background: #D3E7E5;
        padding: 32px;
        border-radius: 16px;
        position: relative;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        max-width: 584px;
    }

    .testimonial-card .quote {
        font-size: 40px;
        font-weight: 700;
        margin-bottom: 4px;
        color: #1E1E1E;
    }

    .testimonial-card p {
        color: rgba(30, 30, 30, 0.6);
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 24px;
    }

    .testimonial-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .user {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .avatar {
        width: 40px;
        height: 40px;
        background: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .avatar i {
        font-size: 20px;
        color: #1D2F33;
    }

    .user span {
        font-weight: 700;
        font-size: 14px;
        color: #1E1E1E;
    }

    .rating {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 700;
        color: #1E1E1E;
    }

    .rating i {
        font-size: 16px;
        color: #1E1E1E;
    }

    /* TABLET */
    @media (max-width: 992px) {
        .testimonial {
            padding: 0 24px;
        }

        .testimonial-card {
            flex: 0 0 480px;
            max-width: 480px;
            padding: 28px;
        }

        .testimonial h3 {
            font-size: 24px;
        }

        .indicator span {
            width: 16px;
        }
    }

    /* MOBILE */
    @media (max-width: 576px) {
        .testimonial-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
        }

        .testimonial h3 {
            font-size: 22px;
        }

        .testimonial-wrapper {
            overflow-x: auto;
            scroll-snap-type: x mandatory;
        }

        .testimonial-grid {
            gap: 16px;
        }

        .testimonial-card {
            flex: 0 0 100%;
            max-width: 100%;
            scroll-snap-align: start;
            padding: 24px;
        }

        .testimonial-card p {
            font-size: 15px;
        }

        .indicator {
            align-self: flex-start;
        }
    }
</style>

@section('content')
    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <h1>Buy your<br>dream plants</h1>

            <div class="hero-stats">
                <div class="stat">
                    <strong>50+</strong><br>
                    <span>Plant Species</span>
                </div>
                <div class="stat">
                    <strong>300+</strong><br>
                    <span>Customers</span>
                </div>
            </div>

            <div class="search-box">
                <input type="text" placeholder="What are you looking for?">
                <button><i class="bi bi-search"></i></button>
            </div>
        </div>

        <div class="hero-image">
            <img src="/images/hero-plant.png" alt="Plant">
        </div>
    </section>

    <!-- BEST SELLING -->
    <section class="best-selling">
        <div class="section-header">
            <h3>Best Selling<br>Plants</h3>
            <p>Easiest way to healthy life by buying your favorite plants</p>
            <a href="{{ route('products') }}" class="link-btn">See more</a>
        </div>

        <div class="product-grid">
            <div class="product-card">
                <img src="/images/product1.png">
                <h4>Natural Plants</h4>
                <span>Rp 140.000</span>
            </div>

            <div class="product-card">
                <img src="/images/product2.png">
                <h4>Artificial Plants</h4>
                <span>Rp 90.000</span>
            </div>

            <div class="product-card">
                <img src="/images/product3.png">
                <h4>Artificial Plants</h4>
                <span>Rp 350.000</span>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US -->
    <section class="why-us">
        <h2>Why Choose Us?</h2>
        <p>Order now and appreciate the beauty of nature</p>

        <div class="why-grid">
            <div class="why-card">
                <i class="bi bi-flower1"></i>
                <h4>Large Assortment</h4>
                <p>From indoor to outdoor, we offer a diverse selection of plants to suit every space and lifestyle</p>
            </div>

            <div class="why-card">
                <i class="bi bi-box"></i>
                <h4>Fast & Free Shipping</h4>
                <p>Your plants are carefully packed and delivered fresh to your door with safe and reliable shipping</p>
            </div>

            <div class="why-card">
                <i class="bi bi-telephone-outbound"></i>
                <h4>24/7 Support</h4>
                <p>Need help choosing or caring for your plants? Our support team is always ready to assist you anytime</p>
            </div>
        </div>
    </section>

    <!-- CATEGORY -->
    <section class="categories">
        <p>OUR CATEGORIES</p>
        <h2>Shop By Category</h2>

        <div class="category-wrapper">
            <div class="category-grid">
                <div class="category-item"><img src="/images/cat1.png"><span>Indoor Plants</span></div>
                <div class="category-item"><img src="/images/cat2.png"><span>Outdoor Plants</span></div>
                <div class="category-item"><img src="/images/cat3.png"><span>Office Desk Plants</span></div>
                <div class="category-item"><img src="/images/cat4.png"><span>Pots & Accessories</span></div>
                <div class="category-item"><img src="/images/cat5.png"><span>Gift Plants & Combo</span></div>
            </div>
        </div>
    </section>

    <!-- PROMO -->
    <section class="promo-section">
        <div class="promo">
            <div class="promo-text">
                <span>WEEKLY OFFER DEALS</span>
                <h3>Exclusive Discounts<br>on Must-Have Greens!</h3>
                <p>Let nature thrive in your living space!</p>
                <a href="{{ route('products') }}" class="btn">Shop Now</a>
            </div>

            <img src="/images/promo-plant.png">
        </div>
    </section>

    <!-- TESTIMONIAL -->
    <section class="testimonial">
        <div class="testimonial-header">
            <h3>What customers say about<br>plantify?</h3>

            <div class="indicator">
                <span class="active"></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="testimonial-wrapper">
            <div class="testimonial-grid" id="testimonialSlider">
                <div class="testimonial-card">
                    <div class="quote">“</div>
                    <p>Plants arrived fresh and well packaged. The quality exceeded my expectations.</p>
                    <div class="testimonial-footer">
                        <div class="user">
                            <div class="avatar">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <span>Janne Cooper</span>
                        </div>
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <span>4.9</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="quote">“</div>
                    <p>The plants look exactly like the photos. They really make my home feel more alive.</p>
                    <div class="testimonial-footer">
                        <div class="user">
                            <div class="avatar">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <span>Michael Brown</span>
                        </div>
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <span>4.8</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="quote">“</div>
                    <p>Fast delivery and great plant quality. Highly recommended for plant lovers.</p>
                    <div class="testimonial-footer">
                        <div class="user">
                            <div class="avatar">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <span>Olivia Carter</span>
                        </div>
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <span>5.0</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="quote">“</div>
                    <p>Plantify made it easy to bring greenery into my space. Everything arrived healthy.</p>
                    <div class="testimonial-footer">
                        <div class="user">
                            <div class="avatar">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <span>Daniel Wilson</span>
                        </div>
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <span>4.9</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        const slider = document.getElementById("testimonialSlider");
        const cards = document.querySelectorAll(".testimonial-card");
        const indicators = document.querySelectorAll(".indicator span");

        let index = 0;

        function getVisibleCards() {
            return window.innerWidth <= 768 ? 1 : 2;
        }

        function getCardWidth() {
            return cards[0].getBoundingClientRect().width + 32;
        }

        function maxIndex() {
            return Math.ceil(cards.length / getVisibleCards()) - 1;
        }

        function updateSlider() {
            const translateX = index * getCardWidth() * getVisibleCards();
            slider.style.transform = `translateX(-${translateX}px)`;

            indicators.forEach((dot, i) => {
                dot.classList.toggle("active", i === index);
            });
        }

        indicators.forEach((dot, i) => {
            dot.addEventListener("click", () => {
                index = i;
                if (index > maxIndex()) index = maxIndex();
                updateSlider();
            });
        });

        window.addEventListener("resize", () => {
            if (index > maxIndex()) index = maxIndex();
            updateSlider();
        });

        updateSlider();
    </script>
@endpush
