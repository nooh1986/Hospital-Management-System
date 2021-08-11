<?php

namespace App\Repository;

use App\Interfaces\AmbulanceRepositoryInterface;
use App\Models\Ambulance;


class AmbulanceRepository implements AmbulanceRepositoryInterface
{

    public function index()
    {
        $ambulances = Ambulance::all();
        return view('backend.ambulances.index' , compact('ambulances'));
    }

    public function create()
    {
        return view('backend.ambulances.create');
    }

    public function store($request)
    {
        try
        {
            $data['car_number']            = $request->car_number;
            $data['car_model']             = $request->car_model;
            $data['car_year_made']         = $request->car_year_made;
            $data['driver_name']           = $request->driver_name;
            $data['driver_license_number'] = $request->driver_license_number;
            $data['driver_phone']          = $request->driver_phone;
            $data['notes']                 = $request->notes;

            Ambulance::create($data);

            session()->flash('add');
            return redirect()->route('Ambulances.index');
        }

        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $ambulance = Ambulance::findorfail($id);
        return view('backend.ambulances.edit' , compact('ambulance'));
    }

    public function update($request)
    {
        try
        {
            $ambulance = Ambulance::findorfail($request->id);

            $data['car_number']            = $request->car_number;
            $data['car_model']             = $request->car_model;
            $data['car_year_made']         = $request->car_year_made;
            $data['driver_name']           = $request->driver_name;
            $data['driver_license_number'] = $request->driver_license_number;
            $data['driver_phone']          = $request->driver_phone;
            $data['notes']                 = $request->notes;

            $status                      = ($request->status == 1 ? 1 : 0 );
            $data['status']              = $status;

            $ambulance->update($data);

            session()->flash('edit');
            return redirect()->route('Ambulances.index');
        }

        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Ambulance::findorfail($request->id)->delete();

        session()->flash('delete');
        return redirect()->route('Ambulances.index');
    }


}
