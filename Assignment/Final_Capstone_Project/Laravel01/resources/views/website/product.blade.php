@extends('website.layout.structure')

@section('content')

<style>
    /* Push content below fixed navbar */
    .books-page-wrapper {
        padding-top: 140px;
        padding-bottom: 60px;
        background: #f6f6f6;
        min-height: 100vh;
    }

    /* Hero section */
    .books-hero {
        background: linear-gradient(135deg, #5f5f5fff, #fbefdeff);
        border-radius: 18px;
        padding: 30px 25px;
        color: #fff;
        margin-bottom: 35px;
        position: relative;
        overflow: hidden;
    }

    .books-hero::after {
        content: "";
        position: absolute;
        right: -60px;
        top: -40px;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.12);
    }

    .books-hero-title {
        font-size: 28px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .books-hero-subtitle {
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 2px;
        opacity: 0.9;
        margin-bottom: 6px;
    }

    .books-hero-text {
        font-size: 14px;
        max-width: 460px;
        margin-top: 10px;
        opacity: 0.95;
    }

    .books-hero-pill {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 50px;
        background: rgba(0, 0, 0, 0.15);
        font-size: 11px;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 6px;
    }

    /* Filter card */
    .books-filter-card {
        background: #fff;
        border-radius: 14px;
        padding: 18px 20px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        margin-bottom: 25px;
    }

    /* Category badge */
    .product-category-badge {
        display: inline-block;
        background: #000;
        color: #fff !important;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.3px;
        margin-bottom: 8px;
    }

    /* Product card */
    .book-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        transition: all 0.25s ease;
        padding-bottom: 10px;
        background: #fff;
    }

    .book-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
    }

    .book-card-img {
        height: 220px;
        object-fit: cover;
        border-bottom: 1px solid #eee;
        width: 100%;
    }

    .book-card-title {
        font-size: 17px;
        font-weight: 600;
    }

    .book-card-price {
        font-weight: 700;
        font-size: 16px;
    }

    /* 🔥 ANIMATED BUTTON */
    .btn-view {
        background: #000;
        border: none;
        font-size: 14px;
        padding: 9px 0;
        color: white !important;
        border-radius: 10px;
        transition: all 0.3s ease-in-out;
        transform: scale(1);
        box-shadow: 0px 3px 8px rgba(0,0,0,0.2);
    }

    .btn-view:hover {
        background: #222;
        transform: scale(1.05);
        box-shadow: 0px 6px 14px rgba(0,0,0,0.35);
        color: #fff !important;
    }

    @keyframes pulseGlow {
        0% { transform: scale(1); box-shadow: 0 0 0 rgba(0,0,0,0.3); }
        50% { transform: scale(1.04); box-shadow: 0 0 10px rgba(0,0,0,0.4); }
        100% { transform: scale(1); box-shadow: 0 0 0 rgba(0,0,0,0.3); }
    }

    .btn-view.pulse {
        animation: pulseGlow 1.8s infinite;
    }

    .btn-filter-main {
        background: #f0c14b;
        border: none;
        color: #000;
        font-weight: 600;
    }

    .btn-filter-main:hover {
        background: #ffd769;
        color: #000;
    }

    .books-empty-text {
        padding: 40px 0;
        color: #777;
    }

    /* Add to Cart Button */
    .btn-cart {
        background: #ff9900;
        border: none;
        font-size: 14px;
        padding: 9px 0;
        color: white !important;
        border-radius: 10px;
        margin-top: 8px;
        transition: all 0.3s ease-in-out;
        box-shadow: 0px 3px 8px rgba(0,0,0,0.2);
    }

    .btn-cart:hover {
        background: #e68a00;
        transform: scale(1.03);
        box-shadow: 0px 6px 14px rgba(0,0,0,0.35);
        color: white !important;
    }

    @media (max-width: 767.98px) {
        .books-hero {
            padding: 22px 18px;
        }

        .books-hero-title {
            font-size: 22px;
        }
    }
</style>

<div class="books-page-wrapper">
    <div class="container">

        {{-- Hero --}}
        <div class="books-hero mb-4">
            <div class="books-hero-pill">Explore Our Collection</div>
            <div class="books-hero-subtitle">Handpicked for book lovers</div>
            <h2 class="books-hero-title">Discover Your Next Favorite Book</h2>
            <p class="books-hero-text">
                Browse across different formats like Books, E-Books and PDF Books.
                Filter by category and explore stories that match your mood.
            </p>
        </div>

        {{-- Filter Bar --}}
        <div class="books-filter-card">
            <form method="GET" action="{{ route('products.index') }}" class="row g-3 align-items-end">

                <div class="col-md-4 col-sm-6">
                    <label class="form-label mb-1">Category</label>
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ (string)$categoryId === (string)$cat->id ? 'selected' : '' }}>
                            {{ $cat->cate_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 col-sm-6">
                    <button type="submit" class="btn btn-filter-main w-100 mt-2 mt-sm-0">
                        Apply Filter
                    </button>
                </div>

                @if($categoryId)
                <div class="col-md-3 col-sm-6">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-dark w-100 mt-2 mt-sm-0">
                        Clear Filter
                    </a>
                </div>
                @endif

            </form>
        </div>

        {{-- Product Cards --}}
        <div class="row g-4">
            @forelse($products as $p)
            <div class="col-lg-4 col-md-6 col-sm-6 product-column mb-4">

                <div class="card book-card h-100 shadow-sm">

                    <img src="{{ asset('upload/product/' . $p->product_img) }}"
                        class="card-img-top book-card-img" alt="{{ $p->product_name }}">

                    <div class="card-body d-flex flex-column">

                        <span class="product-category-badge">
                            {{ $p->category->cate_name ?? 'No Category' }}
                        </span>

                        <h5 class="book-card-title mt-1">{{ $p->product_name }}</h5>

                        <p class="text-muted mb-2" style="font-size: 13px;">
                            {{ \Illuminate\Support\Str::limit($p->product_description, 60) }}
                        </p>

                        <p class="book-card-price mb-3">₹{{ number_format($p->product_price, 2) }}</p>

                        {{-- View Details --}}
                        <a href="{{ route('products.show', $p->id) }}"
                            class="btn btn-view pulse text-white w-100">
                            View Details
                        </a>

                        {{-- Add to Cart Form --}}
                        <form action="{{ route('cart.add', $p->id) }}" method="POST" class="mt-2">
                            @csrf
                            {{-- default quantity 1, change if you have quantity input elsewhere --}}
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-cart w-100">
                                Add to Cart
                            </button>
                        </form>

                    </div>

                </div>

            </div>
            @empty

            <div class="col-12 text-center books-empty-text">
                No books found for the selected filter.
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $products->links() }}
        </div>

    </div>
</div>

@endsection
