<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
<meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Checkout</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <style>
    .order-success-modal .modal-content {
        text-align: center;
        padding: 20px;
    }
    .order-success-modal .modal-header {
        border-bottom: none;
    }
    .order-success-modal .modal-title {
        font-size: 24px;
        font-weight: 700;
        color: #111111;
    }
    .order-success-modal .fa-check-circle {
        color: #28a745;
        font-size: 48px;
        margin-bottom: 15px;
    }
    .order-success-modal .modal-body p {
        font-size: 16px;
        color: #666666;
    }
    .order-success-modal .modal-footer {
        border-top: none;
        justify-content: center;
    }
    /* Add this rule to set text field font color to black */
    .checkout__input input {
        color: #000000; /* Black font color for text fields */
    }
</style>
    </style>
</head>
<body>
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
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{ asset('img/icon/search.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('img/icon/heart.png') }}"

 alt=""></a>
            <a href="/cart"><img src="{{ asset('img/icon/cart.png') }}" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p></p>
        </div>
    </div>

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
                        <a href="javascript:void(0)" class="search-switch"><img src="{{ asset('img/icon/search.png') }}" alt=""></a>
                        <a href="javascript:void(0)"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a>
                        <a href="/cart"><img src="{{ asset('img/icon/cart.png') }}" alt=""> <span>0</span></a>
                        <div class="price">$0.00</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>

    <!-- Order Success Modal -->
    <div class="modal fade order-success-modal" id="order-success-modal" tabindex="-1" role="dialog" aria-labelledby="orderSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderSuccessModalLabel">Order Placed Successfully</h5>
                </div>
                <div class="modal-body">
                    <i class="fa fa-check-circle"></i>
                    <p>Your order has been successfully placed! Click OK to return to the home page.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.href='/home'">OK</button>
                </div>
            </div>
        </div>
    </div>

    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="checkout__form">
                        <h4>Billing Details</h4>
                        <form id="checkout-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input type="text" name="name" required value="{{ session('user.name', '') }}">
                                    </div>
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" required value="{{ session('user.email', '') }}">
                                    </div>
                                    <div class="checkout__input">
                                        <p>Address<span>*</span></p>
                                        <input type="text" name="address" required>
                                    </div>
                                    <div class="checkout__input">
                                        <p>City</p>
                                        <input type="text" name="city">
                                    </div>
                                    <div class="checkout__input">
                                        <p>Cardholder Name<span>*</span></p>
                                        <input type="text" name="card_name" required placeholder="John Doe">
                                    </div>
                                    <div class="checkout__input">
                                        <p>Card Number<span>*</span></p>
                                        <input type="text" name="card_number" required placeholder="1234 5678 9012 3456" maxlength="19" pattern="\d{4}\s?\d{4}\s?\d{4}\s?\d{4}">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Expiration Month (MM)<span>*</span></p>
                                                <select name="exp_month" required>
                                                    <option value="">Select Month</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="checkout__input">
                                                <p>Expiration Year (YY)<span>*</span></p>
                                                <select name="exp_year" required>
                                                    <option value="">Select Year</option>
                                                    @for ($year = date('y'); $year <= date('y') + 10; $year++)
                                                        <option value="{{ sprintf('%02d', $year) }}">{{ sprintf('%02d', $year) }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="checkout__input">
                                                <p>CVV<span>*</span></p>
                                                <input type="text" name="cvv" required placeholder="123" maxlength="4" pattern="\d{3,4}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="site-btn">Place Order</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="checkout__order">
                        <h4 class="order__title">Your order</h4>
                        <div class="checkout__order__products">Product <span>Total</span></div>
                        <ul class="checkout__total__products" id="order-items"></ul>
                        <ul class="checkout__total__all">
                            <li>Subtotal <span id="summary-subtotal">$0.00</span></li>
                            <li>Shipping <span id="summary-shipping">$5.00</span></li>
                            <li>Tax (8%) <span id="summary-tax">$0.00</span></li>
                            <li>Total <span id="summary-total"><strong>$0.00</strong></span></li>
                        </ul>
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
                            <li><a href="javascript:void(0)">Clothing Store</a></li>
                            <li><a href="javascript:void(0)">Trending Shoes</a></li>
                            <li><a href="javascript:void(0)">Accessories</a></li>
                            <li><a href="javascript:void(0)">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="javascript:void(0)">Contact Us</a></li>
                            <li><a href="javascript:void(0)">Payment Methods</a></li>
                            <li><a href="javascript:void(0)">Delivery</a></li>
                            <li><a href="javascript:void(0)">Return & Exchanges</a></li>
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

    <!-- Load jQuery first -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Fallback to CDN if local jQuery fails -->
    <script>
        if (typeof jQuery == 'undefined') {
            document.write('<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"><\/script>');
        }
    </script>
    <!-- Load dependent scripts after jQuery -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script>
        function logout() {
            fetch('/logout', { method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } })
                .then(() => window.location.href = '/login');
        }
    </script>
</body>
</html>