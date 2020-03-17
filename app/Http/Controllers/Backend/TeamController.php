<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\Backend\Team\TeamStoreRequest;
use App\Http\Requests\Backend\Team\TeamUpdateRequest;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class TeamController extends Controller
{
    protected $team;

    public function __construct(TeamRepository $team)
    {
        $this->team = $team;
        $this->upload_path = DIRECTORY_SEPARATOR.'team'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {

        $teams = $this->team->orderBy('date','desc')->orderBy('display_orders','desc')->paginate('1000');

        return view('backend.team.index')->withteams($teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamStoreRequest $request)
    {
        $data = $request->except('_token','image');
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'team/'.$fileName;

        }

        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;
//        $data['created_at'] = '2018';

        if($this->team->create($data)){


            return redirect()->to('/teams')->with('success','Team added successfully');
        }
        return redirect()->back()->with('errors','Team cannot added Successfully');
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
    public function edit($slug)
    {

        $teams = $this->team->where('slug', $slug)->first();
        return view('backend.team.edit')->withTeams($teams );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamUpdateRequest $request, $id)
    {

        $team = $this->team->find($id);
        $data = $request->except('_token','image');
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'team/'.$fileName;

        }

        $data['created_by'] = Auth::user()->id;
        if($this->team->update( $team->id,$data)){


            return redirect()->to('/teams')->with('success','Team updated successfully');
        }
        return redirect()->back()->with('errors','Team cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = $this->team->find($id);

        if($this->team->destroy($team->id)){

            $message = 'Team delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'Team cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $team = $this->team->find($request->get('id'));
        if ($team->is_active == 0) {
            $status = '1';
            $message = 'Team with name "' . $team->name . '" is published.';
        } else {
            $status = '0';
            $message = 'Team with name "' . $team->name . '" is unpublished.';
        }

        $this->team->changeStatus($team->id, $status);
        $this->team->update($team->id, array('is_active' => $status));
        $updated = $this->team->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'team' => $updated], 200);
    }

    public function sort(Request $request){


        $exploded = explode('&', str_replace('item[]=', '', $request->order));

        for ($i=0; $i < count($exploded) ; $i++) {
            $this->team->update($exploded[$i], ['display_orders' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
