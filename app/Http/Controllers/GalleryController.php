<?php

namespace App\Http\Controllers;

use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\EventRepository;
use App\Repositories\GalleryRepository;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected $event,$contentBanner,$content;

    public function __construct(GalleryRepository $gallery,ContentBannerRepository $contentBanner,ContentRepository $content)
    {
        $this->gallery = $gallery;
        $this->contentBanner = $contentBanner;
        $this->content = $content;
    }
    public function index()
    {

        $gallerys = $this->gallery->where('is_active','1')->orderBy('created_at','desc')->paginate('6');
        $contentBanners = $this->contentBanner->where('is_active','1')->get();
        $contents = $this->content->where('is_active','1')->get();
        return view('frontend.gallery.index')->withgallerys($gallerys)->withContentBanners($contentBanners)->withContents($contents);
    }

    public function show($slug){
        $gallery = $this->gallery->where('slug',$slug)->first();
        $contentBanners = $this->contentBanner->where('is_active','1')->get();
        $contents = $this->content->where('is_active','1')->get();
        return view('frontend.gallery.show')->withGallery($gallery)->withContentBanners($contentBanners)->withContents($contents);
    }
}
