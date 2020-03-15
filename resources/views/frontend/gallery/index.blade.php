@extends('frontend.app')
@section('title','Gallery Lists')
@section('css_styles')
@endsection
@section('content')
    <!--================ Home Banner Area =================-->



    <div class="whole-wrap" style="margin-top: 100px;">
        <div class="container">
            <div class="section-top-border">
                <div class="section-top-border">
                    <h3 class="title_color">Image Gallery</h3>
                    <div class="row gallery-item">
                        @foreach($gallerys as $gallery)
                        <div class="col-md-4">
                            <a href="{{route('gallery.show',[$gallery->slug])}}" class="img-gal">
                                @if(file_exists('storage/'.$gallery->image) && $gallery->image != '')
                                <div class="single-gallery-image" style="background: url('{{asset('storage/'.$gallery->image)}}');"></div>
                                @endif
                                <p>{{$gallery->title}}</p>
                            </a>
                        </div>
                       @endforeach
                    </div>
                    {{ $gallerys->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>

        <footer>
            <div class="footer-area">
                <div class="container">
                    <div class="row section_gap">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-footer-widget tp_widgets">
                                <h4 class="footer_title large_title">Our Mission</h4>
                                <p>
                                    So seed seed green that winged cattle in. Gathering thing made fly you're no
                                    divided deep moved us lan Gathering thing us land years living.
                                </p>
                                <p>
                                    So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved
                                </p>
                            </div>
                        </div>
                        <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                            <div class="single-footer-widget tp_widgets">
                                <h4 class="footer_title">Quick Links</h4>
                                <ul class="list">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about-us.html">About</a></li>
                                    <li><a href="activities.html">Activities</a></li>
                                    <li><a href="team.html">Team</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="single-footer-widget instafeed">
                                <h4 class="footer_title">Gallery</h6>
                                    <ul class="list instafeed d-flex flex-wrap">
                                        <li><img src="img/gallery/g1.jpg" alt=""></li>
                                        <li><img src="img/gallery/g2.jpg" alt=""></li>
                                        <li><img src="img/gallery/g3.jpg" alt=""></li>
                                        <li><img src="img/gallery/g4.jpg" alt=""></li>
                                        <li><img src="img/gallery/g5.jpg" alt=""></li>
                                        <li><img src="img/gallery/g6.jpg" alt=""></li>
                                        <a href="gallery.html" class="">View More</a>
                                    </ul>


                            </div>
                        </div>
                        <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                            <div class="single-footer-widget tp_widgets">
                                <h4 class="footer_title">Contact Us</h4>
                                <div class="ml-40">
                                    <p class="sm-head">
                                        <span class="fa fa-location-arrow"></span>
                                        Head Office
                                    </p>
                                    <p>123, Main Street, Your City</p>

                                    <p class="sm-head">
                                        <span class="fa fa-phone"></span>
                                        Phone Number
                                    </p>
                                    <p>
                                        +123 456 7890 <br>
                                        +123 456 7890
                                    </p>

                                    <p class="sm-head">
                                        <span class="fa fa-envelope"></span>
                                        Email
                                    </p>
                                    <p>
                                        free@infoexample.com <br>
                                        www.infoexample.com
                                    </p>
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
        <!--================ End footer Area  =================-->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/countdown.js"></script>

        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/theme.js"></script>
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
            });
        </script>


@endsection
@section('js_scripts')
@endsection
