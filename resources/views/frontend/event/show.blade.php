@extends('frontend.app')
@section('title',$event->title)
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
                            <p>{{$event->title}}</p>
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
                        {!! $event->description !!}
                    </div>


                    @if($event->volunters =='1')
                    <div class="comment-form">
                        <h4>Do you want to volunter</h4>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>

                        @endif
                            {{Form::open(['route'=>'volunter.store','novalidate'=>"novalidate"])}}
                        <input type="hidden" name="id" value="{{$event->id}}">
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" name="email" id="address" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  email'" value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="number" class="form-control" name="phone" id="telephone" placeholder="Enter  Telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  Telephone'" value="{{old('phone')}}">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                </div>
                            </div>

                            <!-- Multiple Radios (inline) -->
                            <div class="form-group ">


                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Your current business details:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your current business details:'" required=""></textarea>
                                @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="primary-btn primary_btn">Register</button>
{{--                        </form>--}}
                        {{Form::close()}}
                    </div>

                        @endif
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                       @include('frontend.event.list')
                        @include('frontend.blog.list')

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js_scripts')
@endsection
