@extends('frontend.app')
@section('title','Event Lists')
@section('css_styles')
@endsection
@section('content')
    <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background:linear-gradient(0deg, rgba(6, 13, 1, 0.6), rgba(6, 13, 1, 0.6)), @foreach($contentBanners as $banner)   @if($banner->slug =='event')url('{{asset('storage/'.$banner->image)}}')@endif @endforeach no-repeat scroll center center;"></div>
            <div class="container">
                <div class="banner_content text-center">
                    @foreach($contentBanners as $banner)
                        @if($banner->slug =='event')
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


            {{ $events->links('vendor.pagination.default') }}
        </div>
    </section>


@endsection
@section('js_scripts')
@endsection
