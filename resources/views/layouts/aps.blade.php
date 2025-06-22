<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- fonts --}}
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- icon --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        body {
            font-weight: 600 !important;
        }

        span {
            font-size: 18px !important;
        }

        .active {
            color: #646c14 !important;
            font-weight: bolder;
        }

        .btn-custom {
            background-color: #646c14;
            color: #fff;
            font-size: 20px;
            border-radius: 30px;
            padding: 10px;
        }

        .btn-custom:hover {
            background-color: #b8b28e;
            color: #000;
        }

        .btn-icon {
            background-color: #fff;
            color: #848583;
            font-size: 20px;
        }

        .logout-item {
            padding: 16px;
        }

        .logout-btn {
            display: inline-flex;
            align-items: center;
            border: 1px solid #646c14;
            border-radius: 20px;
            padding: 6px 15px;
            color: #646c14;
            font-size: 16px;
            text-decoration: none;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background-color: #b8b28e;
            color: #000;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="app-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="app-icon">
                    <img src="{{ asset('img/logo navbar.png') }}" alt="">
                </div>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item {{ Request::routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <ion-icon name="home-outline" style="font-size: 20px; padding-right:10px;"></ion-icon>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-list-item {{ Request::routeIs('produk.index') ? 'active' : '' }}">
                    <a href="{{ route('produk.index') }}">
                        <ion-icon name="cube-outline" style="font-size: 20px; padding-right:10px;"></ion-icon>
                        <span>Product</span>
                    </a>
                </li>
                <li class="sidebar-list-item {{ Request::is('profilCompany*', 'partner*') ? 'active' : '' }}">
                    <a href="#companySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ion-icon name="business-outline" style="font-size: 20px; padding-right:10px;"></ion-icon>
                        <span>Profile Company</span>
                    </a>
                    <ul class="collapse list-unstyled {{ Request::is('profilCompany*', 'partner*') ? 'show' : '' }}"
                        id="companySubmenu">
                        <li class="{{ Request::routeIs('profilCompany.about-us') ? 'active' : '' }}">
                            <a href="{{ route('profilCompany.about-us') }}" style="padding-left: 30px;">
                                <ion-icon name="code-working-outline"
                                style="font-size: 20px; padding-right:10px;"></ion-icon>About Us
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('profilCompany.photos') ? 'active' : '' }}">
                            <a href="{{ route('team.index') }}" style="padding-left: 30px;">
                                <ion-icon name="people-outline"
                                    style="font-size: 20px; padding-right:10px;"></ion-icon>Teams
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('partner.index') ? 'active' : '' }}">
                            <a href="{{ route('partner.index') }}" style="padding-left: 30px;">
                                <ion-icon name="accessibility-outline"
                                    style="font-size: 20px; padding-right:10px;"></ion-icon>Partners
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list-item {{ Request::routeIs('faq.index') ? 'active' : '' }}">
                    <a href="{{ route('faq.index') }}">
                        <ion-icon name="help-circle-outline" style="font-size: 20px; padding-right:10px;"></ion-icon>
                        <span>FAQ</span>
                    </a>
                </li>
                <li class="sidebar-list-item {{ Request::is('distribution*') ? 'active' : '' }}">
                    <a href="#distribSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ion-icon name="car-outline" style="font-size: 20px; padding-right:10px;"></ion-icon>
                        <span>Distribution</span>
                    </a>
                    <ul class="collapse list-unstyled {{ Request::is('distribution*') ? 'show' : '' }}"
                        id="distribSubmenu">
                        <li class="{{ Request::routeIs('distribution.index') ? 'active' : '' }}">
                            <a href="{{ route('distribution.index') }}" style="padding-left: 30px;">
                                <ion-icon name="settings-outline"
                                style="font-size: 20px; padding-right:10px;"></ion-icon>Management
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('distribution.history') ? 'active' : '' }}">
                            <a href="{{ route('distribution.history') }}" style="padding-left: 30px;">
                                <ion-icon name="receipt-outline"
                                    style="font-size: 20px; padding-right:10px;"></ion-icon>History Data
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="logout-item">
                    <a href="{{ route('logout') }}" id="logout-btn" onclick="event.preventDefault();"
                        class="logout-btn">
                        <ion-icon name="log-out-outline" style="font-size: 18px; padding-right:6px;"></ion-icon>
                        LOGOUT
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
        <div class="app-content">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('logout-btn').addEventListener('click', function(e) {
            Swal.fire({
                title: 'Are you sure you want to log out from the admin dashboard?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#343a40',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        });
    </script>
</body>

</html>
