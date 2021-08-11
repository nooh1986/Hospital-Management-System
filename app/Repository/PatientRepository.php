<?php

namespace App\Repository;

use App\Models\Blood;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\PatientRepositoryInterface;

class PatientRepository implements PatientRepositoryInterface
{

    public function index()
    {
        $patients = Patient::all();
        return view('backend.patiens.index' , compact('patients'));
    }

    public function create()
    {
        $bloods = Blood::all();
        return view('backend.patiens.create' , compact('bloods'));
    }

    public function store($request)
    {
        try
        {
            $data['name']       = $request->name;
            $data['email']      = $request->email;
            $data['password']   = Hash::make($request->phone);
            $data['date_birth'] = $request->date;
            $data['gender']     = $request->gender;
            $data['phone']      = $request->phone;
            $data['blood_id']   = $request->blood_id;
            $data['address']    = $request->address;

            Patient::create($data);

            session()->flash('add');
            return redirect()->route('Patients.index');
        }

        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $bloods = Blood::all();
        $patien = Patient::findorfail($id);
        return view('backend.patiens.edit' , compact('bloods' , 'patien'));
    }


    public function update($request)
    {
        try
        {
            $patien = Patient::findorfail($request->id);

            $data['name']       = $request->name;
            $data['email']      = $request->email;
            $data['password']   = Hash::make($request->phone);
            $data['date_birth'] = $request->date;
            $data['gender']     = $request->gender;
            $data['phone']      = $request->phone;
            $data['blood_id']   = $request->blood_id;
            $data['address']    = $request->address;

            $patien->update($data);

            session()->flash('edit');
            return redirect()->route('Patients.index');
        }

        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        Patient::findorfail($request->id)->delete();

        session()->flash('delete');
        return redirect()->route('Patients.index');
    }
  
}
