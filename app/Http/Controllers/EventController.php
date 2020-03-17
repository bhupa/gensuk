<?php

namespace App\Http\Controllers;

use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $event,$contentBanner,$content;

    public function __construct(EventRepository $event,ContentBannerRepository $contentBanner,ContentRepository $content)
    {
        $this->event = $event;
        $this->contentBanner = $contentBanner;
        $this->content = $content;
    }
    public function index()
    {

        $events = $this->event->where('is_active','1')->orderBy('created_at','desc')->paginate('6');
        $contentBanners = $this->contentBanner->where('is_active','1')->get();
        $contents = $this->content->where('is_active','1')->get();
        return view('frontend.event.index')->withEvents($events)->withContentBanners($contentBanners)->withContents($contents);
    }

    public function show($slug){
        $event = $this->event->where('slug',$slug)->first();
        $contentBanners = $this->contentBanner->where('is_active','1')->get();
        $contents = $this->content->where('is_active','1')->get();
        return view('frontend.event.show')->withEvent($event)->withContentBanners($contentBanners)->withContents($contents);
    }

}
