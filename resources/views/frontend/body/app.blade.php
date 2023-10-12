<!DOCTYPE html>
<html lang="en">
@php
    $seo = \App\Models\SeoSetting::find(1);
@endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">\
    <meta name="description" content="">
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="author" content="{{ $seo->meta_author }}">
    <meta name="keywords" content="{{ $seo->meta_keyword }}">
    <meta name="robots" content="all">

    <!-- /// Google Analytics Code // -->
    <script>
        {{ $seo->google_analytics }}
    </script>
    <!-- /// Google Analytics Code // -->

    <title>@yield('title') </title>



    <!-- Css Files -->
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('frontend/css/font-awesome.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('font-awesome/css/all.css') }}">
    <link href="{{ asset('frontend/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/dl-menu.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/flexslider.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyphoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<!--// Main Wrapper //-->
<div class="as-mainwrapper">

    <!--// Header //-->
   @include('frontend.body.header')
    <!--// Header //-->



    <!--// MainBanner //-->


{{--    slider--}}


        <!--// MainSection //-->

        <!--// MainSection //-->
{{--        <div class="as-main-section as-bgcolor" style=" padding: 40px 0px 40px 0px; ">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}

{{--                    <div class="col-md-12">--}}
{{--                        <div class="as-action-style">--}}
{{--                            <h2><i class="fa fa-hand-o-right"></i> Act now and join our cause. Stay up to date with us & our activites.</h2>--}}
{{--                            <div class="as-action-button">--}}
{{--                                <a href="#">View Profile</a>--}}
{{--                                <a href="donation.html">Donate Now</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!--// MainSection //-->

    @yield('content')

    <!--// Footer //-->
    @include('frontend.body.footer')
    <!--// Footer //-->

</div>
<!--// Main Wrapper //-->

<!-- Search Modal -->
@include('frontend.body.search_modal')
<!-- Search Modal -->

<!-- jQuery (necessary for JavaScript plugins) -->
<script src="{{ asset('frontend/script/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/script/modernizr.js') }}"></script>
<script src="{{ asset('frontend/script/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/script/jquery.dlmenu.js') }}"></script>
<script src="{{ asset('frontend/script/flexslider-min.js') }}"></script>
<script src="{{ asset('frontend/script/goalProgress.min.js') }}"></script>
<script src="{{ asset('frontend/script/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('frontend/script/jquery.prettyphoto.js') }}"></script>
<script src="{{ asset('frontend/script/waypoints-min.js') }}"></script>
<script src="{{ asset('frontend/script/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/script/newsticker.js') }}"></script>
<script src="{{ asset('frontend/script/parallex.js') }}"></script>
<script src="{{ asset('frontend/script/functions.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script>
    @if( Session::has('message') )
    var type = "{{ Session::get('alert_type','info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}")
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}")
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}")
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}")
            break;
    }

    @endif
</script>

<script>
<script>
    // NewsTicker
    'use strict';
    var options = {
        newsList: "#as-news",
        startDelay: 10,
        placeHolder1: ""
    }
    jQuery().newsTicker(options);
</script>
</body>
</html>