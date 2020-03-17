@extends('frontend.app')
@section('title','Team Lists')
@section('css_styles')
@endsection
@section('content')
    <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background:linear-gradient(0deg, rgba(6, 13, 1, 0.6), rgba(6, 13, 1, 0.6)), @foreach($contentBanners as $banner)   @if($banner->slug =='team')url('{{asset('storage/'.$banner->image)}}')@endif @endforeach no-repeat scroll center center;"></div>
            <div class="container">
                <div class="banner_content text-center">
                    @foreach($contentBanners as $banner)
                        @if($banner->slug =='team')
                            <h2>{{$banner->title}}</h2>
                            <p class="banner-description">{{str_limit($banner->short_description,'200','....')}}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="team_area section_gap">
        <div class="container">
            <div class="main_title">
                @foreach($contents as $content)
                    @if($content->slug =='our-team')
                        <h2>{{$content->title}}</h2>
                        <p>{{ $content->short_description }} </p>
                    @endif
                @endforeach
                <form action="#"  id="team-select-btn">

                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                        <div class="form-select" id="default-select">
                            <select style="display: none;">
                                @foreach($teamList as $team)
{{--                                   @php  $date = DateTime::createFromFormat("Y-m-d", $team->date) @endphp--}}

                                <option value="{{$team->new_date}}" @if($team->new_date == date('Y')) selected="selected" @endif>{{$team->new_date}} &nbsp; Executive Committee</option>
                                @endforeach
                            </select>
                            <div class="nice-select" tabindex="0" style="background-color: white !important; border: 1px solid #cccccc;  margin:0 auto;">
                                <span class="current">Select Executive Committee</span>
                                <ul class="list">
                                    @foreach($teamList as $team)
{{--                                        @php  $date = DateTime::createFromFormat("Y-m-d", $team->date) @endphp--}}
                                    <li data-value="{{$team->new_date}}" class="option  @if($team->new_date == date('Y')) selected @endif">{{$team->new_date}} &nbsp;Executive Committee</li>
                                   @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="teamlist">
                <div class="row">

                    @foreach($teams as $team)

                        <div class="col-lg-3 com-md-3">
                            <div class="team_item">
                                <div class="team_img">

                                    @if(file_exists('storage/'.$team->image) && $team->image != '')
                                        <img class="img-fluid" src="{{asset('storage/'.$team->image)}}" alt="{{$team->name}}">

                                    @endif

                                </div>
                                <div class="team_name">
                                    <h4>{{$team->name}}</h4>
                                    <p>{{$team->position}}</p>
                                    <p class="mt-20 team-details-description">
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
    <section class="team_area section_gap">
        <div class="container">
            <div class="main_title">

                @foreach($contents as $content)
                    @if($content->slug =='life-member')
                        <h2>{{$content->title}}</h2>
                        <p>{{ $content->short_description }} </p>
                    @endif
                @endforeach
            </div>
            <div class="row team_inner team">
                <div class="owl-carousel">
                    @foreach($members as $member)
                        <div class="item">

                            <div class="team_item">
                                <div class="team_img">
                                    @if(file_exists('storage/'.$member->team['image']) && $member->team['image'] != '')
                                        <img class="img-fluid" src="{{asset('storage/'.$member->team['image'])}}" alt="{{$member->team['name']}}">

                                    @endif

                                </div>
                                <div class="team_name">
                                    <h4>{{$member->team['name']}}</h4>
                                    <p>{{$member->team['position']}}</p>

                                    <div class="social member-ship-social">
                                        @if($member->team['facebook'] != '')
                                            <a href="{{$member->team['faecbook']}}"><i class="fa fa-facebook"></i></a>
                                        @endif
                                        @if($member->team['twitter'] != '')
                                            <a href="{{$member->team['twitter']}}" class="active"><i class="fa fa-twitter"></i></a>
                                        @endif
                                        @if($member->team['insta'] != '')
                                            <a href="{{$member->team['insta']}}"><i class="fa fa-instagram"></i></a>
                                        @endif
                                        @if($member->team['email'] != '')
                                            <a href="mailto:{{$member->team['email']}}"><i class="fa fa-envelope-o"></i></a>
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


@endsection
@section('js_script')
    <script >
        $(document).ready(function(){
            $('.list li').on('click',function(){
                var date = $(this).attr('data-value');
                $("#overlay-load").fadeIn(300);
                $.ajax({
                    type: "POST",
                    url: "{{ route('team.list') }}",
                    data: {
                        'date': date,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'html',
                    success: function (teams) {
                        setTimeout(function(){
                            $("#overlay-load").fadeOut(300);
                            $('.teamlist').html(teams)
                        },500);


                    },
                    error: function (e) {
                        if (e.responseJSON.message) {
                            swal('Error', e.responseJSON.message, 'error');
                        } else {
                            swal('Error', 'Something went wrong while processing your request.', 'error')
                        }
                    }
                });

            })
        });
    </script>
@endsection
