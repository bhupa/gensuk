<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\EventRepository;
use App\Repositories\LifeMembersRepository;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class TeamController extends Controller
{
    protected $team,$contentBanner,$content,$member;

    public function __construct(TeamRepository $team,ContentBannerRepository $contentBanner,ContentRepository $content,LifeMembersRepository $member)
    {
        $this->team = $team;
        $this->contentBanner = $contentBanner;
        $this->content = $content;
        $this->member = $member;
    }
    public function index()
    {
        $year = Carbon::now()->format('Y');
        $teams = $this->team->orderBy('display_orders','asc')->whereYear('date',$year)->get();
        $members = $this->member->where('is_active','1')->orderBy('display_orders','asc')->get();

//        $teamList = Team::whereYear('date', '=', $year)->get();
        $usersUnique = Team::where('is_active','1')->select(DB::raw('count(id) as `data`'), DB::raw("DATE_FORMAT(date, '%Y') new_date"),  DB::raw('YEAR(date) year, MONTH(date) year'))
        ->groupby('date','year')
            ->orderBy('date','desc')
        ->get();


        $teamList = $usersUnique->unique('new_date');

//        $teamList = $this->team->where('is_active','1')->orderBy('date','desc')->get()->groupBy(function($val) {
//            return Carbon::parse($val->date)->format('Y');
//        });


        $contentBanners = $this->contentBanner->where('is_active','1')->get();
        $contents = $this->content->where('is_active','1')->get();
        return view('frontend.team.index')->withMembers($members)->withTeamList($teamList)->withTeams($teams)->withContentBanners($contentBanners)->withContents($contents);
    }

    public  function list(Request $request){
        $teams = $this->team->orderBy('display_orders','asc')->whereYear('date', '=', $request->date)->get();

        return view('frontend.team.lists')->withTeams($teams);
    }
}
