<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Gens Uk | @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/lightbox/simpleLightbox.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/nice-select/css/nice-select.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" integrity="sha256-fDncdclXlALqR3HOO34OGHxek91q8ApmD3gGldM+Rng=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha256-HAaDW5o2+LelybUhfuk0Zh2Vdk8Y2W2UeKmbaXhalfA=" crossorigin="anonymous" />

    @yield('css_styles')
</head>
<body>

<!--================ Start Header Menu Area =================-->
<header class="header_area">

    <div class="top-header">
        <div class="container">
            <div class="top-header-wrapper">
                <ul>
                    @foreach($settings as $setting)
                        @if($setting->slug == 'phone')
                            <li>
                                <span class="fa fa-phone"></span>
                                {{$setting->value}}
                            </li>
                        @endif
                            @if($setting->slug == 'email')
                            <li><span class="fa fa-envelope"></span>

                                {{$setting->value}}
                            </li>
                            @endif
                            @if($setting->slug == 'facebook')
                    <li>
                        <a href="{{$setting->value}}" >
                        <span class="fa fa-facebook"></span>
                        </a>

                    </li>
                            @endif
                         @if($setting->slug == 'twitter')
                    <li>  <a href="{{$setting->value}}" >
                        <span class="fa fa-twitter"></span>
                        </a>
                    </li>
                                @endif
                         @if($setting->slug == 'linkedin')
                    <li>
                        <a href="{{$setting->value}}" >
                        <span class="fa fa-linkedin"></span>
                        </a>
                    </li>
                                    @endif
                    @endforeach

                </ul>
            </div>

        </div>

    </div>
    <div class="main_menu">

        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="{{route('home')}}"><img src="{{asset('frontend/img/nav-logo.png')}}" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">

                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item  @if(Request::segment(1) == '') active @endif"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                            <li class="nav-item @if(Request::segment(1) == 'about-us') active @endif"><a class="nav-link" href="{{route('about-us')}}">About</a></li>
                            <li class="nav-item @if(Request::segment(1) == 'event') active @endif"><a class="nav-link" href="{{route('event.index')}}">Events</a></li>
                            <li class="nav-item @if(Request::segment(1) == 'team') active @endif"><a class="nav-link" href="{{route('team.index')}}">Team</a>
                            <li class="nav-item @if(Request::segment(1) == 'project') active @endif"><a class="nav-link" href="{{route('project.index')}}">Project</a>
{{--                            <li class="nav-item "><a class="nav-link" href="oppurtinuties.html">Opportunities</a></li>--}}
                            <li class="nav-item @if(Request::segment(1) == 'membership') active @endif"><a class="nav-link" href="{{route('membership.index')}}">Membership</a>

                            <li class="nav-item @if(Request::segment(1) == 'contact-us') active @endif"><a class="nav-link" href="{{route('contact-us.index')}}">Contact</a></li>
                            <li class="nav-item @if(Request::segment(1) == 'login') active @endif"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--================ End Header Menu Area =================-->
@yield('content')
<!--================ Start footer Area  =================-->
<footer>
    <div class="footer-area">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        @foreach($contents as $content)
                            @if($content->slug =='our-mission')

                        <h4 class="footer_title large_title">{{$content->title}}</h4>

                                <p>{{ $content->short_description }} </p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Quick Links</h4>
                        <ul class="list">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('about-us')}}">About</a></li>
                            <li><a href="{{route('blog.index')}}">Blog</a></li>
                            <li><a href="{{route('event.index')}}">Events</a></li>
                            <li><a href="{{route('team.index')}}">Team</a></li>
                            <li><a href="{{route('gallery.index')}}">Gallery</a></li>
                            <li><a href="{{route('contact-us.index')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget instafeed">
                        <h4 class="footer_title">Gallery</h4>
                            <ul class="list instafeed d-flex flex-wrap">
                                @foreach($galleries as $gallery)
                                <li>
                                    @if(file_exists('storage/'.$gallery->image) && $gallery->image != '')
                                    <img src="{{asset('storage/'.$gallery->image)}}" alt="{{$gallery->title}}" style="width: 72px;height: 62px;">
                                      @endif
                                </li>
                                @endforeach
                                <a href="{{route('gallery.index')}}" class="">View More</a>
                            </ul>


                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Contact Us</h4>
                        <div class="ml-40">
                            @foreach($settings as $setting)
                                @if($setting->slug == 'address')
                            <p class="sm-head">
                                <span class="fa fa-location-arrow"></span>
                                Head Office
                            </p>

                            <p>{{$setting->value}}</p>
                            @endif
                                    @if($setting->slug == 'phone')
                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                Phone Number
                            </p>
                            <p>
                                {{$setting->value}}
                            </p>
                                    @endif
                                    @if($setting->slug == 'email')
                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Email
                            </p>
                            <p>
                                {{$setting->value}}
                            </p>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="javascript:void(0)" target="_blank">Gens Technology</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
<div id="overlay-load" style="display: none;">
    <div class="cv-spinner">
        <span class="spinner"></span>
    </div>
</div>
<!--================ End footer Area  =================-->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('frontend/js/jquery-3.2.1.min.js')}}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

<script src="{{ asset('frontend/js/popper.js')}}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/stellar.js')}}"></script>
<script src="{{ asset('frontend/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{ asset('frontend/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{ asset('frontend/js/mail-script.js')}}"></script>
<script src="{{ asset('frontend/js/countdown.js')}}"></script>

<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{ asset('frontend/js/gmaps.min.js')}}"></script>
<script src="{{ asset('frontend/js/theme.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" integrity="sha256-jGAkJO3hvqIDc4nIY1sfh/FPbV+UK+1N+xJJg6zzr7A=" crossorigin="anonymous"></script>

<script>

    $(".owl-carousel").owlCarousel({
        lazyLoad: true,
        loop: true,
        autoplay: true,
        autoPlaySpeed: 3000,
        autoPlayTimeout: 3000,
        autoplayHoverPause: true,
        items: 4,
        margin: 1,
        dots: false,
        smartSpeed: 600,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],

        responsive: {
            1024: {
                items: 4
            },
            768: {
                nav: true,
                items: 3,
                autoplay: false,
            },
            320: {
                nav: false,
                items: 1,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplaySpeed: 800
            }
        }





    });
    $(document).ready(function(){
        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
        var maxHeight = 0;

        $(".team_item").each(function(){
            if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
        });

        var descmaxHeight = 100;
        $(".team_area .team-details-description").height(descmaxHeight);


        $(".team_area .team-details-description").each(function(){
            if ($(this).height() > descmaxHeight) { descmaxHeight = $(this).height(); }
        });


        // var eventmaxHeight = 0;
        // $(".single_event").height(eventmaxHeight);
        //
        // $(".single_event").each(function(){
        //     if ($(this).height() > eventmaxHeight) { maxHeight = $(this).height(); }
        // });
        //
        // $(".team_name").height(maxHeight);
    });
</script>
@yield('js_script')
</body>
</html>
