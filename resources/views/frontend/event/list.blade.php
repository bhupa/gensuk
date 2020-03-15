<aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title">Our Events</h3>
    @foreach($eventLists as $event)
        <div class="media post_item">
            @if(file_exists('storage/'.$event->image) && $event->image != '')
            <img src="{{asset('storage/'.$event->image)}}" style="width:100px;height:60px;" alt="{{$event->title}}">
            @endif
            <div class="media-body">
                <a href="{{route('event.show',[$event->slug])}}"><h3>{{$event->title}}</h3></a>
                <p> {{ Carbon\Carbon::parse($event->created_at)->diffForHumans()}} </p>
            </div>
        </div>
    @endforeach
        <div class="br"></div>
</aside>
