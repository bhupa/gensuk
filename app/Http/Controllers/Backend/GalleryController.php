<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Gallery\GalleryStoreRequest;
use App\Http\Requests\Backend\Gallery\GalleryUpdateRequest;
use App\Repositories\GalleryImagesRepository;
use App\Repositories\GalleryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    protected $gallery,$galleryImages;

    public function __construct(GalleryRepository $gallery,GalleryImagesRepository $galleryImages)
    {
        $this->gallery = $gallery;
        $this->galleryImages = $galleryImages;
        $this->upload_path = DIRECTORY_SEPARATOR.'gallery'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {
        $galleries = $this->gallery->orderBy('created_at','desc')->paginate('20');
        return view('backend.gallery.view')->withGalleries($galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryStoreRequest $request)
    {
        $data = $request->except('_token','image');

        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'gallery/'.$fileName;

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['slug'] = str_replace(' ', '-', $request->title);
        if($this->gallery->create($data)){


            return redirect()->to('/gallerys')->with('success','Gallery created successfully');
        }
        return redirect()->back()->with('errors','Gallery cannot created Successfully');
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
        $gallerys = $this->gallery->where('slug',$slug)->first();

        return view('backend.gallery.edit')->withGallerys($gallerys );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryUpdateRequest $request, $id)
    {
        $data = $request->except('_token','image');
        $gallery = $this->gallery->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'gallery/'.$fileName;
            Storage::disk('public')->delete($gallery->image);

        }
        // $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;

        if($this->gallery->update($gallery->id,$data)){


            return redirect()->to('/gallerys')->with('success','Gallery updated successfully');
        }
        return redirect()->back()->with('errors','Gallery cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = $this->gallery->find($id);
        $this->galleryImages->where('gallery_id',$gallery->id)->delete();

        if($this->gallery->destroy($gallery->id)){

            $message = 'Gallery delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'Banner cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $gallery = $this->gallery->find($request->get('id'));
        if ($gallery->is_active == 0) {
            $status = '1';
            $message = 'Gallery with title "' . $gallery->title . '" is published.';
        } else {
            $status = '0';
            $message = 'Gallery with title "' . $gallery->title . '" is unpublished.';
        }

        $this->gallery->changeStatus($gallery->id, $status);
        $this->gallery->update($gallery->id, array('is_active' => $status));
        $updated = $this->gallery->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'gallery' => $updated], 200);
    }
}
