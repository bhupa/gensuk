<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $event,$contentBanner,$content;

    public function __construct(BlogRepository $blog,ContentBannerRepository $contentBanner,ContentRepository $content)
    {
        $this->blog = $blog;
        $this->contentBanner = $contentBanner;
        $this->content = $content;
    }
    public function index()
    {

        $blogs = $this->blog->orderBy('created_at','desc')->paginate('6');
        $contentBanners = $this->contentBanner->where('is_active','1')->get();
        $contents = $this->content->where('is_active','1')->get();
        return view('frontend.blog.index')->withblogs($blogs)->withContentBanners($contentBanners)->withContents($contents);
    }

    public function show($slug){
        $blog = $this->blog->where('slug',$slug)->first();
        $contentBanners = $this->contentBanner->where('is_active','1')->get();
        $contents = $this->content->where('is_active','1')->get();
        return view('frontend.blog.show')->withblog($blog)->withContentBanners($contentBanners)->withContents($contents);
    }
}
