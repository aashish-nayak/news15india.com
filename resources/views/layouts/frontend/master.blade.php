<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="CH3Cn8zDTCv2sxOV7LSaXYOfDMzdBG1ZE_Jjlh_d3BE" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GT-WV8QJZK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'GT-WV8QJZK');
    </script>
    <link rel="icon" href="{{ setting('site_favicon') }}" type="image/png" />
    <!-- Meta Data  -->
    @yield('meta-tags')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    @stack('css')
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1001186181529013" crossorigin="anonymous"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="{{ asset('front-assets/js/weather.js') }}"></script>
    <script src="{{ asset('front-assets/js/time.js') }}"></script>
    <script src="{{ asset('front-assets/js/slick.js') }}"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <script src="{{ asset('front-assets/js/app.js') }}"></script>
    @includeIf('vendor.worlddata.ajax-script')
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
    @stack('js')
    <script src="{{ asset('front-assets/js/master.js') }}"></script>

</body>

</html>
