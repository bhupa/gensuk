<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ContentBanner\ContentBannerStoreRequest;
use App\Http\Requests\Backend\ContentBanner\ContentBannerUpdateRequest;
use App\Repositories\ContentBannerRepository;
use Illuminate\Support\Facades\Storage;
use Auth;

class ContentBannerController extends Controller
{
    protected $contentbanner;

    public function __construct(ContentBannerRepository $contentbanner)
    {
        $this->contentbanner = $contentbanner;
        $this->upload_path = DIRECTORY_SEPARATOR.'contentbanner'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {

        $contentbanners = $this->contentbanner->orderBy('created_at','desc')->paginate('20');
        return view('backend.contentbanner.view')->withcontentbanners($contentbanners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.contentbanner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentBannerStoreRequest $request)
    {
        $data = $request->except('_token','image');
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'contentbanner/'.$fileName;

        }

        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;

        if($this->contentbanner->create($data)){


            return redirect()->to('/content-banners')->with('success','ContentBanner added successfully');
        }
        return redirect()->back()->with('errors','ContentBanner cannot added Successfully');
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

        $contentbanner = $this->contentbanner->where('slug', $slug)->first();
        return view('backend.contentbanner.edit')->withContentbanner($contentbanner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentBannerUpdateRequest $request, $id)
    {

        $contentbanner = $this->contentbanner->find($id);
        $data = $request->except('_token','image');
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'contentbanner/'.$fileName;

        }
        $data['created_by'] = Auth::user()->id;
        if($this->contentbanner->update( $contentbanner->id,$data)){


            return redirect()->to('/content-banners')->with('success','ContentBanner updated successfully');
        }
        return redirect()->back()->with('errors','ContentBanner cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contentbanner = $this->contentbanner->find($id);

        if($this->contentbanner->destroy($contentbanner->id)){

            $message = 'Content-Banner delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'ContentBanner cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $contentbanner = $this->contentbanner->find($request->get('id'));
        if ($contentbanner->is_active == 0) {
            $status = '1';
            $message = 'Content-Banner with name "' . $contentbanner->name . '" is published.';
        } else {
            $status = '0';
            $message = 'Content-Banner with name "' . $contentbanner->name . '" is unpublished.';
        }

        $this->contentbanner->changeStatus($contentbanner->id, $status);
        $this->contentbanner->update($contentbanner->id, array('is_active' => $status));
        $updated = $this->contentbanner->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'contentbanner' => $updated], 200);
    }


}
