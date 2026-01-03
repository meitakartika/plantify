@extends('layout.app')

@section('title', 'Cart | Plantify')

<style>
    .cart-title {
        font-size: 24px;
        font-weight: 700;
        color: #1E1E1E;
        margin-bottom: 24px;
    }

    .cart-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-bottom: 16px;
    }

    .cart-item img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
    }

    .cart-info {
        flex: 1;
    }

    .cart-info h4 {
        margin: 0 0 6px;
        font-size: 16px;
    }

    .cart-price {
        color: #4CBA9B;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
    }

    .qty-control {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .qty-control button {
        width: 28px;
        height: 28px;
        border: none;
        border-radius: 50%;
        background: #C1DCDC;
        color: #1D2F33;
        font-size: 18px;
        cursor: pointer;
    }

    .qty-control button:hover {
        background: #EBF5F3;
    }

    .qty-control span {
        min-width: 24px;
        text-align: center;
        font-weight: 600;
    }

    .cart-footer {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
        font-size: 18px;
        color: #1D2F33;
    }

    .total-row span {
        font-weight: 500;
    }

    .total-row strong {
        font-size: 20px;
        font-weight: 700;
    }

    .checkout-btn {
        display: block;
        width: 100%;
        padding: 14px;
        text-align: center;
        background: #4CBA9B;
        color: #fff;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s;
    }

    .checkout-btn:hover {
        background: #258075;
    }

    /* disabled state */
    .checkout-btn.disabled {
        background: #EBF5F3;
        color: #94a3b8;
        pointer-events: none;
        cursor: not-allowed;
    }
</style>

@section('content')
    <section style="max-width:900px;margin:80px auto;padding:0 16px">
        <h2 class="cart-title">Your Cart</h2>

        <div id="cartItems"></div>

        <div class="cart-footer" style="margin-top:32px">
            <div class="total-row">
                <span>Total</span>
                <strong id="cartTotal">Rp 0</strong>
            </div>
            <a href="#" class="checkout-btn" id="checkoutBtn">Checkout</a>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let cart = [];

            const cartFromCart = localStorage.getItem('cart');
            const cartFromBuyNow = localStorage.getItem('checkout_items');

            if (cartFromCart) {
                cart = JSON.parse(cartFromCart);
            } else if (cartFromBuyNow) {
                cart = JSON.parse(cartFromBuyNow);
            }

            console.log("Loaded cart:", cart);

            const cartItemsEl = document.getElementById('cartItems');
            const cartTotalEl = document.getElementById('cartTotal');
            const checkoutBtn = document.getElementById('checkoutBtn');

            function renderCart() {
                cartItemsEl.innerHTML = '';
                let total = 0;

                if (!cart || cart.length === 0) {
                    cartItemsEl.innerHTML = `
                <div style="text-align:center;padding:40px;color:#94a3b8">
                    <p style="font-size:18px;margin-bottom:8px">🛒 Cart is empty</p>
                    <p>Please add some items first</p>
                </div>
            `;
                    cartTotalEl.innerText = 'Rp 0';
                    checkoutBtn.classList.add('disabled');
                    return;
                }

                checkoutBtn.classList.remove('disabled');

                cart.forEach((item, index) => {
                    const price = Number(item.price) || 0;
                    const qty = Number(item.qty) || 1;

                    total += price * qty;

                    cartItemsEl.innerHTML += `
                <div class="cart-item">
                    <img src="${item.image}">
                    <div class="cart-info">
                        <h4>${item.name}</h4>
                        <span class="cart-price">Rp ${price.toLocaleString('id-ID')}</span>
                        <div class="qty-control">
                            <button onclick="updateQty(${index},-1)">−</button>
                            <span>${qty}</span>
                            <button onclick="updateQty(${index},1)">+</button>
                        </div>
                    </div>
                </div>
            `;
                });

                cartTotalEl.innerText = 'Rp ' + total.toLocaleString('id-ID');
            }

            window.updateQty = function(index, change) {
                cart[index].qty += change;
                if (cart[index].qty <= 0) cart.splice(index, 1);

                localStorage.setItem('cart', JSON.stringify(cart));
                localStorage.removeItem('checkout_items');

                renderCart();

                if (typeof updateCartBadge === 'function') {
                    updateCartBadge();
                }
            }

            checkoutBtn.addEventListener('click', function(e) {
                e.preventDefault();

                if (cart.length === 0) {
                    alert('Cart is empty');
                    return;
                }

                localStorage.setItem('checkout_items', JSON.stringify(cart));

                if (typeof updateCartBadge === 'function') {
                    updateCartBadge();
                }

                window.location.href = "{{ route('checkout') }}";
            });

            renderCart();

        });
    </script>
@endpush
