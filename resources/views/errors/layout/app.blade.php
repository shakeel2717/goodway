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
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content container">
		@yield('content')
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
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/waves.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/jquery.wavify.js') }}"></script>
<script>
    $('#feel-the-wave').wavify({
        height: 100,
        bones: 3,
        amplitude: 90,
        color: 'rgba(72, 134, 255, 4)',
        speed: .25
    });
    $('#feel-the-wave-two').wavify({
        height: 70,
        bones: 5,
        amplitude: 60,
        color: 'rgba(72, 134, 255, .3)',
        speed: .35
    });
    $('#feel-the-wave-three').wavify({
        height: 50,
        bones: 4,
        amplitude: 50,
        color: 'rgba(72, 134, 255, .2)',
        speed: .45
    });
</script>
</body>

</html>
