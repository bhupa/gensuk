@extends('frontend.app')
@section('title',$member->title)
@section('css_styles')
@endsection
@section('content')
    <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background:linear-gradient(0deg, rgba(6, 13, 1, 0.6), rgba(6, 13, 1, 0.6)), @foreach($contentBanners as $banner)   @if($banner->slug =='membership')url('{{asset('storage/'.$banner->image)}}')@endif @endforeach no-repeat scroll center center;"></div>
            <div class="container">
                <div class="banner_content text-center">
                    @foreach($contentBanners as $banner)
                        @if($banner->slug =='membership')
                            <h2>{{$banner->title}}</h2>
                            <p class="banner-description">{{str_limit($banner->short_description,'200','....')}}</p>

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
                        {!! $member->description !!}
                    </div>



                    <div class="comment-form">
                        <h4>Become a Member</h4>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>

                        @endif
                        {{Form::open(['route'=>'membership.store','novalidate'=>"novalidate"])}}

                        <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  address'">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="number" class="form-control" name="mobile" id="Moblie" placeholder="Enter Moblie" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Moblie'">
                                    @if ($errors->has('mobile'))
                                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="number" class="form-control" id="telephone" name="telephone" placeholder="Enter  Telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  Telephone'">
                                    @if ($errors->has('telephone'))
                                        <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="email" class="form-control"  name="email" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email'">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="text" class="form-control" name="postal_code" id="Postal Code" placeholder="Enter  Postal Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  Postal Code'">
                                    @if ($errors->has('postal_code'))
                                        <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Multiple Radios (inline) -->
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <select name="gender" id="" class="form-control">
                                        <option value="0">Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select><br>
                                    @if ($errors->has('gender'))
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <select name="fee" id="" class="form-control">
                                        <option value="0">Fee Paid</option>
                                        <option value="£10">£10</option>
                                        <option value="£20">£20</option>
                                    </select><br>
                                    @if ($errors->has('fee'))
                                        <span class="text-danger">{{ $errors->first('fee') }}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <select name="membership" id="" class="form-control">
                                        <option value="0">Membership Type</option>
                                        <option value="Life Member">Life Member</option>
                                        <option value="Affiliate Member">Affiliate Member</option>
                                    </select>

                                    @if ($errors->has('membership'))
                                        <span class="text-danger">{{ $errors->first('membership') }}</span>
                                    @endif

                                </div>
                                <div class="form-group col-lg-6 col-md-6 name">
                                <input type="date" placeholder="Date of Birth" name="dob" class="textbox-n form-control" type="text" onfocus="(this.type='date')" id="date">

                                @if ($errors->has('dob'))
                                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group ">


                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Tell some thig about your self:" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tell some thig about your self:'" required=""></textarea>

                                @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="primary-btn primary_btn">Register</button>

                       {{Form::close()}}
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
