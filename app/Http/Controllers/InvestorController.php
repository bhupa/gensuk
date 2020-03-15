<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\InvestorStoreRequest;
use App\Repositories\InvestorsRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    protected  $investor,$project;

    public  function __construct(InvestorsRepository $investor,ProjectRepository $project)
    {
        $this->investor = $investor;
        $this->project = $project;
    }
    public function store(InvestorStoreRequest $request)
    {
        $project = $this->project->find($request->id);
        $data = $request->except('_token');
        $data['project_id']= $project->id;
        if ($this->investor->create($data)) {

            return redirect()->to('/project/'.$project->slug)->with('success', 'We will contact you soon register successfully');
        }
        return redirect()->back()->with('errors', 'Contact  cannot created SuccessfullyContact ');
    }
}
