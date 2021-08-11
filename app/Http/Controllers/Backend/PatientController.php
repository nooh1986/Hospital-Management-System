<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Interfaces\PatientRepositoryInterface;

class PatientController extends Controller
{
    
    private $Patient;

    public function __construct(PatientRepositoryInterface $Patient)
    {
        $this->Patient = $Patient;
    }


    public function index()
    {
        return $this->Patient->index();
    }

    
    public function create()
    {
        return $this->Patient->create();
    }

    
    public function store(PatientRequest $request)
    {
        return $this->Patient->store($request);
    }

    
    public function edit($id)
    {
        return $this->Patient->edit($id);
    }

   
    public function update(PatientRequest $request)
    {
        return $this->Patient->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->Patient->destroy($request);
    }
}
