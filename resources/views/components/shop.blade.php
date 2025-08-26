<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Shop</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="/login">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="{{ route('shop.detail') }} class="search-switch"><img src="{{ asset('img/icon/search.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a>
            <a href="/cart"><img src="{{ asset('img/icon/cart.png') }}" alt=""> <span class="cart__count">{{ session('cart_count', 0) }}</span></a>
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
                                    <li>USD</li>
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
                <!-- count amout of cart -->
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="{{ route('shop.detail') }}" class="search-switch"><img src="{{ asset('img/icon/search.png') }}" alt=""></a>
                        <a href="javascript:void(0)"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a>
                        <a href="/cart"><img src="{{ asset('img/icon/cart.png') }}" alt=""> <span class="cart__count">{{ session('cart_count', 0) }}</span></a>
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

    // $(document).ready(function() {
    //     const userEmail = '{{ session("user.email") || "guest" }}';
    //     const cartKey = `mf_cart_${userEmail}`;

    //     function updateCartHeader() {
    //         let cartItems = JSON.parse(localStorage.getItem(cartKey) || '[]');
    //         const cartCount = cartItems.reduce((sum, item) => sum + item.qty, 0);
    //         const subtotal = cartItems.reduce((sum, item) => sum + item.price * item.qty, 0);
    //         $('.cart__count').text(cartCount);
    //         $('.header__nav__option .price').text(`$${subtotal.toFixed(2)}`);
    //     }

    //     $('.add-cart').on('click', function(e) {
    //         e.preventDefault();
    //         const $product = $(this).closest('.product__item');
    //         const productName = $product.find('.product__item__text h6').text();
    //         const productPrice = parseFloat($product.find('.product__item__text h5').text().replace('$', ''));
    //         const productImg = $product.find('.product__item__pic').data('setbg');
    //         const colorLabel = $product.find('.product__color__select label.active');
    //         const productColor = colorLabel.length ? colorLabel.attr('class').split(' ')[1] : 'default';

    //         let cartItems = JSON.parse(localStorage.getItem(cartKey) || '[]');
    //         const existingItem = cartItems.find(item => item.name === productName && item.color === productColor);

    //         if (existingItem) {
    //             existingItem.qty += 1;
    //         } else {
    //             cartItems.push({
    //                 name: productName,
    //                 price: productPrice,
    //                 img: productImg,
    //                 qty: 1,
    //                 color: productColor
    //             });
    //         }

    //         localStorage.setItem(cartKey, JSON.stringify(cartItems));
    //         updateCartHeader();
    //         alert(`${productName} (${productColor}) added to cart!`);
    //     });

    //     updateCartHeader();
    // });
    </script>

    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li><a href="#">Men (20)</a></li>
                                                    <li><a href="#">Women (20)</a></li>
                                                    <li><a href="#">Bags (20)</a></li>
                                                    <li><a href="#">Clothing (20)</a></li>
                                                    <li><a href="#">Shoes (20)</a></li>
                                                    <li><a href="#">Accessories (20)</a></li>
                                                    <li><a href="#">Kids (20)</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    <li><a href="javascript:void(0)">Louis Vuitton</a></li>
                                                    <li><a href="javascript:void(0)">Chanel</a></li>
                                                    <li><a href="javascript:void(0)">Hermes</a></li>
                                                    <li><a href="javascript:void(0)">Gucci</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="javascript:void(0)">$0.00 - $50.00</a></li>
                                                    <li><a href="javascript:void(0)">$50.00 - $100.00</a></li>
                                                    <li><a href="javascript:void(0)">$100.00 - $150.00</a></li>
                                                    <li><a href="javascript:void(0)">$150.00 - $200.00</a></li>
                                                    <li><a href="javascript:void(0)">$200.00 - $250.00</a></li>
                                                    <li><a href="javascript:void(0)">250.00+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-2.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="javascript:void(0)"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="javascript:void(0)"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Suede Jacket</h6>
                                    <a href="javascript:void(0)" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$120.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-1"><input type="radio" id="pc-1"></label>
                                        <label class="active black" for="pc-2"><input type="radio" id="pc-2"></label>
                                        <label class="grey" for="pc-3"><input type="radio" id="pc-3"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-3.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="javascript:void(0)"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="javascript:void(0)"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Pastel Pink Shirt</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$45.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-4"><input type="radio" id="pc-4"></label>
                                        <label class="active pink" for="pc-5"><input type="radio" id="pc-5"></label>
                                        <label class="white" for="pc-6"><input type="radio" id="pc-6"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-4.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="javascript:void(0)"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="javascript:void(0)"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Boxy Trousers</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$80.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-7"><input type="radio" id="pc-7"></label>
                                        <label class="active black" for="pc-8"><input type="radio" id="pc-8"></label>
                                        <label class="grey" for="pc-9"><input type="radio" id="pc-9"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-5.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Plaid Shirt</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$55.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-10"><input type="radio" id="pc-10"></label>
                                        <label class="active red" for="pc-11"><input type="radio" id="pc-11"></label>
                                        <label class="blue" for="pc-12"><input type="radio" id="pc-12"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-6.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Floral Print Shirt</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$50.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-13"><input type="radio" id="pc-13"></label>
                                        <label class="active floral" for="pc-14"><input type="radio" id="pc-14"></label>
                                        <label class="white" for="pc-15"><input type="radio" id="pc-15"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-7.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Fuzzy Cardigan</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$70.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-16"><input type="radio" id="pc-16"></label>
                                        <label class="active grey" for="pc-17"><input type="radio" id="pc-17"></label>
                                        <label class="brown" for="pc-18"><input type="radio" id="pc-18"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-8.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Big Overcoat</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h5>$150.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-19"><input type="radio" id="pc-19"></label>
                                        <label class="active black" for="pc-20"><input type="radio" id="pc-20"></label>
                                        <label class="grey" for="pc-21"><input type="radio" id="pc-21"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-9.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Leather Jacket</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$200.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-22"><input type="radio" id="pc-22"></label>
                                        <label class="active black" for="pc-23"><input type="radio" id="pc-23"></label>
                                        <label class="brown" for="pc-24"><input type="radio" id="pc-24"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-10.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Clogs</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$90.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-25"><input type="radio" id="pc-25"></label>
                                        <label class="active brown" for="pc-26"><input type="radio" id="pc-26"></label>
                                        <label class="black" for="pc-27"><input type="radio" id="pc-27"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-11.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Caramel-Brown Leather Jacket</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h5>$250.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-28"><input type="radio" id="pc-28"></label>
                                        <label class="active brown" for="pc-29"><input type="radio" id="pc-29"></label>
                                        <label class="black" for="pc-30"><input type="radio" id="pc-30"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-12.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Multi-Textured Bomber</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$110.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-31"><input type="radio" id="pc-31"></label>
                                        <label class="active black" for="pc-32"><input type="radio" id="pc-32"></label>
                                        <label class="grey" for="pc-33"><input type="radio" id="pc-33"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-13.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Long Shorts</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$60.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-34"><input type="radio" id="pc-34"></label>
                                        <label class="active khaki" for="pc-35"><input type="radio" id="pc-35"></label>
                                        <label class="black" for="pc-36"><input type="radio" id="pc-36"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-14.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Grungy Flannel Shirt</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$40.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-37"><input type="radio" id="pc-37"></label>
                                        <label class="active red" for="pc-38"><input type="radio" id="pc-38"></label>
                                        <label class="green" for="pc-39"><input type="radio" id="pc-39"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-1.jpg') }}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                        <li><a href="{{ route('shop.detail') }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Classic Two-Piece Suit</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h5>$300.00</h5>
                                    <div class="product__color__select">
                                        <label for="pc-40"><input type="radio" id="pc-40"></label>
                                        <label class="active navy" for="pc-41"><input type="radio" id="pc-41"></label>
                                        <label class="grey" for="pc-42"><input type="radio" id="pc-42"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-13.jpg') }}">
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
                                        <label for="pc-37"><input type="radio" id="pc-37"></label>
                                        <label class="active black" for="pc-38"><input type="radio" id="pc-38"></label>
                                        <label class="grey" for="pc-39"><input type="radio" id="pc-39"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/product/product-14.jpg') }}">
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
                                        <label for="pc-40"><input type="radio" id="pc-40"></label>
                                        <label class="active black" for="pc-41"><input type="radio" id="pc-41"></label>
                                        <label class="grey" for="pc-42"><input type="radio" id="pc-42"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
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
                        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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