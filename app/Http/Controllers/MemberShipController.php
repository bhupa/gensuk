<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembershipStoreRequest;
use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\EventRepository;
use App\Repositories\MemberShipRepository;
use Illuminate\Http\Request;

class MemberShipController extends Controller
{
    protected $event,$contentBanner,$content,$membership;

    public function __construct(MemberShipRepository $membership,EventRepository $event,ContentBannerRepository $contentBanner,ContentRepository $content)
    {
        $this->event = $event;
        $this->contentBanner = $contentBanner;
        $this->content = $content;
        $this->membership = $membership;
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

        public function store(MembershipStoreRequest $request){
            $data = $request->except('_token');
            if ($this->membership->create($data)) {

                return redirect()->to('/membership')->with('success', 'We will contact you soon membership register successfully');
            }
            return redirect()->back()->with('errors', 'Contact  cannot created SuccessfullyContact ');
        }
}
