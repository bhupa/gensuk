@extends('frontend.app')
@section('title','Project Lists')
@section('css_styles')
@endsection
@section('content')
    <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background:linear-gradient(0deg, rgba(6, 13, 1, 0.6), rgba(6, 13, 1, 0.6)), @foreach($contentBanners as $banner)   @if($banner->slug =='project')url('{{asset('storage/'.$banner->image)}}')@endif @endforeach no-repeat scroll center center;"></div>
            <div class="container">
                <div class="banner_content text-center">
                    @foreach($contentBanners as $banner)
                        @if($banner->slug =='project')
                            <h2>{{$banner->title}}</h2>
                            <p class="banner-description">{{str_limit($banner->short_description,'200','....')}}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="event_area section_gap_custom" style="margin-top: 30px;">
        <div class="container">
            <div class="main_title">
                @foreach($contents as $content)
                    @if($content->slug =='our-project')
                        <h2>{{$content->title}}</h2>
                        <p>{{ $content->short_description }} </p>
                    @endif
                @endforeach
            </div>

            <div class="row">
                @foreach( $projects as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="single_causes">
                            <a href="{{route('project.show',[$event->slug])}}" >
                            <h4>{{$event->title}}</h4>
                            @if(file_exists('storage/'.$event->image) && $event->image != '')
                                                                        <img class="img-fluid w-100" src="{{asset('storage/'.$event->image)}}" alt="{{$event->title}}">
                                                                        <div class="img-overlay"></div>
                                                                    @endif
                            <p style="color: #000;text-align: justify">
                                {!! str_limit($event->short_description,'150','.....') !!}
                            </p>
                            </a>
                        </div>
                    </div>
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="single_event">--}}
{{--                            <div class="row align-items-center">--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <figure>--}}
{{--                                        @if(file_exists('storage/'.$event->image) && $event->image != '')--}}
{{--                                            <img class="img-fluid w-100" src="{{asset('storage/'.$event->image)}}" alt="{{$event->title}}">--}}
{{--                                            <div class="img-overlay"></div>--}}
{{--                                        @endif--}}

{{--                                    </figure>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="content_wrapper">--}}
{{--                                        <h3 class="title">--}}
{{--                                            <a href="{{route('event.show',[$event->slug])}}">{{$event->title}}</a>--}}
{{--                                        </h3>--}}
{{--                                        <p>--}}
{{--                                            {!! str_limit($event->short_description,'150','.....') !!}--}}
{{--                                        </p>--}}

{{--                                        <a href="{{route('project.show',[$event->slug])}}" class="primary_btn">View More</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                @endforeach
            </div>


            {{ $projects->links('vendor.pagination.default') }}
        </div>
    </section>


@endsection
@section('js_scripts')
@endsection
