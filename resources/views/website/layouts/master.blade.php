<!doctype html>
<html lang="en">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Yeasin City Housing Limited">
    <meta name="keywords" content="real estate, property, property search, agent, apartments, booking, business, idx, housing, real estate agency, rental">
    <meta name="author" content="MS Emon">
    <title>Home Sweet Housing Limited</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.ico')}}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Required style of the theme -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/webfonts/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/layerslider.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/template.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/colors/color.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/loader.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-select.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">


</head>

<body>

<div class="preloader">
    <div class="loader xy-center"></div>
</div>

<div id="page_wrapper" class="bg-light">
    <!--============== Header Section Start ==============-->

    <!--============== Header Section End ==============-->

    @yield('content')


    <!-- Scroll to top -->
    <div class="scroll-top-vertical xs-mx-none" id="scroll">Go Top <i class="ms-2 fa-solid fa-arrow-right-long"></i></div>
    <!-- End Scroll To top -->



</div>

<!-- Javascript Files -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/greensock.js')}}"></script>
<script src="{{asset('frontend/js/layerslider.transitions.js')}}"></script>
<script src="{{asset('frontend/js/layerslider.kreaturamedia.jquery.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.js')}}"></script>
<script src="{{asset('frontend/js/range/tmpl.js')}}"></script>
<script src="{{asset('frontend/js/range/jquery.dependClass.js')}}"></script>
<script src="{{asset('frontend/js/range/draggable.js')}}"></script>
<script src="{{asset('frontend/js/range/jquery.slider.js')}}"></script>
<script src="{{asset('frontend/js/wow.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>
<script src="{{asset('frontend/js/mixitup.min.js')}}"></script>
<script src="{{asset('frontend/js/paraxify.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>




<script>
    $(document).ready(function () {

        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @endif

        $('#slider').layerSlider({
            sliderVersion: '6.0.0',
            type: 'fullwidth',
            responsiveUnder: 0,
            maxRatio: 1,
            slideBGSize: 'auto',
            hideUnder: 0,
            hideOver: 100000,
            skin: 'outline',
            fitScreenWidth: true,
            fullSizeMode: 'fitheight',
            navButtons: false,
            navStartStop: false,
            height: 840,
            skinsPath: 'assets/skins/'
        });

    });


</script>
</body>

</html>
