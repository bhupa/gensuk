<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Blog\BlogStoreRequest;
use App\Http\Requests\Backend\Blog\BlogUpdateRequest;
use App\Repositories\BlogCategoriesRepository;
use App\Repositories\BlogRepository;
use Illuminate\Support\Facades\Storage;
use Auth;

class BlogController extends Controller
{
    protected $blogs, $category;

    public function __construct(BlogRepository $blogs,BlogCategoriesRepository $category)
    {
       $this->blogs = $blogs;
       $this->category = $category;
       $this->upload_path = DIRECTORY_SEPARATOR.'blogs'.DIRECTORY_SEPARATOR;
       $this->storage = Storage::disk('public');
    }
   public function index()
   {
       $blogs = $this->blogs->orderBy('created_at','desc')->paginate('20');
       return view('backend.blog.view')->withBlogs($blogs);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $categories = $this->category->where('is_active','1')->orderBy('name')->get();
       return view('backend.blog.create')->withCategories($categories);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(BlogStoreRequest $request)
   {
       $data = $request->except('_token','image');

       if($request->file('image')){
           $image= $request->file('image');
           $fileName = time().$image->getClientOriginalName();
           $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
           $data['image'] = 'blogs/'.$fileName;

       }
       $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
       $data['create_by'] = Auth::user()->id;

       if($this->blogs->create($data)){


           return redirect()->to('/blogs')->with('success','Blogs created successfully');
       }
       return redirect()->back()->with('errors','Blogs cannot created Successfully');
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
         $categories = $this->category->where('is_active','1')->orderBy('name')->get();


       $blogs = $this->blogs->where('slug', $slug)->first();
       return view('backend.blog.edit')->withBlogs($blogs )->withCategories($categories);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(BlogUpdateRequest $request, $id)
   {


       $data = $request->except('_token','image');
       $blogs = $this->blogs->find($id);
       if($request->file('image')){
           $image= $request->file('image');
           $fileName = time().$image->getClientOriginalName();
           $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
           $data['image'] = 'blogs/'.$fileName;
           Storage::disk('public')->delete($blogs->image);

       }
       $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
       if($this->blogs->update( $blogs->id,$data)){


           return redirect()->to('/blogs')->with('success','Blogs updated successfully');
       }
       return redirect()->back()->with('errors','Blogs cannot updated Successfully');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $blogs = $this->blogs->find($id);

       if($this->blogs->destroy($blogs->id)){

           $message = 'Blogs delete successfully';
           return response()->json(['status'=>'ok','message'=>$message],200);

       }
       return response()->json(['status'=>'ok','message'=>'Blogs cannot be delete'],422);
   }
   public function changeStatus(Request $request)
    {
        $blogs = $this->blogs->find($request->get('id'));
        if ($blogs->is_active == 0) {
            $status = '1';
            $message = 'Blogs with title "' . $blogs->name . '" is published.';
        } else {
            $status = '0';
            $message = 'Blogs with title "' . $blogs->name . '" is unpublished.';
        }

        $this->blogs->changeStatus($blogs->id, $status);
        $this->blogs->update($blogs->id, array('is_active' => $status));
        $updated = $this->blogs->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'blog' => $updated], 200);
    }

}
