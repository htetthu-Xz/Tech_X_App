<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/progressbar_barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/tosta/css/nice-toast-js.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/Videojs/css/video-js.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/waitMe.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <script>
        /*to prevent Firefox FOUC, this must be here*/
        let FF_FOUC_FIX;
    </script>
    @stack('css')
</head>
<body>
    @routes
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('frontend/img/logo/loder.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    @include('frontend.layouts.header')

        @yield('content')

    @include('frontend.layouts.footer')

    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
    
    <!-- JS  -->
    <script src="{{ asset('frontend/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('frontend/js/vendor/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }} "></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }} "></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('frontend/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/animated.headline.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('frontend/js/gijgo.min.js') }}"></script>
    <!-- Nice-select, sticky -->
    {{-- <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script> --}}
    <!-- Progress -->
    <script src="{{ asset('frontend/js/jquery.barfiller.js') }}"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/js/hover-direction-snake.min.js') }}"></script>

    <!-- contact js -->
    {{-- <script src="{{ asset('frontend/js/jcontact.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/mail-script.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script> --}}

    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    {{-- Toster --}}
    <script src="{{ asset('frontend/plugins/tosta/js/nice-toast-js.min.js') }}"></script>

    {{-- Video Player --}}
    <script src="{{ asset('frontend/plugins/Videojs/js/video.min.js') }}"></script>

    {{-- spinner --}}
    <script src="{{ asset('frontend/js/waitMe.js') }}"></script>

    {{-- Ajax Loader --}}
    <script src="{{ asset('frontend/js/ajax_loader.js') }}"></script>

    {{-- custom js --}}
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    @include('frontend.layouts.tosta')

    @stack('script')
</body>
</html>