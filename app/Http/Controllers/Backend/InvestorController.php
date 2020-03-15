<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\InvestorsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvestorController extends Controller
{
    protected $investor;

    public function __construct(InvestorsRepository $investor)
    {
        $this->investor = $investor;

    }
    public function index()
    {
        $investors = $this->investor->orderBy('created_at','desc')->paginate('20');
        return view('backend.investor.index')->withinvestors($investors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->where('is_active','1')->orderBy('name')->get();
        return view('backend.investor.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(investortoreRequest $request)
    {
        $data = $request->except('_token','image');


        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['create_by'] = Auth::user()->id;

        if($this->investor->create($data)){


            return redirect()->to('/investor')->with('success','investor created successfully');
        }
        return redirect()->back()->with('errors','investor cannot created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $investor = $this->investor->find($id);
        return view('backend.investor.show')->withinvestor($investor);
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


        $investor = $this->investor->where('slug', $slug)->first();
        return view('backend.investor.edit')->withinvestor($investor )->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(investorUpdateRequest $request, $id)
    {


        $data = $request->except('_token','image');
        $investor = $this->investor->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'investor/'.$fileName;
            Storage::disk('public')->delete($investor->image);

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        if($this->investor->update( $investor->id,$data)){


            return redirect()->to('/investor')->with('success','investor updated successfully');
        }
        return redirect()->back()->with('errors','investor cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $investor = $this->investor->find($id);

        if($this->investor->destroy($investor->id)){

            $message = 'investor delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'investor cannot be delete'],422);
    }
}
