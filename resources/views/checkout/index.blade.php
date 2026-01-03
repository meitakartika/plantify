@extends('layout.app')

@section('title', 'Checkout | Plantify')

<style>
    .checkout-container {
        max-width: 900px;
        margin: 80px auto;
        padding: 0 16px;
        position: relative;
    }

    .back-btn {
        position: absolute;
        top: -40px;
        left: 16px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 18px;
        font-weight: 600;
        color: #258075;
        text-decoration: none;
    }

    .checkout-layout {
        display: flex;
        gap: 24px;
    }

    .checkout-right {
        flex: 1;
    }

    .back-btn i {
        font-size: 22px;
    }

    .checkout-item {
        display: flex;
        gap: 16px;
        padding: 16px;
        background: #fff;
        border-radius: 12px;
        margin-bottom: 24px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        align-items: center;
    }

    .checkout-item img {
        width: 80px;
        height: 80px;
        border-radius: 8px;
        object-fit: cover;
    }

    .checkout-item h4 {
        margin: 0 0 6px;
        font-size: 16px;
    }

    .qty-control {
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .qty-control button {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        border: none;
        background: #C1DCDC;
        font-size: 18px;
        cursor: pointer;
    }

    .qty-control span {
        min-width: 24px;
        text-align: center;
        font-weight: 600;
    }

    .checkout-form {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .checkout-form label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .checkout-form textarea,
    .checkout-form select {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #E3ECEA;
        margin-bottom: 16px;
        font-size: 14px;
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        font-size: 18px;
        margin: 20px 0;
    }

    .confirm-btn {
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 10px;
        background: #4CBA9B;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
    }

    .confirm-btn:hover {
        background: #63aa8f;
    }

    .select-wrapper {
        position: relative;
    }

    .select-wrapper select {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #E3ECEA;
        appearance: none;
    }

    .select-wrapper::after {
        content: "▼";
        position: absolute;
        right: 12px;
        top: 40%;
        transform: translateY(-50%);
        pointer-events: none;
        color: #258075;
        font-size: 12px;
    }

    select option {
        color: #1D2F33;
    }

    select:has(option[value=""]:checked) {
        color: #9ca3af;
    }
</style>

@section('content')
    <section class="checkout-container">

        <a href="javascript:history.back()" class="back-btn">
            <i class="bi bi-arrow-left"></i> Back
        </a>

        <div class="checkout-layout">
            <div class="checkout-right">
                <div id="checkoutItems"></div>

                <div class="checkout-form">
                    <label>Shipping Address</label>
                    <textarea placeholder="Enter your shipping address"></textarea>

                    <label>Payment Method</label>
                    <div class="select-wrapper">
                        <select required>
                            <option value="" disabled selected hidden>Select payment method</option>
                            <option value="bank">Bank Transfer</option>
                            <option value="ewallet">E-Wallet</option>
                            <option value="cod">Cash on Delivery</option>
                        </select>
                    </div>

                    <div class="total-row">
                        <span>Total</span>
                        <strong id="checkoutTotal">Rp 0</strong>
                    </div>

                    <button class="confirm-btn" onclick="location.href='/404'">Confirm Order</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            console.log('checkout_items raw:', localStorage.getItem('checkout_items'));
            console.log('cart raw:', localStorage.getItem('cart'));

            let items = [];

            try {
                const checkoutRaw = JSON.parse(localStorage.getItem('checkout_items'));
                if (Array.isArray(checkoutRaw) && checkoutRaw.length > 0) {
                    items = checkoutRaw;
                }
            } catch (e) {
                console.error('Parse error', e);
            }

            console.log('final items:', items);

            const wrap = document.getElementById('checkoutItems');
            const totalEl = document.getElementById('checkoutTotal');

            if (!wrap || !totalEl) {
                console.error('checkoutItems / checkoutTotal element not found');
                return;
            }

            if (!items || items.length === 0) {
                wrap.innerHTML = `
            <div style="padding:32px;text-align:center;color:#777">
                <p style="font-size:18px;margin-bottom:12px">Your checkout is empty 🛒</p>
            </div>
        `;
                totalEl.innerText = 'Rp 0';
                return;
            }

            function render() {
                wrap.innerHTML = '';
                let total = 0;

                items.forEach((item, index) => {
                    if (!item || !item.price || !item.qty) return;

                    const subtotal = item.price * item.qty;
                    total += subtotal;

                    wrap.innerHTML += `
                <div class="checkout-item" style="display:flex;gap:16px;align-items:center;margin-bottom:16px">
                    <img src="${item.image}" style="width:80px;height:80px;border-radius:12px;object-fit:cover">
                    <div style="flex:1">
                        <h4 style="margin:0 0 8px">${item.name}</h4>
                        <div style="display:flex;align-items:center;gap:8px">
                            <button onclick="changeQty(${index}, -1)">−</button>
                            <span>${item.qty}</span>
                            <button onclick="changeQty(${index}, 1)">+</button>
                        </div>
                    </div>
                    <strong>Rp ${subtotal.toLocaleString('id-ID')}</strong>
                </div>
            `;
                });

                totalEl.innerText = 'Rp ' + total.toLocaleString('id-ID');
                localStorage.setItem('checkout_items', JSON.stringify(items));
            }

            window.changeQty = function(index, change) {
                items[index].qty += change;
                if (items[index].qty < 1) items[index].qty = 1;
                render();
            }

            render();
        });
    </script>
@endpush
