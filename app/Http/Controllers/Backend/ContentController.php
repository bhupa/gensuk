<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Content\ContentStoreRequest;
use App\Http\Requests\Backend\Content\ContentUpdateRequest;
use App\Repositories\ContentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $content;

    public function __construct(ContentRepository $content)
    {
            $this->content = $content;
            $this->upload_path = DIRECTORY_SEPARATOR.'content'.DIRECTORY_SEPARATOR;
            $this->storage = Storage::disk('public');

    }
    public function index()
    {
        $contents = $this->content->orderBy('created_at','desc')->paginate('20');
        return view('backend.content.view')->withcontents($contents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentStoreRequest $request)
    {
        $data = $request->except('_token','image');

        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'content/'.$fileName;

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] =Auth::user()->id;

        if($this->content->create($data)){


            return redirect()->to('/contents')->with('success','Content created successfully');
        }
        return redirect()->back()->with('errors','Content cannot created Successfully');
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
        $content = $this->content->where('slug',$slug)->first();

        return view('backend.content.edit')->withContent($content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentUpdateRequest $request, $id)
    {
        $data = $request->except('_token','image');
        $content = $this->content->find($id);
       if($request->file('image')){
           $image= $request->file('image');
           $fileName = time().$image->getClientOriginalName();
           $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
           $data['image'] = 'content/'.$fileName;
           Storage::disk('public')->delete($content->image);

       }
    //    $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;

       if($this->content->update( $content->id,$data)){


           return redirect()->to('/contents')->with('success','Content updated successfully');
       }
       return redirect()->back()->with('errors','Content cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = $this->content->find($id);


        if($this->content->destroy($content->id)){

            $message = 'Content delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'Content cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $content = $this->content->find($request->get('id'));
        if ($content->is_active == 0) {
            $status = '1';
            $message = 'Content with title "' . $content->title . '" is published.';
        } else {
            $status = '0';
            $message = 'Content with title "' . $content->title . '" is unpublished.';
        }

        $this->content->changeStatus($content->id, $status);
        $this->content->update($content->id, array('is_active' => $status));
        $updated = $this->content->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'contents' => $updated], 200);
    }

}
