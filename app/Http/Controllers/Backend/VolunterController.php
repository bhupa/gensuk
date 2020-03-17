<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Volunteer\VolunteerReplyStore;
use App\Mail\Contact\AdminContactReplyMail;
use App\Mail\Investment\InvestmentReplyMail;
use App\Mail\Volunter\VolunterReplyMail;
use App\Repositories\SettingRepository;
use App\Repositories\VolunterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class VolunterController extends Controller
{
    protected $volunter,$setting;

    public function __construct(VolunterRepository $volunter,SettingRepository $setting)
    {
        $this->volunter = $volunter;
        $this->setting = $setting;

    }
    public function index()
    {
        $volunters = $this->volunter->orderBy('created_at','desc')->paginate('20');
        return view('backend.volunter.index')->withvolunters($volunters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $categories = $this->category->where('is_active','1')->orderBy('name')->get();
//        return view('backend.volunter.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VolunteerReplyStore $request)
    {
        $data= $request->except('_token','description');
        $data = $this->volunter->find($request->id);
        $data['description']= $request->description;
        $data['cc'] ='CC of Volunter message reply';
        $data['eventTitle'] = $data->event->title;
        $adminEmail = $this->setting->where('slug','from-admin')->first();
        $companyName = $this->setting->where('slug','compant-name')->first();
        $fromEmail = $this->setting->where('slug','reply-email')->first();
        $company = [
            'name'=>$companyName['value'],
            'email'=> $fromEmail['value'],
            'compnay_email'=> $adminEmail['value']
        ];

        Mail::to($adminEmail->value)->send(new AdminContactReplyMail($data,$company));
        Mail::to($data->email)->send(new VolunterReplyMail($data,$company));

        if (Mail::failures()){
            return redirect()->back()->with('errors','Email cannot send succeefully');
        }
        else{
            return redirect()->to('/volunters')->with('success','Email has sent successfully');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $volunter = $this->volunter->find($id);
        return view('backend.volunter.show')->withvolunter($volunter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



        $volunter = $this->volunter->find($id);
        return view('backend.volunter.edit')->withvolunter($volunter );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VolunteerReplyStore $request, $id)
    {


        $data = $request->except('_token','image');
        $volunter = $this->volunter->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'volunter/'.$fileName;
            Storage::disk('public')->delete($volunter->image);

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        if($this->volunter->update( $volunter->id,$data)){


            return redirect()->to('/volunter')->with('success','volunter updated successfully');
        }
        return redirect()->back()->with('errors','volunter cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $volunter = $this->volunter->find($id);

        if($this->volunter->destroy($volunter->id)){

            $message = 'volunter delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'volunter cannot be delete'],422);
    }
}
