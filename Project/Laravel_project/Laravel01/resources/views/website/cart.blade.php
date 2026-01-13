@extends('website.layout.structure')

@section('content')

<style>
    .cart-page-wrapper {
        padding-top: 140px;
        padding-bottom: 60px;
        background: #f6f6f6;
        min-height: 100vh;
    }

    .cart-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
        padding: 28px;
    }

    .cart-item {
        border-bottom: 1px solid #f0f0f0;
        padding: 18px 0;
        display: flex;
        gap: 18px;
        align-items: center;
    }
    .cart-item:last-child { border-bottom: none; }

    .cart-item-image {
        width: 110px;
        min-width: 110px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    }
    .cart-item-image img {
        width: 100%; height: 100%; object-fit: cover;
    }

    .cart-item-title { font-size: 16px; font-weight: 700; margin-bottom: 6px; }
    .cart-item-meta { font-size: 13px; color: #777; margin-bottom: 8px; }
    .cart-price { font-size: 16px; font-weight: 700; color: #e53935; }

    .qty-control {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 999px;
        padding: 6px;
        border: 1px solid #eee;
        background: #fff;
    }
    .qty-btn { border: none; background: transparent; padding: 6px 10px; cursor: pointer; font-weight: 700; font-size: 16px; }
    .qty-input { width: 64px; text-align: center; border: none; font-size: 14px; padding: 6px; }

    /* Primary cart button (gold) */
    .btn-cart {
        background: #f0c14b;
        color: #000;
        font-weight: 700;
        padding: 10px 18px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        transition: transform .18s ease, box-shadow .18s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    }
    .btn-cart:hover { transform: translateY(-2px); box-shadow: 0 8px 22px rgba(0,0,0,0.12); }

    /* small variant for inline Update */
    .btn-update {
        padding: 8px 12px;
        font-size: 14px;
        border-radius: 12px;
        box-shadow: none;
        margin-left: 12px; /* spacing from qty control */
    }

    /* Outline / danger buttons (remove/clear) */
    .btn-outline {
        background: #fff;
        border: 1.6px solid #ff6b6b;
        color: #ff3b3b;
        font-weight: 700;
        padding: 8px 14px;
        border-radius: 50px;
        cursor: pointer;
    }
    .btn-outline:hover { background: #fff7f7; transform: translateY(-1px); }

    .btn-clear {
        /* keep old class for backward compatibility but delegate style to btn-outline */
    }

    .btn-continue {
        background: #fff;
        border: 2px solid #000;
        color: #000 !important;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 50px;
        text-decoration: none;
    }

    .cart-summary {
        background: #fbfbfb;
        border-radius: 12px;
        padding: 18px;
        border: 1px solid #eee;
    }
    .summary-row { display: flex; justify-content: space-between; margin-bottom: 10px; }
    .summary-total { font-size: 20px; font-weight: 800; }

    .btn-checkout {
        background: #f0c14b;
        color: #000;
        font-weight: 700;
        padding: 10px 18px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-top: 6px;
    }

    .empty-cart { text-align: center; padding: 60px 20px; }

    @media (max-width: 991.98px) {
        .cart-item { flex-direction: row; gap: 14px; }
        .cart-summary { margin-top: 20px; }
    }
    @media (max-width: 575.98px) {
        .cart-item-image { width: 90px; min-width: 90px; }
        .qty-input { width: 52px; }
    }
</style>

<div class="cart-page-wrapper">
    <div class="container">

        <div class="detail-breadcrumb mb-2">
            <a href="/home">Home</a> /
            <a href="{{ route('products.index') }}">Books</a> /
            <span>Cart</span>
        </div>

        @if(session('success'))
            <div class="alert-success mb-3">{{ session('success') }}</div>
        @endif

        <div class="cart-card">
            <div class="row g-4">

                {{-- LEFT CART ITEMS --}}
                <div class="col-lg-8">
                    <h2 style="font-size:20px; font-weight:800; margin-bottom:14px;">Your Cart</h2>

                    @php
                        // prefer controller-passed $cart; fallback to session('cart')
                        $cartContainer = isset($cart) ? $cart : (session('cart') ?? []);
                        // We'll compute subtotal locally so view works even if controller didn't pass subtotal
                        $computedSubtotal = 0;
                    @endphp

                    @if(!empty($cartContainer) && count($cartContainer) > 0)

                        {{-- Use keyed foreach so $id is the product id (array key) --}}
                        @foreach($cartContainer as $id => $item)
                            @php
                                // Defensive reads
                                $price = isset($item['price']) ? (float) $item['price'] : 0.0;
                                // support both 'qty' and legacy 'quantity'
                                $qty = isset($item['qty']) ? (int) $item['qty'] : (isset($item['quantity']) ? (int)$item['quantity'] : 1);
                                $lineTotal = $price * $qty;
                                $computedSubtotal += $lineTotal;

                                $imagePath = isset($item['image']) ? $item['image'] : 'placeholder.png';
                                $title = isset($item['name']) ? $item['name'] : 'Product';
                                $category = $item['category'] ?? null;
                            @endphp

                            <div class="cart-item">
                                <div class="cart-item-image">
                                    <img src="{{ asset('upload/product/' . $imagePath) }}" alt="{{ $title }}">
                                </div>

                                <div class="cart-item-details">
                                    <div class="cart-item-title">{{ $title }}</div>

                                    @if(!empty($category))
                                        <div class="product-category-badge" style="display:inline-block; margin-bottom:8px;">
                                            {{ $category }}
                                        </div>
                                    @endif

                                    <div class="cart-item-meta">
                                        <span class="cart-price">₹{{ number_format($price, 2) }}</span>
                                        <span style="color:#999; margin-left:12px;">each</span>
                                    </div>

                                    <div class="d-flex align-items-center gap-3">

                                        {{-- Single-item update: uses the array key $id as route param --}}
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            @method('PATCH')

                                            <div class="qty-control">
                                                <button type="button" onclick="changeQty(this,-1)" class="qty-btn">−</button>
                                                <input name="qty" type="number" min="1" class="qty-input" value="{{ $qty }}">
                                                <button type="button" onclick="changeQty(this,1)" class="qty-btn">+</button>
                                            </div>

                                            <button type="submit" class="btn-cart btn-update">Update</button>
                                        </form>

                                        {{-- Remove item (uses array key $id) --}}
                                        <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-outline">Remove</button>
                                        </form>

                                    </div>
                                </div>

                                <div style="min-width:140px; text-align:right;">
                                    <div class="cart-price">₹{{ number_format($lineTotal, 2) }}</div>
                                </div>
                            </div>
                        @endforeach

                        {{-- Clear cart + continue shopping --}}
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-outline">Clear Cart</button>
                            </form>

                            <a href="{{ route('products.index') }}" class="btn-continue">← Continue Shopping</a>
                        </div>

                    @else
                        <div class="empty-cart">
                            <h3>Your cart is empty</h3>
                            <p style="color:#777;">Looks like you haven't added any books yet.</p>
                            <a href="{{ route('products.index') }}" class="btn-back">Browse Books</a>
                        </div>
                    @endif
                </div>

                {{-- RIGHT SUMMARY --}}
                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h3 style="margin-bottom:12px; font-weight:800;">Order Summary</h3>

                        @php
                            // prefer controller-passed values if available, otherwise compute
                            $subtotal = isset($subtotal) ? (float)$subtotal : (float)$computedSubtotal;
                            $shipping = isset($shipping) ? (float)$shipping : 0.0;

                            // compute tax safely — only based on subtotal when subtotal > 0
                            if (isset($tax)) {
                                $tax = (float)$tax;
                            } else {
                                $tax = ($subtotal > 0) ? ($subtotal * 0.05) : 0.0; // default 5% when there is a subtotal
                            }

                            // compute total
                            $total = isset($total) ? (float)$total : ($subtotal + $shipping + $tax);

                            // compute tax percent safely (avoid division by zero)
                            $taxPercent = ($subtotal > 0) ? ($tax / $subtotal * 100) : 0;
                        @endphp

                        <div class="summary-row"><span>Subtotal</span><span>₹{{ number_format($subtotal ?? 0, 2) }}</span></div>
                        <div class="summary-row"><span>Shipping</span><span>{{ ($shipping === 0) ? 'Free' : '₹'.number_format($shipping,2) }}</span></div>

                        {{-- GST row: show percent computed safely --}}
                        <div class="summary-row">
                            <span>GST ({{ number_format($taxPercent, 0) }}%)</span>
                            <span>₹{{ number_format($tax ?? 0, 2) }}</span>
                        </div>

                        <hr>

                        <div class="summary-row summary-total"><span>Total</span><span>₹{{ number_format($total ?? 0, 2) }}</span></div>

                        <form action="{{ route('checkout.index') }}" method="GET">
                            <button class="btn-checkout" @if(empty($cartContainer)) disabled @endif>
                                Proceed to Checkout
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
function changeQty(btn, delta) {
    const control = btn.closest('.qty-control');
    if (!control) return;
    const input = control.querySelector('input[name="qty"]');
    if (!input) return;
    let value = parseInt(input.value, 10) || 1;
    value = Math.max(1, value + delta);
    input.value = value;

    // auto-submit the parent form for a quicker UX (comment out if you don't want auto submit)
    const form = btn.closest('form');
    if (form) {
        if (form._timeout) clearTimeout(form._timeout);
        form._timeout = setTimeout(() => form.submit(), 300);
    }
}
</script>

@endsection
