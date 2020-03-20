@extends('frontend.app')
@section('title','Blog Lists')
@section('css_styles')
@endsection
@section('content')
    <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background:linear-gradient(0deg, rgba(6, 13, 1, 0.6), rgba(6, 13, 1, 0.6)), @foreach($contentBanners as $banner)   @if($banner->slug =='blog')url('{{asset('storage/'.$banner->image)}}')@endif @endforeach no-repeat scroll center center;"></div>
            <div class="container">
                <div class="banner_content text-center">
                    @foreach($contentBanners as $banner)
                        @if($banner->slug =='blog')
                            <h2>{{$banner->title}}</h2>
                            <p>{{str_limit($banner->short_description,'130','....')}}</p>

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
                    @if($content->slug =='blog')
                        <h2>{{$content->title}}</h2>
                        <p>{{ $content->short_description }} </p>
                    @endif
                @endforeach
            </div>

            <div class="row">
                @foreach( $blogs as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="card" style="margin-bottom:30px;">
                            <div class="card-body">
                                <figure>
                                    @if(file_exists('storage/'.$event->image) && $event->image != '')
                                         <img class="card-img-top img-fluid" style="height: 250px;" src="{{asset('storage/'.$event->image)}}" alt="{{$event->title}}">
                                    @endif
                                </figure>
                                     <div class="card_inner_body">
                                                <h4 class="card-title">{{$event->title}}</h4>
                                                <p class="card-text">
                                                    {!! str_limit($event->short_description,'150','.....') !!}
                                                </p>

                                                <div class="d-flex justify-content-between donation align-items-center">
                                                    <a href="{{route('blog.show',[$event->slug])}}" class="primary_btn">More Details</a>
                                                </div>
                                     </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <div style="display: block; margin-top: 50px;"></div>
            {{ $blogs->links('vendor.pagination.default') }}
        </div>


    </section>


@endsection
@section('js_scripts')
@endsection
