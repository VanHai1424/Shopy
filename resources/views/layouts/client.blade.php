<!doctype html>
<html lang="en">

<!-- Mirrored from demo.htmlhunters.com/shopy/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jun 2024 05:14:54 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/css/vendor.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-176058743-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-176058743-2');
    </script>
    <title>@yield('title')</title>
</head>

<body>
    @include('blocks.clients.header')
    @yield('content')
    @include('blocks.clients.footer')

    <script src="{{asset('assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
</body>

<!-- Mirrored from demo.htmlhunters.com/shopy/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jun 2024 05:15:09 GMT -->

</html>
