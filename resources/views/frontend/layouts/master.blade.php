<!DOCTYPE html>
<html>

    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title> @stack('title') </title>

        <meta name="author" content="revinr, http://revinr.com">
        <meta name="subject" content="Infinity Workforce">
        <meta name="copyright" content="http://revinr.com">
        <meta name="language" content="English">
        <meta name="web_author" content="revinr">
        <meta name="reply-to" content="info@revinr.com">
        <meta name="identifier-URL" content="http://infinityworkforce.com.au">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('frontend') }}/img/favicon.png" type="image/x-icon" />
        <link rel="apple-touch-icon" href="{{ asset('frontend') }}/img/apple-touch-icon.png">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

        <!-- Web Fonts  -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400"
            rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/animate/animate.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/simple-line-icons/css/simple-line-icons.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/owl.carousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/owl.carousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/magnific-popup/magnific-popup.min.css">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/theme.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/theme-elements.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/theme-blog.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/theme-shop.css">

        <!-- Current Page CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/rs-plugin/css/settings.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/rs-plugin/css/layers.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/rs-plugin/css/navigation.css">

        <!-- Demo CSS -->


        <!-- Toster CSS -->
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/skins/skin-corporate-9.css">
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/custom.css">

        <!-- Head Libs -->
        @stack('head')
    </head>

    <body>
        <div class="body">
            @include('frontend.layouts.navbar')
            <div role="main" class="main">
                @yield('content')
            </div>
            @include('frontend.layouts.footer')

            <script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
            <script src="{{ asset('frontend') }}/vendor/jquery.appear/jquery.appear.min.js"></script>
            <script src="{{ asset('frontend') }}/vendor/jquery.easing/jquery.easing.min.js"></script>
            <script src="{{ asset('frontend') }}/vendor/jquery.cookie/jquery.cookie.min.js"></script>

            <script src="{{ asset('frontend') }}/vendor/modernizr/modernizr.min.js"></script>
            <script src="{{ asset('frontend') }}/vendor/popper/umd/popper.min.js"></script>
            <script src="{{ asset('frontend') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="{{ asset('frontend') }}/vendor/common/common.min.js"></script>
            <script src="{{ asset('frontend') }}/vendor/jquery.validation/jquery.validate.min.js"></script>
            <script src="{{ asset('frontend') }}/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
            <script src="{{ asset('frontend') }}/vendor/jquery.gmap/jquery.gmap.min.js"></script>
            <script src="{{ asset('frontend') }}/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
            {{-- <script src="{{asset('frontend')}}/vendor/isotope/jquery.isotope.min.js"></script> --}}
            <script src="{{ asset('frontend') }}/vendor/owl.carousel/owl.carousel.min.js"></script>
            {{-- <script src="{{asset('frontend')}}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script> --}}
            <script src="{{ asset('frontend') }}/vendor/vide/jquery.vide.min.js"></script>
            {{-- <script src="{{asset('frontend')}}/vendor/vivus/vivus.min.js"></script> --}}

            <!-- Theme Base, Components and Settings -->
            <script src="{{ asset('frontend') }}/js/theme.js"></script>

            <!-- Current Page Vendor and Views -->
            <script src="{{ asset('frontend') }}/vendor/rs-plugin/js/jquery.themepunch.tools.min.js">

            </script>

            <!-- Theme Custom -->
            <script src="{{ asset('frontend') }}/js/custom.js"></script>

            <!-- Theme Initialization Files -->
            <script src="{{ asset('frontend') }}/js/theme.init.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>


            <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
            @endif
            </script>
            @stack('footer')
    </body>

</html>
