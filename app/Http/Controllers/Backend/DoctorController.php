<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Interfaces\DoctorRepositoryInterface;

class DoctorController extends Controller
{
    
    private $doctor;
  
    public function __construct(DoctorRepositoryInterface $doctor)
    {
        $this->doctor = $doctor;
    }
        
    
    public function index()
    {
        return $this->doctor->index();
    }

    
    public function create()
    {
        return $this->doctor->create();
    }
    
    
    public function store(DoctorRequest $request)
    {
        return $this->doctor->store($request);
    }


    public function edit($id)
    {
        return $this->doctor->edit($id);
    }
    

    public function update(Request $request)
    {
        // return $request;
        return $this->doctor->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->doctor->destroy($request);
    }

    
    public function update_password(Request $request)
    {
        return $this->doctor->update_password($request);
    }


    public function update_status(Request $request)
    {
        return $this->doctor->update_status($request);
    }

}
