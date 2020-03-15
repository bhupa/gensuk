@extends('frontend.app')
@section('title',$gallery->title)
@section('css_styles')
@endsection
@section('content')
    <!--================ Home Banner Area =================-->



    <div class="whole-wrap" style="margin-top: 100px;">
        <div class="container">
            <div class="section-top-border">
                <div class="section-top-border">
                    <h3 class="title_color">Image Gallery </h3>
                    <h3 style="text-align: center">{{$gallery->title}}</h3>
                    @foreach($gallery->images->chunk(3) as $gallery)
                    <div class="row">
                        @foreach($gallery as $item)
                        <a href="{{asset('storage/'.$item->image)}}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4 gallery-image">
                            <img src="{{asset('storage/'.$item->image)}}" class="img-fluid rounded">

                        </a>
                            @endforeach
                    </div>
                        @endforeach


                </div>
            </div>
        </div>



@endsection
@section('js_scripts')
@endsection
