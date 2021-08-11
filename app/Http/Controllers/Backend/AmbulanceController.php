<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AmbulanceRequest;
use App\Interfaces\AmbulanceRepositoryInterface;

class AmbulanceController extends Controller
{
    
    private $Ambulance;

    public function __construct(AmbulanceRepositoryInterface $Ambulance)
    {
        $this->Ambulance = $Ambulance;
    }

    
    public function index()
    {
        return $this->Ambulance->index();
    }

    
    public function create()
    {
        return $this->Ambulance->create();
    }

    
    public function store(AmbulanceRequest $request)
    {
        return $this->Ambulance->store($request);
    }

    
    public function edit($id)
    {
        return $this->Ambulance->edit($id);
    }

    
    public function update(AmbulanceRequest $request)
    {
        return $this->Ambulance->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->Ambulance->destroy($request);
    }
}
