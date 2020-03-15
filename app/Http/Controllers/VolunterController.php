<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolunterStoreRequest;
use App\Repositories\EventRepository;
use App\Repositories\VolunterRepository;
use Illuminate\Http\Request;

class VolunterController extends Controller
{
    protected  $volunter,$event;

    public  function __construct(VolunterRepository $volunter,EventRepository $event)
    {
        $this->volunter = $volunter;
        $this->event = $event;
    }
    public function store(VolunterStoreRequest $request)
    {
        $event = $this->event->find($request->id);
        $data = $request->except('_token');
        $data['event_id'] = $event->id;
        if ($this->volunter->create($data)) {

            return redirect()->to('/event/'.$event->slug)->with('success', 'We will contact you soon register successfully');
        }
        return redirect()->back()->with('errors', 'Volunter  cannot created Successfully ');
    }
}
