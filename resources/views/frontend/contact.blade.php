@extends('frontend.app')
@section('title','Contact Us')
@section('css_styles')
@endsection
@section('content')
    <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background:linear-gradient(0deg, rgba(6, 13, 1, 0.6), rgba(6, 13, 1, 0.6)), @foreach($contentBanners as $banner)   @if($banner->slug =='contact-us')url('{{asset('storage/'.$banner->image)}}')@endif @endforeach no-repeat scroll center center;"></div>
            <div class="container">
                <div class="banner_content text-center">
                    @foreach($contentBanners as $banner)
                        @if($banner->slug =='contact-us')
                            <h2>{{$banner->title}}</h2>
                            <p>{{$banner->title}}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section class="contact_area section_gap">
        <div class="container">
            <div id="mapBox" class="mapBox"
                 data-lat="40.701083"
                 data-lon="-74.1522848"
                 data-zoom="13"
                 data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
                 data-mlat="40.701083"
                 data-mlon="-74.1522848">
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        @foreach($settings as $setting)
                            @if($setting->slug == 'address')
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>{{$setting->value}}</h6>

                        </div>
                            @endif
                                @if($setting->slug == 'phone')
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6>{{$setting->value}}</h6>
                        </div>
                                @endif
                                @if($setting->slug == 'email')
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6>{{$setting->value}}</h6>
                        </div>
                                @endif
                            @endforeach
                    </div>
                </div>
                <div class="col-lg-9">
                    {{Form::open(['route'=>'contact-us.store','class'=>"row contact_form",'id'=>'contactForm','novalidate'=>"novalidate"])}}
{{--                    <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">--}}
                        <div class="col-md-6">

                                @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{!! \Session::get('success') !!}</li>
                                        </ul>
                                    </div>

                                @endif
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Full Name" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="{{old('email')}}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="phone" placeholder="Enter Phone" value="{{old('phone')}}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" value="{{old('message')}}"></textarea>
                                @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn primary_btn">Send Message</button>
                        </div>
{{--                    </form>--}}
                    {{ Form::close() }}
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
@section('js_scripts')
@endsection
