<?php

namespace App\Http\Composer\Frontend;

use App\Repositories\AwardRepository;
use App\Repositories\BannerRepository;
use App\Repositories\BlogCategoriesRepository;
use App\Repositories\BlogRepository;
use App\Repositories\CaseStudyRepository;
use App\Repositories\ClientRepository;
use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\CountryRepository;
use App\Repositories\EventRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\IndustriesRepository;
use App\Repositories\LocationRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\SettingRepository;
use App\Repositories\TeamRepository;
use Carbon\Carbon;
use Illuminate\View\View;


class HomeComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected  $content,$contentBanner,$team,$blogs,$blogCategories, $setting, $project,$event,$galleries;

    /**
     * Create a new profile Composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(GalleryRepository $galleries,EventRepository $event,ProjectRepository $project,SettingRepository $setting,BlogRepository $blogs,BlogCategoriesRepository $blogCategories,TeamRepository $team,ContentBannerRepository $contentBanner,ContentRepository $content)
    {
        // Dependencies automatically resolved by service container...
        $this->content = $content;
        $this->contentBanner = $contentBanner;
        $this->blogs = $blogs;
        $this->team = $team;
        $this->setting = $setting;
        $this->blogCategories = $blogCategories;
        $this->project = $project;
        $this->event = $event;
        $this->galleries = $galleries;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $blogCategories = $this->blogCategories->where('is_active','1')->orderBy('name')->take(5)->get();
        $blogLists = $this->blogs->where('is_active','1')->orderBy('created_at', 'desc')->take(5)->get();
        $contents = $this->content->where('is_active','1')->get();
        $teams = $this->team->where('is_active','1')->orderBy('display_orders','asc')->whereYear('date',Carbon::now()->format('Y'))->get();
        $settings = $this->setting->where('is_active','1')->get();
        $contentBanners = $this->contentBanner->where('is_active','1')->get();
        $projects = $this->project->where('is_active','1')->orderBy('created_at','desc')->take(3)->get();
        $events = $this->event->where('is_active','1')->orderBy('created_at','desc')->take(4)->get();
        $galleries = $this->galleries->where('is_active','1')->orderBy('created_at','desc')->take(6)->get();
        $view->withContentBanners( $contentBanners )->withContents($contents)
            ->withSettings($settings)
            ->withTeams($teams)
            ->withBlogLists($blogLists)
            ->withGalleries($galleries)
            ->withBlogCategories($blogCategories)
            ->withEvents($events)
            ->withProjects($projects);
    }
}
