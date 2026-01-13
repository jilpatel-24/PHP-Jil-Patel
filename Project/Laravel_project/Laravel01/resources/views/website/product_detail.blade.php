@extends('website.layout.structure')

@section('content')

<style>
    /* Wrapper – push below fixed navbar */
    .book-detail-wrapper {
        padding-top: 140px;
        padding-bottom: 60px;
        background: #f6f6f6;
        min-height: 100vh;
    }

    .book-detail-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
        padding: 30px 28px;
    }

    /* IMAGE BOX (perfect second-image style) */
    .book-detail-image-outer {
        background: linear-gradient(135deg, #ff6a3d, #ffb347);
        padding: 20px;
        border-radius: 22px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.20);
    }

    .book-detail-image-inner {
        background: #ffffff;
        padding: 20px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .book-detail-image-inner img {
        width: 100%;
        max-height: 360px;
        object-fit: cover;
        border-radius: 12px;
    }

    /* Category badge */
    .product-category-badge {
        display: inline-block;
        background: #000;
        color: #fff;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .book-title {
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    /* Subtitle added back */
    .book-subtitle {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #999;
        margin-bottom: 10px;
    }

    .book-price {
        font-size: 22px;
        font-weight: 700;
        color: #e53935;
        margin-bottom: 12px;
    }

    .book-description {
        font-size: 14px;
        line-height: 1.7;
        color: #555;
        margin: 10px 0 18px 0;
    }

    .book-meta {
        font-size: 13px;
        color: #777;
        margin-bottom: 20px;
    }

    /* ---------------- BUTTONS ---------------- */

    .btn-back {
        background: #fff;
        border: 2px solid #000;
        color: #000 !important;
        font-weight: 600;
        padding: 10px 24px;
        border-radius: 50px;
        transition: 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
    }
    .btn-back:hover {
        background: #000;
        color: #fff !important;
    }

    .btn-cart {
        background: #f0c14b;
        color: #000;
        font-weight: 700;
        padding: 10px 28px;
        border-radius: 50px;
        border: none;
        transition: 0.25s ease;
        cursor: pointer;
    }
    .btn-cart:hover {
        background: #ffdb74;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    /* Quantity input */
    .qty-input {
        width: 100px;
        max-width: 100%;
        padding: 8px 10px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 14px;
        text-align: center;
    }

    /* Breadcrumb */
    .detail-breadcrumb {
        font-size: 13px;
        margin-bottom: 12px;
    }

    .detail-breadcrumb a {
        color: #777;
        text-decoration: none;
    }

    .detail-breadcrumb a:hover {
        color: #000;
    }

    /* Flash */
    .alert-success {
        background: #e6ffea;
        color: #0b6a2f;
        border: 1px solid #c7f0d0;
        padding: 10px 14px;
        border-radius: 8px;
        margin-bottom: 16px;
    }

    @media (max-width: 767.98px) {
        .book-detail-card { padding: 18px; }
    }
</style>

<div class="book-detail-wrapper">
    <div class="container">

        {{-- Breadcrumb --}}
        <div class="detail-breadcrumb mb-2">
            <a href="/home">Home</a> /
            <a href="{{ route('products.index') }}">Books</a> /
            <span>{{ $product->product_name }}</span>
        </div>

        {{-- Flash success --}}
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="book-detail-card">
            <div class="row g-4 align-items-start">

                {{-- LEFT IMAGE --}}
                <div class="col-md-5">
                    <div class="book-detail-image-outer">
                        <div class="book-detail-image-inner">
                            <img src="{{ asset('upload/product/' . $product->product_img) }}"
                                 alt="{{ $product->product_name }}">
                        </div>
                    </div>
                </div>

                {{-- RIGHT DETAILS --}}
                <div class="col-md-7">

                    @if($product->category)
                        <span class="product-category-badge">
                            {{ $product->category->cate_name }}
                        </span>
                    @endif

                    <h1 class="book-title">{{ $product->product_name }}</h1>

                    {{-- SUBTITLE ADDED --}}
                    <div class="book-subtitle">
                        A curated title from our collection
                    </div>

                    <div class="book-price">₹{{ number_format($product->product_price, 2) }}</div>

                    <p class="book-description">
                        {{ $product->product_description }}
                    </p>

                    {{-- BUTTONS: Back + Add to Cart (form) --}}
                    <div class="d-flex flex-wrap gap-3 mt-3 align-items-center">

                        <a href="{{ route('products.index') }}" class="btn-back">
                            ← Back to Books
                        </a>

                        {{-- Add to Cart Form --}}
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-flex align-items-center gap-2">
                            @csrf

                            {{-- Optional: allow user to choose quantity --}}
                            

                            <button type="submit" class="btn-cart">
                                Add to Cart
                            </button>
                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
