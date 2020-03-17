<?php

namespace App\Http\Controllers;

use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\EventRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $project,$contentBanner,$content;

    public function __construct(ProjectRepository $project,ContentBannerRepository $contentBanner,ContentRepository $content)
    {
        $this->project = $project;
        $this->contentBanner = $contentBanner;
        $this->content = $content;
    }
    public function index()
    {

        $projects = $this->project->where('is_active','1')->orderBy('created_at','desc')->paginate('6');
        $contentBanners = $this->contentBanner->where('is_active','1')->get();
        $contents = $this->content->where('is_active','1')->get();
        return view('frontend.project.index')->withProjects($projects)->withContentBanners($contentBanners)->withContents($contents);
    }

    public function show($slug){
        $project = $this->project->where('slug',$slug)->first();
        $contentBanners = $this->contentBanner->where('is_active','1')->get();
        $contents = $this->content->where('is_active','1')->get();
        return view('frontend.project.show')->withProject($project)->withContentBanners($contentBanners)->withContents($contents);
    }
}
