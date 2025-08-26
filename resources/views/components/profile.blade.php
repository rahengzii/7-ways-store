<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="User Profile">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Profile</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
</head>
<body>
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
                                    <script>window.location.href = '/login';</script>
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
                        <a href="/cart"><img src="{{ asset('img/icon/cart.png') }}" alt=""> <span class="cart__count">0</span></a>
                        <div class="price">$0.00</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Your Invoices</h4>
                    <table class="table">
                        <thead>
                            <tr><th>Invoice #</th><th>Date</th><th>Total</th><th>Action</th></tr>
                        </thead>
                        <tbody id="invoices-tbody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script>
        // Fallback to CDN if local jQuery fails
        if (typeof jQuery === 'undefined') {
            document.write('<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"><\/script>');
        }
    </script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    
</body>
</html>