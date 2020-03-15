<?php

namespace App\Http\Controllers;

use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\EventRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $event,$contentBanner,$content,$setting;

    public function __construct(EventRepository $event,ContentBannerRepository $contentBanner,ContentRepository $content,SettingRepository $setting)
    {
        $this->event = $event;
        $this->contentBanner = $contentBanner;
        $this->content = $content;
        $this->setting = $setting;
    }
    public function index()
    {

        $contentBanners = $this->contentBanner->where('is_active','1')->get();
        $contents = $this->content->where('is_active','1')->get();
        $member = $this->content->where('slug','membership')->first();
        $settings = $this->setting->where('is_active','1')->get();
        return view('frontend.contact')->withSettings($settings)->withMember($member)->withContentBanners($contentBanners)->withContents($contents);
    }
}
