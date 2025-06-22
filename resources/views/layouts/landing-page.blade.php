<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fiberco</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="{{ asset('compro/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('compro/css/vendor.css') }}">

    <!--Bootstrap ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('compro/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/932201b95d/UntitledProject/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <style>
        .overlay {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5));
            pointer-events: none;
        }

        a {
            text-decoration: none;
            color: #000;
        }

        .btn-custom {
            background-color: #283c19 !important;
            text-transform: capitalize !important;
            border-radius: 5px !important;
            font-weight: bolder !important;
            font-size: 18px !important;
        }

        .icon-wrapper {
            background-color: #E7F4EC;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
        }

        .img-side {
            margin-top: -15px;
            margin-left: -40px;
            width: 100px !important;
        }

        .under {
            font-size: 40px !important;
            text-decoration: underline;
        }

        .icon-boxx .content-box {
            padding-top: 20px;
            border-radius: 5px;
        }

        .btnn {
            background-color: #283c19 !important;
            text-transform: capitalize !important;
            border-radius: 5px !important;
            font-weight: bold !important;
            font-size: 12px !important;
            padding: 8px 16px !important;
            line-height: 1 !important;
            color: #fff !important;
        }

        .btnn:hover {
            color: #fff;
        }
    </style>
</head>

<body class="hompage bg-accent-light">

    <header id="header" class="content-light  border-bottom">
        <div class="header-wrap container py-3">
            <div class="row align-items-center">

                <div class="col-md-2 col-sm-4 brand-block order-0">
                    <div class="main-logo text-lg-start">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/logo navbar.png') }}" alt="Fiberco" class="brand-image"
                                width="100px">
                        </a>
                    </div>
                </div>

                <div class="primary-nav col-md-5 col-sm-6 order-1">
                    <nav class="navbar">
                        <div class="main-menu">
                            <ul class="menu-list list-unstyled d-flex m-0">
                                <li class="menu-itemhome1">
                                    <a class="text-uppercase item-anchor" href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="menu-itemhome1">
                                    <a class="text-uppercase item-anchor" href="{{ route('profile') }}">Profile</a>
                                </li>
                                <li class="menu-itemhome1">
                                    <a class="text-uppercase item-anchor" href="{{ route('list-produk') }}">Products</a>
                                </li>
                                <li class="menu-itemhome1">
                                    <a class="text-uppercase item-anchor" href="{{ route('faqs') }}">FAQ</a>
                                </li>
                                <li class="menu-itemhome1">
                                    <a class="text-uppercase item-anchor" href="{{ route('contact') }}">Contact Us</a>
                                </li>
                            </ul>

                            <div class="hamburger d-block d-md-none">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="right-block col-md-5 col-sm-2 order-2">
                    <nav class="navbar justify-content-end">
                        <div class="user-items">
                            <ul class="list-unstyled content-light d-flex align-items-center m-0">
                                <li>
                                    <a href="{{ url('/') }}" class="text-uppercase item-anchor"
                                        style="color:#000; font-size:16px; padding-right:20px;">Home</a>
                                    <a href="{{ route('profile') }}" class="text-uppercase item-anchor"
                                        style="color:#000; font-size:16px; padding-right:20px;">Profile</a>
                                    <a href="{{ route('list-produk') }}" class="text-uppercase item-anchor"
                                        style="color:#000; font-size:16px; padding-right:20px;">Products</a>
                                    <a href="{{ route('faqs') }}" class="text-uppercase item-anchor"
                                        style="color:#000; font-size:16px; padding-right:20px;">FAQ</a>
                                    <a href="{{ route('contact') }}" class="text-uppercase item-anchor"
                                        style="color:#000; font-size:16px; padding-right:20px;">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </header>

    @yield('content')

    <footer id="footer" class="overflow-hidden text-light pt-5 pb-3" style="background-color: #263238;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-1 col-md-6 mb-4"></div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-menu">
                        <img src="{{ asset('img/logo footer.png') }}" alt="Fiberco" width="100px">
                        <p class="mt-3">Discover the benefits of cocofiber and cocopeat for your urban farming and
                            eco-friendly needs. </p>
                        <div class="social-links mt-2">
                            <ul class="d-flex list-unstyled gap-3">
                                <li>
                                    <a href="https://www.instagram.com/cv.sumbersari/" target="_blank" class="text-light">
                                        <ion-icon name="logo-instagram" style="font-size: 30px;"></ion-icon>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/sumbersariss?locale=id_ID" target="_blank" class="text-light">
                                        <ion-icon name="logo-facebook" style="font-size: 30px;"></ion-icon>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-menu">
                        <h5 class="widget-title fw-bold">Quick Links</h5>
                        <ul class="list-unstyled mt-3">
                            <li><a href="{{ url('/') }}" class="text-light text-decoration-none">> Home Page</a>
                            </li>
                            <li><a href="{{ route('profile') }}" class="text-light text-decoration-none">>
                                    Profile</a></li>
                            <li><a href="{{ route('list-produk') }}" class="text-light text-decoration-none">>
                                    Products</a></li>
                            <li><a href="{{ route('contact') }}" class="text-light text-decoration-none">> Contact
                                    Us</a></li>
                            <li><a href="{{ route('faqs') }}" class="text-light text-decoration-none">> FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-menu">
                        <h5 class="widget-title fw-bold">Contact Us</h5>
                        <p class="mt-3"><ion-icon name="call-outline"></ion-icon> 0813-3620-9881</p>
                        <p><ion-icon name="mail-open-outline"></ion-icon> sumbersariss@gmail.com</p>
                        <p><ion-icon name="location-outline"></ion-icon> {{ $profilCompany->address }}</p>
                    </div>
                </div>
            </div>
            <hr class="border-light">
            <div class="col-md-12 col-sm-12">
                <p class="text-center">COPYRIGHT 2025 &copy; | CV SUMBER SARI</p>
            </div>
    </footer>

    <!-- script ================================================== -->
    <script src="{{ asset('compro/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('compro/js/plugins.js') }}"></script>
    <script src="{{ asset('compro/js/script.js') }}"></script>

    <!-- Bootstarp script ================================================== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

</body>

</html>
