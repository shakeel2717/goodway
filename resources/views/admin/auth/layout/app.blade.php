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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>
<div class="auth-wrapper">
    <div class="auth-content text-center">
        <img src="assets/images/logo-dark.png" alt="" class="img-fluid mb-4">
        <div class="card">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="card-body">
                        @yield('form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg width="100%" height="250px" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave bg-wave">
        <title>Wave</title>
        <defs></defs>
        <path id="feel-the-wave" d="" />
    </svg>
    <svg width="100%" height="250px" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave bg-wave">
        <title>Wave</title>
        <defs></defs>
        <path id="feel-the-wave-two" d="" />
    </svg>
    <svg width="100%" height="250px" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave bg-wave">
        <title>Wave</title>
        <defs></defs>
        <path id="feel-the-wave-three" d="" />
    </svg>
</div>
<script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/waves.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/jquery.wavify.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!-- sweet alert Js -->
<script src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>
<x-alert />

</body>

</html>
