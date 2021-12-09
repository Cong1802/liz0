<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ asset('') }}"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="html 5 template, cleaning service template, cleaning template, cleaning company template">
    <meta name="author" content="">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="{{ asset('frontend/favicon.ico') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title')
            @yield('title')
        @else
            Website mẫu giới thiệu dịch vụ - LAPO.VN
        @endif
    </title>
    @yield('seo')

    <!-- Vendors -->
{{--    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/css/animate.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/css/slick.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/css/lightbox.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/css/nouislider.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/css/default.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/css/dripicons.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/css/meanmenu.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/css/magnific-popup.css') }}" rel="stylesheet">--}}
{{--    <!-- Template Style -->--}}
{{--    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/color/color.css') }}" rel="stylesheet">--}}
{{--    <!-- Icon Font-->--}}
{{--    <link href="{{ asset('frontend/fonts/icomoon/style.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('frontend/fontawesome/css/all.min.css') }}" rel="stylesheet">--}}
    <!-- Google Fonts -->
<script type="text/javascript" src="{{asset('frontend/findhouse/js/jquery-3.3.1.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- news -->

    <link rel="stylesheet" href="{{ asset('frontend/findhouse/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/findhouse/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/findhouse/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/tagsinput/src/bootstrap-tagsinput.css') }}">
    <!-- Favicon -->
    <link href="{{ asset('frontend/findhouse/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{{ asset('frontend/findhouse/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />
    <!-- news -->

@if(setting('custom_styles'))
        <style>
            {{ setting('custom_styles') }}
        </style>
    @endif
    <!-- Common Css -->
    <link rel="stylesheet" href="{{ asset('common/toastr/toastr.min.css') }}">
    <!-- End Common Css-->
    @stack('styles')
</head>

<body class="page-index">
<div class="loading-content d-none">
    <div class="loaded-text" data-text="ProClena">
        ProClena
    </div>
</div>
@include('shop.layouts.header')
@yield('content')
@include('shop.layouts.footer')

<!-- news js -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/jquery-migrate-3.0.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/jquery.mmenu.all.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/ace-responsive-menu.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/snackbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/simplebar.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/scrollto.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/jquery-scrolltofixed-min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/jquery.counterup.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/slider.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/findhouse/js/timepicker.js')}}"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<!-- Custom script for all pages -->
<script type="text/javascript" src="{{asset('frontend/findhouse/js/script.js')}}"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<!-- news js -->

<script src="{{ asset('frontend/tagsinput/src/bootstrap-tagsinput.js') }}"></script>
<!-- External JavaScripts -->
{{--<script src="{{ asset('frontend/js/jquery.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/slick.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/lightbox.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery.scroll-with-ease.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/moment.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/bootstrap-datetimepicker.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery.countTo.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery.print.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery.dotdotdot.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery.doubletaptogo.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/nouislider.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jarallax.min.js') }}"></script>--}}
{{--<!-- Custom JavaScripts -->--}}
{{--<script src="{{ asset('frontend/js/custom.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/forms.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/color/color.js') }}"></script>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
@stack('scripts')
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v8.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
    attribution=setup_tool
    page_id="103424141429601"
    logged_in_greeting="Xin chào! Chúng tôi có thể hỗ trợ gì cho bạn?"
    logged_out_greeting="Xin chào! Chúng tôi có thể hỗ trợ gì cho bạn?">
</div>
@if(setting('custom_scripts'))
    <script>
        {{ setting('custom_scripts') }}
    </script>
@endif
 
<!-- Common Js -->
<script src="{{ asset('common/toastr/toastr.min.js') }}"></script>
<script>
    $('.select2').select2();
    toastr.options = {
        "closeButton": true,
        "timeOut": "5000",
        iconClasses: {
            error: 'alert-error',
            info: 'alert-info',
            success: 'alert-success',
            warning: 'alert-warning'
        }
    };
</script>
<script src="{{ asset('common/js/ajax-form.js') }}"></script>
<script src="{{ asset('common/js/contact.js') }}"></script>
<script src="{{ asset('common/js/subscribe-email.js') }}"></script>
<!-- End Common Js-->
@include('shop.layouts.partials.notification')
</body>
</html>
