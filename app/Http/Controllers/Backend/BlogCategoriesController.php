<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BlogCategories\BlogCategoriesStoreRequest;
use App\Http\Requests\Backend\BlogCategories\BlogCategoriesUpdateRequest;
use App\Repositories\BlogCategoriesRepository;

class BlogCategoriesController extends Controller
{
    protected $blog_categories;

    public function __construct(BlogCategoriesRepository $blog_categories)
    {
       $this->blog_categories = $blog_categories;

    }
   public function index()
   {
       $blogCategories = $this->blog_categories->orderBy('created_at','desc')->paginate('20');
       return view('backend.blogCategories.view')->withBlogCategories($blogCategories);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('backend.blogCategories.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(BlogCategoriesStoreRequest $request)
   {
       $data = $request->except('_token','image');


       $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;


       if($this->blog_categories->create($data)){


           return redirect()->to('/blog_categories')->with('success','Blog_categories created successfully');
       }
       return redirect()->back()->with('errors','Blog_categories cannot created Successfully');
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

       $blogCategories = $this->blog_categories->where('slug', $slug)->first();
       return view('backend.blogCategories.edit')->withBlogCategories($blogCategories);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(BlogCategoriesUpdateRequest $request, $id)
   {


       $data = $request->except('_token');
       $blog_categories = $this->blog_categories->find($id);
       $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
       if($this->blog_categories->update( $blog_categories->id,$data)){


           return redirect()->to('/blog_categories')->with('success','Blog_categories updated successfully');
       }
       return redirect()->back()->with('errors','Blog_categories cannot updated Successfully');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $blog_categories = $this->blog_categories->find($id);

       if($this->blog_categories->destroy($blog_categories->id)){

           $message = 'Blog_categories delete successfully';
           return response()->json(['status'=>'ok','message'=>$message],200);

       }
       return response()->json(['status'=>'ok','message'=>'Blog Categories cannot be delete'],422);
   }
   public function changeStatus(Request $request)
   {
       $blog_categories = $this->blog_categories->find($request->get('id'));
       if ($blog_categories->is_active == 0) {
           $status = '1';
           $message = 'blog_categories with title "' . $blog_categories->title . '" is published.';
       } else {
           $status = '0';
           $message = 'blog_categories with title "' . $blog_categories->title . '" is unpublished.';
       }

       $this->blog_categories->changeStatus($blog_categories->id, $status);
       $this->blog_categories->update($blog_categories->id, array('is_active' => $status));
       $updated = $this->blog_categories->find($request->get('id'));
       return response()->json(['status' => 'ok', 'message' => $message, 'blogCategories' => $updated], 200);
   }
}
