@extends('website.layout.structure')

@section('content')

<!-- Start fact Area -->
<section class="fact-area relative section-gap" id="fact">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-40 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10 text-white">Some Facts That Make Readers Love Us</h1>
                    <p class="text-light">We bring the joy of reading closer to everyone — from rare books to modern bestsellers.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End fact Area -->

<!-- Start counter Area -->
<section class="counter-area section-gap">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="single-counter p-4 bg-light shadow-sm rounded">
                    <i class="fa fa-book fa-3x text-primary mb-3"></i>
                    <h1 class="counter">1200</h1>
                    <p>Books Available</p>								
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="single-counter p-4 bg-light shadow-sm rounded">
                    <i class="fa fa-user fa-3x text-primary mb-3"></i>
                    <h1 class="counter">850</h1>
                    <p>Happy Readers</p>								
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="single-counter p-4 bg-light shadow-sm rounded">
                    <i class="fa fa-shopping-cart fa-3x text-primary mb-3"></i>
                    <h1 class="counter">430</h1>
                    <p>Books Sold</p>								
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="single-counter p-4 bg-light shadow-sm rounded">
                    <i class="fa fa-star fa-3x text-primary mb-3"></i>
                    <h1 class="counter">125</h1>
                    <p>5-Star Reviews</p>								
                </div>
            </div>												
        </div>
    </div>	
</section>
<!-- end counter Area -->

<!-- Start Why Readers Love Us Area -->
<section class="about-area section-gap bg-dark text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5">
                <h2 class="mb-3 text-warning">Why Readers Love Us</h2>
                <p>We believe reading changes lives — that’s why we make it easy, enjoyable, and accessible for everyone.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 text-center mb-4">
                <div class="single-feature p-4 rounded bg-secondary">
                    <i class="fa fa-truck fa-3x mb-3 text-warning"></i>
                    <h4>Fast Delivery</h4>
                    <p>We deliver your favorite books right to your doorstep quickly and safely.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center mb-4">
                <div class="single-feature p-4 rounded bg-secondary">
                    <i class="fa fa-bookmark fa-3x mb-3 text-warning"></i>
                    <h4>Curated Collection</h4>
                    <p>From bestsellers to classics — our handpicked collection suits every reader.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center mb-4">
                <div class="single-feature p-4 rounded bg-secondary">
                    <i class="fa fa-heart fa-3x mb-3 text-warning"></i>
                    <h4>Reader Community</h4>
                    <p>Join thousands of book lovers who share reviews, ratings, and reading lists.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Why Readers Love Us Area -->

@endsection
