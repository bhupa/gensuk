@extends('frontend.app')
@section('title','About-Us')
@section('css_styles')
@endsection
@section('content')
    <!--================ Home Banner Area =================-->
    <section class="banner_area"  >
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background:linear-gradient(0deg, rgba(6, 13, 1, 0.6), rgba(6, 13, 1, 0.6)), @foreach($contentBanners as $banner)   @if($banner->slug =='about')url('{{asset('storage/'.$banner->image)}}')@endif @endforeach no-repeat scroll center center;" ></div>
            <div class="container">
                <div class="banner_content text-center">
                    @foreach($contentBanners as $banner)
                        @if($banner->slug =='about')
                            <h2>{{$banner->title}}</h2>
                            <p>{{str_limit($banner->short_description,'130','....')}}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Causes Area =================-->

    <!--================ End Causes Area =================-->

    <!--================ Start About Us Area =================-->
    <section class="about_area section_gap_bottom" style="padding-top: 50px;">
        <div class="container">
            @foreach($contents as $content)
                @if($content->slug =='about-us')
                    <div class="main_title">

                        <h2>{{$content->title}}</h2>
                        <p>{{$content->short_description}} </p>

                    </div>
                    <div class="row">
                        <div class="single_about row">
                            <div class="col-lg-6 col-md-12 text-center about_left">
                                <div class="about_thumb">
                                    @if(file_exists('storage/'.$content->image) && $content->image != '')
                                        <img src="{{asset('storage/'.$content->image)}}" class="img-fluid" alt="{{$content->title}}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 about_right">
                                <div class="about_content">
                                    {!! $content->description !!}

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <!--================ End About Us Area =================-->


    <!--================Team Area =================-->
    <section class="team_area section_gap">
        <div class="container">
            <div class="main_title">

                @foreach($contents as $content)
                    @if($content->slug =='our-team')
                        <h2>{{$content->title}}</h2>
                        <p>{{ $content->short_description }} </p>
                    @endif
                @endforeach
            </div>
            <div class="row team_inner team">
                <div class="owl-carousel">
                    @foreach($teams as $team)
                        <div class="item">

                            <div class="team_item">
                                <div class="team_img">
                                    @if(file_exists('storage/'.$team->image) && $team->image != '')
                                        <img class="img-fluid" src="{{asset('storage/'.$team->image)}}" alt="{{$team->name}}">

                                    @endif

                                </div>
                                <div class="team_name">
                                    <h4>{{$team->name}}</h4>
                                    <p>{{$team->position}}</p>
                                    <p class="mt-20">
                                        {{str_limit($team->short_description,'90','...')}}
                                    </p>
                                    <div class="social">
                                        @if($team->facebook != '')
                                            <a href="{{$team->faecbook}}"><i class="fa fa-facebook"></i></a>
                                        @endif
                                        @if($team->twitter != '')
                                            <a href="{{$team->twitter}}" class="active"><i class="fa fa-twitter"></i></a>
                                        @endif
                                        @if($team->insta != '')
                                            <a href="{{$team->insta}}"><i class="fa fa-instagram"></i></a>
                                        @endif
                                        @if($team->email != '')
                                            <a href="mailto:{{$team->email}}"><i class="fa fa-envelope-o"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </section>
    <!--================End Team Area =================-->

    <!--================ Start CTA Area =================-->
    <div class="cta-area section_gap overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    @foreach($contents as $content)
                        @if($content->slug =='become-member')
                            <h1>{{$content->title}}</h1>
                            <p>{{ $content->short_description }} </p>
                        @endif
                    @endforeach

                    <a href="member.html" class="primary_btn yellow_btn rounded">join with us</a>
                </div>
            </div>
        </div>
    </div>
    <!--================ End CTA Area =================-->





@endsection
@section('js_scripts')
@endsection
