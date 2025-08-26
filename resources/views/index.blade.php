<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <style>
        .hero__text h2 { font-size: 2.5rem; font-weight: 700; color: #1a1a1a; }
        .primary-btn { background: #3b5998; border: none; padding: 12px 24px; transition: all 0.3s ease; }
        .primary-btn:hover { background: #2a4373; transform: scale(1.05); }
        .blog__item { border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .blog__item__pic { height: 200px; }
        .blog__item__text { padding: 15px; }
        .banner__item__text h2 { font-size: 1.8rem; }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                @if (session('user'))
                    <a href="/profile">{{ session('user.name') }}</a>
                    <a href="#" onclick="logout()">Logout</a>
                @else
                    <a href="/login">Sign in</a>
                @endif
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{ asset('img/icon/search.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a>
            <a href="/cart"><img src="{{ asset('img/icon/cart.png') }}" alt=""> <span>{{ session('cart_count', 0) }}</span></a>
            <div class="price">${{ session('cart_total', '0.00') }}</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p></p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                @if (session('user'))
                                    <a href="/profile">{{ session('user.name') }}</a>
                                    <a href="#" onclick="logout()">Logout</a>
                                @else
                                    <a href="/login">Sign in</a>
                                @endif
                                <a href="#">FAQs</a>
                            </div>
                            <div class="header__top__hover">
                                <span>Usd <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>USD</li>
                                    <li>EUR</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="/home"><img src="{{ asset('img/dark-logo.svg') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="/home">Home</a></li>
                            <li class="{{ request()->routeIs('shop*') ? 'active' : '' }}"><a href="/shop">Shop</a></li>
                            <li><a href="/about">About Us</a></li>
                            <li><a href="/blog">Blog</a></li>
                            <li><a href="/contact">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="{{ asset('img/icon/search.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a>
                        <a href="/cart"><img src="{{ asset('img/icon/cart.png') }}" alt=""> <span>{{ session('cart_count', 0) }}</span></a>
                        <div class="price">${{ session('cart_total', '0.00') }}</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <script>
    function logout() {
        fetch('/logout', { method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } })
            .then(() => window.location.href = '/login');
    }
    </script>

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="{{ asset('img/hero/hero-1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Fall/Winter 2025</h6>
                                <h2>Explore Fall Trends 2025</h2>
                                <p>Elevate your style with suede jackets, pastel pinks, and boxy trousers. Ethically crafted for timeless quality.</p>
                                <a href="{{ route('shop') }}" class="primary-btn">Shop Now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="{{ asset('img/hero/hero-2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Fall/Winter 2025</h6>
                                <h2>Embrace Bold Hues</h2>
                                <p>Discover rich browns and sleek designs for the modern man. Sustainably made with premium craftsmanship.</p>
                                <a href="{{ route('shop') }}" class="primary-btn">Shop Now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="{{ asset('img/banner/banner-1.jpg') }}" alt="Clothing Collections 2025">
                        </div>
                        <div class="banner__item__text">
                            <h2>Clothing Collections 2025</h2>
                            <a href="{{ route('shop') }}">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{ asset('img/banner/banner-2.jpg') }}" alt="Accessories">
                        </div>
                        <div class="banner__item__text">
                            <h2>Accessories</h2>
                            <a href="{{ route('shop') }}">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="{{ asset('img/banner/banner-3.jpg') }}" alt="Shoes Fall 2025">
                        </div>
                        <div class="banner__item__text">
                            <h2>Shoes Fall 2025</h2>
                            <a href="{{ route('shop') }}">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sellers</li>
                        <li data-filter=".new-arrivals">New Arrivals</li>
                        <li data-filter=".hot-sales">Hot Sales</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-1.jpg') }}">
                            <span class="label">New</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('shop.detail') }}">Piqué Biker Jacket</a></h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$67.24</h5>
                            <div class="product__color__select">
                                <label for="pc-1"><input type="radio" id="pc-1"></label>
                                <label class="active black" for="pc-2"><input type="radio" id="pc-2"></label>
                                <label class="grey" for="pc-3"><input type="radio" id="pc-3"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-2.jpg') }}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Piqué Biker Jacket</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$67.24</h5>
                            <div class="product__color__select">
                                <label for="pc-4"><input type="radio" id="pc-4"></label>
                                <label class="active black" for="pc-5"><input type="radio" id="pc-5"></label>
                                <label class="grey" for="pc-6"><input type="radio" id="pc-6"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-3.jpg') }}">
                            <span class="label">Sale</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Multi-pocket Chest Bag</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$43.48</h5>
                            <div class="product__color__select">
                                <label for="pc-7"><input type="radio" id="pc-7"></label>
                                <label class="active black" for="pc-8"><input type="radio" id="pc-8"></label>
                                <label class="grey" for="pc-9"><input type="radio" id="pc-9"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-4.jpg') }}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Diagonal Textured Cap</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$60.90</h5>
                            <div class="product__color__select">
                                <label for="pc-10"><input type="radio" id="pc-10"></label>
                                <label class="active black" for="pc-11"><input type="radio" id="pc-11"></label>
                                <label class="grey" for="pc-12"><input type="radio" id="pc-12"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-5.jpg') }}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Leather Backpack</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$31.37</h5>
                            <div class="product__color__select">
                                <label for="pc-13"><input type="radio" id="pc-13"></label>
                                <label class="active black" for="pc-14"><input type="radio" id="pc-14"></label>
                                <label class="grey" for="pc-15"><input type="radio" id="pc-15"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-6.jpg') }}">
                            <span class="label">Sale</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Ankle Boots</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$98.49</h5>
                            <div class="product__color__select">
                                <label for="pc-16"><input type="radio" id="pc-16"></label>
                                <label class="active black" for="pc-17"><input type="radio" id="pc-17"></label>
                                <label class="grey" for="pc-18"><input type="radio" id="pc-18"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-7.jpg') }}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>T-shirt Contrast Pocket</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$49.66</h5>
                            <div class="product__color__select">
                                <label for="pc-19"><input type="radio" id="pc-19"></label>
                                <label class="active black" for="pc-20"><input type="radio" id="pc-20"></label>
                                <label class="grey" for="pc-21"><input type="radio" id="pc-21"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-8.jpg') }}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Basic Flowing Scarf</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$26.28</h5>
                            <div class="product__color__select">
                                <label for="pc-22"><input type="radio" id="pc-22"></label>
                                <label class="active black" for="pc-23"><input type="radio" id="pc-23"></label>
                                <label class="grey" for="pc-24"><input type="radio" id="pc-24"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>2025 Fashion Trends</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{{ asset('img/blog/suede-trends-2025.jpg') }}"></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('img/icon/calendar.png') }}" alt=""> 15 August 2025</span>
                            <h5>Why Suede Is the Must-Have Fabric for 2025</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{{ asset('img/blog/pastel-fashion-2025.jpg') }}"></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('img/icon/calendar.png') }}" alt=""> 20 August 2025</span>
                            <h5>Embracing Pastel Pinks in Men's Fashion</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{{ asset('img/blog/boxy-trousers-2025.jpg') }}"></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('img/icon/calendar.png') }}" alt=""> 22 August 2025</span>
                            <h5>The Rise of Boxy Trousers This Season</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{ asset('img/footer-logo.png') }}" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="{{ asset('img/payment.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivery</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Newsletter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>Copyright © 2020 - <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/cart.js') }}"></script>
</body>

</html>