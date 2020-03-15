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
                    <p class="mt-20">
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
