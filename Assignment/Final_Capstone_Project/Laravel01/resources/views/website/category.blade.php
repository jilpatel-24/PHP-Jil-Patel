@extends('website.layout.structure')

@section('content')

<style>
    .category-wrapper {
        padding: 140px 0 60px;
        background: #f8f8f8;
        min-height: 100vh;
    }

    .category-inner {
        padding: 0 20px;
    }

    .category-card {
        background: #fff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        text-align: center;
        transition: 0.3s;
        height: 340px;
        width: 100%;

        /* FIX */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .category-card:hover {
        transform: translateY(-6px);
    }

    .category-card img {
        width: 210px;
        height: 210px;
        object-fit: cover;
        border-radius: 12px;

        /* centers image */
        display: block;
        margin: 0 auto;
    }

    .category-card h5 {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .view-btn {
        background: #007bff;
        color: #fff;
        border-radius: 12px;
        padding: 8px 20px;
        font-weight: 600;
        transition: 0.3s;
        display: inline-block;
    }

    .view-btn:hover {
        background: #0056c7;
        transform: translateY(-3px);
        color: #fff;
    }
</style>


<div class="category-wrapper">
    <div class="container category-inner">
        <h2 class="mb-4 text-center">Categories Of Books</h2>

        <div class="row justify-content-center">
            @foreach ($category as $c)
            <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                <div class="category-card">
                    <img src="{{ asset('upload/category/' . $c->cate_img) }}" alt="">
                    <h5>{{ $c->cate_name }}</h5>

                    <!-- Button -->
                    <a href="{{ route('category.products', $c->id) }}" class="view-btn">
                        View More
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
