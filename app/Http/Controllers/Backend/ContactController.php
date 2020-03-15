<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    protected $contact;

    public function __construct(ContactRepository $contact)
    {
        $this->contact = $contact;

    }
    public function index()
    {
        $contacts = $this->contact->orderBy('created_at','desc')->paginate('20');
        return view('backend.contact.view')->withcontacts($contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->where('is_active','1')->orderBy('name')->get();
        return view('backend.contact.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(contacttoreRequest $request)
    {
        $data = $request->except('_token','image');


        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['create_by'] = Auth::user()->id;

        if($this->contact->create($data)){


            return redirect()->to('/contact')->with('success','contact created successfully');
        }
        return redirect()->back()->with('errors','contact cannot created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->contact->find($id);
        return view('backend.contact.show')->withContact($contact);
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


        $contact = $this->contact->where('slug', $slug)->first();
        return view('backend.contact.edit')->withcontact($contact )->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(contactUpdateRequest $request, $id)
    {


        $data = $request->except('_token','image');
        $contact = $this->contact->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'contact/'.$fileName;
            Storage::disk('public')->delete($contact->image);

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        if($this->contact->update( $contact->id,$data)){


            return redirect()->to('/contact')->with('success','contact updated successfully');
        }
        return redirect()->back()->with('errors','contact cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = $this->contact->find($id);

        if($this->contact->destroy($contact->id)){

            $message = 'contact delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'contact cannot be delete'],422);
    }


}
