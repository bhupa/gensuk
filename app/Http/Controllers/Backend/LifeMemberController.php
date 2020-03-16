<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\LifeMember\LifeMemberStoreRequest;
use App\Http\Requests\Backend\member\memberStoreRequest;
use App\Http\Requests\Backend\member\memberUpdateRequest;
use App\Repositories\LifeMembersRepository;
use App\Repositories\memberRepository;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LifeMemberController extends Controller
{
    protected $member,$teams;

    public function __construct(LifeMembersRepository $member,TeamRepository $teams)
    {
        $this->member = $member;
        $this->teams = $teams;
        $this->upload_path = DIRECTORY_SEPARATOR.'member'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {

        $members = $this->member->orderBy('created_at','desc')->paginate('20');

        return view('backend.member.index')->withmembers($members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teamList= $this->teams->get()->sortBy('name');
        $teams = $teamList->unique('name');

        return view('backend.member.create')->withTeams($teams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LifeMemberStoreRequest $request)
    {

        $data = $request->except('_token');


        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;


        if($this->member->create($data)){


            return redirect()->to('/life-members')->with('success','member added successfully');
        }
        return redirect()->back()->with('errors','member cannot added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $members = $this->member->find($id);
        $teams = $this->teams->get()->sortBy('name');
        return view('backend.member.edit')->withmembers($members )->withTeams($teams);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LifeMemberStoreRequest $request, $id)
    {

        $member = $this->member->find($id);
        $data = $request->except('_token');


        if($this->member->update( $member->id,$data)){


            return redirect()->to('/life-members')->with('success','member updated successfully');
        }
        return redirect()->back()->with('errors','member cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = $this->member->find($id);

        if($this->member->destroy($member->id)){

            $message = 'member delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'member cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $member = $this->member->find($request->get('id'));
        if ($member->is_active == 0) {
            $status = '1';
            $message = 'member with name "' . $member->title . '" is published.';
        } else {
            $status = '0';
            $message = 'member with name "' . $member->title . '" is unpublished.';
        }

        $this->member->changeStatus($member->id, $status);
        $this->member->update($member->id, array('is_active' => $status));
        $updated = $this->member->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'member' => $updated], 200);
    }
    public function volunters(Request $request)
    {
        $member = $this->member->find($request->get('id'));
        if ($member->volunters == 0) {
            $status = '1';
            $message = 'Volunters is needed for the "' . $member->title . '" .';
        } else {
            $status = '0';
            $message = 'Volunters is not needed for the "' . $member->name . '".';
        }

        $this->member->changeStatus($member->id, $status);
        $this->member->update($member->id, array('volunters' => $status));
        $updated = $this->member->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'member' => $updated], 200);
    }
    public function sort(Request $request){


        $exploded = explode('&', str_replace('item[]=', '', $request->order));

        for ($i=0; $i < count($exploded) ; $i++) {
            $this->member->update($exploded[$i], ['display_orders' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
