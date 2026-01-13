<?php

function active($currect_page)
{
    $url_array = explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if ($currect_page == $url) {
        echo 'active text-secondary';
    }
}

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo url('website/img/book.png') ?>">
    <meta charset="UTF-8">
    <title>Book</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo url('website/css/linearicons.css') ?>">
    <link rel="stylesheet" href="<?php echo url('website/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo url('website/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo url('website/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?php echo url('website/css/nice-select.css') ?>">
    <link rel="stylesheet" href="<?php echo url('website/css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?php echo url('website/css/owl.carousel.css') ?>">
    <link rel="stylesheet" href="<?php echo url('website/css/main.css') ?>">

    <style>
        /* === Navbar Black Background === */
        #header {
            background-color: #000;
            padding: 15px 0;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 8px !important;
        }

        .nav-menu li {
            margin: 0 !important;
            padding: 0 !important;
            position: relative;
        }

        .nav-menu a {
            color: #fff !important;
            padding: 10px 12px !important;
        }

        .nav-menu a:hover {
            color: #f0c14b !important;
        }

        /* Dropdown styling */
        .nav-menu li ul {
            display: none;
            position: absolute;
            top: 40px;
            left: 0;
            background-color: #000;
            min-width: 150px;
            list-style: none;
            padding: 5px 0;
            z-index: 999;
        }

        .nav-menu li:hover>ul {
            display: block;
        }

        .nav-menu li ul li a {
            display: block;
            padding: 10px 15px !important;
        }

        .nav-menu li ul li a:hover {
            color: #f0c14b !important;
            background: #111;
        }

        /* Remove default CSS arrow so only FontAwesome arrow shows */
        .menu-has-children>a:after {
            content: none !important;
        }


        /* Logo */
        #logo img {
            height: 50px;
        }

        /* Right aligned item (login / profile dropdown) */
        .nav-menu .right-item {
            margin-left: auto;
        }

        .login-btn a {
            background: #f0c14b;
            color: #000 !important;
            padding: 8px 18px !important;
            border-radius: 5px;
            font-weight: 600;
        }

        .login-btn a:hover {
            background: #fff;
            color: #000 !important;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <header id="header">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">

                <div id="logo">
                    <a href="home">
                        <img src="<?php echo url('website/img/logo.png') ?>" alt="" title="">
                    </a>
                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="/home">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/fact">Fact</a></li>
                        <li><a href="/price">Price</a></li>
                        <li><a href="/course">Course</a></li>

                        <li><a href="/category">Category</a></li>
                        
                        <li class="menu-has-children">
                            <a href="/products">Products <i class="fa fa-angle-down"></i></a>
                            <ul>
                                @foreach($global_categories as $cat)
                                <li>
                                    <a href="/products?category={{ $cat->id }}">
                                        {{ $cat->cate_name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        
                        <li><a href="/contectus">Contact</a></li>

                        


                        <!-- Pages dropdown -->
                        @if(session()->has('cid'))
                        <li class="menu-has-children">
                            <a href="#">
                                Hi.. {{ Session()->get('cname') }} <i class="fa fa-angle-down"></i>
                            </a>
                            <ul>
                                <li><a href="/my_profile">My Profile</a></li>
                                <li><a href="/cart">Cart</a></li>
                                <li><a href="/feedback">Feedback</a></li>
                                <li><a href="/cust_logout">Logout</a></li>
                            </ul>
                        </li>
                        @else
                        <!-- Login button on the right when not logged in -->
                        <li class="right-item login-btn">
                            <a href="/login">Log-In</a>
                        </li>
                        @endif



                    </ul>
                </nav>

            </div>
        </div>
    </header>