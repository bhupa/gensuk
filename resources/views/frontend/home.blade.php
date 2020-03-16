@extends('frontend.app')
@section('title','Home')
@section('css_styles')
@endsection
@section('content')
    <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" id="paralax-image-banner" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background:linear-gradient(0deg, rgba(6, 13, 1, 0.6), rgba(6, 13, 1, 0.6)), @foreach($contentBanners as $banner)   @if($banner->slug =='home')url('{{asset('storage/'.$banner->image)}}')@endif @endforeach no-repeat scroll center center;"></div>
            <div class="container">
                <div class="banner_content text-center">
                    @foreach($contentBanners as $banner)
                        @if($banner->slug =='home')
                    <h2>{{$banner->title}}</h2>
                    <p class="banner-description">{{str_limit($banner->short_description,'130','....')}}</p>
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

    <!--================ Start Features Cause section =================-->
    <section class="features_causes">
        <div class="container">
            <div class="main_title">
                @foreach($contents as $content)
                    @if($content->slug =='our-project')
                <h2>{{$content->title}}</h2>
                <p>{{ $content->short_description }}</p>
                    @endif
                    @endforeach
            </div>

            <div class="row">
                @foreach($projects as $project)
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <figure>
                                @if(file_exists('storage/'.$project->image) && $project->image != '')
                                <img class="card-img-top img-fluid" src="{{asset('storage/'.$project->image)}}" alt="{{$project->title}}">
                                    @endif
                            </figure>
                            <div class="card_inner_body">
                                <h4 class="card-title">{{$project->title}}</h4>
                                <p class="card-text">
                                    {{ str_limit($project->short_description,'150','.....')}}
                                </p>
                                <div class="d-flex justify-content-between raised_goal">
                                    <p>can other invest: @if($project->investors =='1') Yes  @else No @endif</p>
                                </div>
                                <div class="d-flex justify-content-between donation align-items-center">
                                    <a href="#" class="primary_btn">View More</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--================ End Features Cause section =================-->

    <!--================ Start Recent Event Area =================-->
    <section class="event_area section_gap_custom">
        <div class="container">
            <div class="main_title">
                @foreach($contents as $content)
                    @if($content->slug =='events')
                <h2>{{$content->title}}</h2>
                <p>{{ $content->short_description }} </p>
                    @endif
                    @endforeach
            </div>

            <div class="row">
                @foreach( $events as $event)
                <div class="col-lg-6">
                    <div class="single_event">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <figure>
                                    @if(file_exists('storage/'.$event->image) && $event->image != '')
                                        <img class="img-fluid w-100" src="{{asset('storage/'.$event->image)}}" alt="{{$event->title}}">
                                        <div class="img-overlay"></div>
                                    @endif

                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="content_wrapper">
                                    <h3 class="title">
                                        <a href="{{route('event.show',[$event->slug])}}">{{$event->title}}</a>
                                    </h3>
                                    <p>
                                        {!! str_limit($event->short_description,'150','.....') !!}
                                    </p>
                                    <div class="d-flex count_time" id="clockdiv">
                                        @if(time()-(60*60*24) < strtotime($event->date) )
                                        @php $seconds = strtotime("$event->date") - time();@endphp

                                        @php $days = floor($seconds / 86400);@endphp
                                        @php $seconds %= 86400;@endphp
                                        @php $hours = floor($seconds / 3600);@endphp
                                        @php $seconds %= 3600;@endphp

                                        @php $minutes = floor($seconds / 60);@endphp
                                        @php $seconds %= 60;@endphp

                                        <div class="mr-25">
                                            <h4 class="days">{{$days}}</h4>
                                            <p>Days</p>
                                        </div>
                                        <div class="mr-25">
                                            <h4 class="hours">{{$hours}}</h4>
                                            <p>Hours</p>
                                        </div>
                                        <div class="mr-25">
                                            <h4 class="minutes">{{$minutes}}</h4>
                                            <p>Minutes</p>
                                        </div>
                                        <div>
                                            <h4 class="seconds">{{$seconds}}</h4>
                                            <p>Seconds</p>
                                        </div>
                                            @else

                                            <p>Completed At {{date('d-M-Y', strtotime($event->date))}}</p>
                                        @endif
                                    </div>
                                    <a href="{{route('event.show',[$event->slug])}}" class="primary_btn">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>
    <!--================ End Recent Event Area =================-->

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

    <!--================ Start Story Area =================-->
    <section class="section_gap story_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="main_title">
                        @foreach($contents as $content)
                            @if($content->slug =='our-gallery')
                                <h2>{{$content->title}}</h2>
                                <p>{{ $content->short_description }} </p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="container">
                @foreach($galleries->chunk(3) as $gallery)

                 <div class="row">
                     @foreach($gallery as $item)
                    <a href="{{route('gallery.show',[$item->slug])}}"  class="col-md-4 gallery-image">
                        @if(file_exists('storage/'.$item->image) && $item->image != '')
                        <img src="{{asset('storage/'.$item->image)}}" class="img-fluid rounded" alt="{{$item->title}}">
                        @endif
                        <div class="overlay">
                            <div class="text">{{$item->title}}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!--================ End Story Area =================-->

    <!--================ Start Subscribe Area =================-->



@endsection
@section('js_scripts')
@endsection
