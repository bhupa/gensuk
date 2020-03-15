<?php

namespace App\Http\Controllers;

use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;

class MemberShipController extends Controller
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

        $contentBanners = $this->contentBanner->where('is_active','1')->get();
        $contents = $this->content->where('is_active','1')->get();
        $member = $this->content->where('slug','membership')->first();
        return view('frontend.membership.index')->withMember($member)->withContentBanners($contentBanners)->withContents($contents);
    }

//    public function show($slug){
//        $event = $this->event->where('slug',$slug)->first();
//        $contentBanners = $this->contentBanner->where('is_active','1')->get();
//        $contents = $this->content->where('is_active','1')->get();
//        return view('frontend.event.show')->withevent($event)->withContentBanners($contentBanners)->withContents($contents);
//    }
}
