<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Basic -->

    <meta name="author" content="taillislabs.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('metatags')

    <title>@yield('title') - Taillis Labs</title>

    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" />
    <link rel="apple-touch-icon" href="assets/images/favicon.svg" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link href="{{ asset('assets/css/style.css?=v1.4') }}" rel="stylesheet">
    @yield('styles')
    {{-- {!! $settings ? $settings->script_head : '' !!} --}}

    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '528128914639707');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
            src="https://www.facebook.com/tr?id=528128914639707&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XE87XXDF1G"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-XE87XXDF1G');
    </script>
</head>

<body>

    @include('frontend/partials/header')

    @yield('content')

    @include('frontend/partials/footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    {{-- <script src="{{ asset('/assets/js/wow.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/wow.js"></script>

    <script src="{{ asset('/assets/js/app.js') }}"></script>
    @yield('scripts')
    @include('frontend/layouts/js')

    {{-- <script>
        new WOW().init();
    </script> --}}

    {!! RecaptchaV3::initJs() !!}
    <script>(function(w, d) { w.CollectId = "602f8bace9cf8d150b3ac215"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script> 


</body>

</html>
