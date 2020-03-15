<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Setting\SettingStoreRequest;
use App\Http\Requests\Backend\Setting\SettingUpdateRequest;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class SettingController extends Controller
{
    protected $setting;

    public function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
        $this->upload_path = DIRECTORY_SEPARATOR.'setting'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {

        $settings = $this->setting->orderBy('created_at','desc')->paginate('20');

        return view('backend.setting.view')->withsettings($settings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(settingStoreRequest $request)
    {
        $data = $request->except('_token');


        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;

        if($this->setting->create($data)){


            return redirect()->to('/settings')->with('success','setting added successfully');
        }
        return redirect()->back()->with('errors','setting cannot added Successfully');
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

        $settings = $this->setting->where('slug', $slug)->first();
        return view('backend.setting.edit')->withsettings($settings );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(settingUpdateRequest $request, $id)
    {

        $setting = $this->setting->find($id);
        $data = $request->except('_token');


        $data['created_by'] = Auth::user()->id;
        if($this->setting->update( $setting->id,$data)){


            return redirect()->to('/settings')->with('success','setting updated successfully');
        }
        return redirect()->back()->with('errors','setting cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = $this->setting->find($id);

        if($this->setting->destroy($setting->id)){

            $message = 'setting delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'setting cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $setting = $this->setting->find($request->get('id'));
        if ($setting->is_active == 0) {
            $status = '1';
            $message = 'setting with name "' . $setting->name . '" is published.';
        } else {
            $status = '0';
            $message = 'setting with name "' . $setting->name . '" is unpublished.';
        }

        $this->setting->changeStatus($setting->id, $status);
        $this->setting->update($setting->id, array('is_active' => $status));
        $updated = $this->setting->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'setting' => $updated], 200);
    }


}
