<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Project\ProjectStoreRequest;
use App\Http\Requests\Backend\Project\ProjectUpdateRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProjectController extends Controller
{
    protected $project;

    public function __construct(ProjectRepository $project)
    {
        $this->project = $project;
        $this->upload_path = DIRECTORY_SEPARATOR.'project'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {

        $projects = $this->project->orderBy('created_at','desc')->paginate('20');

        return view('backend.project.view')->withprojects($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {

        $data = $request->except('_token','image');
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'project/'.$fileName;

        }

        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['investors'] =(isset($request['investors'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;

        if($this->project->create($data)){


            return redirect()->to('/projects')->with('success','project added successfully');
        }
        return redirect()->back()->with('errors','project cannot added Successfully');
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

        $projects = $this->project->where('slug', $slug)->first();
        return view('backend.project.edit')->withprojects($projects );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdateRequest $request, $id)
    {


        $project = $this->project->find($id);
        $data = $request->except('_token','image');
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'project/'.$fileName;

        }

        $data['created_by'] = Auth::user()->id;
        if($this->project->update( $project->id,$data)){


            return redirect()->to('/projects')->with('success','project updated successfully');
        }
        return redirect()->back()->with('errors','project cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = $this->project->find($id);

        if($this->project->destroy($project->id)){

            $message = 'project delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'project cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $project = $this->project->find($request->get('id'));
        if ($project->is_active == 0) {
            $status = '1';
            $message = 'project with name "' . $project->name . '" is published.';
        } else {
            $status = '0';
            $message = 'project with name "' . $project->name . '" is unpublished.';
        }

        $this->project->changeStatus($project->id, $status);
        $this->project->update($project->id, array('is_active' => $status));
        $updated = $this->project->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'project' => $updated], 200);
    }
    public function investors(Request $request)
    {
        $project = $this->project->find($request->get('id'));
        if ($project->investors == 0) {
            $status = '1';
            $message = 'project with name "' . $project->name . '" is published.';
        } else {
            $status = '0';
            $message = 'project with name "' . $project->name . '" is unpublished.';
        }

        $this->project->changeStatus($project->id, $status);
        $this->project->update($project->id, array('investors' => $status));
        $updated = $this->project->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'project' => $updated], 200);
    }


}
