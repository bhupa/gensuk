<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\MemberShipRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipController extends Controller
{
    protected $membership;

    public function __construct(MemberShipRepository $membership)
    {
        $this->membership = $membership;

    }
    public function index()
    {

        $memberships = $this->membership->orderBy('created_at','desc')->paginate('20');

        return view('backend.membership.index')->withmemberships($memberships);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.membership.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(membershipStoreRequest $request)
    {
        $data = $request->except('_token','image');
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'membership/'.$fileName;

        }

        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;
//        $data['created_at'] = '2018';

        if($this->membership->create($data)){


            return redirect()->to('/memberships')->with('success','membership added successfully');
        }
        return redirect()->back()->with('errors','membership cannot added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membership = $this->membership->find($id);
        return view('backend.membership.show')->withmembership($membership);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $memberships = $this->membership->where('slug', $slug)->first();
        return view('backend.membership.edit')->withmemberships($memberships );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(membershipUpdateRequest $request, $id)
    {

        $membership = $this->membership->find($id);
        $data = $request->except('_token','image');
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'membership/'.$fileName;

        }

        $data['created_by'] = Auth::user()->id;
        if($this->membership->update( $membership->id,$data)){


            return redirect()->to('/memberships')->with('success','membership updated successfully');
        }
        return redirect()->back()->with('errors','membership cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membership = $this->membership->find($id);

        if($this->membership->destroy($membership->id)){

            $message = 'membership delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'membership cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $membership = $this->membership->find($request->get('id'));
        if ($membership->is_active == 0) {
            $status = '1';
            $message = 'membership with name "' . $membership->name . '" is published.';
        } else {
            $status = '0';
            $message = 'membership with name "' . $membership->name . '" is unpublished.';
        }

        $this->membership->changeStatus($membership->id, $status);
        $this->membership->update($membership->id, array('is_active' => $status));
        $updated = $this->membership->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'membership' => $updated], 200);
    }

    public function sort(Request $request){


        $exploded = explode('&', str_replace('item[]=', '', $request->order));

        for ($i=0; $i < count($exploded) ; $i++) {
            $this->membership->update($exploded[$i], ['display_orders' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
