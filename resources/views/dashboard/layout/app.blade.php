<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ env('APP_NAME') }} - {{ env('APP_DESC') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="{{ env('APP_DESC') }}" />
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}">
    <meta name="author" content="Asan Webs Development" />
    <link rel="icon" href="{{ asset('assets/images/brand/svg/favi-light.svg') }}" type="image/x-icon">
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap4.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
        <div class="content-main  container">
            <div class="m-header">
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                <a href="{{ route('dashboard') }}" class="b-brand">
                    <img src="{{ asset('assets/images/brand/svg/logo-light.svg') }}" width="150" alt=""
                        class="logo">
                </a>
                <a href="#!" class="mob-toggler">
                    <i class="feather icon-more-vertical"></i>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                <i class="icon feather icon-bell"></i>
                                <span class="badge badge-pill badge-primary">0</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right notification">
                                <div class="noti-head">
                                    <h6 class="d-inline-block m-b-0">Notifications</h6>
                                    <div class="float-right">
                                        <a href="#!" class="m-r-10">mark as read</a>
                                        <a href="#!">clear all</a>
                                    </div>
                                </div>
                                <ul class="noti-body">
                                    <li class="n-title text-center">
                                        <p class="m-b-0">Cool! There's No Notification</p>
                                    </li>
                                </ul>
                                <div class="noti-footer">
                                    <a href="#">show all</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown drp-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('assets/images/icons/man.png') }}" class="img-radius"
                                    alt="User-Profile-Image">
                                <span class="badge badge-pill badge-success">0</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head">
                                    <img src="{{ asset('assets/images/avatar/user-light.svg') }}"
                                        class="img-radius" alt="User-Profile-Image">
                                    <span>{{ session('user')->username }}</span>
                                    <a href="{{ route('logout') }}" class="dud-logout" title="Logout">
                                        <i class="feather icon-log-out"></i>
                                    </a>
                                </div>
                                <ul class="pro-body">
                                    <li><a href="{{ route('profile.index') }}" class="dropdown-item"><i
                                                class="feather icon-user"></i> Profile</a></li>
                                    <li><a href="{{ route('profile.password') }}" class="dropdown-item"><i
                                                class="feather icon-mail"></i> Change Password</a></li>
                                    <li><a href="{{ route('logout') }}" class="dropdown-item"><i
                                                class="feather icon-lock"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="content-main container">
        <!-- [ Header ] end -->
        <nav class="pcoded-navbar menupos-fixed ">
            <div class="navbar-wrapper content-main container">
                <div class="navbar-content scroll-div ">
                    <ul class="nav pcoded-inner-navbar ">
                        <li class="nav-item pcoded-menu-caption">
                            <label>Overview</label>
                        </li>
                        <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link ">
                                <span class="pcoded-micon"><i class="feather icon-server"></i></span>
                                <span class="pcoded-mtext">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Finance</label>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('donation.index') }}" class="nav-link ">
                                <span class="pcoded-micon"><i class="feather icon-grid"></i></span>
                                <span class="pcoded-mtext">Make Donation</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('wallet.index') }}" class="nav-link ">
                                <span class="pcoded-micon"><i class="feather icon-copy"></i></span>
                                <span class="pcoded-mtext">Update Wallet</span>
                            </a>
                        </li>

                        <li class="nav-item pcoded-menu-caption">
                            <label>Withdraw Funds</label>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('withdraw.index') }}" class="nav-link ">
                                <span class="pcoded-micon"><i class="feather icon-upload"></i></span>
                                <span class="pcoded-mtext">Request Withdraw</span>
                            </a>
                        </li>

                        <li class="nav-item pcoded-menu-caption">
                            <label>Account Statement</label>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user.donations') }}" class="nav-link ">
                                <span class="pcoded-micon"><i class="feather icon-file-plus"></i></span>
                                <span class="pcoded-mtext">All Donations</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('user.withdraws') }}" class="nav-link ">
                                <span class="pcoded-micon"><i class="feather icon-file-plus"></i></span>
                                <span class="pcoded-mtext">All Withdraws</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user.profits') }}" class="nav-link ">
                                <span class="pcoded-micon"><i class="feather icon-file-plus"></i></span>
                                <span class="pcoded-mtext">All Profits</span>
                            </a>
                        </li>

                        <li class="nav-item pcoded-menu-caption">
                            <label>Admin Support</label>
                        </li>
                        <li class="nav-item">
                            <a href="https://api.whatsapp.com/send?phone=447520643717" class="nav-link ">
                                <span class="pcoded-micon"><i class="fab fa-whatsapp"></i></span>
                                <span class="pcoded-mtext">Whatsapp</span>
                            </a>
                        </li>

                        <li class="nav-item pcoded-menu-caption">
                            <label>My Account</label>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile.index') }}" class="nav-link ">
                                <span class="pcoded-micon"><i class="feather icon-user-check"></i></span>
                                <span class="pcoded-mtext">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile.refers') }}" class="nav-link ">
                                <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                <span class="pcoded-mtext">My Refers</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile.password') }}" class="nav-link ">
                                <span class="pcoded-micon"><i class="feather icon-lock"></i></span>
                                <span class="pcoded-mtext">Change Password</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link ">
                                <span class="pcoded-micon"><i class="feather icon-lock"></i></span>
                                <span class="pcoded-mtext">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- [ navigation menu ] end -->

        <!-- [ Main Content ] start -->
        <div class="pcoded-main-container">
            <div class="pcoded-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5>Welcome {{ session('user')->username }}</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <!-- [ Main Content ] start -->
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('donation.index') }}" class="btn btn-primary btn-lg mb-3">Make
                            Donation</a>
                    </div>
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
                <!-- [ Main Content ] end -->
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
    <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        $('#user-list-table').DataTable();
    </script>
    <!-- sweet alert Js -->
    <script src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>
    <x-alert />
</body>

</html>
