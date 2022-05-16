<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - {{ env('APP_DESC') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="/landing/css/bootstrap.min.css">
    <link rel="stylesheet" href="/landing/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/landing/css/animate.min.css">
    <link rel="stylesheet" href="/landing/css/magnific-popup.css">
    <link rel="stylesheet" href="/landing/css/all.min.css">
    <link rel="stylesheet" href="/landing/css/slick.css">
    <link rel="stylesheet" href="/landing/css/default.css">
    <link rel="stylesheet" href="/landing/css/style.css">
    <link rel="stylesheet" href="/landing/css/responsive.css">
</head>

<body>
    <header>
        <div id="header-sticky" class="header-area header-transparrent pt-50">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="{{ route('index.index') }}"><img
                                    src="{{ asset('assets/images/brand/svg/logo-light.svg') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10">
                        <div class="header-button f-right d-none d-lg-block">
                            <a href="{{ route('register') }}" class="btn btn-bg-white">Create Account</a>
                        </div>
                        <div class="responsive"><i class="fas fa-bars"></i></div>
                        <div class="header-menu f-right">
                            <nav id="basic-nav">
                                <ul class="basic-menu">
                                    <li><a href="{{ route('index.index') }}">Home</a></li>
                                    <li><a href="{{ route('login') }}">Sign in</a></li>
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <main>
        <!-- hero start -->
        <section id="home" class="hero-area hero-hight hero-bg pos-rel" data-background="img/hero/hero-bg-01.png">
            <div class="slider-shape s-shape-1 bounce-animate">
                <img src="img/shape/s-shape-1.png" alt="">
            </div>
            <div class="slider-shape s-shape-2 bounce-animate">
                <img src="img/shape/s-shape-2.png" alt="">
            </div>
            <div class="slider-shape s-shape-3 bounce-animate">
                <img src="img/shape/s-shape-3.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="hero-caption">
                            <div class="hero-text">
                                <h1 class="wow fadeInUp" data-wow-delay="0.3s">Success Start With A Great Platform
                                </h1>
                                <p class="wow fadeInUp" data-wow-delay="0.5s">{{ env('APP_DESC') }}</p>
                            </div>
                            <div class="subscriber-form wow fadeInUp" data-wow-delay="0.7s">
                                <a href="{{ route('register') }}" class="btn btn-bg-salmon">Create Account</a>
                                <a href="{{ route('login') }}" class="btn btn-bg-salmon">Sign in</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 d-none d-xl-block">
                        <div class="hero-img">
                            <img src="{{ asset('landing/girl.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero end -->

        <!-- services start -->
        <section id="about" class="features-area pt-135 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title pos-rel text-center mb-70">
                            <h2 class="back-text">features</h2>
                            <h6>What Do Your Think</h6>
                            <h1>Make Your Own Success <br> As Simple You Clap</h1>
                        </div>
                    </div>
                </div>
                <div class="features-list">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="features-wrapper text-center mb-30 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="features-icon pos-rel">
                                    <img src="img/icon/features-icon-1.png" alt="">
                                </div>
                                <div class="feature-inner-text">
                                    <h4><a href="#">Great Advices</a></h4>
                                    <p>Adipisicing elit, sed do eiusmod tempor incididunt with labore et dolore magna
                                        aliqua.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="features-wrapper text-center mb-30 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="features-icon pos-rel">
                                    <img src="img/icon/features-icon-2.png" alt="">
                                </div>
                                <div class="feature-inner-text">
                                    <h4><a href="#">Optimal Choice</a></h4>
                                    <p>Adipisicing elit, sed do eiusmod tempor incididunt with labore et dolore magna
                                        aliqua.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="features-wrapper text-center mb-30 wow fadeInUp" data-wow-delay="0.6s">
                                <div class="features-icon pos-rel">
                                    <img src="img/icon/features-icon-3.png" alt="">
                                </div>
                                <div class="feature-inner-text">
                                    <h4><a href="#">24/7 Support</a></h4>
                                    <p>Adipisicing elit, sed do eiusmod tempor incididunt with labore et dolore magna
                                        aliqua.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="features-wrapper text-center mb-30 wow fadeInUp" data-wow-delay="0.8s">
                                <div class="features-icon pos-rel">
                                    <img src="img/icon/features-icon-4.png" alt="">
                                </div>
                                <div class="feature-inner-text">
                                    <h4><a href="#">Clear Navigation</a></h4>
                                    <p>Adipisicing elit, sed do eiusmod tempor incididunt with labore et dolore magna
                                        aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services end -->

        <!-- stock start -->
        <section class="stock-area zircon-bg fix pos-rel">
            <div class="stock-shape stock-shape-1 bounce-animate">
                <img src="img/shape/stock-shape-1.png" alt="">
            </div>
            <div class="stock-shape stock-shape-2 bounce-animate">
                <img src="img/shape/stock-shape-2.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="stock-wrapper pt-130">
                            <div class="section-title pos-rel mb-40 ">
                                <h2 class="back-text grey-text">stock</h2>
                                <h6>Why we are</h6>
                                <h1>Keep Track Of Stock Wherever You Are</h1>
                            </div>
                            <div class="stock-text">
                                <p>
                                    {{ env('APP_NAME') }} is network of recent trading holding with a series of
                                    financial services and
                                    standard Asian services. We are managed to accelerate the development of our
                                    partners, the transporter and increase the benefit of the benefit of all the
                                    corporate partners.
                                    To build financial strategies on the foundation of the {{ env('APP_NAME') }}
                                    helps you to
                                    redecorate the mission of code duties by connecting them to an investment market
                                    model. That gives us a whole new strategy to build a creative business.
                                </p>
                                <a href="#" class="btn btn-bg-salmon">Create Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 ">
                        <div class="stock-right-img wow fadeInRight" data-wow-delay="0.5s">
                            <img src="{{ asset('landing/boy.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- stock end -->

        <!-- how-it-works start -->
        <section id="work" class="how-it-works pt-135 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title pos-rel text-center mb-70">
                            <h2 class="back-text">define</h2>
                            <h6>how it work?</h6>
                            <h1>Grasp The World <br> With Your Mind</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="define-wrapper text-center pos-rel mb-30 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="define-icon">
                                <img src="img/define/difine-icon-1.png" alt="">
                            </div>
                            <div class="define-inner-text">
                                <h5><a href="#">Create Your Account</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore.</p>
                                <a href="{{ route('register') }}"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="define-wrapper text-center pos-rel mb-30 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="define-icon">
                                <img src="img/define/difine-icon-2.png" alt="">
                            </div>
                            <div class="define-inner-text">
                                <h5><a href="#">Make Payment</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore.</p>
                                <a href="{{ route('register') }}"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="define-wrapper text-center pos-rel mb-30 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="define-icon">
                                <img src="img/define/difine-icon-3.png" alt="">
                            </div>
                            <div class="define-inner-text">
                                <h5><a href="#">Let’s Enjoy Yourself</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore.</p>
                                <a href="{{ route('register') }}"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- how-it-works end -->

    </main>

    <!-- footer start -->
    <footer>
        <div class="footer-area zircon-bg pt-100">
            <div class="container">
                <div class="footer-top pb-70">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8">
                            <div class="footer-widget mb-30">
                                <div class="footer-logo">
                                    <img src="{{ asset('assets/images/brand/svg/logo-light.svg') }}" alt="">
                                </div>
                                <div class="footer-text">
                                    <p>Good Way Investment is network of recent trading holding with a series of
                                        financial services and standard Asian services. We are managed to accelerate the
                                        development of our partners, the transporter and increase the benefit of the
                                        benefit of all the corporate partners.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4">
                            <div class="footer-widget mb-30">
                                <div class="footer-title">
                                    <h5>Company</h5>
                                </div>
                                <div class="footer-menu">
                                    <ul>
                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        <li><a href="{{ route('donation.index') }}">Pricing Plan</a></li>
                                        <li><a href="{{ route('login') }}">Sign In</a></li>
                                        <li><a href="{{ route('register') }}">Create Account</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom pt-30 pb-30">
                    <div class="container-fulid">
                        <div class="row">
                            <div class="col-12">
                                <div class="footer-copyright text-center">
                                    <p class="white-color">Copyright By <span>{{ env('APP_NAME') }}</span> {{ date('Y') }}. All Rights Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/landing/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="/landing/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/landing/js/popper.min.js"></script>
    <script src="/landing/js/bootstrap.min.js"></script>
    <script src="/landing/js/owl.carousel.min.js"></script>
    <script src="/landing/js/isotope.pkgd.min.js"></script>
    <script src="/landing/js/one-page-nav-min.js"></script>
    <script src="/landing/js/slick.min.js"></script>
    <script src="/landing/js/ajax-form.js"></script>
    <script src="/landing/js/wow.min.js"></script>
    <script src="/landing/js/jquery.scrollUp.min.js"></script>
    <script src="/landing/js/js_jquery.knob.js"></script>
    <script src="/landing/js/js_jquery.appear.js"></script>
    <script src="/landing/js/imagesloaded.pkgd.min.js"></script>
    <script src="/landing/js/jquery.magnific-popup.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBevTAR-V2fDy9gQsQn1xNHBPH2D36kck0"></script>
    <script src="/landing/js/plugins.js"></script>
    <script src="/landing/js/main.js"></script>
</body>

</html>
