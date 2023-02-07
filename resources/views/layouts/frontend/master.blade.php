<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="CH3Cn8zDTCv2sxOV7LSaXYOfDMzdBG1ZE_Jjlh_d3BE" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148414371-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-148414371-1');
    </script>

    <link rel="icon" href="{{ setting('site_favicon') }}" type="image/png" />
    <!-- Meta Data  -->
    @yield('meta-tags')
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    @stack('css')
</head>

<body onload="startTime()">
    <input type="hidden" value="{{ asset('front-assets/img/') }}" id="weather-icon-assets">
    @includeIf('layouts.frontend.partials.header-nav')
    @includeIf('layouts.frontend.partials.desktop-nav')
    @includeIf('layouts.frontend.partials.desktop-breaking')
    @includeIf('layouts.frontend.partials.mobile-nav')
    @includeIf('layouts.frontend.partials.mobile-breaking')

    @yield('sections')

    @includeIf('layouts.frontend.partials.footer')
    @includeIf('layouts.frontend.partials.sidebar-nav')
    <button class="back-to-top" type="button"><i class="fas fa-angle-up"></i></button>
    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/weather.js') }}"></script>
    <script src="{{ asset('front-assets/js/time.js') }}"></script>
    <script src="{{ asset('front-assets/js/slick.js') }}"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <script src="{{ asset('front-assets/js/app.js') }}"></script>
    @includeIf('vendor.worlddata.ajax-script')
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    @stack('js')
    <script src="{{ asset('front-assets/js/master.js') }}"></script>

</body>

</html>
