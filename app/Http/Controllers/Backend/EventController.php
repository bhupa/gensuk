<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\event\eventStoreRequest;
use App\Http\Requests\Backend\event\eventUpdateRequest;
use App\Repositories\eventRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class EventController extends Controller
{
    protected $event;

    public function __construct(EventRepository $event)
    {
        $this->event = $event;
        $this->upload_path = DIRECTORY_SEPARATOR.'event'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {

        $events = $this->event->orderBy('created_at','desc')->paginate('20');

        return view('backend.event.view')->withevents($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(eventStoreRequest $request)
    {

        $data = $request->except('_token','image');
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'event/'.$fileName;

        }

        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['volunters'] =(isset($request['volunters'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;

        if($this->event->create($data)){


            return redirect()->to('/events')->with('success','Event added successfully');
        }
        return redirect()->back()->with('errors','event cannot added Successfully');
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

        $events = $this->event->where('slug', $slug)->first();
        return view('backend.event.edit')->withevents($events );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(eventUpdateRequest $request, $id)
    {

        $event = $this->event->find($id);
        $data = $request->except('_token','image');
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'event/'.$fileName;

        }

        $data['created_by'] = Auth::user()->id;
        if($this->event->update( $event->id,$data)){


            return redirect()->to('/events')->with('success','event updated successfully');
        }
        return redirect()->back()->with('errors','event cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = $this->event->find($id);

        if($this->event->destroy($event->id)){

            $message = 'event delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'event cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $event = $this->event->find($request->get('id'));
        if ($event->is_active == 0) {
            $status = '1';
            $message = 'event with name "' . $event->title . '" is published.';
        } else {
            $status = '0';
            $message = 'event with name "' . $event->title . '" is unpublished.';
        }

        $this->event->changeStatus($event->id, $status);
        $this->event->update($event->id, array('is_active' => $status));
        $updated = $this->event->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'event' => $updated], 200);
    }
    public function volunters(Request $request)
    {
        $event = $this->event->find($request->get('id'));
        if ($event->volunters == 0) {
            $status = '1';
            $message = 'Volunters is needed for the "' . $event->title . '" .';
        } else {
            $status = '0';
            $message = 'Volunters is not needed for the "' . $event->name . '".';
        }

        $this->event->changeStatus($event->id, $status);
        $this->event->update($event->id, array('volunters' => $status));
        $updated = $this->event->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'event' => $updated], 200);
    }
    public function sort(Request $request){


        $exploded = explode('&', str_replace('item[]=', '', $request->order));

        for ($i=0; $i < count($exploded) ; $i++) {
            $this->event->update($exploded[$i], ['display_orders' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
