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



                    <div class="comment-form">
                        <h4>Become a Member</h4>
                        <form>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="text" class="form-control" id="address" placeholder="Enter e address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  address'">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="number" class="form-control" id="Moblie" placeholder="Enter Moblie" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Moblie'">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="number" class="form-control" id="telephone" placeholder="Enter  Telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  Telephone'">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="number" class="form-control" id="Address" placeholder="Enter Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="number" class="form-control" id="Postal Code" placeholder="Enter  Postal Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  Postal Code'">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="number" class="form-control" id="Email Address" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address'">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="number" class="form-control" id="Postal Code" placeholder="Enter  Postal Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  Postal Code'">
                                </div>
                            </div>
                            <!-- Multiple Radios (inline) -->
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <label class=" control-label" for="radios" style="margin-bottom: -27px;">Gender</label>
                                    <div class="col-md-12 " >
                                        <label class="radio-inline" for="radios-0" style="margin-left: -10px; display: inline;">
                                            <input type="radio" id="radios-0" name="gender" checked value="Male" /> Male:
                                        </label>
                                        <label class="radio-inline" for="radios-0" style="margin-left: 10px; display: inline;"></label>
                                        <input type="radio" id="radios-1" name="gender" value="Female" /> Female
                                        </label>

                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <label class=" control-label" for="radios" style="margin-bottom: -27px;">Fee Paid::</label>
                                    <div class="col-md-12 " >
                                        <label class="radio-inline" for="radios-0" style="margin-left: -10px; display: inline;">£10
                                            <input type="radio" id="radios-0" name="gender" checked value="Male" />
                                        </label>
                                        <label class="radio-inline" for="radios-0" style="margin-left: 10px; display: inline;">£20  </label>
                                        <input type="radio" id="radios-1" name="gender" value="Female" />
                                        </label>
                                    </div>

                                </div>

                                <div class="form-group form-inline">

                                    <label class=" control-label" for="radios" style="margin-bottom: 15px;margin-top: 20px;margin-right:20px;">Membership :</label>
                                    <label class="radio-inline"></label>
                                    <label class="radio-inline" for="radios-0" style="margin-left: -10px; display: inline;">
                                        <input type="radio" id="radios-0" name="gender" checked value="Male" /> Life Member:
                                    </label>
                                    <label class="radio-inline" for="radios-0" style="margin-left: 10px; display: inline;"></label>
                                    <input type="radio" id="radios-1" name="gender" value="Female" /> Affiliate Member
                                    </label>


                                </div>




                            </div>
                            <div class="form-group ">

                                <input placeholder="Date of Birth" class="textbox-n form-control" type="text" onfocus="(this.type='date')" id="date">

                            </div>
                            <div class="form-group ">


                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Your current business details:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your current business details:'" required=""></textarea>

                            </div>

                            <button type="submit" class="primary-btn primary_btn">Register</button>
                        </form>
                    </div>
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
