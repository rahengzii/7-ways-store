<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Login">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
</head>
<body>

    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>Login</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form id="login-form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="email" name="email" placeholder="john@example.com" required>
                        </div>
                        <div class="checkout__input">
                            <p>Password<span>*</span></p>
                            <input type="password" name="password" placeholder="********" required>
                        </div>
                        <button type="submit" class="site-btn">Login</button>
                    </form>
                    <p class="mt-3">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
