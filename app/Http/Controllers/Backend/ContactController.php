<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Contact\ContactReplyStore;
use App\Mail\Contact\AdminContactReplyMail;
use App\Mail\Contact\ContactReplyMail;
use App\Repositories\ContactRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    protected $contact,$setting;

    public function __construct(ContactRepository $contact,SettingRepository $setting)
    {
        $this->contact = $contact;
        $this->setting = $setting;

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
    public function store(ContactReplyStore $request)
    {
        $data= $request->except('_token','description');
        $data = $this->contact->find($request->id);
        $data['description']= $request->description;
        $data['cc'] ='CC of contact message reply';
        $adminEmail = $this->setting->where('slug','from-admin')->first();
        $companyName = $this->setting->where('slug','compant-name')->first();
        $fromEmail = $this->setting->where('slug','reply-email')->first();
        $company = [
            'name'=>$companyName['value'],
            'email'=> $fromEmail['value'],
            'compnay_email'=> $adminEmail['value']
        ];

        Mail::to($adminEmail->value)->send(new AdminContactReplyMail($data,$company));
        Mail::to($data->email)->send(new ContactReplyMail($data,$company));

        if (Mail::failures()){
            return redirect()->back()->with('errors','Email cannot send succeefully');
        }
        else{
            return redirect()->to('/contacts')->with('success','Email has sent successfully');

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
        $contact = $this->contact->find($id);
        return view('backend.contact.show')->withContact($contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = $this->contact->find($id);
        return view('backend.contact.edit')->withContact($contact);
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
