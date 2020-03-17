@extends('frontend.app')
@section('title',$blog->title)
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
                            <p>{{str_limit($blog->title,'130','....')}}</p>

                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        {!! $blog->description !!}
                    </div>




                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        @include('frontend.blog.list')
                        @include('frontend.event.list')


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js_scripts')
@endsection
